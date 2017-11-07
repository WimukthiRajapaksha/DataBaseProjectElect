
<?php require_once("../Include/dbConnection.php"); ?>

<?php
global $connection;
$query = "SELECT address from user";
$result = mysqli_query($connection,$query);
while($user = mysqli_fetch_assoc($result)){
  echo $user['address'];
}


 ?>
