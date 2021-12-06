<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Local Library CMS: Dashboard</title>
<link rel="icon" type="image/x-icon" href="assets/img/book_favicon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>

<div class="w3-container w3-teal w3-mobile">
  <h1>Local Library CMS 📚</h1>
</div>

<div class="w3-bar w3-black">
  <a href="dashboard.php" class="w3-bar-item w3-button">Dashboard</a>
 <a href="books.php" class="w3-bar-item w3-button">Books</a>
 <?php if($_SESSION['role'] == "librarian") :?>
   <a href="authors.php" class="w3-bar-item w3-button">Authors</a>
<?php endif; ?>
<?php if($_SESSION['role'] == "librarian") :?>
  <div class="w3-dropdown-hover">
    <button class="w3-button">Records: Books</button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="crudBooksAdd.php" class="w3-bar-item w3-button">Add new Book</a>
        <a href="crudBooksDelete.php" class="w3-bar-item w3-button">Delete Book</a>
        <a href="crudBooksUpdate.php" class="w3-bar-item w3-button">Update Book</a>
      </div>
  </div>
<?php endif; ?>
<?php if($_SESSION['role'] == "librarian") :?>
  <div class="w3-dropdown-hover">
    <button class="w3-button">Records: Authors</button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="crudAuthorsAdd.php" class="w3-bar-item w3-button">Add new Author</a>
        <a href="crudAuthorsDelete.php" class="w3-bar-item w3-button">Delete Author</a>
        <a href="crudAuthorsUpdate.php" class="w3-bar-item w3-button">Update Author</a>
      </div>
  </div>
<?php endif; ?>
 <a href="code/php/includes/logout.inc.php" class="w3-bar-item w3-button w3-orange w3-right">Logout</a>
 <a href="" class="w3-bar-item w3-button w3-right"><?php echo ucfirst($_SESSION['username'])." | ".strtoupper($_SESSION['role']);?></a>
</div>

<div class="w3-container w3-section w3-teal w3-mobile">
    <h2>List of Books</h2>
</div>

<?php
// check if user is allowed
if(!isset($_SESSION['userid']))
{
  header("Location: index.php?error=notallowed");
} elseif($_SESSION['recovery'] == true)
{
  header("Location: dashboard.php?error=notallowed");
}

if($_SESSION['role'] == "member" || $_SESSION['role'] == "librarian")
{

?>
<div class="w3-container w3-section w3-mobile">
  <h3><u>Book Search</u></h3>
</div>
<form class="w3-container" action="code/php/includes/search.inc.php" method="post">
  <label for="searchBook">Search for a book by name</label>
  <input
    type="text"
    name='searchBook'
    id="searchBook"
    class="w3-input w3-border"
  >

  <button type="submit" class="w3-button w3-black w3-hover-green w3-section" name="bookSearch" id="bookSearch">Search 🔍</button>
</form>
<?php if($_SESSION['default'] == "MatchB") :
 // if there is a search outcome ?>
<div class="w3-container w3-section w3-mobile">
  <h4><b>Search Results</b></h4>
  <table class="w3-table w3-bordered w3-mobile">
    <tr class="w3-yellow">
      <th><b>Book</b></th>
      <th><b>Author</b></th>
      <th><b>Year</b></th>
      <th><b>Genre</b></th>
      <th><b>Age Group</b></th>
    </tr>
    <?php
    foreach($_SESSION['bookOutput'] as $books)
    {
    ?>
    <tr>
      <td><?php echo $books['book_name']; ?></td>
      <td><?php echo $books['author_name']; ?></td>
      <td><?php echo $books['year'];?></td>
      <td><?php echo $books['genre']; ?></td>
      <td><?php echo $books['age_group']?></td>
    </tr>
    <?php
    }
     ?>
  </table>
</div>
<?php endif; ?>

<?php if($_SESSION['default'] == "No MatchB") :
 // if no search result?>
  <div class="w3-container w3-section w3-mobile">
    <h4><b>Search Results</b></h4>
    <?php echo "No Match found";?>
  </div>
<?php endif; ?>

<div class="w3-container w3-section w3-mobile">
  <h3><u>Books Available</u></h3>
</div>
<table class="w3-table w3-bordered w3-mobile">
  <tr class="w3-teal">
    <th><b>Book</b></th>
    <th><b>Author</b></th>
    <th><b>Year</b></th>
    <th><b>Genre</b></th>
    <th><b>Age Group</b></th>
  </tr>
  <?php
  foreach($_SESSION['books'] as $books)
  {
  ?>
  <tr>
    <td><?php echo $books['book_name']; ?></td>
    <td><?php echo $books['author_name']; ?></td>
    <td><?php echo $books['year'];?></td>
    <td><?php echo $books['genre']; ?></td>
    <td><?php echo $books['age_group']?></td>
  </tr>
  <?php
  }
   ?>
</table>
<?php
//if statement
}?>

<div class="w3-container w3-section w3-mobile">
  <div class="w3-row-padding">
    <form action='code/php/includes/sort.inc.php' method='post'>
      <div class="w3-third">
        <button type="submit" class="w3-button w3-black w3-hover-green w3-section" name="sortBookName" id="sortBookName">Sort by Name</button>
      </div>
      <div class="w3-third">
        <button type="submit" class="w3-button w3-black w3-hover-green w3-section" name="sortBookGenre" id="sortBookGenre">Sort by Genre</button>
      </div>
    </form>
  </div>
</div>

<div class="w3-container w3-teal w3-section w3-mobile">
  <h5>Local Library CMS™ </h5>
  <p>All Rights Reserved</p>
</div>

</body>
</html>
