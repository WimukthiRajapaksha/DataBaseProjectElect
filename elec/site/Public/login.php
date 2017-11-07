<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php include("../Include/header1.php"); ?>
<?php require_once("../Include/dbConnection.php"); ?>
<li><a href="infex.php">Home</a></li>
<li><a href="contactUs.php">Contact Us</a></li>
<li><a href="aboutUs.php">About Us</a></li>
<li class="active"><a href="login.php">Log In</a></li>
<?php include("../Include/header2.php"); ?>
<link rel="stylesheet" href="CSS/login.css">

<?php
$user_name = "";
if(isset($_POST['submit'])){
  $required_fields = array("user_name","password");
  validate_presences($required_fields);

  if (empty($errors)) {
     //attempt Login

     $user_name = mysqli_real_escape_string($connection,$_POST["user_name"]);
     $password = mysqli_real_escape_string($connection,$_POST["password"]);
     $found_user = attempt_login($user_name,$password);
     if(found_user){
       //success
       //mark user as logged in
       $_SESSION["user_id"] = $found_user["id"];
       $_SESSION["user_name"] = $found_user["user_name"];
       redirect_to("userProfile.php");
     }else {
       //failure
       $_SESSION["message"] = "Username/password not found. ";
     }
  }else {

  }
}

 ?>
 <?php if(!empty($message)){echo "<div class = \"message\">.$message </div>"; }?>
 <?php echo form_errors($errors); ?>

</div>
<body>
  <form action="login.php" method="post">
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>

			<div class="login-form">
				<div class="control-group">
				<input type="text" name="user_name" class="login-field" value="<?php echo htmlentities($user_name); ?>" placeholder="username" id="login-name">
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" name="password" class="login-field" value="" placeholder="password" id="login-pass">
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>

				<input class="btn btn-primary btn-large btn-block" type="submit" name="submit" value="Login"/>
				<a class="login-link" href="#">Lost your password?</a>
			</div>
		</div>
	</div>
</form>
</body>
<?php include("../Include/footer.php"); ?>
