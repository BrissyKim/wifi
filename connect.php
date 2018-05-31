<?php



include 'db/pdo.php';



$database = new db();
$database->query("SELECT * FROM register where username= :username and password= :password");
$database->bind(':username',$_POST['username']);
$database->bind(':password',$_POST['password']);
$result = $database->resultset();




if(count($result) < 1){
    echo "<script>alert('Login failed.'); history.back(-1);</script>";
}else{
    session_start();
    $_SESSION['username'] = $_POST['username'];
    echo "<script>alert('Login successful.'); location.href='./'; </script>";
}

?>
