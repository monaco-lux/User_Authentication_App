<?php

// purpose of controllers are to organize everything
class CRUDController extends CRUD
{

  private $bookName;
  private $year;
  private $ageGroup;
  private $genre;
  private $authorName;
  private $age;
  private $bookId;
  private $authorId;

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

  public function addBook()
  {
    $this->doAddBook($this->bookName,$this->year,$this->genre,$this->ageGroup);
  }

  public function deleteBook()
  {
    $this->doDeleteBook($this->bookId);
  }

  public function updateBook()
  {
    $this->doUpdateBook($this->bookId,$this->bookName,$this->year,$this->ageGroup,$this->genre);
  }

  public function addAuthor()
  {
    $this->doAddAuthor($this->authorName,$this->age,$this->genre,$this->bookId);
  }

  public function deleteAuthor()
  {
    $this->doDeleteAuthor($this->authorId);
  }

  public function updateAuthor()
  {
    $this->doUpdateAuthor($this->authorId,$this->author,$this->age,$this->genre,$this->bookId);
  }


}


?>
