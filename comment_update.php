
<?php

include 'db/pdo.php';

if(empty($_POST['siteID'])) die();

$siteID = $_POST['siteID'];
$starcount = $_POST['starcount'];
$comment = $_POST['comment'];

session_start();

if(!isset($_SESSION['username'])){
    echo "<script>alert('Please, login first to write a review.'); history.back(-1);</script>";
    die();
}

$database = new db();


$database->query('set session character_set_connection=utf8');
$database->execute();
$database->query('set session character_set_results=utf8');
$database->execute();
$database->query('set session character_set_client=utf8');
$database->execute();

$database->query('INSERT INTO comment (siteID, writer, content,rating) VALUES(:siteID, :writer, :content, :rating)');
$database->bind(':siteID', $siteID);
$database->bind(':writer', $_SESSION['username']);
$database->bind(':content', $comment);
$database->bind(':rating', $starcount);
$database->execute();

    echo "<script>alert('Completed.'); location.href='detail.php?siteID=" . $siteID . "';</script>";


?>
