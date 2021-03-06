<?php
session_start();
if(isset($_SESSION['userid']))
{
  header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Local Library CMS: Sign up</title>
<link rel="icon" type="image/x-icon" href="assets/img/book_favicon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="code/js/conditionalLibrarianPass.js"></script>
</head>
<body>

<div class="w3-container w3-teal w3-mobile">
  <h1>Local Library CMS 📚</h1>
</div>

<div class="w3-bar w3-black">
 <a href="index.php" class="w3-bar-item w3-hover-teal w3-button">Home</a>
 <a href="signUp.php" class="w3-bar-item w3-hover-teal w3-button">Sign up!</a>
 <a href="forgotPassword.php" class="w3-bar-item w3-hover-teal w3-button">Forgot your password?</a>
</div>

<div class="w3-container w3-section w3-teal w3-mobile">
    <h2>Sign Up</h2>
</div>

<!-- form to use signup -->
<div class="w3-section w3-container w3-mobile">
  <form action='code/php/includes/signUpWriteBack.inc.php' method='post'>

    <label for="userName"><b>Username</b></label>
    <input
      type="text"
      name="userName"
      id="userName"
      autofocus required
      placeholder="Please enter only numbers and letters"
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

    <label for="recoveryPhrase"><b>Recovery Phrase</b></label>
    <input
      type="text"
      name="recoveryPhrase"
      id="recoveryPhrase"
      required
      placeholder="Please enter a recovery phrase"
      class="w3-input w3-border"
    >

    <label for="accountType"><b>Account Type</b></label>
    <select class="w3-select" name="accountType" id="accountType" required>
     <option value="" disabled selected>Choose your option</option>
     <option value="member">Member</option>
     <option value="librarian">Librarian</option>
   </select>

   <!-- Added to ensure new librarian accounts can be controlled-->
    <label for="passCode" id="passCodeLabel"><b>Librarian Creation Passcode</b></label>
    <input
     type="password"
     name="passCode"
     id="passCode"
     class="w3-input w3-border"
     >

    <div class="w3-section w3-margin-bottom">
      <div class="w3-show-inline-block">
        <div class="w3-bar">
          <button type="submit" class="w3-button w3-black w3-hover-green" id="submit" name="submit">Sign up ✍️</button>
        </div>
      </div>
    </div>
  </form>
</div>

<div class="w3-container w3-teal w3-section w3-mobile">
  <h5>Local Library CMS™ </h5>
  <p>All Rights Reserved</p>
</div>

</body>
</html>
