<?php
session_start();

include "../classes/dbh.class.php";
include "../classes/recoverPassword.class.php";
include "../classes/recoverPasswordController.class.php";


if(!isset($_POST['recoveryPhrase']))
{
  die();
}

$_SESSION['recovery'] = true; // add this so that security can't be circumvented

$newRecoverPwd = new RecoverPasswordController();
$newRecoverPwd->userName = $_POST['userName'];
$newRecoverPwd->recoveryPhrase = $_POST['recoveryPhrase'];

$newRecoverPwd->recoverPasswordNow();
header("Location: ../../../changePassword.php");

?>
