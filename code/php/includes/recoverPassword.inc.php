<?php
include "../classes/dbh.class.php";
include "../classes/reciverPassword.class.php";
include "../classes/recoverPasswordController.class.php";


if(!isset($_POST['submit']))
{
  die();
}

$newRecoverPwd = new RecoverPassWordController();
$newRecoverPwd->userName = $_POST['userName'];
$newRecoverPwd->recoveryPhrase = $_POST['recoveryPhrase'];

$newRecoverPwd->recoverPasswordNow();
header("Location: ../../../changePassword.php");

?>
