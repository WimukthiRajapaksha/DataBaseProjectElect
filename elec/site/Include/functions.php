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
  $query = 'SELECT * FROM user WHERE nic ="'.$safe_user_id.'" LIMIT 1';
  $user_set = mysqli_query($connection,$query);
  confirm_query($user_set);
  if($user = mysqli_fetch_assoc($user_set)){
    return $user;
  }else {
    return null;
  }
}

function find_user_by_user_name($user_name){
  // find user for a given user name
  global $connection;
  $safe_user_name = mysqli_real_escape_string($connection,$user_name);
  $query = 'SELECT * FROM user WHERE user_name ="'.$safe_user_name.'" LIMIT 1';
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
  $hash = crypt($password,$existing_hash);
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
      return $user;
    }else {
      return false;
    };
  }else{
    return false;
  }
}

 ?>
