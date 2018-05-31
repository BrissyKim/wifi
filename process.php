
<?php

include 'db/pdo.php';


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$database = new db();
$database->query("SELECT * FROM register where username= :username");
$database->bind(':username',$username);
$res = $database->resultset();



if(count($res) < 1){

$database->query('INSERT INTO register (username, email, password) VALUES(:username, :email, :password)');
$database->bind(':username', $username);
$database->bind(':email', $email);
$database->bind(':password', $password);

$database->execute();

    echo "<script>alert('Sign up successful!'); location.href='./';</script>";
}else{
    echo "<script>alert('Sign up failed.'); history.back(-1);</script>";
}
?>
