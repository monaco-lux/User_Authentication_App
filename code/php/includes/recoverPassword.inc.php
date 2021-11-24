<?php
include "../classes/dbh.class.php";
include "../classes/reciverPassword.class.php";
include "../classes/recoverPasswordController.class.php";


if(!isset($_POST['submit']))
{
  die();
}

$newRecoverPwd = new RecoverPassWordController();

?>
