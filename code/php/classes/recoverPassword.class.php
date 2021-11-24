<?php

class RecoverPassword extends DbH
{

  protected function getPassword($uid, $recoveryPhrase)
  {

    $stmt = $this->connect()->prepare('SELECT * FROM user WHERE username = ? and recoveryphrase = ? ;');

    if(!$stmt->execute([$uid, $recoveryPhrase])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=incorrectuserorphrase");
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
    }

  }




?>
