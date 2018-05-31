<?php
include 'header.php';
?>


<body>

<?php
session_start();

if(isset($_SESSION['username'])){
echo '<script>location.href="./";</script>';
}
?>

  <div class="container">
    <div class="topnav">
      <a href="./" id="logo">
            <img src="img/logogo.png" alt="" height="75px" style="margin: 0%">
          </a>
      <button id="nav_btn" class="btns" onclick="location.href='signup.php'">Sign up</button>
      <button id="nav_btn" class="btns" onclick="location.href='login.php'">Sign in</button>
    </div>
  </div>

  <div class="container">
    <div class="content">
      <h2>Login</h2>
    </div>
    <hr class="liner">

    <div class="container">
    <form class="login_container" action="connect.php" method="post">
      <label>
        <b>Username</b>
      </label>
      <input type="text" name="username" placeholder="Enter Username" required>

      <label>
        <b>Password</b>
      </label>
      <input type="password" name="password" placeholder="Enter Password" required>
      <div class="btns">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="submit" class="logbtn" name="login">Login</button>
      </div>

      <br>
    </form>
  </div>
  </div>


  <?php
  include 'footer.php';
  ?>


</body>

</html>
