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
 <a href="code/php/includes/logout.inc.php" class="w3-bar-item w3-button w3-orange w3-right">Logout</a>
 <a href="" class="w3-bar-item w3-button w3-right"><?php echo ucfirst($_SESSION['username'])." | ".strtoupper($_SESSION['role']);?></a>
</div>

<div class="w3-container w3-section w3-teal w3-mobile">
    <h2>Create, Update, Add or Delete new records</h2>
</div>

<?php
if(!isset($_SESSION['userid']))
{
  header("Location: index.php?error=notallowed");
} elseif($_SESSION['role'] == "member")
{
  header("Location: dashboard.php?error=notallowed");
}
?>

<div class="w3-container w3-mobile">
  <form action="" method="post">
    <div class="w3-row-padding">
    <div class="w3-row-padding">
      <div class="w3-third">
        <label for="bookName"><b>Book Name</b></label>
        <input
          type="text"
          name="bookName"
          id="bookName"
          class="w3-input w3-border"
        >
    </div>

  <div class="w3-third">
    <label for="year"><b>Year</b></label>
    <input
      type="number"
      name="year"
      id="year"
      class="w3-input w3-border"
    >
  </div>
  <div class="w3-third">
    <label for="ageGroup"><b>Age Group</b></label>
    <input
      type="text"
      name="ageGroup"
      id="ageGroup"
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
  </div>

  <button type="submit" class="w3-button w3-black w3-padding-large w3-section w3-block w3-hover-teal" id="add">Add new Record 🆕</button>
  <button type="submit" class="w3-button w3-black w3-padding-large w3-section w3-block w3-hover-green" id="update">Update Record ♻️</button>
  <button type="submit" class="w3-button w3-black w3-padding-large w3-section w3-block w3-hover-red" id="delete">Delete Record ❌</button>
  </form>
</div>

<div class="w3-container w3-teal w3-section w3-mobile">
  <h5>Local Library CMS™ </h5>
  <p>All Rights Reserved</p>
</div>

</body>
</html>
