<?php

class SearchController extends Search
{

  private $searchTerm;

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

  public function searchBook()
  {
    $this->doSearchBook($this->searchTerm);
  }

  public function searchAuthor()
  {
    $this->doSearchAuthor($this->searchTerm);
  }


}


?>
