<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/functions.php"); ?>
<?php //include("../Include/header1.php"); ?>
<?php require_once("../Include/dbConnection.php"); ?>
<li><a href="infex.php">Home</a></li>
<li><a href="contactUs.php">Contact Us</a></li>
<li><a href="aboutUs.php">About Us</a></li>
<li><a href="login.php">Log In</a></li>
<?php //include("../Include/header2.php"); ?>

<br>
<br>
<br>
<br>
<br><br><b></b><br><b></b>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Manage Student</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="CSS/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="CSS/style1.css" rel="stylesheet">
    <link href="CSS/manageEmp.css" rel="stylesheet">
</head>

<body>

<div class="header">
    

<div class="detail">



        <form action="" method="POST">

            <ul>
                <li>
                    <label for="Name"> Student Name : </label>

                    <input type ="text" id="sName" name="sName" required value= '<?php echo $suser;?>'> <br/>
                </li>
                <li>
                    <label for="ID">ID : </label>
                    <input type ="text" id="sID" name="sID" required value= '<?php echo $sID;?>'> <br/>
                </li>

                <li>
                    <label for="Address">Address: </label>
                    <input type="text" id="Address" name="Address" required  value='<?php echo $saddress;?>' ><br/>
                </li>


                <li>
                    <label for="Room Number"><b>Room Number :</b></label>
                    <input type="number" id="Room Number" name="Room Number" required value='<?php echo $room;?>'><br/>
                </li>
                <li>
                    <label for="Hall Number"><b>Hall Number :</b></label>
                    <input type="number" id="Hall Number" name="Hall Number" required value='<?php echo $hall;?>'><br/>
                </li>
                <li>
                    <label for="ContactNo">Contact Number : </label>
                    <input type ="tel" id="ContactNo" name="ContactNo" required value=  '<?php echo $scontact;?>'> <br/>
                </li>
                <li>
                    <label for="Email">E-Mail : </label>
                    <input type="email" id="sEmail" name="sEmail" required value= '<?php echo $semail;?>' ><br/>

                </li>

                <li>
                    <label for="Email">Gender: </label>
                    <input type="text"  name="gender" required value= '<?php echo $sgender;?>' ><br/>
                </li>


            </ul>
            <button type ="submit" name="submit" class="btn btn-success" value="Update"> UPDATE</button>
        </form>

</div>



<!-- /Start your project here-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
