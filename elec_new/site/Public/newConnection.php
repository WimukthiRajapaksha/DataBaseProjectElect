<?php include("../Include/header1.php"); ?>
<?php require_once("../Include/dbConnection.php"); ?>
<li><a href="infex.php">Home</a></li>
<li><a href="contactUs.php">Contact Us</a></li>
<li><a href="aboutUs.php">About Us</a></li>
<li><a href="login2.php">Log In</a></li>
<?php include("../Include/header2.php"); ?>
<?php
$sql="SELECT * FROM connection_type";
$result = mysqli_query($connection, $sql);

?>



    </div>
    <br>
    <br>
    <br>
    <br>

     <div class="container-fluid">
       <div class="row">
         <form class="form-horizontal" action="" method="">

           <div class="form-group">
             <label for="inputName3" class="col-sm-2 control-label">Name</label>
             <div class="col-sm-10">
               <input type="text" name="name"class="form-control" id="inputName3" placeholder="Name">
             </div>
           </div>
           <div class="form-group">
             <label for="inputAddress3" class="col-sm-2 control-label">Address</label>
             <div class="col-sm-10">
               <input type="text" name="address"class="form-control" id="inputAddress3" placeholder="Address">
             </div>
           </div>
           <div class="form-group">
             <label for="inputNIC3" class="col-sm-2 control-label">NIC</label>
             <div class="col-sm-10">
               <input type="text" name="nic"class="form-control" id="inputNIC3" placeholder="NIC">
             </div>
           </div>
           <div class="form-group">
             <label for="inputTelephoneNumber3" class="col-sm-2 control-label">T.P.Number</label>
             <div class="col-sm-10">
               <input type="text"name="tp_number" class="form-control" id="inputTelephoneNumber3" placeholder="Telephone Number">
             </div>
           </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="email" name="email"class="form-control" id="inputEmail3" placeholder="Email">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Type of connection</label>
        <div class="col-sm-10">
          <select name="reason" placeholder="type_of_connection">
    <?php
    while($row = mysqli_fetch_array($result))
  {
    echo '<option value='.$row['type_of_connection'].'>'.$row['type_of_connection'].'</option>';
      }
?>
<?php
mysqli_free_result($result);
 ?>
    </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit"name="submit" class="btn btn-default">Request</button>

        </div>
      </div>
    </form>
    </div>
    </div>
    <?php include("../Include/footer.php"); ?>

<?php
if(isset($connection)){
  mysqli_close($connection);
}

 ?>
