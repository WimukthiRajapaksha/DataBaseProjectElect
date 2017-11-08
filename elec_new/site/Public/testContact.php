<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/functions.php"); ?>
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
<?php echo message(); ?>
<?php $errors = errors(); ?>
<?php echo form_errors($errors); ?>

 <div class="container-fluid">
   <div class="row">
     <form class="form-horizontal  createAccountPadding" action="insertUser.php" method="post">

       <div class="form-group">
         <label for="inputName3" class="col-sm-2 control-label">Name</label>
         <div class="col-sm-10">
           <input type="text" name="name"class="form-control" id="inputName3" placeholder="Name" value="<?php if(isset($_POST['submit'])){ echo htmlentities($_POST["name"]);}?>">
         </div>
       </div>
       <div class="form-group">
         <label for="inputAddress3" class="col-sm-2 control-label">Address</label>
         <div class="col-sm-10">
           <input type="text" name="address"class="form-control" id="inputAddress3" placeholder="Address">
         </div>
       </div>
       <div class="form-group">
         <label for="inputNIC3" class="col-sm-2 control-label">NIC</label>
         <div class="col-sm-10">
           <input type="text" name="nic"class="form-control" id="inputNIC3" placeholder="NIC">
         </div>
       </div>
       <div class="form-group">
         <label for="inputTelephoneNumber3" class="col-sm-2 control-label">T.P.Number</label>
         <div class="col-sm-10">
           <input type="text"name="tp_number" class="form-control" id="inputTelephoneNumber3" placeholder="Telephone Number">
         </div>
       </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email"class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password"class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputReEnterPassword3" class="col-sm-2 control-label">Re Enter Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputReEnterPassword3" placeholder="Re Enter Password">
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
