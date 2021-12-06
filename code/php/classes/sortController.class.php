<?php

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
