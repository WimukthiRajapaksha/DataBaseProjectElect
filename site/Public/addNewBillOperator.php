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
<div id="back" class="grad1">
  <br><br><br>
  <h2>Add new Bill Operator</h2>
<?php include("../Public/PHP/create_Account.php") ?>
     <div class="container-fluid">
       <div class="row">
         <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

      <div class="form-group">
        <label for="inputUserName3" class="col-sm-2 control-label">User Name</label>
        <div class="col-sm-10">
          <input type="text" name="user_name" class="form-control" id="inputUserName3" placeholder="User Name" value="<?php echo $user_name; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmployeeId3" class="col-sm-2 control-label">Employee ID</label>
        <div class="col-sm-10">
          <input type="text" name="employee_id" class="form-control" id="inputEmployeeId3" placeholder="Employee ID" value="<?php echo $employee_id; ?>">
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
          <button type="submit"name="billOperatorSubmit" class="btn btn-default">Create Account</button>

              </div>
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
