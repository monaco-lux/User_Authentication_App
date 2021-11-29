<?php

class LogOut extends DbH
{

  private $userName;

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


  public function logoutLogger($uid)
  {
      //record that user logged out and on what time
    $logoutTime = "Logout: ".date('d-m-y h:i:s');
    $stmt = $this->connect()->prepare('INSERT INTO session_login (username,session_id,login_logout) VALUES(?,?,?) ;');
    if(!$stmt->execute([$uid,session_id(),$logoutTime])) // if query doesnt work throw error
    {
      $stmt = null;
      header("Location: ../../../index.php?error=couldnotupdatesession");
      exit();
    }
  }


}

?>
