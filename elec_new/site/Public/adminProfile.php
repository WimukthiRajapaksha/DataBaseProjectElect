<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php include("../Include/header1.php"); ?>
<?php require_once("../Include/dbConnection.php"); ?>
<li><a href="infex.php">Home</a></li>
<li><a href="contactUs.php">Contact Us</a></li>
<li><a href="aboutUs.php">About Us</a></li>
<li><a href="logout.php">Log Out</a></li>
<?php include("../Include/header2.php"); ?>
<link rel="stylesheet" href="CSS/mystyles.css">
<?php
  if (!isset($_SESSION['admin_logged_in'])) {
    redirect_to("login2.php");
  }
 ?>
<br>
<br><br><br><br>
<h2>Admin Menu</h2>
<p>Welcome to the admin area, <?php echo htmlentities($_SESSION["login_user"]); ?></p>
<p>'dnfnfnf'</p>
<a href="addNewAdmin.php">Add New Admin</a>
<br>
<br>
<a href="editAdmin.php">Edit Profile</a>

 <?php include("../Include/footer.php"); ?>
