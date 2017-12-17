<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php require_once("../Include/dbConnection.php"); ?>

<?php
//print_r($_SESSION['user_id']);
if ($_SESSION['user_logged_in']){

  $user_name = $_SESSION['login_user'];
  $query = "SELECT meter_id FROM customer NATURAL JOIN user_meter_con WHERE user_name='{$user_name}'";
  $result = mysqli_query($connection,$query);
  confirm_query($result);
  $result_set = mysqli_fetch_array($result);

  $query1 = "SELECT * FROM customer WHERE user_name='{$user_name}'";
  $result1 = mysqli_query($connection,$query1);
  confirm_query($result1);
  $result_set1 = mysqli_fetch_array($result1);
  $street = $result_set1['street'];
  $town = $result_set1['town'];
  $city = $result_set1['city'];
  $address = $street." ".$town." ".$city;
  $query2 = "SELECT * FROM bill WHERE meter_id={$result_set['meter_id']}";
  $result2 = mysqli_query($connection,$query2);
  confirm_query($result2);
  if(mysqli_num_rows($result2)==1){
      $result_set2 = mysqli_fetch_array($result2);
      $meter_id = $result_set2['meter_id'];
      $final_cost = $result_set2['balance'];
      $units = $result_set2['units'];
      $monthly_cost = $result_set2['monthly_cost'];
      $start_date  =$result_set2['start_date'];
      $end_date = $result_set2['end_date'];
      $paid = $result_set2['paid'];
      if($paid == 0){
        $status = test_input(mysqli_real_escape_string($connection,"NotPayed"));
      }else{
        $status = "Payed";
      }
      $balance = $final_cost - $monthly_cost;
    }
    else{
      $meter_id = $result_set['meter_id'];
      $final_cost=0;
      $units=0;
      $monthly_cost=0;
      $query4 = "SELECT * FROM meter WHERE meter_id=$meter_id";
      $result4 = mysqli_query($connection,$query4);
      confirm_query($result4);
      $result_set4 = mysqli_fetch_array($result4);
      $start_date = $result_set4['last_read_date'];
      $end_date =null;
      $balance = 0;
      $status= null;
    }

  if(isset($_POST['catogorySubmit'])){
    $bill_catogory = mysqli_real_escape_string($connection,$_POST['billcatogory']);
    $_SESSION['bill_catogory'] = $bill_catogory;
  $query3 = "SELECT * FROM bill_history WHERE meter_id ={$result_set['meter_id']} ORDER BY bill_id";
  $result3 = mysqli_query($connection,$query3);
  confirm_query($result3);
  if($_SESSION['bill_catogory']=='all'){


      echo"<form class=\"form-horizontal\" action=\"billinfo.php\" method=\"post\">";
          echo"<div class=\"form-group\">";
          echo"<label for=\"inputCatogory3\" class=\"col-sm-2 control-label\">Select Catogory</label>";
          echo"<div class=\"col-sm-10\">";
            echo"<select name=\"billcatogory\" placeholder=\"billcatogory\" required>";

          echo "<option value=\"\">Select</option>";
          echo "<option value=\"currentBill\">current bill</option>";
          echo "<option value=\"all\">all</option>";


       echo"</select>";
          echo"</div>";
        echo"</div>";

      echo"<div class=\"form-group\">";
      echo"<div class=\"col-sm-offset-2 col-sm-10\">";
       echo"<button type=\"submit\"name=\"catogorySubmit\" class=\"btn btn-default\">Submit</button>";

      echo"</div>";
      echo"</div>";
      echo"</form>";


    echo"<h2>Bill History</h2>";
  if ($result3->num_rows > 0) {
      echo "<table><tr><th>Bill ID </th><th>Year</th><th>Month</th><th>Start Date</th><th>End Date</th><th>Units</th><th>Monthly Cost</th></tr>";
      // output data of each row
      while($row = $result3->fetch_assoc()) {
          echo "<tr><td>" . $row["bill_id"]. "</td><td>" . $row["year"]. "</td><td> " . $row["month"]. "</td><td> " . $row["start_date"]. "</td><td> " . $row["end_date"]. "</td><td> " . $row["units"]. "</td><td>" . $row["monthly_cost"]. "</td></tr>";
      }
      echo "</table>";
  } else {
      echo "0 results";
      //$_SESSION['notification'] = null;
  }}
//}
}
}if($_SESSION['admin_logged_in']){
  if(isset($_POST['search'])){
    $meter_id = mysqli_real_escape_string($connection,$_POST['search_by_meter_id']);
    $query2 = "SELECT * FROM (bill NATURAL JOIN user_meter_con)NATURAL JOIN customer WHERE meter_id=$meter_id";
    $result2 = mysqli_query($connection,$query2);
    confirm_query($result2);


  }
  if(isset($_POST['catogorySubmit'])){
  $catogory = mysqli_real_escape_string($connection,$_POST['catogory']);
  $_SESSION['bill_type'] = mysqli_real_escape_string($connection,$_POST['catogory']);
}
}
 ?>
