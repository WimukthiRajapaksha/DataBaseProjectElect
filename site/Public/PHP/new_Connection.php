<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php require_once("../Include/dbConnection.php"); ?>

<?php
$sql5="SELECT * FROM connection_type";
$result5 = mysqli_query($connection, $sql5);

?>
<?php
$name = null;
$nic = null;
$tp_number = null;
$email = null;
$address = null;
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $name = mysqli_real_escape_string($connection,$_POST['name']);
  $address = mysqli_real_escape_string($connection,$_POST['address']);
  $nic = mysqli_real_escape_string($connection,$_POST['nic']);
  $tp_number = mysqli_real_escape_string($connection,$_POST['tp_number']);
  $email = mysqli_real_escape_string($connection,$_POST['email']);
  $type_of_connection = mysqli_real_escape_string($connection,$_POST['type_of_connection']);

  $required_fields = array("name","address","nic","tp_number","email");
  validate_presences($required_fields);

  $query = "SELECT * FROM customer WHERE nic='{$nic}'";
  $result = mysqli_query($connection,$query);
  confirm_query($result);
  if(!nic_validation($nic)){
    //$errors['nic']="NIC Not in correct format";
    $message = "NIC Not in correct format";
  }
  if(mysqli_num_rows($result)!=0){
    //$errors['nic']="You Already have an account";
    $message = "You Already have an account";
  }
  if (!tp_validation($tp_number)){
    //$errors['tp_number']="T.P. Number Not in correct format";
    $message = "T.P. Number Not in correct format";
  }
if (empty($message)){

  $query2 = "SELECT * FROM connection_req";
  $result2 = mysqli_query($connection,$query2);
  print_r("ffff");
  confirm_query($result2);
  $count = mysqli_num_rows($result2);
  $req_id = $count + 1;
print_r("ssssss");
  $query1  = "INSERT INTO requestee (name,address,nic,tele_number,email) VALUES('{$name}','{$address}','{$nic}','{$tp_number}','{$email}')";
  $result1 = mysqli_query($connection,$query1);
  confirm_query($result1);
  print_r("hhhh");
  $approval = "not checked";
  $req_date = date("Y/m/d");
  $query3 = "INSERT INTO connection_req (req_id,type_of_connection,approval,req_date) VALUES ({$req_id},'{$type_of_connection}','{$approval}','{$req_date}')";
  $result3 = mysqli_query($connection,$query3);
  confirm_query($result3);
  print_r("ccccc");
  $query4 = "INSERT INTO requestee_connection_req_con (nic,req_id) VALUES ('{$nic}',{$req_id})";
  $result4 = mysqli_query($connection,$query4);
  confirm_query($result4);
  print_r("rrrrr");

  $_SESSION['notification'] = true;
  if(empty($message)){
        $message = "Request Sent Successfully";
        $name = null;
        $nic = null;
        $tp_number = null;
        $email = null;
        $address = null;
  }


}
echo "<script type='text/javascript'>alert(\"$message\");</script>";
}
?>
