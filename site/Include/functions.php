<?php

function confirm_query($result_set){
  if(!$result_set){
    die("Database query failed...");
  }
}

function redirect_to($location){
  header('Location:'.$location);
  exit;

}

function test_input($data) {
  global $connection;
  //  $data = mysqli_real_escape_string($connection,$data);
  $data = trim($data);
  //print_r($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  //$data = htmlentities($data);
  //$data = str_replace('\'', '"', $data);
  //print_r($data);
  return $data;
}

function form_errors($errors=array()){
  $output = "";
  if (!empty($errors)){
    $output .= "<div class=\"error\"";
    $output .= "Please fix the foloowing errors: ";
    $output .= "<ul>";
    foreach ($errors as $key => $error) {
      $output .= "<ol> {$error}</ol>";

      # code...
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

function find_user_by_id($user_id){
  //find user for a given NIC number
  global $connection;
  $safe_user_id = mysqli_real_escape_string($connection,$user_id);
  $query = 'SELECT * FROM customer WHERE nic ="'.$safe_user_id.'" LIMIT 1';
  $user_set = mysqli_query($connection,$query);
  confirm_query($user_set);
  if($user = mysqli_fetch_assoc($user_set)){
    return $user;
  }else {
    return null;
  }
}

function find_meter_id($meter_id){
  global $connection;
  $safe_meter_id = mysqli_real_escape_string($connection,$meter_id);
  $query = 'SELECT * FROM meter WHERE meter_id = "'.$safe_meter_id.'" LIMIT 1';
  $meter_set = mysqli_query($connection,$query);
  confirm_query($meter_set);
  if($meter = mysqli_fetch_assoc($meter_set)){
    return $meter;
  }else{
    return null;
  }
}

function find_user_by_user_name($user_name){
  // find user for a given user name
  global $connection;
  $safe_user_name = mysqli_real_escape_string($connection,$user_name);
  $query =  "SELECT * FROM customer WHERE user_name = '$myusername' and password =PASSWORD('$mypassword') LIMIT 1";
  $user_set = mysqli_query($connection,$query);
  confirm_query($user_set);
  if($user = mysqli_fetch_assoc($user_set)){
    return $user;
  }else {

    return null;
  }
}

function password_encryption($password){
  $hash_format = "$2y$10$";
  $salt = "Salt22CharactersOrMore";
  $format_and_salt = $hash_format.$salt;
  $hashed_password = crypt($password,$format_and_salt);
  return $hashed_password;



}

function password_check($password,$existing_hash){
  $hash = password_encryption($password);
  if($hash===$existing_hash){
    return true;
  }
  else{
    return false;
  }
}

function attempt_login($user_name,$password){
  $user = find_user_by_user_name($user_name);
  if($user){
    //found user,now check password
    if (password_check($password,$user["password"])){
      //passwordmatch
      return "ffffff";
    }else {
      return "false";
    };
  }else{
    return "false..";
  }
}

 ?>
