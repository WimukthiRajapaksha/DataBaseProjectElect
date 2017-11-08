<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php require_once("../Include/dbConnection.php"); ?>

<?php
$name=null;
$address=null;
$nic=null;
$tp_number=null;
$email=null;
$user_name=null;
if(isset($_POST['submit'])){
$name       = test_input($_POST["name"]);
$address    = mysqli_real_escape_string($connection,$_POST["address"]);
$nic        = test_input($_POST["nic"]);
$tp_number  = test_input($_POST["tp_number"]);
$email      = test_input($_POST["email"]);
$user_name  = test_input($_POST["user_name"]);
$password   = test_input($_POST["password"]);
$repassword = test_input($_POST["re_enter_password"]);

//validation
$required_fields = array("name","address","nic","tp_number","email","user_name","password","re_enter_password");
validate_presences($required_fields);

//$fields_with_equal_lengths = array('nic' => 10,'tp_number'=> 10 );
//$nic_with_required_length = array('nic' => 10);
//$tp_with_required_length = array('tp_number' => 10);
if (!nic_validation($nic)){
  $errors['nic']="NIC Not in correct format";
}
if (!tp_validation($tp_number)){
  $errors['tp_number']="T.P. Number Not in correct format";
}
//validate_equal_lengths($fields_with_equal_lengths);
if (validate_user_name($user_name)){
  $message = "User name already exist. Try new one.";
  $errors['user_name']= "USER name already exist.";
}
if (find_user_by_id($nic)) {
  $message = " You already has an account.";
}
if (!validate_equal_password($password,$repassword)){
  $errors["re_enter_password"]= "password do not match";
}
if (empty($errors)){
//$hashed_password = password_encryption($password);
//$hashed_password  = sha1 ($password);
$type = "customer";
$query2 = "INSERT INTO all_user (user_name,password,type) VALUES ('{$user_name}',PASSWORD({$password}),'{$type}')";
$result2 = mysqli_query($connection,$query2);
confirm_query($result2);
$query1  = "INSERT INTO customer (name,address,nic,tele_number,email,user_name,password) VALUES('{$name}','{$address}','{$nic}','{$tp_number}','{$email}','{$user_name}',PASSWORD({$password}))";
$result1 = mysqli_query($connection,$query1);
confirm_query($result1);
if(isset($result1) && mysqli_affected_rows($connection)==1){
  $message="User Added";
  //redirect_to("payment.php");
  //echo "user added";
}else {
  $message="Error";
  //redirect_to("payment.php");
  //echo "Error";
}
}
}
else{
  //redirect_to("payment.php");
}
?>
