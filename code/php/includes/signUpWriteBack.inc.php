<?php
include "../classes/dbh.class.php";
include "../classes/signup.class.php";
include "../classes/signupController.class.php";


if(!isset($_POST['submit']))
{
  die();
}

// new object signup object
$newSignup = new SignupControl();

// set post variables from posted data
$newSignup->userName = $_POST['userName'];
$newSignup->password = $_POST['password'];
$newSignup->accountType = $_POST['accountType'];
$newSignup->passCode = $_POST['passCode'];

// running errror handler and user signup | if the passcode is incorrect they cannot create a librarian
if($newSignup->accountType == "member" || $newSignup->passCode == $newSignup->secretCode)
{
  $newSignup->signupUser();
  header("Location: ../../../index.php?error=none");
} else {
  header("Location: ../../../index.php?error=incorrectpasscode");
}

?>
