<?php include("../Include/header1.php"); ?>
<?php require_once("../Include/dbConnection.php"); ?>
<?php include("../Include/header2.php"); ?>
<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php
if(!isset($_SESSION['logged_in'])){
  redirect_to("login2.php");
} ?>
<!DOCTYPE html>
 <html>
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

          <li><a href="logout.php">Log Out</a></li>;

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br>
<br>
<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav"><li><a href="#" class="navbar-brand">Ceylon Electricity Board</span></a></li>
        <li><a href="infex.php">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
<?php if($_SESSION['admin_logged_in']){
    echo "<li class=\"dropdown\">";
    echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Add New Users <span class=\"caret\"></span><span style=\"font-size:16px;\" class=\"pull-right hidden-xs showopacity glyphicon glyphicon-user\"></span></a>";
    echo "<ul class=\"dropdown-menu forAnimate\" role=\"menu\">";
      echo "<li><a href=\"addNewCustomer.php\">Customer</a></li>";
      echo "<li><a href=\"addNewBillOperator.php\">Bill Operator</a></li>";
      echo "<li><a href=\"addNewAdmin.php\">Admin</a></li>";
    echo "</ul>";
      echo "</li>";
    echo "<li ><a href=\"viewNewConnectionRequests.php\">Connection Requests<span style=\"font-size:16px;\" class=\"pull-right hidden-xs showopacity glyphicon glyphicon-th-list\"></span></a></li>";
    echo "<li ><a href=\"meterReader.php\">Meter Reader<span style=\"font-size:16px;\" class=\"pull-right hidden-xs showopacity glyphicon glyphicon-tags\"></span></a></li>";
    echo "<li ><a href=\"billinfo.php\">Bill Info<span style=\"font-size:16px;\" class=\"pull-right hidden-xs showopacity glyphicon glyphicon-tags\"></span></a></li>";
echo "<li ><a href=\"report.php\">Monitor Energy Consumption<span style=\"font-size:16px;\" class=\"pull-right hidden-xs showopacity glyphicon glyphicon-tags\"></span></a></li>";
    echo "<li ><a href=\"editAdmin.php\">Edit Profile<span style=\"font-size:16px;\" class=\"pull-right hidden-xs showopacity glyphicon glyphicon-tags\"></span></a></li>";

}elseif ($_SESSION['user_logged_in']) {
  echo "<li ><a href=\"billInfo.php\">Bill Info<span style=\"font-size:16px;\" class=\"pull-right hidden-xs showopacity glyphicon glyphicon-tags\"></span></a></li>";
  echo "<li ><a href=\"payment.php\">Payment<span style=\"font-size:16px;\" class=\"pull-right hidden-xs showopacity glyphicon glyphicon-tags\"></span></a></li>";
  echo "<li ><a href=\"editAccount.php\">Edit Profile<span style=\"font-size:16px;\" class=\"pull-right hidden-xs showopacity glyphicon glyphicon-tags\"></span></a></li>";

}elseif ($_SESSION['billOperator_logged_in']) {
  echo "<li ><a href=\"meterReader.php\">Meter Reader<span style=\"font-size:16px;\" class=\"pull-right hidden-xs showopacity glyphicon glyphicon-tags\"></span></a></li>";
  echo "<li ><a href=\"editBillOperator.php\">Edit Profile<span style=\"font-size:16px;\" class=\"pull-right hidden-xs showopacity glyphicon glyphicon-tags\"></span></a></li>";
} ?>
        </ul>
    </div>
  </div>
</nav>
<br><br><br><br>


<div id="myCarousel" class="carousel slide indent">
<h2><?php  echo($_SESSION['login_user']." logged in as ".$_SESSION['type']);?></h2>
  <ol class="carousel-indicators">
    <li data-target ="#myCarousel" data-slide-to ="0" class="active"></li>
    <li data-target ="#myCarousel" data-slide-to ="1"></li>
    <li data-target ="#myCarousel" data-slide-to ="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
      <img src="img/index4.jpg" alt="City" class="img-responsive">
    </div>
    <div class="item">
      <img src="img/index2.jpg" alt="City" class="img-responsive">
    </div>
    <div class="item">
      <img src="img/index1.jpg" alt="City" class="img-responsive">
    </div>
    <script script type="text/javascript">
      $('#myCarousel').carousel({interval:1000})
    </script>﻿
  </div>
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
  </a>
  <?php if($_SESSION['admin_logged_in']){

    if (isset($_SESSION['notification'])){
      echo "<h2>Notifications</h2><br>";
      echo "<ul><li><a href=\"viewNewConnectionRequests.php\">New connection requests</a></li></ul>";
  }
  if(isset($_SESSION['catogory'])){
    $_SESSION['catogory']=null;
  }
  if(isset($_SESSION['bill_type'])){
    $_SESSION['bill_type']=null;
  }
}
if($_SESSION['user_logged_in']){
  if(isset($_SESSION['bill_catogory'])){
    $_SESSION['bill_catogory']=null;
  }
  if (isset($_SESSION['red_notification'])){
    echo "<h2>Notifications</h2><br>";
    echo "<ul><li><a href=\"billInfo.php\">You have Passed credit limit for your connection</a></li></ul>";
}
}
?>
</div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>


</body>
</html>
