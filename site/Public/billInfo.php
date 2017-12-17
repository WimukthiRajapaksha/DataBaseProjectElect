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
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta http-equiv="x-ua-compatible" content="ie=edge">

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
   <style media="screen">
   table {
     border-collapse: separate;
     border-spacing: 80px 0;
   }
   th{
     font-weight: bold;
     font-size: 40px;
   }
   td {
     padding: 10px 0;
   }
   </style>

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
<?php include("../Public/PHP/bill_info.php") ?>
<?php
/**/if($_SESSION['admin_logged_in']){
echo"<div class=\"header\"></div>";
      echo"<form class=\"form-horizontal\" action=\"billinfo.php\" method=\"post\">";
          echo"<div class=\"form-group\">";
          echo"<label for=\"inputCatogory3\" class=\"col-sm-2 control-label\">Select Catogory</label>";
          echo"<div class=\"col-sm-10\">";
            echo"<select name=\"catogory\" placeholder=\"catogory\" required>";

          echo "<option value=\"\">Select</option>";
          echo "<option value=\"searchBill\">Search</option>";
          echo "<option value=\"allBill\">All bill info</option>";


       echo"</select>";
          echo"</div>";
        echo"</div>";

      echo"<div class=\"form-group\">";
      echo"<div class=\"col-sm-offset-2 col-sm-10\">";
       echo"<button type=\"submit\"name=\"catogorySubmit\" class=\"btn btn-default\">Submit</button>";

      echo"</div>";
      echo"</div>";
      echo"</form>";


  if($_SESSION['bill_type'] =="searchBill"){
      echo"<form class=\"navbar-form navbar-left\" action =\"billInfo.php\" method = \"post\">";
       echo"<div class=\"form-group\">";
         echo"<input  type=\"number\" class=\"search\"type=\"text\" name = \"search_by_meter_id\" class=\"form-control\" placeholder=\"Search by meter ID\" required>";
       echo"</div>";
       echo"<button type=\"submit\" class=\"btn btn-default\" name = \"search\">Search</button>";
     echo"</form>";
echo"<br>";echo"<br>";echo"<br>";
if(isset($_POST['search'])){
  if(mysqli_num_rows($result2)==1){
      $result_set2 = mysqli_fetch_array($result2);
      $meter_id = $result_set2['meter_id'];
      $street = $result_set2['street'];
      $town = $result_set2['town'];
      $city = $result_set2['city'];
      $address = $street." ".$town." ".$city;
      $final_cost = $result_set2['balance'];
      $units = $result_set2['units'];
      $monthly_cost = $result_set2['monthly_cost'];
      $start_date  =$result_set2['start_date'];
      $end_date = $result_set2['end_date'];
      $paid = $result_set2['paid'];
      if($paid == 0){
        $status = test_input(mysqli_real_escape_string($connection,"NotPayed"));
      }else{
        $status = "Payed";
      }
      $balance = $final_cost - $monthly_cost;

          echo"<div class=\"detail\">";

             echo"<form >";

                 echo"<ul>";
                     echo"<li>";
                         echo"<label for=\"MeterID\"> Meter ID : </label>";

                         echo"<input type =\"text\" id=\"meter_id\" name=\"meter_id\" readonly required value= $meter_id ><br/>";
                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"Address\">Address: </label>";
                         echo"<input type=\"text\" id=\"Address\" name=\"Address\" required readonly value= '{$address}' ><br/>";

                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"Start_date\">Start Date : </label>";
                         echo"<input type =\"text\" id=\"Start_date\" name=\"Start_date\" required readonly value= $start_date> <br/>";
                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"End_date\">End Date : </label>";
                         echo"<input type =\"text\" id=\"End_date\" name=\"End_date\" required  readonly value=$end_date> <br/>";
                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"Units\"><b>Number of units used :</b></label>";
                         echo"<input type=\"number\" id=\"Units\" name=\"Units\" required readonly value=$units><br/>";
                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"Monthly_cost\"><b>Monthly Cost :</b></label>";
                         echo"<input type=\"number\" id=\"monthly_cost\" name=\"monthly_cost\" required readonly value=$monthly_cost><br/>";
                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"Balance\"><b>Balance :</b></label>";
                         echo"<input type=\"number\" id=\"balance\" name=\"balance\" required  readonly value=$balance><br/>";
                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"Final_cost\"><b>Amount to be Payed :</b></label>";
                         echo"<input type=\"number\" id=\"final_cost\" name=\"final_cost\" required readonly value=$final_cost><br/>";
                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"Status\"><b>Status :</b></label>";
                         echo"<input type=\"text\" id=\"status\" name=\"status\" required readonly value=$status><br/>";
                     echo"</li>";
             echo"</form>";
             echo"</div>";
   }else{
     $error = "Invalid MeterID";
     echo "<script type='text/javascript'>alert(\"$error\");</script>";
   }
 }
}if($_SESSION['bill_type'] =="allBill"){
$query3 = "SELECT * FROM bill_history  ORDER BY bill_id";
$result3 = mysqli_query($connection,$query3);
confirm_query($result3);
if ($result3->num_rows > 0) {
    echo "<table><tr><th>Bill ID </th><th>Year</th><th>Month</th><th>Start Date</th><th>End Date</th><th>Units</th><th>Monthly Cost</th></tr>";
    // output data of each row
    while($row = $result3->fetch_assoc()) {
        echo "<tr><td>" . $row["bill_id"]. "</td><td>" . $row["year"]. "</td><td> " . $row["month"]. "</td><td> " . $row["start_date"]. "</td><td> " . $row["end_date"]. "</td><td> " . $row["units"]. "</td><td>" . $row["monthly_cost"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
    //$_SESSION['notification'] = null;
}

}
 }
?>

<?php if($_SESSION['user_logged_in']){
if(isset($_SESSION['bill_catogory'])){
if($_SESSION['bill_catogory']=="currentBill"){
  echo"<form class=\"form-horizontal\" action=\"billinfo.php\" method=\"post\">";
      echo"<div class=\"form-group\">";
      echo"<label for=\"inputCatogory3\" class=\"col-sm-2 control-label\">Select Catogory</label>";
      echo"<div class=\"col-sm-10\">";
        echo"<select name=\"billcatogory\" placeholder=\"billcatogory\" required>";

      echo "<option value=\"\">Select</option>";
      echo "<option value=\"currentBill\">current bill</option>";
      echo "<option value=\"all\">all</option>";


   echo"</select>";
      echo"</div>";
    echo"</div>";

  echo"<div class=\"form-group\">";
  echo"<div class=\"col-sm-offset-2 col-sm-10\">";
   echo"<button type=\"submit\"name=\"catogorySubmit\" class=\"btn btn-default\">Submit</button>";

  echo"</div>";
  echo"</div>";
  echo"</form>";


  echo"<h2>Current Bill</h2>";
echo"<div class=\"header\"></div>";


echo"<div class=\"detail\">";



        echo"<form >";

            echo"<ul>";
                echo"<li>";
                    echo"<label for=\"MeterID\"> Meter ID : </label>";

                    echo"<input type =\"text\" id=\"meter_id\" name=\"meter_id\" readonly required value= $meter_id ><br/>";
                echo"</li>";
                echo"<li>";
                    echo"<label for=\"Address\">Address: </label>";
                    echo"<input type=\"text\" id=\"Address\" name=\"Address\" required readonly value= '{$address}' ><br/>";

                echo"</li>";
                echo"<li>";
                    echo"<label for=\"Start_date\">Start Date : </label>";
                    echo"<input type =\"text\" id=\"Start_date\" name=\"Start_date\" required readonly value= $start_date> <br/>";
                echo"</li>";
                echo"<li>";
                    echo"<label for=\"End_date\">End Date : </label>";
                    echo"<input type =\"text\" id=\"End_date\" name=\"End_date\" required  readonly value=$end_date> <br/>";
                echo"</li>";
                echo"<li>";
                    echo"<label for=\"Units\"><b>Number of units used :</b></label>";
                    echo"<input type=\"number\" id=\"Units\" name=\"Units\" required readonly value=$units><br/>";
                echo"</li>";
                echo"<li>";
                    echo"<label for=\"Monthly_cost\"><b>Monthly Cost :</b></label>";
                    echo"<input type=\"number\" id=\"monthly_cost\" name=\"monthly_cost\" required readonly value=$monthly_cost><br/>";
                echo"</li>";
                echo"<li>";
                    echo"<label for=\"Balance\"><b>Balance :</b></label>";
                    echo"<input type=\"number\" id=\"balance\" name=\"balance\" required  readonly value=$balance><br/>";
                echo"</li>";
                echo"<li>";
                    echo"<label for=\"Final_cost\"><b>Amount to be Payed :</b></label>";
                    echo"<input type=\"number\" id=\"final_cost\" name=\"final_cost\" required readonly value=$final_cost><br/>";
                echo"</li>";
                echo"<li>";
                    echo"<label for=\"Status\"><b>Status :</b></label>";
                    echo"<input type=\"text\" id=\"status\" name=\"status\" required readonly value=$status><br/>";
                echo"</li>";
        echo"</form>";

echo"</div>";

}
}else{
  echo"<form class=\"form-horizontal\" action=\"billinfo.php\" method=\"post\">";
      echo"<div class=\"form-group\">";
      echo"<label for=\"inputCatogory3\" class=\"col-sm-2 control-label\">Select Catogory</label>";
      echo"<div class=\"col-sm-10\">";
        echo"<select name=\"billcatogory\" placeholder=\"billcatogory\" required>";

      echo "<option value=\"\">Select</option>";
      echo "<option value=\"currentBill\">current bill</option>";
      echo "<option value=\"all\">all</option>";


   echo"</select>";
      echo"</div>";
    echo"</div>";

  echo"<div class=\"form-group\">";
  echo"<div class=\"col-sm-offset-2 col-sm-10\">";
   echo"<button type=\"submit\"name=\"catogorySubmit\" class=\"btn btn-default\">Submit</button>";

  echo"</div>";
  echo"</div>";
  echo"</form>";

}/*else{
     echo"<div class=\"header\"></div>";


     echo"<div class=\"detail\">";



             echo"<form >";

                 echo"<ul>";
                     echo"<li>";
                         echo"<label for=\"MeterID\"> Meter ID : </label>";

                         echo"<input type =\"text\" id=\"meter_id\" name=\"meter_id\" readonly required value= $meter_id> <br/>";
                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"Address\">Address: </label>";
                         echo"<input type=\"text\" id=\"Address\" name=\"Address\" required readonly value=$address><br/>";
                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"Start_date\">Start Date : </label>";
                         echo"<input type =\"text\" id=\"Start_date\" name=\"Start_date\" required readonly value= $start_date> <br/>";
                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"End_date\">End Date : </label>";
                         echo"<input type =\"text\" id=\"End_date\" name=\"End_date\" required  readonly value= $end_date> <br/>";
                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"Units\"><b>Number of units used :</b></label>";
                         echo"<input type=\"number\" id=\"Units\" name=\"Units\" required readonly value=$units><br/>";
                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"Monthly_cost\"><b>Monthly Cost :</b></label>";
                         echo"<input type=\"number\" id=\"monthly_cost\" name=\"monthly_cost\" required readonly value=$monthly_cost><br/>";
                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"Balance\"><b>Balance :</b></label>";
                         echo"<input type=\"number\" id=\"balance\" name=\"balance\" required  readonly value= $balance><br/>";
                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"Final_cost\"><b>Amount to be Payed :</b></label>";
                         echo"<input type=\"number\" id=\"final_cost\" name=\"final_cost\" required readonly value=$final_cost><br/>";
                     echo"</li>";
                     echo"<li>";
                         echo"<label for=\"Status\"><b>Status :</b></label>";
                         echo"<input type=\"text\" id=\"status\" name=\"status\" required readonly value= $status><br/>";
                     echo"</li>";
             echo"</form>";

     echo"</div>";
   }*/


}
?>

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
