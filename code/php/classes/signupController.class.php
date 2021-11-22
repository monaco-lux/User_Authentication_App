<?php

class Signup
{
  private $userName;
  private $password;
  private $accountType;
  private $passCode;

  public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  public function __set($property, $value) {
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

}

?>
