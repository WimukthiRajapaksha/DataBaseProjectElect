<?php include("../Include/header1.php"); ?>
<?php require_once("../Include/dbConnection.php"); ?>
<?php include("../Include/header2.php"); ?>
<?php //include("../Include/functions.php") ?>
<?php //require_once("../Include/session.php"); ?>

<!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
      <link rel="stylesheet" href="bootstrap.min.css">
    <!--  <link href="css/style.css" rel="stylesheet">-->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="CSS/mystyles.css">
     <title>Ceylon Electricity Board</title>

   </head>
   <body>

<div id="back" class="grad1">
  <br><br><br>
  <h2>Edit Profile</h2>

<?php include("../Public/PHP/edit_Account.php") ?>
     <div class="container-fluid">
       <div class="row">
         <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

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
          <input type="text" name="nic"class="form-control" id="inputNIC3" maxlength="10" readonly placeholder="NIC" value="<?php echo $nic; ?>">
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
        <label for="inputPosition3" class="col-sm-2 control-label">Position</label>
        <div class="col-sm-10">
          <input type="text" name="position"class="form-control" id="inputPosition3" placeholder="Position" value="<?php echo $position; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="inputSalary3" class="col-sm-2 control-label">Salary</label>
        <div class="col-sm-10">
          <input type="number" name="salary"class="form-control" id="inputSalary3" placeholder="Salary" value="<?php echo $salary; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="inputUserName3" class="col-sm-2 control-label">User Name</label>
        <div class="col-sm-10">
          <input type="text" name="user_name" class="form-control" id="inputUserName3" placeholder="User Name" value="<?php echo $user_name; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Current Password</label>
        <div class="col-sm-10">
          <input type="password" name="password"class="form-control" id="inputPassword3" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <label for="inputNewPassword3" class="col-sm-2 control-label">New Password</label>
        <div class="col-sm-10">
          <input type="password" name = "new_password" class="form-control" id="inputNewPassword3" placeholder="New Password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit"name="submit" class="btn btn-default">Save Changes</button>
          <button type="submit"name="back" class="btn btn-default" href="adminProfile.php"><a href="adminProfile.php"></a>Back</button>

              </div>
            </div>
          </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
   <?php if(!empty($message)){echo "<script type='text/javascript'>alert(\"$message\");</script>"; }?>
   <?php //echo form_errors($errors); ?>
  </body>
</html>
