<?php
include "../classes/dbh.class.php";
include "../classes/changePassword.class.php";
include "../classes/changePasswordController.class.php";

if(!isset($_POST['newPassword']))
{
  die();
}

$changePwd = new ChangePasswordController();
$changePwd->uid = $_POST['userName'];
$changePwd->newPassword = $_POST['newPassword'];

$newRecoverPwd->changePasswordNow();

header("Location: ../../../dashboard.php?error=passwordchangesuccess");

?>
