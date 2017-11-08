
<?php include("../Include/header1.php"); ?>
<?php require_once("../Include/dbConnection.php"); ?>
<li><a href="infex.php">Home</a></li>
<li><a href="contactUs.php">Contact Us</a></li>
<li><a href="aboutUs.php">About Us</a></li>
<li><a href="login2.php">Log In</a></li>
<?php include("../Include/header2.php"); ?>
<link rel="stylesheet" href="CSS/mystyles.css">
<br>
<br>
<br>
<br>
<?php include("../Public/PHP/create_Account.php") ?>
 <?php if(!empty($message)){echo "<div class = \"message\">.$message </div>"; }?>
 <?php echo form_errors($errors); ?>

<?php print_r($address); ?>
 <div class="container-fluid">
   <div class="row">
     <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

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
           <input type="text" name="nic"class="form-control" id="inputNIC3" maxlength="10"  placeholder="NIC" value="<?php echo $nic; ?>">
         </div>
       </div>
       <div class="form-group">
         <label for="inputTelephoneNumber3" class="col-sm-2 control-label">T.P.Number</label>
         <div class="col-sm-10">
           <input type="text"name="tp_number" class="form-control" id="inputTelephoneNumber3" maxlength="10" placeholder="Telephone Number" value="<?php echo $tp_number; ?>">
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
