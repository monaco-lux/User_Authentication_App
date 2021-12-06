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
 <!-- Only Librarians should be allowed to see the author output -->
 <?php if($_SESSION['role'] == "librarian") :?>
   <a href="authors.php" class="w3-bar-item w3-button">Authors</a>
<?php endif; ?>
<!-- Only Librarians can see and interact with the Book CRUD-->
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
<!-- Only Librarians can see and interact with the Author CRUD-->
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
    <h2>Dashboard</h2>
</div>

<!-- If user is not logged in it takes them back to the index page-->
<?php
if(!isset($_SESSION['userid']))
{
  header("Location: index.php?error=notallowed");
}
// outputs a random quote everytime you login
echo $_SESSION['quote'][0]['quote']." - ".$_SESSION['quote'][0]['author'];
?>


<div class="w3-container w3-teal w3-section w3-mobile">
  <h5>Local Library CMS™ </h5>
  <p>All Rights Reserved</p>
</div>

</body>
</html>
