<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php
$_SESSION['login_user'] = null;
$_SESSION['admin_logged_in']= null;
$_SESSION['user_logged_in']=null;
redirect_to("login2.php");

 ?>
