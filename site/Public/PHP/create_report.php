<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php require_once("../Include/dbConnection.php"); ?>
<?php include("../Include/fusioncharts.php") ?>

<?php
//$user = find_user_by_user_name($_SESSION['login_user']);
if(!$_SESSION['admin_logged_in']){
  redirect_to("login2.php");
}
global $connection;
?>

<?php

$query = "SELECT SUM(units) as tot FROM bill_history WHERE month='January' ";
$result = mysqli_query($connection,$query);
confirm_query($result);
$result_set  = mysqli_fetch_array($result);
$january_tot_units = $result_set['tot'];

$query = "SELECT SUM(units) as tot FROM bill_history WHERE month='February' ";
$result = mysqli_query($connection,$query);
confirm_query($result);
$result_set  = mysqli_fetch_array($result);
$february_tot_units = $result_set['tot'];

$query = "SELECT SUM(units) as tot FROM bill_history WHERE month='March' ";
$result = mysqli_query($connection,$query);
confirm_query($result);
$result_set  = mysqli_fetch_array($result);
$march_tot_units = $result_set['tot'];

$query = "SELECT SUM(units) as tot FROM bill_history WHERE month='April' ";
$result = mysqli_query($connection,$query);
confirm_query($result);
$result_set  = mysqli_fetch_array($result);
$april_tot_units = $result_set['tot'];

$query = "SELECT SUM(units) as tot FROM bill_history WHERE month='May' ";
$result = mysqli_query($connection,$query);
confirm_query($result);
$result_set  = mysqli_fetch_array($result);
$may_tot_units = $result_set['tot'];

$query = "SELECT SUM(units) as tot FROM bill_history WHERE month='June' ";
$result = mysqli_query($connection,$query);
confirm_query($result);
$result_set  = mysqli_fetch_array($result);
$june_tot_units = $result_set['tot'];

$query = "SELECT SUM(units) as tot FROM bill_history WHERE month='July' ";
$result = mysqli_query($connection,$query);
confirm_query($result);
$result_set  = mysqli_fetch_array($result);
$july_tot_units = $result_set['tot'];

$query = "SELECT SUM(units) as tot FROM bill_history WHERE month='August' ";
$result = mysqli_query($connection,$query);
confirm_query($result);
$result_set  = mysqli_fetch_array($result);
$august_tot_units = $result_set['tot'];

$query = "SELECT SUM(units) as tot FROM bill_history WHERE month='September' ";
$result = mysqli_query($connection,$query);
confirm_query($result);
$result_set  = mysqli_fetch_array($result);
$september_tot_units = $result_set['tot'];

$query = "SELECT SUM(units) as tot FROM bill_history WHERE month='October' ";
$result = mysqli_query($connection,$query);
confirm_query($result);
$result_set  = mysqli_fetch_array($result);
$october_tot_units = $result_set['tot'];

$query = "SELECT SUM(units) as tot FROM bill_history WHERE month='November' ";
$result = mysqli_query($connection,$query);
confirm_query($result);
$result_set  = mysqli_fetch_array($result);
$november_tot_units = $result_set['tot'];

$query = "SELECT SUM(units) as tot FROM bill_history WHERE month='December' ";
$result = mysqli_query($connection,$query);
confirm_query($result);
$result_set  = mysqli_fetch_array($result);
$december_tot_units = $result_set['tot'];

$total_units = $january_tot_units+$february_tot_units+$march_tot_units+$april_tot_units+$may_tot_units+$june_tot_units+$july_tot_units+$august_tot_units+$september_tot_units+$october_tot_units+$november_tot_units+$december_tot_units;

$final_january_units = ($january_tot_units/$total_units)*100;
$final_february_units = ($february_tot_units/$total_units)*100;
$final_march_units = ($march_tot_units/$total_units)*100;
$final_april_units = ($april_tot_units/$total_units)*100;
$final_may_units = ($may_tot_units/$total_units)*100;
$final_june_units = ($june_tot_units/$total_units)*100;
$final_july_units = ($july_tot_units/$total_units)*100;
$final_august_units = ($august_tot_units/$total_units)*100;
$final_september_units = ($september_tot_units/$total_units)*100;
$final_october_units = ($october_tot_units/$total_units)*100;
$final_november_units = ($november_tot_units/$total_units)*100;
$final_december_units = ($december_tot_units/$total_units)*100;
 ?>
