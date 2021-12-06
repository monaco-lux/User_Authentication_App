<?php

class Sort extends DbH
{

  protected function doSortByBook()
  {
    $stmt = $this->connect()->prepare('SELECT L.book_id,L.book_name,L.year,L.genre,L.age_group,A.author_name,A.author_id FROM library as L LEFT JOIN authors AS A ON A.book_id = L.book_id ORDER BY book_name;');

    if(!$stmt->execute([])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../books.php?error=sortfailed");
      exit();
    }

    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['books'] = $books;
    $stmt = null;
  }

  protected function doSortByBookGenre()
  {
    $stmt = $this->connect()->prepare('SELECT L.book_id,L.book_name,L.year,L.genre,L.age_group,A.author_name,A.author_id FROM library as L LEFT JOIN authors AS A ON A.book_id = L.book_id ORDER BY genre;');

    if(!$stmt->execute([])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../books.php?error=sortfailed");
      exit();
    }

    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['books'] = $books;
    $stmt = null;
  }

  protected function doSortByAuthor()
  {
    $stmt = $this->connect()->prepare('SELECT DISTINCT author_name,age,genre from authors ORDER BY author_name;');

    if(!$stmt->execute([])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../books.php?error=sortfailed");
      exit();
    }

    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['authors'] = $authors;
    $stmt = null;
  }

  protected function doSortByAuthorGenre()
  {
    $stmt = $this->connect()->prepare('SELECT DISTINCT author_name,age,genre from authors ORDER BY genre;');

    if(!$stmt->execute([])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../books.php?error=sortfailed");
      exit();
    }

    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['authors'] = $authors;
    $stmt = null;
  }

}



?>
