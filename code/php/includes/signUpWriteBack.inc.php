<?php
session_start();
include "../classes/signupController.class.php";
include "../classes/dbh.class.php";

if(!isset($_POST['submit']))
{
  die();
}

// new object signup object
$newSignup = new Signup();

// set post variables from posted data
$newSignup->userName = $_POST['userName'];
$newSignup->password = $_POST['password'];
$newSignup->accountType = $_POST['accountType'];
$newSignup->passCode = $_POST['passCode'];

echo $newSignup->userName;
?>
