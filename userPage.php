<!DOCTYPE html>

<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php include("../Include/header1.php"); ?>
<?php require_once("../Include/dbConnection.php"); ?>
<li><a href="infex.php">Home</a></li>
<li><a href="contactUs.php">Contact Us</a></li>
<li><a href="aboutUs.php">About Us</a></li>
<li class="active"><a href="login.php">Log In</a></li>
<?php include("../Include/header2.php"); ?>
<link rel="stylesheet" href="CSS/login.css">



<?php
/**
 * Created by PhpStorm.
 * User: Manoj_nilanga
 * Date: 08/11/2017
 * Time: 15:06
 */
?>

<html>
<head>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="userPage.css">

    <title>
        User Page
    </title>
</head>
<body>
<div class="main_class">
    <div class="userName">
        <p>User Name</p>
    </div>
    <button type="button" class="btn btn-outline-primary" id="butt1">Edit Profile</button>

</div>

</body>

</html>
