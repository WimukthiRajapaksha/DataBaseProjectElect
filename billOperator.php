<?php
/**
 * Created by PhpStorm.
 * User: Manoj_nilanga
 * Date: 08/11/2017
 * Time: 17:46
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
<link rel="stylesheet" href="billOperator.css">


<div class="inner">
    <div class="operatorName">
        Bill Operator Name
    </div>
    <div class="BillOperator">
        Bill Operator
    </div>
    <div class="idBillOperator">
        ID:<?php echo "user_ID"?>
    </div>
    <div class="forButton">
        <a href="enterUnits.php"><button>Enter Units</button></a>
    </div>

</div>
<div class="editBillOperator">

</div>
