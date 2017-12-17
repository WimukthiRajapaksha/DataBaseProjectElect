<?php //include("../Include/functions.php") ?>
<?php //require_once("../Include/session.php"); ?>
<?php //require_once("../Include/validation_functions.php") ?>
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

<div id="back" class="grad1">
  <br><br><br><br>
<style media="screen">
table {
  border-collapse: separate;
  border-spacing: 80px 0;
}

td {
  padding: 10px 0;
}
</style>
 <?php include("../Public/PHP/payments.php") ?>
    <h2>Payments</h2>
<?php  if($_SESSION['user_logged_in']==1){
echo"<div class=\"container-fluid\">";
  echo"<div class=\"row\">";
    echo"<form class=\"form-horizontal\" action=\"payment.php\" method=\"post\">";
        echo"<div class=\"form-group\">";
        echo"<label for=\"inputCatogory3\" class=\"col-sm-2 control-label\">Select Catogory</label>";
        echo"<div class=\"col-sm-10\">";
          echo"<select name=\"catogory\" placeholder=\"catogory\" required>";

        echo "<option value=\"\">select</option>";
        echo "<option value=\"paynow\">Pay Now</option>";
        echo "<option value=\"all\">Payment History</option>";


     echo"</select>";
        echo"</div>";
      echo"</div>";

 echo"<div class=\"form-group\">";
   echo"<div class=\"col-sm-offset-2 col-sm-10\">";
     echo"<button type=\"submit\"name=\"catogorySubmit\" class=\"btn btn-primary btn-lg\" data-toggle=\"modal\" data-target=\"#myModal\">";
  echo"Submit";
echo"</button>";

   echo"</div>";
 echo"</div>";
echo"</form>";
echo"</div>";
echo"</div>";
}
?>



 <?php

 if(isset($_SESSION['catogory'])){
   if($_SESSION['catogory']==='paynow'){
     echo "<h3>Pay Now</h3>";
     echo"<div class=\"container-fluid\">";
       echo"<div class=\"row\">";
         echo"<form class=\"form-horizontal\" action=\"payment.php\" method=\"post\">";
      echo"<div class=\"form-group\">";
        echo"<label for=\"inputPayment3\" class=\"col-sm-2 control-label\">Pay amount</label>";
        echo"<div class=\"col-sm-10\">";
          echo"<input type=\"number\" name=\"payment\" class=\"form-control\" id=\"inputPayment3\" placeholder=\"Payment\" value=\"\">";
        echo"</div>";
      echo"</div>";
      echo"<div class=\"form-group\">";
        echo"<div class=\"col-sm-offset-2 col-sm-10\">";
          echo"<button type=\"submit\"name=\"paymentSubmit\" class=\"btn btn-default\">Pay Now</button>";
              echo"</div>";
            echo"</div>";
          echo"</div>";

        echo"</div>";
    echo"</div>";
}if($_SESSION['catogory']==='all'){
  echo "<h3>Payment History</h3>";
  if (mysqli_num_rows($result3) > 0) {
      echo "<table><tr><th>Payment ID </th><th>Meter ID</th><th>Date Of Payment</th><th>Amount</th></tr>";
      // output data of each row
      while($row = $result3->fetch_assoc()) {
          echo "<tr><td>" . $row["payment_id"]. "</td><td>" . $row["meter_id"]. "</td><td> " . $row["date_of_payment"]. "</td><td> " . $row["amount_of_payment"]. "</td></tr>";
      }
      echo "</table>";
  } else {
      echo "0 results";
  }
}

}

print_r($_SESSION);
 ?>
<br><br><br>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>

</body>
</html>
