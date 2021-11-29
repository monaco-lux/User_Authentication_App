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
 <a href="authors.php" class="w3-bar-item w3-button">Authors</a>
 <a href="code/php/includes/logout.inc.php" class="w3-bar-item w3-button w3-orange w3-right">Logout</a>
 <a href="" class="w3-bar-item w3-button w3-right"><?php echo ucfirst($_SESSION['username'])." | ".strtoupper($_SESSION['role']);?></a>
</div>

<div class="w3-container w3-section w3-teal w3-mobile">
    <h2>List of Authors</h2>
</div>

<?php
if(!isset($_SESSION['userid']))
{
  header("Location: index.php?error=notallowed");
}
?>

<div class="w3-container w3-section"></div>
<?php
if($_SESSION['role'] == "librarian")
{
  ?>
  <div class="w3-container w3-section w3-mobile">
    <h3><u>Authors</u></h3>
  </div>
  <table class="w3-table w3-bordered w3-mobile">
    <tr>
      <th><b>Author</b></th>
      <th><b>Age</b></th>
      <th><b>Genre</b></th>
    </tr>
    <?php
    foreach($_SESSION['authors'] as $authors)
    {
    ?>
    <tr>
      <td><?php echo $authors['author_name']; ?></td>
      <td><?php echo $authors['age'];?></td>
      <td><?php echo $authors['genre']; ?></td>
    </tr>
    <?php
    }
     ?>
  </table>
<?php
//libraruan IF
}
?>


<div class="w3-container w3-teal w3-section w3-mobile">
  <h5>Local Library CMS™ </h5>
  <p>All Rights Reserved</p>
</div>

</body>
</html>
