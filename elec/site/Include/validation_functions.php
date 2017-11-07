<?php
$errors  = array();

function field_name_as_text($fieldname){
  $fieldname = str_replace("_"," ",$fieldname);
  $fieldname = ucfirst($fieldname);
  return $fieldname;
}

function has_presence($value){
  return isset($value) && $value !=="";
}

function validate_presences($required_fields){
  global $errors;
  foreach ($required_fields as $field) {
    $value = trim($_POST[$field]);
    if (!has_presence($value)) {
      $errors[$field] = field_name_as_text($field)." can't be blank";
    }
  }
}

function has_equal_length($value,$equal){
  return strlen($value)==$equal;
}

function validate_equal_lengths($field_with_equal_lengths){
  global $errors;
  foreach ($field_with_equal_lengths as $field => $equal) {
    $value = trim($_POST[$field]);
    if (!has_equal_length($value,$equal)) {
      $errors[$field] = field_name_as_text($field)." is invalid.";
      return false;
    }else{
      return true;
    }
 }
}

function validate_equal_password($password,$repassword){
  if ($password===$repassword){
    return true;
  }else{
    return false;
  }
}

function validate_user_name($user_name){
  global $connection;
  $safe_user_name = mysqli_real_escape_string($connection,$user_name);
  $query = 'SELECT * FROM user WHERE user_name ="'.$safe_user_name.'" LIMIT 1';
  $user_set = mysqli_query($connection,$query);
  confirm_query($user_set);
  if($user = mysqli_fetch_assoc($user_set)){
    return true;
  }else {
    return false;
  }
}

function nic_validation($nic){
  $nic_with_required_length = array('nic' => 10);
  if (validate_equal_lengths($nic_with_required_length)){
    if (!preg_match('#[^0-9]#',substr($nic,0,9))){
      if (substr($nic,9)=="v" || substr($nic,9)=="V"){
        return true;
    }else {
      return false;
    }
  }else {
    return false;
  }
}else {
  return false;
}
}

function tp_validation($tp_number){
  $tp_with_required_length = array('tp_number' => 10);
  if (validate_equal_lengths($tp_with_required_length)){
    if (!preg_match('#[^0-9]#',substr($tp_number,0,10))){
        return true;
  }else {
    return false;
  }
}else {
  return false;
}
}

function has_inclusion_in($value,$set){
  return in_array($value,$set);
}



 ?>
