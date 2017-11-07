<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php include("../Include/header1.php"); ?>
<?php require_once("../Include/dbConnection.php"); ?>
<li><a href="infex.php">Home</a></li>
<li><a href="contactUs.php">Contact Us</a></li>
<li><a href="aboutUs.php">About Us</a></li>
<li><a href="login.php">Log In</a></li>
<?php include("../Include/header2.php"); ?>
<link rel="stylesheet" href="CSS/mystyles.css">
<br>
<br>
<br>
<br>
<?php
$name=null;
$address=null;
$nic=null;
$tp_number=null;
$email=null;
$user_name=null;
if(isset($_POST['submit'])){
$name       = test_input($_POST["name"]);
$address    = mysqli_real_escape_string($connection,$_POST["address"]);
$nic        = test_input($_POST["nic"]);
$tp_number  = test_input($_POST["tp_number"]);
$email      = test_input($_POST["email"]);
$user_name  = test_input($_POST["user_name"]);
$password   = test_input($_POST["password"]);
$repassword = test_input($_POST["re_enter_password"]);

//validation
$required_fields = array("name","address","nic","tp_number","email","user_name","password","re_enter_password");
validate_presences($required_fields);

//$fields_with_equal_lengths = array('nic' => 10,'tp_number'=> 10 );
//$nic_with_required_length = array('nic' => 10);
//$tp_with_required_length = array('tp_number' => 10);
if (!nic_validation($nic)){
  $errors['nic']="NIC Not in correct format";
}
if (!tp_validation($tp_number)){
  $errors['tp_number']="T.P. Number Not in correct format";
}
//validate_equal_lengths($fields_with_equal_lengths);
if (validate_user_name($user_name)){
  $message = "User name already exist. Try new one.";
  $errors['user_name']= "USER name already exist.";
}
if (find_user_by_id($nic)) {
  $message = " You already has an account.";
}
if (!validate_equal_password($password,$repassword)){
  $errors["re_enter_password"]= "password do not match";
}
if (empty($errors)){
$hashed_password = password_encryption($password);
//$hashed_password  = sha1 ($password);
$query  = "INSERT INTO user (name,address,nic,tp_number,email,user_name,password) VALUES('{$name}','{$address}','{$nic}','{$tp_number}','{$email}','{$user_name}','{$hashed_password}')";

$result = mysqli_query($connection,$query);
confirm_query($result);
if(isset($result) && mysqli_affected_rows($connection)==1){
  $message="User Added";
  //redirect_to("payment.php");
  //echo "user added";
}else {
  $message="Error";
  //redirect_to("payment.php");
  //echo "Error";
}
}
}
else{
  //redirect_to("payment.php");
}
?>
 <?php if(!empty($message)){echo "<div class = \"message\">.$message </div>"; }?>
 <?php echo form_errors($errors); ?>

<?php print_r($address); ?>
 <div class="container-fluid">
   <div class="row">
     <form class="form-horizontal" action="createAccount.php" method="post">

       <div class="form-group">
         <label for="inputName3" class="col-sm-2 control-label">Name</label>
         <div class="col-sm-10">
           <input type="text" name="name"class="form-control" id="inputName3" placeholder="Name" value="<?php echo $name; ?>">
         </div>
       </div>
       <div class="form-group">
         <label for="inputAddress3" class="col-sm-2 control-label">Address</label>
         <div class="col-sm-10">
           <input type="text" name="address"class="form-control" id="inputAddress3" placeholder="Address" value="<?php echo test_input($address); ?>">
         </div>
       </div>
       <div class="form-group">
         <label for="inputNIC3" class="col-sm-2 control-label">NIC</label>
         <div class="col-sm-10">
           <input type="text" name="nic"class="form-control" id="inputNIC3" placeholder="NIC" value="<?php echo $nic; ?>">
         </div>
       </div>
       <div class="form-group">
         <label for="inputTelephoneNumber3" class="col-sm-2 control-label">T.P.Number</label>
         <div class="col-sm-10">
           <input type="text"name="tp_number" class="form-control" id="inputTelephoneNumber3" placeholder="Telephone Number" value="<?php echo $tp_number; ?>">
         </div>
       </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email"class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo $email; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputUserName3" class="col-sm-2 control-label">User Name</label>
    <div class="col-sm-10">
      <input type="text" name="user_name" class="form-control" id="inputUserName3" placeholder="User Name" value="<?php echo $user_name; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password"class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputReEnterPassword3" class="col-sm-2 control-label">ReEnterPassword</label>
    <div class="col-sm-10">
      <input type="password" name = "re_enter_password" class="form-control" id="inputReEnterPassword3" placeholder="Re Enter Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit"name="submit" class="btn btn-default">Create Account</button>

          </div>
        </div>
      </div>

    </div>
  </div>
</form>
</div>
</div>

</div>

   </div>

 <?php include("../Include/footer.php"); ?>
