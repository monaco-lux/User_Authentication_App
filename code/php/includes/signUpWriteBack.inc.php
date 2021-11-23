<?php
session_start();
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

// running errror handler and user signup
$newSignup->signupUser();

//go back to frontpage
header("Location: ../../../index.php?error=none");
?>
