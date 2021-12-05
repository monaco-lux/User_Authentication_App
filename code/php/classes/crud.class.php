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

    $stmt = null;

    //update books everytime the statement is executed so that user can see updated values

    $stmt = $this->connect()->prepare('SELECT L.book_id,L.book_name,L.year,L.genre,L.age_group,A.author_name,A.author_id FROM library as L LEFT JOIN authors AS A ON A.book_id = L.book_id;');
    if(!$stmt->execute([])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=couldnotgetbooks");
      exit();
    }
    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=nobooks");
      exit();
    }
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['books'] = $books;

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

    $stmt = null;

    //update books everytime the statement is executed so that user can see updated values

    $stmt = $this->connect()->prepare('SELECT L.book_id,L.book_name,L.year,L.genre,L.age_group,A.author_name,A.author_id FROM library as L LEFT JOIN authors AS A ON A.book_id = L.book_id;');
    if(!$stmt->execute([])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=couldnotgetbooks");
      exit();
    }
    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=nobooks");
      exit();
    }
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['books'] = $books;

    $stmt = null;
  }

  protected function doUpdateBook($bookId,$book,$year,$ageGroup,$genre)
  {

    //update record based on id
    if(!empty($book) && !empty($year) && !empty($ageGroup) && !empty($genre))
    {
      $stmt = $this->connect()->prepare('UPDATE library SET book_name = ?, year = ?, genre = ?, age_group = ? WHERE book_id = ?;');
      if(!$stmt->execute([$book,$year,$genre,$ageGroup,$bookId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudBooksUpdate.php?error=fullBookUpdateFailed");
        exit();
      }

    }

    if(!empty($book) && !empty($year) && empty($ageGroup) && !empty($genre))
    {
      $stmt = $this->connect()->prepare('UPDATE library SET book_name = ?, year = ?, genre = ? WHERE book_id = ?;');
      if(!$stmt->execute([$book,$year,$genre,$bookId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudBooksUpdate.php?error=partBookUpdateFailed");
        exit();
      }
    }

    if(!empty($book) && !empty($year) && empty($ageGroup) && empty($genre))
    {
      $stmt = $this->connect()->prepare('UPDATE library SET book_name = ?, year = ? WHERE book_id = ?;');
      if(!$stmt->execute([$book,$year,$bookId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudBooksUpdate.php?error=partBookUpdateFailed");
        exit();
      }
    }

    if(!empty($book) && empty($year) && empty($ageGroup) && empty($genre))
    {
      $stmt = $this->connect()->prepare('UPDATE library SET book_name = ? WHERE book_id = ?;');
      if(!$stmt->execute([$book,$bookId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudBooksUpdate.php?error=partBookUpdateFailed");
        exit();
      }
    }

    $stmt = null;

    //update books everytime the statement is executed so that user can see updated values

    $stmt = $this->connect()->prepare('SELECT L.book_id,L.book_name,L.year,L.genre,L.age_group,A.author_name,A.author_id FROM library as L LEFT JOIN authors AS A ON A.book_id = L.book_id;');
    if(!$stmt->execute([])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=couldnotgetbooks");
      exit();
    }
    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=nobooks");
      exit();
    }
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['books'] = $books;

    $stmt = null;
  }

  protected function doAddAuthor($author,$age,$genre,$bookId)
  {
    //insert into db with values gotten from login.class
    $stmt = $this->connect()->prepare('INSERT INTO authors (author_name,age,genre,book_id) VALUES(?,?,?,?);');

    if(!$stmt->execute([$author,$age,$genre,$bookId])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../crudAuthorsAdd.php?error=authorInsertFailed");
      exit();
    }

    $stmt = null;
    //update books everytime the statement is executed so that user can see updated values

    $stmt = $this->connect()->prepare('SELECT L.book_id,L.book_name,L.year,L.genre,L.age_group,A.author_name,A.author_id FROM library as L LEFT JOIN authors AS A ON A.book_id = L.book_id;');
    if(!$stmt->execute([])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=couldnotgetbooks");
      exit();
    }
    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=nobooks");
      exit();
    }
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['books'] = $books;

    $stmt = null;
    //set stmt to null
  }

  protected function doDeleteAuthor($authorId)
  {
    //delete record based on id
    $stmt = $this->connect()->prepare('DELETE FROM authors WHERE author_id = ?;');

    if(!$stmt->execute([$authorId])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../crudAuthorsDelete.php?error=authorDeleteFailed");
      exit();
    }

    $stmt = null;
    //update books everytime the statement is executed so that user can see updated values

    $stmt = $this->connect()->prepare('SELECT L.book_id,L.book_name,L.year,L.genre,L.age_group,A.author_name,A.author_id FROM library as L LEFT JOIN authors AS A ON A.book_id = L.book_id;');
    if(!$stmt->execute([])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=couldnotgetbooks");
      exit();
    }
    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=nobooks");
      exit();
    }
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['books'] = $books;

    $stmt = null;
    //set stmt to null
  }

  protected function doUpdateAuthor($authorId,$author,$age,$genre,$bookId)
  {
    // THIS NEEDS IF STATEMENTS UNCOMMENT WHEN READY

    //update record based on id
    if(!empty($author) && !empty($age) && !empty($genre) && !empty($bookId))
    {
      $stmt = $this->connect()->prepare('UPDATE authors SET author_name = ?, age = ?, genre = ?, book_id = ? WHERE author_id = ?;');
      if(!$stmt->execute([$author,$age,$genre,$bookId,$authorId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudAuthorsUpdate.php?error=fullauthorUpdateFailed");
        exit();
      }
    }

    if(!empty($author) && !empty($age) && !empty($genre) && empty($bookId))
    {
      $stmt = $this->connect()->prepare('UPDATE authors SET author_name = ?, age = ?, genre = ? WHERE author_id = ?;');
      if(!$stmt->execute([$author,$age,$genre,$authorId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudAuthorsUpdate.php?error=almostauthorUpdateFailed");
        exit();
      }
    }

    if(!empty($author) && !empty($age) && empty($genre) && empty($bookId))
    {
      $stmt = $this->connect()->prepare('UPDATE authors SET author_name = ?, age = ? WHERE author_id = ?;');
      if(!$stmt->execute([$author,$age,$authorId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudAuthorsUpdate.php?error=almostauthorUpdateFailed");
        exit();
      }
    }

    if(!empty($author) && empty($age) && empty($genre) && empty($bookId))
    {
      $stmt = $this->connect()->prepare('UPDATE authors SET author_name = ? WHERE author_id = ?;');
      if(!$stmt->execute([$author,$authorId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudAuthorsUpdate.php?error=almostauthorUpdateFailed");
        exit();
      }
    }

    $stmt = null;
    //update books everytime the statement is executed so that user can see updated values

    $stmt = $this->connect()->prepare('SELECT L.book_id,L.book_name,L.year,L.genre,L.age_group,A.author_name,A.author_id FROM library as L LEFT JOIN authors AS A ON A.book_id = L.book_id;');
    if(!$stmt->execute([])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=couldnotgetbooks");
      exit();
    }
    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=nobooks");
      exit();
    }
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['books'] = $books;

    $stmt = null;
    //set stmt to null
  }

}




?>
