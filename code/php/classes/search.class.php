<?php

class Search extends DbH
{

  protected function doSearchBook($searchTerm)
  {
    //insert into db with values gotten from login.class
    $likeValue = "%".$searchTerm."%";
    $stmt = $this->connect()->prepare('SELECT L.book_id,L.book_name,L.year,L.genre,L.age_group,A.author_name,A.author_id FROM library as L LEFT JOIN authors AS A ON A.book_id = L.book_id WHERE author_name LIKE ?;');

    if(!$stmt->execute([$likeValue])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../books.php?error=search failed");
      exit();
    }

    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      $_SESSION['default'] = "No Match";
      header("Location: ../../../books.php?error=no value returned");
      exit();
    }

    // place everything as an associative array in a session value
    $bookSearch = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['bookOutput'] = $bookSearch;
    $_SESSION['default'] = "Match";
    $stmt = null;

  }

  protected function doSearchAuthor($searchTerm)
  {
    //insert into db with values gotten from login.class
    $likeValue = "%".$searchTerm."%";
    $stmt = $this->connect()->prepare('SELECT * from authors WHERE author_name LIKE ?;');

    if(!$stmt->execute([$likeValue])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../authors.php?error=search failed");
      exit();
    }

    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      $_SESSION['default'] = "No Match";
      header("Location: ../../../authors.php?error=no value returned");
      exit();
    }

    // place everything as an associative array in a session value
    $authorSearch = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['authorOutput'] = $authorSearch;
    $_SESSION['default'] = "Match";
    $stmt = null;
  }

}

?>
