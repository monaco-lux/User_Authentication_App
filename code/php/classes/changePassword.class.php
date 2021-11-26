<?php

class ChangePassword extends DbH
{

  protected function changePassword($password, $uid)
  {
    $stmt = $this->connect()->prepare('UPDATE user SET password = ? WHERE username = ? ;');
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT); // encrypt pwd

    if(!$stmt->execute(array($hashedPwd, $uid))) //if query fails
    {
      $stmt = null;
      header("Location: ../../../index.php?error=newpwdsetfail"); //send back to home page with error message
      exit();
    }

    $stmt = null;
  }

}

?>
