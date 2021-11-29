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
  <a href="crudBooks.php" class="w3-bar-item w3-button">Records: Books</a>
<?php endif; ?>
<?php if($_SESSION['role'] == "librarian") :?>
  <a href="crudAuthors.php" class="w3-bar-item w3-button">Records: Authors</a>
<?php endif; ?>
 <a href="code/php/includes/logout.inc.php" class="w3-bar-item w3-button w3-orange w3-right">Logout</a>
 <a href="" class="w3-bar-item w3-button w3-right"><?php echo ucfirst($_SESSION['username'])." | ".strtoupper($_SESSION['role']);?></a>
</div>

<div class="w3-container w3-section w3-teal w3-mobile">
    <h2>List of Books</h2>
</div>

<?php
if(!isset($_SESSION['userid']))
{
  header("Location: index.php?error=notallowed");
}

if($_SESSION['role'] == "member" || $_SESSION['role'] == "librarian")
{

?>
<div class="w3-container w3-section w3-mobile">
  <h3><u>Books Available</u></h3>
</div>
<form class="w3-container">
  <label for="searchBook">Search for a book</label>
  <input
    type="text"
    name='searchBook'
    id="searchBook"
    class="w3-input w3-border"
  >

  <button type="submit" class="w3-button w3-black w3-hover-green w3-section">Search 🔍</button>
</form>
<table class="w3-table w3-bordered w3-mobile">
  <tr>
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

<div class="w3-container w3-teal w3-section w3-mobile">
  <h5>Local Library CMS™ </h5>
  <p>All Rights Reserved</p>
</div>

</body>
</html>
