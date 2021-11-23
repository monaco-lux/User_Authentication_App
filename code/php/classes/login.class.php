<?php

class Login extends DbH
{

  protected function getUser($uid, $pwd)
  {

    $stmt = $this->connect()->prepare('SELECT username, password FROM user WHERE username = ? and password = ?;');

    if(!$stmt->execute([$uid, $pwd])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=cannotlogin");
      exit();
    }

    if($stmt->rowCount() == 0) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=usernotfound");
      exit();
    }

    $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC); // get everything from stmt as an Associative Array

    $stmt = null;
  }

}


?>
