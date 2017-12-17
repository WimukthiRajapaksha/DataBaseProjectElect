<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php require_once("../Include/dbConnection.php"); ?>
<?php
//$user = find_user_by_user_name($_SESSION['login_user']);
if(!isset($_SESSION['logged_in'])){
  redirect_to("login2.php");
}
print_r($_SESSION['login_user']);
global $connection;

if($_SESSION['type']==='admin'){

    if (!isset($_SESSION['admin_logged_in'])) {
      redirect_to("login2.php");
    }

    if(isset($_POST["back"])){
      redirect_to("profile.php");
      //echo <a href="profile.php"></a>;
    }

      $safe_user_name = mysqli_real_escape_string($connection,$_SESSION['login_user']);
      $query =  "SELECT * FROM administrator WHERE user_name = '$safe_user_name'";
      $user_set = mysqli_query($connection,$query);
      confirm_query($user_set);
      $user = mysqli_fetch_assoc($user_set);
      $first_name=$user['first_name'];
      $last_name=$user['last_name'];
      $street=$user["street"];
      $town=$user["town"];
      $city=$user["city"];
      $nic=$user["nic"];
      $tp_number=$user["tele_number"];
      $email=$user["email"];
      $position=$user["position"];
      $salary=$user["salary"];
      $user_name=$user["user_name"];
      $admin_id=$user["admin_id"];
print_r($user["admin_id"]);
      if($_SERVER["REQUEST_METHOD"] == "POST"){

        $new_first_name=mysqli_real_escape_string($connection,$_POST['first_name']);
        $new_last_name=mysqli_real_escape_string($connection,$_POST['last_name']);
        $new_street=mysqli_real_escape_string($connection,$_POST['street']);
        $new_town=mysqli_real_escape_string($connection,$_POST['town']);
        $new_city=mysqli_real_escape_string($connection,$_POST['city']);
        $new_nic=mysqli_real_escape_string($connection,$_POST['nic']);
        $new_tp_number=mysqli_real_escape_string($connection,$_POST['tp_number']);
        $new_email=mysqli_real_escape_string($connection,$_POST['email']);
        $new_position=mysqli_real_escape_string($connection,$_POST['position']);
        $new_salary=mysqli_real_escape_string($connection,$_POST['salary']);
        $new_user_name=mysqli_real_escape_string($connection,$_POST['user_name']);
        $new_current_password=mysqli_real_escape_string($connection,$_POST['password']);
        $new_password=mysqli_real_escape_string($connection,$_POST['new_password']);

        $required_fields = array("first_name","last_name","street","town","city","nic","tp_number","position","salary","user_name","email","password","new_password");
        validate_presences($required_fields);
        if($user_name!==$new_user_name){
        if (validate_user_name($user_name)){
          $message = "User name already exist. Try new one.";
          $errors['user_name']= "USER name already exist.";
        }
      }

        if (!tp_validation($tp_number)){
          $errors['tp_number']="T.P. Number Not in correct format";
        }
        $sql = "SELECT * FROM all_user WHERE user_name = '$user_name' and password =PASSWORD('$new_current_password')";
        $result = mysqli_query($connection,$sql);
        $count = mysqli_num_rows($result);
        if($count!=1){
          $errors['password']="Your current password is wrong";
        }
if (empty($errors)){
        $sql1 = "UPDATE all_user SET user_name='$new_user_name',password=PASSWORD('$new_password') WHERE user_name='$user_name'";
        $update_set1=mysqli_query($connection,$sql1);
        confirm_query($update_set1);
        $sql2 = "UPDATE administrator SET user_name='$new_user_name',password=PASSWORD('$new_password'),first_name='$new_first_name',last_name='$new_last_name',street='$new_street',town='$new_town',city='$new_city',nic='$new_nic',tele_number='$new_tp_number',email='$new_email',position='$new_position',salary='$new_salary' WHERE user_name='$user_name'";
        $update_set2=mysqli_query($connection,$sql2);
        confirm_query($update_set2);
        $first_name=$new_first_name;
        $last_name=$new_last_name;
        $street=$new_street;
        $town=$new_town;
        $city=$new_city;
        $nic=$new_nic;
        $tp_number=$new_tp_number;
        $email=$new_email;
        $position=$new_position;
        $salary=$new_salary;
        $user_name=$new_user_name;
        $message = "Changes Saved";
      }
    }
}elseif ($_SESSION['type']==='customer') {
    if (!isset($_SESSION['user_logged_in'])) {
      redirect_to("login2.php");
    }
    if(isset($_POST["back"])){
      redirect_to("profile.php");
    }
  print_r($_SESSION['login_user']);
      $safe_user_name = mysqli_real_escape_string($connection,$_SESSION['login_user']);
      $query =  "SELECT * FROM customer WHERE user_name = '$safe_user_name'";
      $user_set = mysqli_query($connection,$query);
      confirm_query($user_set);
      $user = mysqli_fetch_assoc($user_set);
      $first_name=$user['first_name'];
      $last_name=$user['last_name'];
      $street=$user["street"];
      $town=$user["town"];
      $city=$user["city"];
      $nic=$user["nic"];
      $tp_number=$user["tele_number"];
      $email=$user["email"];
      $user_name=$user["user_name"];
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $new_first_name=mysqli_real_escape_string($connection,$_POST['first_name']);
        $new_last_name=mysqli_real_escape_string($connection,$_POST['last_name']);
        $new_street=mysqli_real_escape_string($connection,$_POST['street']);
        $new_town=mysqli_real_escape_string($connection,$_POST['town']);
        $new_city=mysqli_real_escape_string($connection,$_POST['city']);
        $new_nic=mysqli_real_escape_string($connection,$_POST['nic']);
        $new_tp_number=mysqli_real_escape_string($connection,$_POST['tp_number']);
        $new_email=mysqli_real_escape_string($connection,$_POST['email']);
        $new_user_name=mysqli_real_escape_string($connection,$_POST['user_name']);
        $new_current_password=mysqli_real_escape_string($connection,$_POST['password']);
        $new_password=mysqli_real_escape_string($connection,$_POST['new_password']);

        $required_fields = array("first_name","last_name","street","town","city","nic","tp_number","user_name","email","password","new_password");
        validate_presences($required_fields);
        if($user_name!==$new_user_name){
        if (validate_user_name($user_name)){
          $message = "User name already exist. Try new one.";
          $errors['user_name']= "USER name already exist.";
        }
      }

        if (!tp_validation($tp_number)){
          $errors['tp_number']="T.P. Number Not in correct format";
        }
        $sql = "SELECT * FROM all_user WHERE user_name = '$user_name' and password =PASSWORD('$new_current_password')";
        $result = mysqli_query($connection,$sql);
        $count = mysqli_num_rows($result);
        if($count!=1){
          $errors['password']="Your current password is wrong";
        }
if (empty($errors)){
        $sql1 = "UPDATE all_user SET user_name='$new_user_name',password=PASSWORD('$new_password') WHERE user_name='$user_name'";
        $update_set1=mysqli_query($connection,$sql1);
        confirm_query($update_set1);
        //print_r($user["admin_id"]);
        $sql2 = "UPDATE customer SET user_name='$new_user_name',password=PASSWORD('$new_password'),first_name='$new_first_name',first_name='$new_last_name',street='$new_street',town='$new_town',city='$new_city',nic='$new_nic',tele_number='$new_tp_number',email='$new_email' WHERE user_name='$user_name'";
        $update_set2=mysqli_query($connection,$sql2);
        confirm_query($update_set2);
        $first_name=$new_first_name;
        $last_name=$new_last_name;
        $street=$new_street;
        $town=$new_town;
        $city=$new_city;
        $nic=$new_nic;
        $tp_number=$new_tp_number;
        $email=$new_email;
        $user_name=$new_user_name;
        //print_r($user["admin_id"]);
        $message = "Changes Saved";
      }
    }
}elseif ($_SESSION['type']==='billOperator') {
    if (!isset($_SESSION['billOperator_logged_in'])) {
      redirect_to("login2.php");
    }
    if(isset($_POST["back"])){
      redirect_to("profile.php");
    }
      $safe_user_name = mysqli_real_escape_string($connection,$_SESSION['login_user']);
      $query =  "SELECT * FROM billoperator WHERE user_name = '$safe_user_name'";
      $user_set = mysqli_query($connection,$query);
      confirm_query($user_set);
      $user = mysqli_fetch_assoc($user_set);
      $first_name=$user['first_name'];
      $last_name=$user['last_name'];
      $street=$user["street"];
      $town=$user["town"];
      $city=$user["city"];
      $nic=$user["nic"];
      $tp_number=$user["tele_number"];
      $email=$user["email"];
      $area_code=$user["area_code"];
      $salary=$user["salary"];
      $user_name=$user["user_name"];
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $new_first_name=mysqli_real_escape_string($connection,$_POST['first_name']);
        $new_last_name=mysqli_real_escape_string($connection,$_POST['last_name']);
        $new_street=mysqli_real_escape_string($connection,$_POST['street']);
        $new_town=mysqli_real_escape_string($connection,$_POST['town']);
        $new_city=mysqli_real_escape_string($connection,$_POST['city']);
        $new_nic=mysqli_real_escape_string($connection,$_POST['nic']);
        $new_tp_number=mysqli_real_escape_string($connection,$_POST['tp_number']);
        $new_email=mysqli_real_escape_string($connection,$_POST['email']);
        $new_area_code=mysqli_real_escape_string($connection,$_POST['area_code']);
        $new_salary=mysqli_real_escape_string($connection,$_POST['salary']);
        $new_user_name=mysqli_real_escape_string($connection,$_POST['user_name']);
        $new_current_password=mysqli_real_escape_string($connection,$_POST['password']);
        $new_password=mysqli_real_escape_string($connection,$_POST['new_password']);
        $required_fields = array("first_name","last_name","street","town","city","nic","tp_number","area_code","salary","user_name","email","password","new_password");
        validate_presences($required_fields);
        if($user_name!==$new_user_name){
        if (validate_user_name($user_name)){
          $message = "User name already exist. Try new one.";
          $errors['user_name']= "USER name already exist.";
        }
      }

        if (!tp_validation($tp_number)){
          $errors['tp_number']="T.P. Number Not in correct format";
        }
        $sql = "SELECT * FROM all_user WHERE user_name = '$user_name' and password =PASSWORD('$new_current_password')";
        $result = mysqli_query($connection,$sql);
        $count = mysqli_num_rows($result);
        if($count!=1){
          $errors['password']="Your current password is wrong";
        }
if (empty($errors)){
        $sql1 = "UPDATE all_user SET user_name='$new_user_name',password=PASSWORD('$new_password') WHERE user_name='$user_name'";
        $update_set1=mysqli_query($connection,$sql1);
        confirm_query($update_set1);
      //  print_r($user["admin_id"]);
        $sql2 = "UPDATE billOperator SET user_name='$new_user_name',password=PASSWORD('$new_password'),first_name='$new_first_name',last_name='$new_last_name',street='$new_street',town='$new_town',city='$new_city',nic='$new_nic',tele_number='$new_tp_number',email='$new_email',area_code='$new_area_code',salary='$new_salary' WHERE user_name='$user_name'";
        $update_set2=mysqli_query($connection,$sql2);
        confirm_query($update_set2);
        $first_name=$new_first_name;
        $last_name=$new_last_name;
        $street=$new_street;
        $town=$new_town;
        $city=$new_city;
        $nic=$new_nic;
        $tp_number=$new_tp_number;
        $email=$new_email;
        $area_code=$new_area_code;
        $salary=$new_salary;
        $user_name=$new_user_name;
        //print_r($user["admin_id"]);
      }
    }
}
 ?>
