<?php
session_start();

include "../classes/dbh.class.php";
include "../classes/logout.class.php";

// call logoutLogger function to record that user has logged out
$logout = new LogOut();
$logout->userName = $_SESSION['username'];
$logout->logoutLogger($logout->userName);

// end session
session_unset();
session_destroy();

// return back to login screen
header("Location: ../../../index.php?error=loggedout");
?>
