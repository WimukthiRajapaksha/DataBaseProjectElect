<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php require_once("../Include/dbConnection.php"); ?>
<?php
//print_r($_SESSION);
  if (!isset($_SESSION['admin_logged_in'])) {
    redirect_to("login2.php");
  }
 ?>
 <?php
 $sql="SELECT * FROM connection_type";
 $result = mysqli_query($connection, $sql);

 ?>

<?php
$first_name=null;
$last_name=null;
$street=null;
$town=null;
$city=null;
$nic=null;
$tp_number=null;
$email=null;
$user_name=null;
$meter_id=null;
$admin_id=null;
$employee_id= null;
if(isset($_POST['customerSubmit'])){
$first_name = test_input($_POST["first_name"]);
$last_name = mysqli_real_escape_string($connection,$_POST["last_name"]);
$street    = mysqli_real_escape_string($connection,$_POST["street"]);
$town = mysqli_real_escape_string($connection,$_POST["town"]);
$city = mysqli_real_escape_string($connection,$_POST["city"]);
$nic        = test_input($_POST["nic"]);
$tp_number  = test_input($_POST["tp_number"]);
$email      = test_input($_POST["email"]);
$user_name  = test_input($_POST["user_name"]);
$type_of_connection   = mysqli_real_escape_string($connection,$_POST["type_of_connection"]);
$meter_id = mysqli_real_escape_string($connection,$_POST["meter_id"]);
$password   = test_input($_POST["password"]);
$repassword = test_input($_POST["re_enter_password"]);

//validation
$required_fields = array("first_name","last_name","street","town","city","nic","tp_number","email","user_name","meter_id","password","re_enter_password");
validate_presences($required_fields);

//$fields_with_equal_lengths = array('nic' => 10,'tp_number'=> 10 );
//$nic_with_required_length = array('nic' => 10);
//$tp_with_required_length = array('tp_number' => 10);
if(preg_match('/[^a-zA-Z]/', $first_name)){
  $errors['first_name']="First Name is Invalid";
  $message = "First Name is Invalid";
}
if(preg_match('/[^a-zA-Z]/', $last_name)){
  $errors['last_name']="Last Name is Invalid";
  $message = "Last Name is Invalid";
}
if (!nic_validation($nic)){
  $errors['nic']="NIC Not in correct format";
  $message = "NIC Not in correct format";
}
if (!tp_validation($tp_number)){
  $errors['tp_number']="T.P. Number Not in correct format";
  $message = "T.P. Number Not in correct format";
}
//validate_equal_lengths($fields_with_equal_lengths);
if (validate_user_name($user_name)){
  $errors['user_name']= "USER name already exist.";
  $message = "USER name already exist.";
}
if (find_user_by_id($nic)) {
  $errors['nic'] = "This customer already has an account";
  $message = "This customer already has an account";
}
if (find_meter_id($meter_id)){
  $errors['meter_id']="This meter ID already exist";
  $message = "This meter ID already exist";
}
if (!validate_equal_password($password,$repassword)){
  $errors["re_enter_password"]= "password do not match";
  $message = "password do not match";
}
if (empty($message)){
//$hashed_password = password_encryption($password);
//$hashed_password  = sha1 ($password);
$type = "customer";
$query2 = "INSERT INTO all_user (user_name,password,type) VALUES ('{$user_name}',PASSWORD({$password}),'{$type}')";
$result2 = mysqli_query($connection,$query2);
print_r("gggg");
confirm_query($result2);

$query1  = "INSERT INTO customer (first_name,last_name,street,town,city,nic,tele_number,email,user_name,password) VALUES('{$first_name}','{$last_name}','{$street}','{$town}','{$city}','{$nic}','{$tp_number}','{$email}','{$user_name}',PASSWORD({$password}))";
$result1 = mysqli_query($connection,$query1);
confirm_query($result1);
print_r("fffff");
if(isset($result1) && mysqli_affected_rows($connection)==1){
  $message="User Added";
/*  $query3 = "SELECT * FROM meter";
  $result3 = mysqli_query($connection,$query3);
  print_r("ffff");
  confirm_query($result3);
  $count = mysqli_num_rows($result3);
  $meter_id = $count + 1;*/

  $query4 = "SELECT * FROM customer WHERE user_name='{$user_name}'";
  $result4 = mysqli_query($connection,$query4);
  confirm_query($result4);
  $row4 = mysqli_fetch_array($result4);
  $user_id = $row4['user_id'];
  $last_read_date = date("Y/m/d");

  $query5 = "INSERT INTO meter (meter_id,total_unit,last_read_date,type_of_connection) VALUES ('{$meter_id}','0','{$last_read_date}','{$type_of_connection}')";
  $result5 = mysqli_query($connection,$query5);
  confirm_query($result5);

  $query6 = "INSERT INTO user_meter_con(user_id,meter_id) VALUES ('{$user_id}','{$meter_id}')";
  $result6 = mysqli_query($connection,$query6);
  confirm_query($result6);
  $first_name=null;
  $last_name=null;
  $street=null;
  $town=null;
  $city=null;
  $nic=null;
  $tp_number=null;
  $email=null;
  $user_name=null;
  $meter_id=null;
}else {
  $message="Error";
  //redirect_to("payment.php");
  //echo "Error";
}
//$query3 = "SELECT * FROM customer WHERE user_name='{$user_name}'";
//$result3 = mysqli_query()
}
}
if(isset($_POST['adminSubmit'])){
  $user_name = mysqli_real_escape_string($connection,$_POST["user_name"]);
  $admin_id   = mysqli_real_escape_string($connection,$_POST["admin_id"]);
  $password   = test_input($_POST["password"]);
  $repassword = test_input($_POST["re_enter_password"]);

  $required_fields = array("user_name","admin_id","password","re_enter_password");
  validate_presences($required_fields);

  if (validate_user_name($user_name)){
    $message = "User name already exist. Try new one.";
    $errors['user_name']= "USER name already exist.";
  }
  if (!validate_equal_password($password,$repassword)){
    $message = "password do not match";
    $errors["re_enter_password"]= "password do not match";
  }
  if (empty($message)){
    $type = "admin";
    $query2 = "INSERT INTO all_user (user_name,password,type) VALUES ('{$user_name}',PASSWORD({$password}),'{$type}')";
    $result2 = mysqli_query($connection,$query2);
    confirm_query($result2);
    $query1 = "INSERT INTO administrator (admin_id,user_name,password) VALUES ('{$admin_id}','{$user_name}',PASSWORD({$password}))";
    $result1 = mysqli_query($connection,$query1);
    confirm_query($result1);

  if(isset($result1) && mysqli_affected_rows($connection)==1){
    $message="Admin Added";
    $user_name =null;
    $admin_id = null;
    //redirect_to("payment.php");
    //echo "user added";
  }else {
    $message="Error";
    //redirect_to("payment.php");
    //echo "Error";
  }
}
}
  if(isset($_POST['billOperatorSubmit'])){
    $user_name = mysqli_real_escape_string($connection,$_POST["user_name"]);
    $employee_id   = mysqli_real_escape_string($connection,$_POST["employee_id"]);
    $password   = test_input($_POST["password"]);
    $repassword = test_input($_POST["re_enter_password"]);

    $required_fields = array("user_name","employee_id","password","re_enter_password");
    validate_presences($required_fields);

    if (validate_user_name($user_name)){
      $message = "User name already exist. Try new one.";
      $errors['user_name']= "USER name already exist.";
    }
    if (!validate_equal_password($password,$repassword)){
      $message = "password do not match";
      $errors["re_enter_password"]= "password do not match";
    }
    if (empty($message)){
      $type = "billOperator";
      $query2 = "INSERT INTO all_user (user_name,password,type) VALUES ('{$user_name}',PASSWORD({$password}),'{$type}')";
      $result2 = mysqli_query($connection,$query2);
      confirm_query($result2);
      $query1 = "INSERT INTO billoperator (employment_id,user_name,password) VALUES ('{$employee_id}','{$user_name}',PASSWORD({$password}))";
      $result1 = mysqli_query($connection,$query1);
      confirm_query($result1);

    if(isset($result1) && mysqli_affected_rows($connection)==1){
      $message="Bill Operator Added";
      $user_name = null;
      $employee_id  = null;
      //redirect_to("payment.php");
      //echo "user added";
    }else {
      $message="Error";
      //redirect_to("payment.php");
      //echo "Error";
    }
  }
  }

?>
