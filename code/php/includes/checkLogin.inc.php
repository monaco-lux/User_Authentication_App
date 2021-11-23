<?php
include "../classes/dbh.class.php";
include "../classes/login.class.php";
include "../classes/loginController.class.php";


// new class and set variables
$loginUser = new LoginController();
$loginUser->userName = $_POST['userName'];
$loginUser->password = $_POST['password'];

//login user
$loginUser->loginUserNow($loginUser->userName, $loginUser->password);

header("Location: ../../../dashboard.php");
?>
