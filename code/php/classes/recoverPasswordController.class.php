<?php

class RecoverPassWordController extends RecoverPassword
{
  private $userName;
  private $recoveryPhrase;


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


  public function recoverPasswordNow()
  {
    $this->getPassword($this->userName, $this->recoveryPhrase);
  }


}

?>
