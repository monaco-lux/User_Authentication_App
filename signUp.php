<?php
session_start();
$_SESSION['wasHome'] = "Yes";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Local Library: Sign up</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- Added below to work with passstrength.js dependency-->
<link rel="stylesheet" type="text/css" href="code/css/passtrength.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- passstrength,js dependency to show how strong passwords are-->
<script type="text/javascript" src="code/js/jquery.passtrength.js"></script>
</head>
<body>

<div class="w3-container w3-teal w3-mobile">
  <h1>Local Library CMS 📚</h1>
</div>

<div class="w3-container w3-section w3-teal w3-mobile">
    <h2>Sign Up</h2>
</div>


<div class="w3-container w3-mobile">
  <form action='code/php/checkLogin.php' method='post'>

    <label for="userName"><b>Username</b></label>
    <input
      type="text"
      name="userName"
      id="userName"
      autofocus required
      class="w3-input w3-border"
    >

    <label for="password"><b>Password</b></label>
    <input
      type="password"
      name='password'
      id="password"
      required
      class="w3-input w3-border"
    >
    <div class="w3-margin-top w3-margin-bottom">
      <div class="w3-show-inline-block">
        <div class="w3-bar">
          <button type="submit" class="w3-button w3-black w3-hover-green">Login ✔️</button>
          <button type="reset" class="w3-button w3-black w3-hover-yellow">Sweep Form 🧹</button>
        </div>
      </div>
    </div>
  </form>
</div>
<div class="w3-container w3-center w3-mobile">
  <a href="forgotPassword.php" class="w3-show-inline-block w3-margin-right">Forgot password?</a>
  <a href="signUp.php" class="w3-show-inline-block w3-margin-left">Don't have an account? <b style="color: teal;">Sign up!</b></a>
</div>

<div class="w3-container w3-teal w3-section w3-mobile">
  <h5>Local Library CMS™ </h5>
  <p>All Rights Reserved</p>
</div>

</body>
</html>
