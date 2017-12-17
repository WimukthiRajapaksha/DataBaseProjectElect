<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php require_once("../Include/dbConnection.php"); ?>

<?php
//$user = find_user_by_user_name($_SESSION['login_user']);
if(!$_SESSION['user_logged_in']){
  redirect_to("login2.php");
}
global $connection;
?>
<?php
if(isset($_POST["catogorySubmit"])){
  $catogory = mysqli_real_escape_string($connection,$_POST['catogory']);
  $_SESSION['catogory']=$catogory;
  $user_name = $_SESSION['login_user'];
  $query = "SELECT * FROM (bill NATURAL JOIN user_meter_con)NATURAL JOIN customer WHERE user_name = '{$user_name}'";
  $result = mysqli_query($connection,$query);
  confirm_query($result);
  $result_set = mysqli_fetch_array($result);
  $meter_id = $result_set['meter_id'];
  if($_SESSION['catogory']==='all'){

    $query3 = "SELECT * FROM payment WHERE meter_id = $meter_id ORDER BY payment_id";
    $result3 = mysqli_query($connection,$query3);
    confirm_query($result3);
  //  $result_set3 = mysqli_fetch_assoc($result3);
  /*if (mysqli_num_rows($result3) > 0) {
      echo "<table><tr><th>Payment ID </th><th>Meter ID</th><th>Date Of Payment</th><th>Amount</th></tr>";
      // output data of each row
      while($row = $result3->fetch_assoc()) {
          echo "<tr><td>" . $row["payment_id"]. "</td><td>" . $row["meter_id"]. "</td><td> " . $row["date_of_payment"]. "</td><td> " . $row["amount_of_payment"]. "</td></tr>";
      }
      echo "</table>";
  } else {
      echo "0 results";
  }*/
  }
  }
if(isset($_POST['paymentSubmit'])){
  $user_name = $_SESSION['login_user'];
  $payment = $_POST['payment'];
  if($payment<=0){
    $error = "Please Enter a valid payment";
    echo "<script type='text/javascript'>alert(\"$error\");</script>";
  }else{
  $date = date("Y/m/d");
  $query = "SELECT * FROM (bill NATURAL JOIN user_meter_con)NATURAL JOIN customer WHERE user_name = '{$user_name}'";
  $result = mysqli_query($connection,$query);
  confirm_query($result);
  $result_set = mysqli_fetch_array($result);
  $meter_id = $result_set['meter_id'];
  $current_balance = $result_set['balance'];
  print_r("gggg");
  if($_SESSION['red_notification']){
    if($current_balance>$payment){
      $error = "You should pay full balnace";
      echo "<script type='text/javascript'>alert(\"$error\");</script>";
    }else{
      $query1 = "INSERT INTO payment(meter_id, amount_of_payment, date_of_payment) VALUES ($meter_id,$payment,'{$date}')";
      $result1 = mysqli_query($connection,$query1);
      confirm_query($result1);
      print_r("kkkk");
      $new_balance = $current_balance - $payment;
      $query2 = "UPDATE bill SET balance = $new_balance WHERE meter_id = $meter_id";
      $result2 = mysqli_query($connection,$query2);
      confirm_query($result2);
    }
  }else{
    $query1 = "INSERT INTO payment(meter_id, amount_of_payment, date_of_payment) VALUES ($meter_id,$payment,'{$date}')";
    $result1 = mysqli_query($connection,$query1);
    confirm_query($result1);
    print_r("kkkk");
    $new_balance = $current_balance - $payment;
    $query2 = "UPDATE bill SET balance = $new_balance WHERE meter_id = $meter_id";
    $result2 = mysqli_query($connection,$query2);
    confirm_query($result2);
  }

}
}

?>
