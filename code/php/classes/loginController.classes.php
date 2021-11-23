<?php

class LoginController extends login
{
  private $userName;
  private $password;


  public function __construct($uid, $pwd)
  {
    $this->userName = $uid;
    $this->password = $pwd;
  }

  public function loginUser()
  {

    $this->getUser($this->userName, $this->password);
  }


}



?>
