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

<?php include("../Public/PHP/create_report.php") ?>
<h2>Total Energy comsumption of this year</h2>
<br>
<?php echo "<h3>Total Units = {$total_units}</h3>"; ?>
<h4>Month wise</h4>
January
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 0em; width:<?php echo $final_january_units;?>%">
    <?php echo $january_tot_units; ?>
  </div>
</div>
Fubruary
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 0em; width:<?php echo $final_february_units;?>%">
    <?php echo $february_tot_units; ?>
  </div>
</div>
March
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 0em; width:<?php echo $final_march_units;?>%">
    <?php echo $march_tot_units; ?>
  </div>
</div>
April
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 0em; width:<?php echo $final_april_units;?>%">
    <?php echo $april_tot_units; ?>
  </div>
</div>
May
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 0em; width:<?php echo $final_may_units;?>%">
    <?php echo $may_tot_units; ?>
  </div>
</div>
June
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 0em; width:<?php echo $final_june_units;?>%">
    <?php echo $june_tot_units; ?>
  </div>
</div>
July
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 0em; width:<?php echo $final_july_units;?>%">
    <?php echo $july_tot_units; ?>
  </div>
</div>
August
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 0em; width:<?php echo $final_august_units;?>%">
    <?php echo $august_tot_units; ?>
  </div>
</div>
September
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 0em; width:<?php echo $final_september_units;?>%">
    <?php echo $september_tot_units; ?>
  </div>
</div>
October
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 0em; width:<?php echo $final_october_units;?>%">
    <?php echo $october_tot_units; ?>
  </div>
</div>
November
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 0em; width:<?php echo $final_november_units;?>%">
    <?php echo $november_tot_units; ?>
  </div>
</div>
December
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 0em; width:<?php echo $final_december_units;?>%">
    <?php echo $december_tot_units; ?>
  </div>
</div>
<br><br><br>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>

</body>
</html>
