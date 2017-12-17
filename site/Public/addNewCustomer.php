
<?php include("../Include/header1.php"); ?>
<?php require_once("../Include/dbConnection.php"); ?>
<?php include("../Include/header2.php"); ?>
<?php //include("../Include/functions.php") ?>
<link rel="stylesheet" href="CSS/mystyles.css"> <html>
   <head>
     <meta charset="utf-8">
      <link rel="stylesheet" href="bootstrap.min.css">
    <!--  <link href="css/style.css" rel="stylesheet">-->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="CSS/mystyles.css">
<link rel="stylesheet" type="text/css" href="CSS/profile.css">
     <title>Ceylon Electricity Board</title>

   </head>
   <body>

     <nav class="navbar navbar-default  ">
  <div class="container-fluid " >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header navbarpic" >

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
  </button>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


      <ul class="nav navbar-nav navbar-right " >

          <li><a href="profile.php">Back</a></li>;

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br>
<br><br>
<h2>Add new Customer</h2>

<?php include("../Public/PHP/create_Account.php") ?>

 <div class="container-fluid">
   <div class="row">
     <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

       <div class="form-group">
         <div class="form-group">
           <label for="inputFName3" class="col-sm-2 control-label">First Name</label>
           <div class="col-sm-10">
             <input type="text" name="first_name"class="form-control" id="inputFName3" placeholder="First Name" value="<?php echo $first_name; ?>">
           </div>
         </div>
         <div class="form-group">
           <label for="inputLName3" class="col-sm-2 control-label">Last Name</label>
           <div class="col-sm-10">
             <input type="text" name="last_name"class="form-control" id="inputLName3" placeholder="Last Name" value="<?php echo $last_name; ?>">
           </div>
         </div>
    <div class="form-group">
      <label for="inputStreet3" class="col-sm-2 control-label">Street</label>
      <div class="col-sm-10">
        <input type="text" name="street"class="form-control" id="inputStreet3" placeholder="Street" value="<?php echo test_input($street); ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputTown3" class="col-sm-2 control-label">Town</label>
      <div class="col-sm-10">
        <input type="text" name="town"class="form-control" id="inputTown3" placeholder="Town" value="<?php echo test_input($town); ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputCity3" class="col-sm-2 control-label">City</label>
      <div class="col-sm-10">
        <input type="text" name="city"class="form-control" id="inputCity3" placeholder="City" value="<?php echo test_input($city); ?>">
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
    <label for="inputPassword3" class="col-sm-2 control-label">Type of connection</label>
    <div class="col-sm-10">
      <select name="type_of_connection" placeholder="type_of_connection" required>
        <option value="">None</option>
<?php

while($row = mysqli_fetch_array($result))
{
echo '<option value='.$row['type_of_connection'].'>'.$row['type_of_connection'].'</option>';
  }
?>

</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputMeterID3" class="col-sm-2 control-label">Meter ID</label>
    <div class="col-sm-10">
      <input type="number" name="meter_id"class="form-control" id="inputMeterID3" placeholder="Meter ID" value="<?php echo $meter_id; ?>">
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
      <button type="submit"name="customerSubmit" class="btn btn-default">Create Account</button>
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
    <?php if(!empty($message)){echo "<script type='text/javascript'>alert(\"$message\");</script>"; }?>
    <?php echo form_errors($errors); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>


   </body>
   </html>

 <?php include("../Include/footer.php"); ?>
