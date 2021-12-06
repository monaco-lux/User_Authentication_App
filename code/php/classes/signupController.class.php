<?php
// purpose of controllers are to organize everything
class SignupControl extends Signup
{
  private $userName;
  private $password;
  private $accountType;
  private $passCode;
  private $recoveryPhrase;
  private $secretCode = "LocalLibraryCMSLibrarianCreate2021$";

  public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  public function __set($property, $value)
  {
      if (property_exists($this, $property)) {
        $this->$property = $value;
      }
    }


  private function invalidUsername()
  {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/",$this->userName))
    {
      $result = false;
    } else {
      $result = true;
    }
    return $result;
  }

  private function userNameTakenCheck() // this isn't working!
  {
    $result;
    if (!$this->checkUser($this->userName))
    {
      $result = false;
    } else {
      $result = true;
    }
    return $result;
  }

  public function signupUser()
  {
    if($this->invalidUsername() == false)
    {
      header("Location: ../../../index.php?error=invalidusername");
      exit();
    }
    if($this->userNameTakenCheck() == false)
    {
      header("Location: ../../../index.php?error=usernametaken");
      exit();
    }

    $this->setUser($this->userName, $this->password, $this->accountType, $this->recoveryPhrase);

  }


}

?>
