<?php
include 'header.php';
?>



<body>

  <script>
  function star(obj){
      var id = $(obj).attr('id');
      var num = id.substr(4);

      for(i=1; i<=5; i++)
          $('#star'+i).attr('src','img/star-empty.png');

      for(i=1; i<=num; i++)
          $('#star'+i).attr('src','img/star.png');

      $('#starcount').val(num + "");

  }

  </script>


<?php


include 'db/pdo.php';
$database = new db();


if(empty($_GET['siteID'])) die();

$database = new db();
$database->query("SELECT * FROM locations where siteID= :siteID");
$database->bind(':siteID',$_GET['siteID']);
$result = $database->resultset();


$suburbID = $result[0]['suburbID'];
$database->query("SELECT * FROM suburb where suburbID= :suburbID");
$database->bind(':suburbID',$suburbID);
$result1 = $database->resultset();


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
    <div class="container" >
        <div class="row">
            <div class="col-75" style="margin: auto;">
                <div class="float-left" itemscope itemtype="http://schema.org/Place">
                    <h1 style="font-size:40px;"><?php echo $result[0]['name'] ?></h1>
                    <ul >
                        <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                        <li itemprop="ratingValue" style="font-size:20px;">Rating:
                            <span>
                               <?php

                                $star_count = intval($result[0]['rating']);
                                $empty_count = 5 - $star_count;

                                for($i=1; $i<=$star_count; $i++){
                                  echo '<img src="img/star.png" height="20" width="25"/>';
                                }

                                for($i=1; $i<=$empty_count; $i++){
                                  echo '<img src="img/star-empty.png" height="20" width="25"/>';
                                }

                                echo '<span itemprop="ratingCount" style="display:none;">'.$star_count.'</span>';

                                ?>
                            </span>
                        </li>
                        </div>
                        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                        <li itemprop="name" style="font-size:20px;">Address: <?php echo $result[0]['address'] ?></li>
                        <li itemprop="addressRegion" style="font-size:20px;">Suburb: <?php echo $result1[0]['suburbName'] ?></li>
                        </div>
                        <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
                        <?php echo '<span itemprop="latitude" style="display:none;">'.$result[0]['lat'].'</span>'; ?>
                        <?php echo '<span itemprop="longitude" style="display:none;">'.$result[0]['lon'].'</span>'; ?>
                        </div>

                    </ul>
                </div>
                <div class="float-right">
                    <div id="googleMap" class="map" style=" width:550px;height:450px; margin-top:20px; "><?php echo $result[0]['lat'] . ',' . $result[0]['lon']; ?></div>
                </div>
            </div>

            <div class="col-75" style="margin: auto; margin-top:300px;">
                <div>
                   <form action="comment_update.php" method="post">
                    <h3>Write a Review
                    <img onclick="star(this)" id="star1" src="img/star-empty.png" height="20" width="25"/>
                    <img onclick="star(this)" id="star2" src="img/star-empty.png" height="20" width="25"/>
                    <img onclick="star(this)" id="star3" src="img/star-empty.png" height="20" width="25"/>
                    <img onclick="star(this)" id="star4" src="img/star-empty.png" height="20" width="25"/>
                    <img onclick="star(this)" id="star5" src="img/star-empty.png" height="20" width="25"/>
                    </h3>
                    <input id="starcount" name="starcount" type="hidden" value="0"/>
                    <input name="siteID" type="hidden" value="<?php echo $_GET['siteID']; ?>"/>
                    <input name="comment" type="text" placeholder="Help other foodies by sharing your review">
                    <button onclick="submit">Add your review</button>
                    </form>
                </div>
                <div class="list-group" >
                   <?php

                    $database->query('set session character_set_connection=utf8');
                    $database->execute();
                    $database->query('set session character_set_results=utf8');
                    $database->execute();
                    $database->query('set session character_set_client=utf8');
                    $database->execute();


                    $database->query("SELECT * FROM comment where siteID= :siteID");
                    $database->bind(':siteID',$_GET['siteID']);
                    $result = $database->resultset();

                    foreach($result as $key => $value){
                        echo '<div itemprop="review" itemscope itemtype="http://schema.org/Review" class="list-group-item">';
                        echo '<h2 itemprop="author">' . $value['writer'] . '</h2>';
                        echo '<p>Rating:<span>';

                        $star_count = intval($value['rating']);
                                $empty_count = 5 - $star_count;

                                for($i=1; $i<=$star_count; $i++){
                                    echo '<img src="img/star.png" height="20" width="25"/>';
                                    }
                                for($i=1; $i<=$empty_count; $i++){
                                    echo '<img src="img/star-empty.png" height="20" width="25"/>';
                                    }
                                  echo '<span itemprop="reviewRating" style="display:none;">'.$star_count.'</span>';


                        echo '</span></p>';
                        echo '<p itemprop="description">' . $value['content'] . '</p></div>';
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
