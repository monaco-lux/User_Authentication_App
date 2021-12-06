<?php

// purpose of controllers are to organize everything

class SortController extends Sort
{

  public function sortBook()
  {
    $this->doSortByBook();
  }

  public function sortBookGenre()
  {
    $this->doSortByBookGenre();
  }

  public function sortAuthor()
  {
    $this->doSortByAuthor();
  }

  public function sortAuthorGenre()
  {
    $this->doSortByAuthorGenre();
  }

}

 ?>
