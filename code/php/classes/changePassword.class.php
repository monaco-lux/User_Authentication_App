<?php

class ChangePassword extends DbH
{

  protected function changePassword($password)
  {
    $stmt = $this->connect()->prepare('INSERT INTO user (password) VALUES(?);');
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT); // encrypt pwd

    if(!$stmt->execute(array($hashedPwd))) //if query fails
    {
      $stmt = null;
      header("Location: ../../../index.php?error=newpwdsetfail"); //send back to home page with error message
      exit();
    }

    $stmt = null;
  }

}

?>
