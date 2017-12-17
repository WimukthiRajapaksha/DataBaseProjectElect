<?php include("../Include/header1.php"); ?>
<?php require_once("../Include/dbConnection.php"); ?>
<li ><a href="infex.php">Home</a></li>
<li><a href="contactUs.php">Contact Us</a></li>
<li class="active"><a href="aboutUs.php">About Us</a></li>
<li ><a href="login2.php">Log In</a></li>
<?php include("../Include/header2.php"); ?>
<?php
$query="SELECT * FROM connection_type";
$result=mysqli_query($connection,$query);

 ?>

<?php include("../Include/footer.php"); ?>
