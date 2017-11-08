<?php
/**
 * Created by PhpStorm.
 * User: Manoj_nilanga
 * Date: 08/11/2017
 * Time: 18:50
 */
?>
<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php include("../Include/header1.php"); ?>
<?php require_once("../Include/dbConnection.php"); ?>
<li><a href="infex.php">Home</a></li>
<li><a href="contactUs.php">Contact Us</a></li>
<li><a href="aboutUs.php">About Us</a></li>
<li><a href="login.php">Log In</a></li>
<?php include("../Include/header2.php"); ?>
<link rel="stylesheet" href="CSS/mystyles.css">
<link rel="stylesheet" href="bootstrap.css">
<link rel="stylesheet" href="enterUnits.css">


<div class="formOfInner">
    <div class="meterId">
        <p>Meter Id: </p>
        <input type="number" name="meter_Id">
    </div>
    <div class="totalUnits">
        <p>Total Units: </p>
        <input type="number" name="total_Units">
    </div>
    <div class="Datee">
        <P>Date: </P>
        <div class="innerDate">
            <?php echo date("Y.m.d");?>
        </div>
    </div>
    <a href="billOperator.php" ><button type="button" name="button">Enter</button></a>
</div>
