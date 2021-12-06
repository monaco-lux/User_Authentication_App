<?php
session_start();

include "../classes/dbh.class.php";
include "../classes/sort.class.php";
include "../classes/sortController.class.php";

$newSort = new SortController();

if(isset($_POST['sortBookName']))
{
  $newSort->sortBook();
  header("Location: ../../../books.php");
}

if(isset($_POST['sortBookGenre']))
{
  $newSort->sortBookGenre();
  header("Location: ../../../books.php");
}

if(isset($_POST['sortAuthorName']))
{
  $newSort->sortAuthor();
  header("Location: ../../../authors.php");
}

if(isset($_POST['sortAuthorGenre']))
{
  $newSort->sortAuthorGenre();
  header("Location: ../../../authors.php");
}

?>
