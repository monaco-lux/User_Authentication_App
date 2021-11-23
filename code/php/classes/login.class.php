<?php

class Login extends DbH
{

  protected function getUser($uid, $pwd)
  {

    $stmt = $this->connect()->prepare('SELECT password FROM user WHERE username = ? or password = ?;');

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
    $checkPwd = password_verify($pwd, $pwdHashed[0]['password']); //inbuilt verify function on associative array value


    if($checkPwd == false) // if no results, throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=wrongpassword");
      exit();
    } elseif($checkPwd == true){
      $stmt = $this->connect()->prepare('SELECT * FROM user WHERE username = ? and password = ?;');
      if(!$stmt->execute([$uid, $pwd])) // if query doesnt work throw error
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
    }


    $stmt = null;
  }

}


?>
