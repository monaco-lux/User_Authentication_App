<?php

class DbH
{

  private function connect()
  {
    try
    {
      $username = "root";
      $password = "";
      $dbh = new PDO('mysql:host=URL;dbname=DBNAME', $username, $password);
      return $dbh;
    }
    catch (PDOException $e)
    {
      print "Error!: ".$e->getMessage()."<br>";
      die();
    }

  }

}


?>
