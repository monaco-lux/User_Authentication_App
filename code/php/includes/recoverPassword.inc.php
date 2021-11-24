<?php
include "../classes/dbh.class.php";
include "../classes/recoverPassword.class.php";
include "../classes/recoverPasswordController.class.php";


if(!isset($_POST['recoveryPhrase']))
{
  die();
}

$newRecoverPwd = new RecoverPasswordController();
$newRecoverPwd->userName = $_POST['userName'];
$newRecoverPwd->recoveryPhrase = $_POST['recoveryPhrase'];

$newRecoverPwd->recoverPasswordNow();
header("Location: ../../../changePassword.php");

?>
