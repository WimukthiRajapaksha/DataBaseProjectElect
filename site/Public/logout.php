<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php
$_SESSION['login_user'] = null;
$_SESSION['admin_logged_in']= null;
$_SESSION['user_logged_in']=null;
$_SESSION['billOperator_logged_in']=null;
$_SESSION['logged_in']=null;
$_SESSION['user_id']=null;
$_SESSION['bill_catogory']=null;
$_SESSION['red_notification']=null;
$_SESSION['bill_type']=null;
$_SESSION['catogory']=null;
//$_SESSION['notification']=null;
redirect_to("login2.php");

 ?>
