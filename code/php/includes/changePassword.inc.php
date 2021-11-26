<?php
session_start();

include "../classes/dbh.class.php";
include "../classes/changePassword.class.php";
include "../classes/changePasswordController.class.php";

if(!isset($_POST['newPassword']))
{
  die();
}

$changePwd = new ChangePasswordController();
$changePwd->uid = $_SESSION['username'];
$changePwd->newPassword = $_POST['newPassword'];

$changePwd->changePasswordNow();

header("Location: ../../../dashboard.php?error=passwordchangesuccess");

?>
