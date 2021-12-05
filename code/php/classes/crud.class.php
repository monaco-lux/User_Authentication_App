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
      header("Location: ../../../dashboard.php?error=couldnotgetbooks");
      exit();
    }
    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../dashboard.php?error=nobooks");
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
      header("Location: ../../../dashboard.php?error=couldnotgetbooks");
      exit();
    }
    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../dashboard.php?error=nobooks");
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

    //3 options
    //book year genre
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

    //book agegroup genre
    if(!empty($book) && empty($year) && !empty($ageGroup) && !empty($genre))
    {
      $stmt = $this->connect()->prepare('UPDATE library SET book_name = ?, age_group = ?, genre = ? WHERE book_id = ?;');
      if(!$stmt->execute([$book,$ageGroup,$genre,$bookId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudBooksUpdate.php?error=partBookUpdateFailed");
        exit();
      }
    }

    // 2 options
    // book year
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

    // book ageGroup
    if(!empty($book) && empty($year) && !empty($ageGroup) && empty($genre))
    {
      $stmt = $this->connect()->prepare('UPDATE library SET book_name = ?, age_group = ? WHERE book_id = ?;');
      if(!$stmt->execute([$book,$ageGroup,$bookId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudBooksUpdate.php?error=partBookUpdateFailed");
        exit();
      }
    }

    // book genre
    if(!empty($book) && empty($year) && empty($ageGroup) && !empty($genre))
    {
      $stmt = $this->connect()->prepare('UPDATE library SET book_name = ?, genre = ? WHERE book_id = ?;');
      if(!$stmt->execute([$book,$genre,$bookId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudBooksUpdate.php?error=partBookUpdateFailed");
        exit();
      }
    }

    // year ageGroup
    if(empty($book) && !empty($year) && !empty($ageGroup) && empty($genre))
    {
      $stmt = $this->connect()->prepare('UPDATE library SET year = ?, age_group = ? WHERE book_id = ?;');
      if(!$stmt->execute([$year,$ageGroup,$bookId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudBooksUpdate.php?error=partBookUpdateFailed");
        exit();
      }
    }

    // year genre
    if(empty($book) && !empty($year) && empty($ageGroup) && !empty($genre))
    {
      $stmt = $this->connect()->prepare('UPDATE library SET year = ?, genre = ? WHERE book_id = ?;');
      if(!$stmt->execute([$year,$genre,$bookId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudBooksUpdate.php?error=partBookUpdateFailed");
        exit();
      }
    }

    // genre ageGroup
    if(empty($book) && empty($year) && !empty($ageGroup) && !empty($genre))
    {
      $stmt = $this->connect()->prepare('UPDATE library SET genre = ?, age_group = ? WHERE book_id = ?;');
      if(!$stmt->execute([$genre,$ageGroup,$bookId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudBooksUpdate.php?error=partBookUpdateFailed");
        exit();
      }
    }

    //1 options
    //book
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

    //year
    if(empty($book) && !empty($year) && empty($ageGroup) && empty($genre))
    {
      $stmt = $this->connect()->prepare('UPDATE library SET year = ? WHERE book_id = ?;');
      if(!$stmt->execute([$year,$bookId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudBooksUpdate.php?error=partBookUpdateFailed");
        exit();
      }
    }

    //ageGroup
    if(empty($book) && empty($year) && !empty($ageGroup) && empty($genre))
    {
      $stmt = $this->connect()->prepare('UPDATE library SET age_group = ? WHERE book_id = ?;');
      if(!$stmt->execute([$ageGroup,$bookId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudBooksUpdate.php?error=partBookUpdateFailed");
        exit();
      }
    }

    //genre
    if(empty($book) && empty($year) && empty($ageGroup) && !empty($genre))
    {
      $stmt = $this->connect()->prepare('UPDATE library SET genre = ? WHERE book_id = ?;');
      if(!$stmt->execute([$genre,$bookId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudBooksUpdate.php?error=partBookUpdateFailed");
        exit();
      }
    }

    //end ifs

    $stmt = null;

    //update books everytime the statement is executed so that user can see updated values

    $stmt = $this->connect()->prepare('SELECT L.book_id,L.book_name,L.year,L.genre,L.age_group,A.author_name,A.author_id FROM library as L LEFT JOIN authors AS A ON A.book_id = L.book_id;');
    if(!$stmt->execute([])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../dashboard.php?error=couldnotgetbooks");
      exit();
    }
    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../dashboard.php?error=nobooks");
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
      header("Location: ../../../dashboard.php?error=couldnotgetbooks");
      exit();
    }
    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../dashboard.php?error=nobooks");
      exit();
    }
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['books'] = $books;

    $stmt = null;
    //set stmt to null

    // update authors everytime this gets executed
    $stmt = $this->connect()->prepare('SELECT DISTINCT author_name,age,genre from authors;');
    if(!$stmt->execute([])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../dashboard.php?error=couldnotgetbooks");
      exit();
    }
    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../dashboard.php?error=nobooks");
      exit();
    }

    //fetch all data as an associative array and store in session value
    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['authors'] = $authors;
    $stmt=null;
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

    // update authors everytime this gets executed
    $stmt = $this->connect()->prepare('SELECT DISTINCT author_name,age,genre from authors;');
    if(!$stmt->execute([])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../dashboard.php?error=couldnotgetbooks");
      exit();
    }
    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../dashboard.php?error=nobooks");
      exit();
    }

    //fetch all data as an associative array and store in session value
    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['authors'] = $authors;
    $stmt=null;
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

    // 3 options
    // author age genre
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

    //age genre bookid
    if(empty($author) && !empty($age) && !empty($genre) && !empty($bookId))
    {
      $stmt = $this->connect()->prepare('UPDATE authors SET book_id = ?, age = ?, genre = ? WHERE author_id = ?;');
      if(!$stmt->execute([$bookId,$age,$genre,$authorId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudAuthorsUpdate.php?error=almostauthorUpdateFailed");
        exit();
      }
    }

    //author genre bookid
    if(!empty($author) && empty($age) && !empty($genre) && !empty($bookId))
    {
      $stmt = $this->connect()->prepare('UPDATE authors SET author_name = ?, genre = ?, book_id = ? WHERE author_id = ?;');
      if(!$stmt->execute([$author,$age,$bookId,$authorId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudAuthorsUpdate.php?error=almostauthorUpdateFailed");
        exit();
      }
    }


    // two options

    //author and age
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

    // author and genre
    if(!empty($author) && empty($age) && !empty($genre) && empty($bookId))
    {
      $stmt = $this->connect()->prepare('UPDATE authors SET author_name = ?, genre = ? WHERE author_id = ?;');
      if(!$stmt->execute([$author,$genre,$authorId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudAuthorsUpdate.php?error=almostauthorUpdateFailed");
        exit();
      }
    }

    // author and bookid
    if(!empty($author) && empty($age) && empty($genre) && !empty($bookId))
    {
      $stmt = $this->connect()->prepare('UPDATE authors SET author_name = ?, book_id = ? WHERE author_id = ?;');
      if(!$stmt->execute([$author,$bookId,$authorId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudAuthorsUpdate.php?error=almostauthorUpdateFailed");
        exit();
      }
    }

    //age and genre
    if(empty($author) && !empty($age) && !empty($genre) && empty($bookId))
    {
      $stmt = $this->connect()->prepare('UPDATE authors SET age = ?, genre = ? WHERE author_id = ?;');
      if(!$stmt->execute([$age,$genre,$authorId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudAuthorsUpdate.php?error=almostauthorUpdateFailed");
        exit();
      }
    }

    //age and bookid
    if(empty($author) && !empty($age) && empty($genre) && !empty($bookId))
    {
      $stmt = $this->connect()->prepare('UPDATE authors SET age = ?, book_id = ? WHERE author_id = ?;');
      if(!$stmt->execute([$age,$bookId,$authorId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudAuthorsUpdate.php?error=almostauthorUpdateFailed");
        exit();
      }
    }

    //genre and bookid
    if(empty($author) && empty($age) && !empty($genre) && !empty($bookId))
    {
      $stmt = $this->connect()->prepare('UPDATE authors SET genre = ?, book_id = ? WHERE author_id = ?;');
      if(!$stmt->execute([$genre,$bookId,$authorId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudAuthorsUpdate.php?error=almostauthorUpdateFailed");
        exit();
      }
    }

    // only one options
    // author
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

    // book id
    if(empty($author) && empty($age) && empty($genre) && !empty($bookId))
    {
      $stmt = $this->connect()->prepare('UPDATE authors SET book_id = ? WHERE author_id = ?;');
      if(!$stmt->execute([$bookId,$authorId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudAuthorsUpdate.php?error=almostauthorUpdateFailed");
        exit();
      }
    }

    //genre
    if(empty($author) && empty($age) && !empty($genre) && empty($bookId))
    {
      $stmt = $this->connect()->prepare('UPDATE authors SET genre = ? WHERE author_id = ?;');
      if(!$stmt->execute([$genre,$authorId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudAuthorsUpdate.php?error=almostauthorUpdateFailed");
        exit();
      }
    }

    //age
    if(empty($author) && !empty($age) && empty($genre) && empty($bookId))
    {
      $stmt = $this->connect()->prepare('UPDATE authors SET age = ? WHERE author_id = ?;');
      if(!$stmt->execute([$age,$authorId])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../crudAuthorsUpdate.php?error=almostauthorUpdateFailed");
        exit();
      }
    }

    $stmt = null;
    //end ifs
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

    // update authors everytime this gets executed
    $stmt = $this->connect()->prepare('SELECT DISTINCT author_name,age,genre from authors;');
    if(!$stmt->execute([])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../dashboard.php?error=couldnotgetbooks");
      exit();
    }
    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../dashboard.php?error=nobooks");
      exit();
    }

    //fetch all data as an associative array and store in session value
    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['authors'] = $authors;
    $stmt=null;
  }

}




?>
