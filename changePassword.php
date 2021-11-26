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
 <!-- <a href="index.php" class="w3-bar-item w3-button">Home</a> -->
 <a href="code/php/includes/logout.inc.php" class="w3-bar-item w3-button w3-orange w3-right">Logout</a>
 <a href="" class="w3-bar-item w3-button w3-right"><?php echo "Hello: ".ucfirst($_SESSION['username']);?></a>
</div>

<div class="w3-container w3-section w3-teal w3-mobile">
    <h2>Change Password</h2>
</div>

<?php
if(isset($_SESSION['userid']))
{
  ?>
  <div class="w3-section w3-container w3-mobile">
    <form action='code/php/includes/signUpWriteBack.inc.php' method='post'>

      <label for="userName"><b>Username</b></label>
      <input
        type="text"
        name="userName"
        id="userName"
        autofocus required
        placeholder="Please enter only numbers and letters"
        class="w3-input w3-border"
      >

      <label for="password"><b>Password</b></label>
      <input
        type="password"
        name='password'
        id="password"
        required
        class="w3-input w3-border"
    <div class="w3-section w3-margin-bottom">
        <div class="w3-show-inline-block">
          <div class="w3-bar">
            <button type="submit" class="w3-button w3-black w3-hover-green" id="submit" name="submit">Sign up ✍️</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <?php
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
