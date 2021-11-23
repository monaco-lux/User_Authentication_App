<?php

class Signup extends DbH
{

  protected function setUser($userName, $password)
  {
    $stmt = $this->connect()->prepare('INSERT INTO user (username, password) VALUES(?,?);');
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT); // encrypt pwd

    if(!$stmt->execute(array($userName, $hashedPwd))) //if query fails
    {
      $stmt = null;
      header("Location: ../../../index.php?error=passstmtfailed"); //send back to home page with error message
      exit();
    }

    $stmt = null;
  }

  protected  function checkUser($userName) // check to see if username exists. If exists return false.
  {

    $stmt = $this->connect()->prepare('SELECT username FROM user WHERE username = ? ;'); // references dbh class method connect
    if(!$stmt->execute($userName)) //if query fails
    {
      $stmt = null;
      header("Location: ../../../index.php?error=selectstmtfailed"); //send back to home page with error message
      exit();
    }

    $resultCheck;

    if($stmt->rowCount() > 0)
    {
      $resultCheck = false;
    }
    else
    {
      $resultCheck = true;
    }

    return $resultCheck;

  }




}

?>
