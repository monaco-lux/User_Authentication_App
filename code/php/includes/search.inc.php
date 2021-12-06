<?php
session_start();

include "../classes/dbh.class.php";
include "../classes/search.class.php";
include "../classes/searchController.class.php";

$newSearch = new SearchController();


if(isset($_POST['bookSearch']))
{
  $newSearch->searchTerm = $_POST['searchBook'];
  $newSearch->searchBook();
  header("Location: ../../../books.php?error=searchsuccesful");
}

if(isset($_POST['authorSearch']))
{
  $newSearch->searchTerm = $_POST['searchAuthor'];
  $newSearch->searchAuthor();
  header("Location: ../../../authors.php?error=searchsuccesful");
}


?>
