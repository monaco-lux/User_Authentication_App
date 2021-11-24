<?php

class ChangePasswordController extends ChangePassword
{
  private $newPassword;


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


  public function changePasswordNow()
  {
    $this->changePassword($this->newPassword);
  }


}

?>
