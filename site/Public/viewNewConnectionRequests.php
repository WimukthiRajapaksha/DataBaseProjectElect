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

    <h2>New Connection Requests</h2>

<div class="container-fluid">
  <div class="row">
    <form class="form-horizontal" action="viewNewConnectionRequests.php" method="post">
        <div class="form-group">
        <label for="inputCatogory3" class="col-sm-2 control-label">Select Catogory</label>
        <div class="col-sm-10">
          <select name="catogory" placeholder="catogory">
        <?php
        //echo "<option value=\"select\">select</option>";
        echo "<option value=\"notchecked\">not checked</option>";
        echo "<option value=\"all\">all</option>";
        echo "<option value=\"approved\">approved</option>";
        echo "<option value=\"rejected\">rejected</option>";

       ?>

     </select>
        </div>
      </div>

 <div class="form-group">
   <div class="col-sm-offset-2 col-sm-10">
     <button type="submit"name="catogorySubmit" class="btn btn-default">Submit</button>

   </div>
 </div>
</form>
</div>
</div>

<?php

 ?>
 <?php include("../Public/PHP/view_New_Connection_Requests.php") ?>
 <?php
 if(isset($_SESSION['catogory'])){
   if($_SESSION['catogory']==='notchecked'){
     $query = "SELECT * FROM adminrequestview WHERE approval = 'not checked' ORDER BY req_id";
   }elseif($_SESSION['catogory']==='approved'){
     $query = "SELECT * FROM adminrequestview WHERE approval = 'approved' ORDER BY req_id";
   }elseif($_SESSION['catogory']==='rejected'){
     $query = "SELECT * FROM adminrequestview WHERE approval = 'rejected' ORDER BY req_id";
   }else{
     $query = "SELECT * FROM adminrequestview ORDER BY req_id";
   }
 }else{
   $query = "SELECT * FROM adminrequestview WHERE approval = 'not checked' ORDER BY req_id";
 }
 $result = mysqli_query($connection,$query);
 confirm_query($result);
 ?>
<br><br><br>
 <div class="container-fluid">
   <div class="row">
     <form class="form-horizontal" action="viewNewConnectionRequests.php" method="post">

       <div class="form-group">
         <label for="inputPassword3" class="col-sm-2 control-label">Request ID</label>
         <div class="col-sm-10">
           <select name="request_id" placeholder="request_id">
      <?php
      while($row = mysqli_fetch_array($result))
      {
      echo '<option value='.$row['req_id'].'>'.$row['req_id'].'</option>';
       }
      ?>

      </select>
         </div>
       </div>

       <div class="form-group">
         <label for="inputPassword3" class="col-sm-2 control-label">Approval</label>
         <div class="col-sm-10">
           <select name="approval" placeholder="approval">

        <option value="approved">approved</option>
        <option value="rejected">rejected</option>

      </select>
         </div>
       </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit"name="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
 </form>
 </div>
 </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>

</body>
</html>
