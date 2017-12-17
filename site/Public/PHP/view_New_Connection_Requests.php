<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php require_once("../Include/dbConnection.php"); ?>

<?php
//$user = find_user_by_user_name($_SESSION['login_user']);
if(!isset($_SESSION['logged_in'])){
  redirect_to("login2.php");
}
print_r($_SESSION['login_user']);
global $connection;

if($_SESSION['type']==='admin'){

    if (!isset($_SESSION['admin_logged_in'])) {
      redirect_to("login2.php");
    }

    if(isset($_POST["back"])){
      redirect_to("profile.php");
    }
  }
    ?>
    <?php
    if(isset($_POST["catogorySubmit"])){
      $catogory = mysqli_real_escape_string($connection,$_POST['catogory']);
      print_r($catogory);
      $_SESSION['catogory']=$catogory;
      if($_SESSION['catogory']==='notchecked'){
        $query = "SELECT * FROM adminrequestview WHERE approval = 'not checked' ORDER BY req_id";
      }elseif($_SESSION['catogory']==='approved'){
        $query = "SELECT * FROM adminrequestview WHERE approval = 'approved'ORDER BY req_id";
      }elseif($_SESSION['catogory']==='rejected'){
        $query = "SELECT * FROM adminrequestview WHERE approval = 'rejected'ORDER BY req_id";
      }else{
        $query = "SELECT * FROM adminrequestview ORDER BY req_id";
      }
    }else{
      $query = "SELECT * FROM adminrequestview WHERE approval = 'not checked' ORDER BY req_id";
    }
    $result = mysqli_query($connection,$query);
    confirm_query($result);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Requset ID </th><th>Name</th><th>Address</th><th>NIC</th><th>Email</th><th>T.P.Number</th><th>Type Of Connection</th><th>Request Date</th><th>Approval</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["req_id"]. "</td><td>" . $row["name"]. "</td><td> " . $row["address"]. "</td><td> " . $row["nic"]. "</td><td> " . $row["email"]. "</td><td> " . $row["tele_number"]. "</td><td>" . $row["type_of_connection"]. "</td><td> " . $row["req_date"]. "</td><td> " . $row["approval"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
        $_SESSION['notification'] = null;
    }
      //print_r($_POST['catogory']);
      //redirect_to("viewNewConnectionRequests.php");

     ?>
<?php
if(isset($_POST['submit'])){
  print_r("hhhhhhh");
  $approval = mysqli_real_escape_string($connection,$_POST['approval']);
  $request_id = mysqli_real_escape_string($connection,$_POST['request_id']);

  $sql1 = "UPDATE connection_req SET approval='$approval'WHERE req_id='$request_id'";
  $update_set1=mysqli_query($connection,$sql1);
  confirm_query($update_set1);


}
?>
