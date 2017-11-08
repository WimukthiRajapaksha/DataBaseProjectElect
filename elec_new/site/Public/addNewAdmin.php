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
     <div class="container-fluid">
       <div class="row">
         <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

      <div class="form-group">
        <label for="inputUserName3" class="col-sm-2 control-label">User Name</label>
        <div class="col-sm-10">
          <input type="text" name="user_name" class="form-control" id="inputUserName3" placeholder="User Name" value="">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Type of connection</label>
        <div class="col-sm-10">
          <select name="reason" placeholder="type_of_connection">
          <option value="volvo">admin</option>
          <option value="saab">billOperator</option>
          </select>
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
