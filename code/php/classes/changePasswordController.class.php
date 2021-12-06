<?php
// purpose of controllers are to organize everything
class ChangePasswordController extends ChangePassword
{
  private $uid;
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
    $this->changePasswordNew($this->newPassword, $this->uid);
  }


}

?>
