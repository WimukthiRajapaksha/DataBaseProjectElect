<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php include("../Include/header1.php"); ?>
<?php require_once("../Include/dbConnection.php"); ?>
<li><a href="infex.php">Home</a></li>
<li><a href="contactUs.php">Contact Us</a></li>
<li><a href="aboutUs.php">About Us</a></li>
<li><a href="login.php">Log Out</a></li>
<?php include("../Include/header2.php"); ?>
<link rel="stylesheet" href="CSS/mystyles.css">
<link rel="stylesheet" href="userPage.css">
<div class="wrapper clearfix">
    <div class="userNamee">
        <p>User Name</p>
    </div>
    <a href="createAccount.php"><button type="button" class="btn btn-outline-primary" id="butt1">Edit Profile</button></a>
</div>






 <?php include("../Include/footer.php"); ?>
