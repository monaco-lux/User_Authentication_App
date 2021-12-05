<?php
session_start();

include "../classes/dbh.class.php";
include "../classes/crudController.class.php";
include "../classes/crud.class.php";

// check incase someone navigates here and nothing is set

if(!isset($_POST['addBook']) ||
!isset($_POST['deleteBook']) ||
!isset($_POST['updateBook']) ||
!isset($_POST['addAuthor']) ||
!isset($_POST['deleteAuthor']) ||
!isset($_POST['updateAuthor']) ||)
{
  header("Location: ../../../dashboard.php?error=notallowed");
}

$newCRUD = new CRUDController();



// book controllers
if(isset($_POST['addBook']))
{
  $newCRUD->$bookName = $_POST['BookName'];
  $newCRUD->year = $_POST['year'];
  $newCRUD->ageGroup = $_POST['ageGroup'];
  $newCRUD->genre = $_POST['genre'];

  $newCrud->addBook();
  header("Location: ../../../crudBooksAdd.php?error=succesful");
}

if(isset($_POST['deleteBook']))
{
  $newCRUD->bookId = $_POST['bookId'];

  $newCRUD->deleteBook();
  header("Location: ../../../crudBooksDelete.php?error=succesful");
}

if(isset($_POST['updateBook']))
{
  $newCRUD->bookId = $_POST['bookId'];
  $newCRUD->$bookName = $_POST['BookName'];
  $newCRUD->year = $_POST['year'];
  $newCRUD->ageGroup = $_POST['ageGroup'];
  $newCRUD->genre = $_POST['genre'];

  $newCRUD->updateBook();
  header("Location: ../../../crudBooksUpdate.php?error=succesful");
}

// author controllers

if(isset($_POST['addAuthor']))
{
  $newCRUD->authorName = $_POST['authorName'];
  $newCRUD->age = $_POST['age'];
  $newCRUD->genre = $_POST['genre'];
  $newCRUD->bookId = $_POST['bookId'];

  $newCRUD->addAuthor();
  header("Location: ../../../crudAuthorsAdd.php?error=succesful");
}

if(isset($_POST['deleteAuthor']))
{
  $newCRUD->authorId = $_POST['authorId'];

  $newCRUD->deleteAuthor();
  header("Location: ../../../crudAuthorsDelete.php?error=succesful");
}

if(isset($_POST['updateAuthor']))
{
  $newCRUD->authorId = $_POST['authorId'];
  $newCRUD->authorName = $_POST['authorName'];
  $newCRUD->age = $_POST['age'];
  $newCRUD->genre = $_POST['genre'];
  $newCRUD->bookId = $_POST['bookId'];

  $newCRUD->updateAuthor();
  header("Location: ../../../crudAuthorsUpdate.php?error=succesful");
}

?>
