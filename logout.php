<?php

session_start();

if(isset($_SESSION['username'])){ 
   unset($_SESSION['username']);
    echo "<script>location.href='./';</script>";
}
      
?>