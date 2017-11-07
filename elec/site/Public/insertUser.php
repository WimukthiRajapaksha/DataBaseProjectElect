<?php require_once("../Include/functions.php") ?>
<?php require_once("../Include/session.php") ?>
<?php require_once("../Include/dbConnection.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>

<?php

if(isset($_POST['submit'])){
$name       = mysqli_real_escape_string($connection,$_POST["name"]);
$address    = mysqli_real_escape_string($connection,$_POST["address"]);
$nic        = mysqli_real_escape_string($connection,$_POST["nic"]);
$tp_number  = mysqli_real_escape_string($connection,$_POST["tp_number"]);
$email      = mysqli_real_escape_string($connection,$_POST["email"]);
$password   = mysqli_real_escape_string($connection,$_POST["password"]);

//validation
$required_fields = array("name","address","nic","tp_number","email","password");
validate_presences($required_fields);

$fields_with_equal_lengths = array('nic' => 10,'tp_number'=> 10 );
validate_equal_lengths($fields_with_equal_lengths);

if (!empty($errors)){
  $_SESSION["errors"] = $errors;
  redirect_to("createAccount.php");
}

$hashed_password  = sha1($password);
$query  = "INSERT INTO user (name,address,nic,tp_number,email,password) VALUES('$name','$address','$nic','$tp_number','$email','$hashed_password')";
if(!$nic===""){
$result = mysqli_query($connection,$query);
}
if(isset($result)){
  $_SESSION["message"]="User Added";
  redirect_to("createAccount.php");
  //echo "user added";
}else {
  $_SESSION["message"]="Error";
  redirect_to("createAccount.php");
  //echo "Error";
}

}
else{
  redirect_to("createAccount.php");
}


 ?>

<?php
if(isset($connection)){
  mysqli_close($connection);
}
 ?>
