<?php

class Login extends DbH
{

  protected function getUser($uid, $pwd)
  {

    $stmt = $this->connect()->prepare('SELECT password FROM user WHERE username = ?;');

    if(!$stmt->execute([$uid])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=cannotlogin");
      exit();
    }

    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=usernotfound1");
      exit();
    }

    $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC); // get everything from stmt as an Associative Array
    $checkPwd = password_verify($pwd, $pwdHashed[0]['password']); //inbuilt verify function on associative array value


    if($checkPwd == false) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=wrongpassword");
      exit();
    } elseif($checkPwd == true)
    {

      $stmt = $this->connect()->prepare('SELECT * FROM user WHERE username = ? ;');

      if(!$stmt->execute([$uid])) // if query doesnt work throw error
      {
        $stmt = null;
        header("Location: ../../../index.php?error=incorrectpassword");
        exit();
      }

      if($stmt->rowCount() == 0) // if no results, throw error
      {
        $stmt = null;
        header("Location: ../../../index.php?error=usernotfound");
        exit();
      }

      $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
      session_start();
      $_SESSION['userid'] = $user[0]['id'];
      $_SESSION['username'] = $user[0]['username'];
      $_SESSION['role'] = $user[0]['role'];
      $stmt = null;

      // fetch the list of books and authors so that it displays on dashboard
      $stmt = $this->connect()->prepare('SELECT DISTINCT L.book_id,L.book_name,L.year,L.genre,L.age_group,A.author_name FROM library as L JOIN authors AS A ON A.book_id = L.book_id;');
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
      $stmt=null;

      // fetch all distinct authors for librarians
      $stmt = $this->connect()->prepare('SELECT DISTINCT * from authors;;');
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

      //fetch all data as an associative array and store in session value
      $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $_SESSION['authors'] = $authors;
    }


    $stmt = null;
  }

}


?>
