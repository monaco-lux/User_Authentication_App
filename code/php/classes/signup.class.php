<?php

class Signup extends DbH
{

  protected function setUser($userName, $password, $accountType, $recoveryPhrase)
  {
    $stmt = $this->connect()->prepare('INSERT INTO user (username, password, role, recoveryphrase) VALUES(?, ?, ?, ?);');
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT); // encrypt pwd

    if(!$stmt->execute(array($userName, $hashedPwd, $accountType, $recoveryPhrase))) //if query fails
    {
      $stmt = null;
      header("Location: ../../../index.php?error=passstmtfailed"); //send back to home page with error message
      exit();
    }

    $stmt = null;
  }

  protected  function checkUser($userName) // check to see if username exists. If exists return false.
  {


    $stmt = $this->connect()->prepare('SELECT username FROM user WHERE username = ?;');
    if(!$stmt->execute([$userName]))
    {
      $stmt = NULL;
      header("../../../index.php?error=Selectfail");
      exit();
    }

/*
    try
    {
      $stmt = $this->connect()->prepare('SELECT username FROM user WHERE username = ? ;');
    }
    catch (PDOException $e)
    {
      print "Error!: ".$e->getMessage()."<br>";
      die();
    }
    */

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
