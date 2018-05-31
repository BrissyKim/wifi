<?php
include 'header.php';
include 'db/pdo.php';
?>

<body>

<?php

$database = new db();

$suburb = $_GET['suburb'];
$name = $_GET['name'];
$knum = $_GET['knum'];
$rates = $_GET['rates'];

if(empty($_GET['suburb']) && empty($_GET['name']) && empty($_GET['knum']) && empty($_GET['rates'])) {
  $database->query("SELECT * FROM locations");
  $database->execute();
}


if($suburb!=='') {
  $database->query("SELECT * FROM suburb where suburbName= :suburbName");
  $database->bind(':suburbName',$suburb);
  $res = $database->single();

  $suburbId = $res['suburbID'];
}

if($suburb!=='') { // If suburb is selected, and wifi name is provided.

  $query = 'SELECT * FROM locations where';
  $query .= ' suburbID = :suburbID';

  if($name !== '') {
    $query .= ' and';
    $query .= ' name LIKE :name';
  }

  if(!empty($rates) || $rates == 0) {
    $query .= ' and';
    $query .= ' rating >= :rates';
  }
} elseif($name !== ''){
  $query = 'SELECT * FROM locations where';
  $query .= ' name LIKE :name';

  if($suburb !== '') {
    $query .= ' and';
    $query .= ' name LIKE :name';
  }

  if(!empty($rates) || $rates == 0) {
    $query .= ' and';
    $query .= ' rating >= :rates';
  }
} elseif(!empty($rates) || $rates == 0) {
  $query = 'SELECT * FROM locations where';
  $query .= ' rating >= :rates';

  if($suburb !== '') {
    $query .= ' and';
    $query .= ' name LIKE :name';
  }

  if($name !== '') {
    $query .= ' and';
    $query .= ' name LIKE :name';
  }

}



// Prepare the query
$database->query($query);

    if($suburb !== ''){
        $database->bind(':suburbID',$suburbId);
    }
    if($name !== ''){
        $database->bind(':name','%' . $name . '%');
    }
    if(!empty($rates) || $rates == 0){
        $database->bind(':rates', $rates);
    }

$result = $database->resultset();

// When distance provided
if(!empty($knum)){
  $lats = array();
  $lons = array();
  foreach($result as $row) {
    array_push($lats, floatval($row['lat']));
    array_push($lons, floatval($row['lon']));
  }
  $lats_avg = array_sum($lats)/count($lats);
  $lons_avg = array_sum($lons)/count($lons);

  $query = 'SELECT *, (6371*acos(cos(radians(' . $lats_avg . '))*cos(radians(lat))*cos(radians(lon) -radians(' . $lons_avg . '))+sin(radians(' . $lats_avg . '))*sin(radians(lat)))) AS distance FROM locations HAVING distance <= ' . $knum . ' ORDER BY distance LIMIT 0,300';

  $database->query($query);
  $result = $database->resultset();
}



?>



  <div class="container">
    <div class="topnav">
      <a href="./" id="logo">
        <img src="img/logogo.png" alt="" height="75px" style="margin: 0%">
      </a>
      <?php
        session_start();
        if(!isset($_SESSION['username'])){
      ?>
      <button id="nav_btn" class="btns" onclick="location.href='signup.php'">Sign up</button>
      <button id="nav_btn" class="btns" onclick="location.href='login.php'">Sign in</button>
      <?php
      }else{
      ?>
      <button id="nav_btn" class="btns" onclick="location.href='logout.php'">logout</button>
      <?php
      }
      ?>

    </div>
  </div>





  <div class="container">
    <div class="row">
      <div class="list-group col-75" style="margin: auto;">
        <div id="googleMap" class="map1" style="width:100%;height:400px; margin-bottom:50px;"></div>


    <?php

          if(empty($result))
          {
            echo "<p style='color:Blue; text-align: center; margin: 0; left: 45%; margin-right: -50%; background: yellow;
            position: absolute; top: 30%; transform: translate(-50%, -50%); font-size: 40px; '>".'No Results Found'."</p>";
          }else{


          echo '<h2>Search Result</h2>';
        foreach($result as $key => $value){
            echo '<div class="list-group-item">';
            echo '<div class="float-left">';
            echo '<p>' . $value['name'] . '</p>';
            echo '<p>' . $value['address'] . '</p>';
            echo '<p>Rating<span>';

            $star_count = intval($value['rating']);
            $empty_count = 5 - $star_count;

            for($i=1; $i<=$star_count; $i++)
                echo '<img src="img/star.png" height="20" width="25"/>';

            for($i=1; $i<=$empty_count; $i++)
                echo '<img src="img/star-empty.png" height="20" width="25"/>';

            echo '</span></p>';

            echo '<a href="detail.php?siteID=' . $value['siteID'] . '">More Information</a>';
            echo '</div>';

            echo '<div class="float-right image">';
            echo '<div id="googleMap" class="map" style="width:400px; height:200px;">'. $value['lat'] . ',' . $value['lon'] . ','. $value['name'] .','. $value['siteID'] .'</div>';
            echo '</div></div>';

        }
      }
    ?>
      </div>
    </div>
  </div>


  <?php
  include 'footer.php';
  ?>

</body>

</html>
