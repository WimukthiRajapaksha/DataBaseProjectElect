<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php require_once("../Include/dbConnection.php"); ?>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
$meter_id = mysqli_real_escape_string($connection,$_POST['meter_id']);
$new_total_units = mysqli_real_escape_string($connection,$_POST['meter_reading']);

$required_fields = array("meter_id","meter_reading");
validate_presences($required_fields);
if($meter_id<0){
  $message = "Enter a Valid meter ID";
}
if ($new_total_units<0){
  $message = "Emter a valid meter reading";
}
$read_date = date("Y/m/d");
if(empty($message)){
$query1 = "SELECT * FROM meter WHERE meter_id=$meter_id";
$result1 = mysqli_query($connection,$query1);
confirm_query($result1);
$count = mysqli_num_rows($result1);
if($count==1){
print_r($meter_id);
$result_set1 = mysqli_fetch_assoc($result1);
$previous_total_units = $result_set1['total_unit'];
if($new_total_units>=$previous_total_units){
$last_read_date = $result_set1['last_read_date'];
$type_of_connection = $result_set1['type_of_connection'];
//update meter table with new info
$query2 = "UPDATE meter SET total_unit = {$new_total_units}, last_read_date = '{$read_date}' WHERE meter_id = {$meter_id}";
$result2 =mysqli_query($connection,$query2);
confirm_query($result2);
$month_units = $new_total_units - $previous_total_units;
$test = $month_units;
$query3 = "SELECT * FROM rates WHERE type_of_connection = '{$type_of_connection}'ORDER BY range_id";
$result3 = mysqli_query($connection,$query3);
confirm_query($result3);
print_r($month_units);
if($type_of_connection==="Resident"){
  $cost=0;
  while($result_set3 = mysqli_fetch_assoc($result3)){
    if($month_units<=$result_set3['size']){
      $cost = $cost + $month_units * $result_set3['amount'];
      break;
    }else{
      $cost = $cost + $result_set3['size'] * $result_set3['amount'];
      $month_units =$month_units-$result_set3['size'];
    }
  }
  if($test>186){
    $cost = $cost +($test - 186)*45;
    $cost = $cost + 540;
  }
  print_r($cost);
}elseif($type_of_connection==="Religious"){
  $cost=0;
  while($result_set3 = mysqli_fetch_assoc($result3)){
    if($month_units<=$result_set3['size']){
      $cost = $cost + $month_units * $result_set3['amount'];
      break;
    }else{
      $cost = $cost + $result_set3['size'] * $result_set3['amount'];
      $month_units =$month_units-$result_set3['size'];
    }
  }
  if($test>168){
    $cost = $cost +($test - 168)*9.40;
    $cost = $cost + 240;
  }
  print_r($cost);
}elseif ($type_of_connection === "Business") {
  $cost=0;
  while($result_set3 = mysqli_fetch_assoc($result3)){
    if($month_units<=$result_set3['size']){
      $cost = $cost + $month_units * $result_set3['amount'];
      break;
    }else{
      $cost = $cost + $result_set3['size'] * $result_set3['amount'];
      $month_units =$month_units-$result_set3['size'];
    }
  }
  if($test>450){
    $cost = $cost +($test - 450)*18.3;
    $cost = $cost + 600;
}
}

//find this meter id already has a bill or apache_note
print_r($cost);
$query4 = "SELECT * FROM bill WHERE meter_id=$meter_id";
$result4 = mysqli_query($connection,$query4);
confirm_query($result4);
$count = mysqli_num_rows($result4);
if($count==1){
  $result_set4 = mysqli_fetch_assoc($result4);
  $current_balance = $result_set4['balance'];
  $new_balance = $current_balance + $cost;
  $month_units = $new_total_units - $previous_total_units;
  $date = date("Y/m/d");
  $month = date("F");
  $year = date("Y");
  $due_date = date("Y/m/d", strtotime(" +2 months"));
  print_r("KKKKK");
  $query4 = "UPDATE bill SET balance = $new_balance, units = $month_units, monthly_cost = $cost, start_date = '{$last_read_date}', end_date = '{$date}', due_date = '{$due_date}' , paid = 0 WHERE meter_id=$meter_id";
  $result4 = mysqli_query($connection,$query4);
  confirm_query($result4);
print_r("jjjjj");
  $query5 = "INSERT INTO bill_history(meter_id,units,monthly_cost,start_date,end_date,month,year) VALUES ($meter_id,$month_units,$cost,'{$last_read_date}','{$date}','{$month}','{$year}')";
  $result5 = mysqli_query($connection,$query5);
  confirm_query($result5);
print_r("hhhhh");

}elseif($count==0){
  //$result_set4 = mysqli_fetch_assoc($result4);
  //$current_balance = $result_set4['balance'];
  $new_balance =  $cost;
  $month_units = $new_total_units - $previous_total_units;
  $date = date("Y/m/d");
  $month = date("F");
  $year = date("Y");
  $due_date = date("Y/m/d", strtotime(" +2 months"));
  print_r($month);
  print_r($year);
  $query4 = "INSERT INTO bill (meter_id,balance,units,monthly_cost,start_date,end_date,due_date,paid) VALUES ($meter_id,$new_balance, $month_units,$cost, '{$last_read_date}', '{$date}', '{$due_date}' ,  0 )";
  $result4 = mysqli_query($connection,$query4);
  confirm_query($result4);
print_r("vvvvvvvv");
  $query5 = "INSERT INTO bill_history(meter_id,units,monthly_cost,start_date,end_date,month,year) VALUES ($meter_id,$month_units,$cost,'{$last_read_date}','{$date}','{$month}','{$year}')";
  $result5 = mysqli_query($connection,$query5);
  confirm_query($result5);
print_r("hhhhh");

}}else{
  $message = "Enter a valid meter reading";
}}
else{
  $message = "Enter a valid meter ID";
}
}
if(!empty($message)){
  echo "<script type='text/javascript'>alert(\"$message\");</script>";
}
}
 ?>
