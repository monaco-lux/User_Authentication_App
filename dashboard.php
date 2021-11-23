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
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>

<div class="w3-container w3-teal w3-mobile">
  <h1>Local Library CMS 📚</h1>
</div>

<div class="w3-bar w3-black">
 <a href="index.php" class="w3-bar-item w3-button">Home</a>
 <a href="signUp.php" class="w3-bar-item w3-button">Sign up!</a>
</div>

<div class="w3-container w3-section w3-teal w3-mobile">
    <h2>Dashboard</h2>
</div>

<?php
if(isset($_SESSION['userid']))
{
  echo "Hello: ".$_SESSION['username'];
} else{
  header("Location: index.php?error=notallowed");
}

?>


<div class="w3-container w3-teal w3-section w3-mobile">
  <h5>Local Library CMS™ </h5>
  <p>All Rights Reserved</p>
</div>

</body>
</html>
