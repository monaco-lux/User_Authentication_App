<?php

class CRUD extends DbH
{

  protected function doAddBook($book,$year,$genre,$ageGroup)
  {
    //insert into db with values gotten from login.class
    $stmt = $this->connect()->prepare('INSERT INTO library (book_name,year,genre,age_group) VALUES(?,?,?,?);');

    if(!$stmt->execute([$book,$year,$genre,$ageGroup])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../crudBooks.php?error=bookInsertFailed");
      exit();
    }

    //set stmt to null
    $stmt = null;
  }

  protected function doDeleteBook($bookId)
  {
    //delete record based on id
    $stmt = $this->connect()->prepare('DELETE FROM library WHERE book_id = ?;');

    if(!$stmt->execute([$bookId])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../crudBooks.php?error=bookDeleteFailed");
      exit();
    }

    //set stmt to null
    $stmt = null;
  }

  protected function doUpdateBook($bookId,$book,$year,$ageGroup,$genre)
  {
    // THIS NEEDS IF STATEMENTS UNCOMMENT WHEN READY

    //delete record based on id
    /*$stmt = $this->connect()->prepare('DELETE FROM library WHERE book_id = ?;');

    if(!$stmt->execute([$bookId])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../crudBooks.php?error=bookDeleteFailed");
      exit();
    }

    //set stmt to null
    $stmt = null;*/
  }

  protected function doAddAuthor($author,$age,$genre,$bookId)
  {
    //insert into db with values gotten from login.class
    $stmt = $this->connect()->prepare('INSERT INTO authors (author_name,age,genre,book_id) VALUES(?,?,?,?);');

    if(!$stmt->execute([$author,$age,$genre,$bookId])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../crudAuthors.php?error=authorInsertFailed");
      exit();
    }

    //set stmt to null
    $stmt = null;
  }

  protected function doDeleteAuthor($authorId)
  {
    //delete record based on id
    $stmt = $this->connect()->prepare('DELETE FROM authors WHERE author_id = ?;');

    if(!$stmt->execute([$authorId])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../crudAuthors.php?error=authorDeleteFailed");
      exit();
    }

    //set stmt to null
    $stmt = null;
  }

  protected function doUpdateAuthor($authorId,$author,$age,$genre,$bookId)
  {
    // THIS NEEDS IF STATEMENTS UNCOMMENT WHEN READY

    //delete record based on id
    /*$stmt = $this->connect()->prepare('DELETE FROM library WHERE book_id = ?;');

    if(!$stmt->execute([$bookId])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../crudBooks.php?error=bookDeleteFailed");
      exit();
    }

    //set stmt to null
    $stmt = null;*/
  }

}




?>
