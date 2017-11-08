<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
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
     <div class="topImage">
     <br>
     <br>
     </div>
<div id="back" class="grad1">
    <?php
      if (!isset($_SESSION['admin_logged_in'])) {
        redirect_to("login2.php");
      }
     ?>
     <?php
      if(isset($_POST["back"])){
        redirect_to("adminProfile.php");
      }
      ?>
      <?php
      //$user = find_user_by_user_name($_SESSION['login_user']);
      print_r($_SESSION['login_user']);
      global $connection;
      $safe_user_name = mysqli_real_escape_string($connection,'.{$_SESSION['login_user']}.');
      $query =  "SELECT * FROM administrator WHERE user_name = '$safe_user_name'";
      $user_set = mysqli_query($connection,$query);
      confirm_query($user_set);
      $user = mysqli_fetch_assoc($user_set);
      $name=$user["name"];
      $address=$user["name"];
      $nic=$user["name"];
      $tp_number=$user["name"];
      $email=$user["name"];
      $user_name=$user["name"];
       ?>
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
        <label for="inputPassword3" class="col-sm-2 control-label">Current Password</label>
        <div class="col-sm-10">
          <input type="password" name="password"class="form-control" id="inputPassword3" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <label for="inputReEnterPassword3" class="col-sm-2 control-label">New Password</label>
        <div class="col-sm-10">
          <input type="password" name = "re_enter_password" class="form-control" id="inputReEnterPassword3" placeholder="Re Enter Password">
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

  </body>
</html>
