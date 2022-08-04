<?php
require "includes/header.php"
?>
<main>
  <link rel="stylesheet" href="css/login.css">
  <br><br><br>
  <div class="col-md-4 login-form">
    <h3>Login</h3>
    <img src="images/login.webp" id="icon" alt="Login Icon" width="80" height="80"><br><br>
    <form action="includes/login-helper.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="uname" placeholder="Username/ Email" value="" />
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="pwd" placeholder="Password" value="" />
      </div>
      <br>
      <div class="form-group">
        <input type="submit" class="btnSubmit" name="login-submit" value="Login" />
      </div>
      <div class="form-group">
        <a href="#" class="ForgetPwd" value="Login">Forgot Password?</a>
      </div>
    </form>
  </div><br><br>
</main>
