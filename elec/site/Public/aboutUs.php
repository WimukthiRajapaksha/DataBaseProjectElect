<?php include("../Include/header1.php"); ?>
<?php require_once("../Include/dbConnection.php"); ?>
<li ><a href="infex.php">Home</a></li>
<li><a href="contactUs.php">Contact Us</a></li>
<li class="active"><a href="aboutUs.php">About Us</a></li>
<li ><a href="login.php">Log In</a></li>
<?php include("../Include/header2.php"); ?>
<?php
$query="SELECT * FROM connection_type";
$result=mysqli_query($connection,$query);

 ?>

<?php
while($row=mysqli_fetch_assoc($result)){

var_dump($row);
echo "<hr />";
}

 ?>
 <?php

 mysqli_free_result($result)
  ?>
<?php include("../Include/footer.php"); ?>
<?php
mysqli_close($connection);
 ?>
