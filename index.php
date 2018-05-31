<?php
include 'header.php';
include 'db/pdo.php';

$database = new db();
?>

<body>

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
    <div class="content_home">
      <br>
      <div class="col-75" style="padding-left: 10%; padding-right: 20%;">
        <form style="display: inline" action="search_result.php" method="get">
          <br>

          <label style="opacity: 0.7;"><b>Sorting options</b></label>
          <br>
          <br>
          <span style="opacity: 0.7;">Rating   </span>
          <select name="rates" style="width: 20%; color: #6495ED;">
            <option selected="" value="">( Results >= * )</option>
            <option value="1">*</option>
            <option value="2">**</option>
            <option value="3">***</option>
            <option value="4">****</option>
            <option value="5">*****</option>
          </select>


          <span style="opacity: 0.7; padding-left: 10px;">Suburb   </span>
          <select id='suburb' name="suburb" style="width: 20%; color: #6495ED;">
            <option selected="" value="">(Please select a suburb)</option>
            <?php

            $database->query("SELECT * FROM suburb");
            $res = $database->resultset();

            foreach($res as $key => $value)
                if($value['suburbName'] != '')
                echo '<option value="' . $value['suburbName'] . '">' . $value['suburbName'] . '</option>';
            ?>
          </select>

          <span style="opacity: 0.7; padding-left: 10px;">Radious Km   </span>
          <select name="knum" style="width: 20%; color: #6495ED;">
            <option selected="" value="">(Please select distance range)</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>

          <input name="name" style="width: 50%; margin-right: 20px;" type="text" placeholder="Enter the WIFI Name">

          <!-- <input name="knum" style="width: 40%" type="text" placeholder="input km number"> -->
          <button class="btns">Search</button>
        </form>
      </div>
    </div>


    <div style="margin-top: 10px;">
      <div style="margin: auto;">
        <div class="news list-group">

<?php

  echo '<h2>Top 10 highest rated Wifi</h2>';
$database->query("SELECT * FROM locations order by rating desc limit 10");
$result = $database->resultset();

foreach($result as $key => $value){
    echo '<div class="news list-group-item">';
    echo '<div class="float-left">';
    echo '<h3><a style="color:black; float:left;" href="detail.php?siteID=' . $value['siteID'] . '">' . $value['name'] . '</a></h3>';
    echo '<br>';
    echo '<ul>';
    echo '<li><h4>' . $value['name'] . '</h4></li>';
    echo '<li><h4>' . $value['address'] . '</h4></li>';
    echo '</ul></div>';

    // echo '<div class="float-right image" style="max-width: 220px;">';
    // echo '<div id="googleMap" class="map" style="width:300px;height:180px;">' . $value['lat'] . ',' . $value['lon'] . '</div>';
    // echo '</div>';
    echo '<div class="float-right image"  style="max-width: 220px;">';
    echo '<div id="googleMap" class="map" style="width:400px;height:200px; float:right;">'. $value['lat'] . ',' . $value['lon'] . ','. $value['name'] .','. $value['siteID'] .'</div>';
    echo '</div></div>';
}
?>
        </div>
      </div>
    </div>
  </div>



  <?php
  include 'footer.php';
  ?>



</body>

</html>
