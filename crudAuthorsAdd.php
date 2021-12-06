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
    <h2>Add Author</h2>
</div>

<?php
// check if user is allowed
if(!isset($_SESSION['userid']))
{
  header("Location: index.php?error=notallowed");
} elseif($_SESSION['role'] == "member")
{
  header("Location: dashboard.php?error=notallowed");
} elseif($_SESSION['recovery'] == true)
{
  header("Location: dashboard.php?error=notallowed");
}
?>

<div class="w3-container w3-mobile">
  <form action="code/php/includes/crud.inc.php" method="post">
    <div class="w3-row-padding">
    <div class="w3-row-padding">
      <div class="w3-third">
        <label for="authorName"><b>Author Name</b></label>
        <input
          type="text"
          name="authorName"
          id="authorName"
          class="w3-input w3-border"
        >
    </div>

  <div class="w3-third">
    <label for="age"><b>Age</b></label>
    <input
      type="number"
      name="age"
      id="age"
      placeholder="If dead: put 0"
      class="w3-input w3-border"
    >
  </div>
  <div class="w3-third">
    <label for="genre"><b>Genre</b></label>
    <input
      type="text"
      name="genre"
      id="genre"
      class="w3-input w3-border"
    >

  </div>
  <div class="w3-third">
    <label for="bookId"><b>Book related to Author</b></label>
    <select class="w3-select" name="bookId" id="bookId" required>
     <option value="" disabled selected>Choose your option</option>
     <!-- Outputs books and selects based on id for easier updating of database -->
     <?php foreach($_SESSION['books'] as $books){ ?>
      <option value="<?php echo $books['book_id'];?>"><?php echo $books['book_name'];     ?></option>
    <?php } ?>
   </select>
  </div>
  </div>

  <button type="submit" class="w3-button w3-black w3-padding-large w3-section w3-block w3-hover-teal" id="addAuthor" name="addAuthor">Add new Record 🆕</button>
  <button type="reset" class="w3-button w3-black w3-padding-large w3-section w3-block w3-hover-yellow" id="add">Sweep Form 🧹</button>
  </form>
</div>

<div class="w3-container w3-teal w3-section w3-mobile">
  <h5>Local Library CMS™ </h5>
  <p>All Rights Reserved</p>
</div>

</body>
</html>
