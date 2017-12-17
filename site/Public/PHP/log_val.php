<?php include("../Include/functions.php") ?>
<?php require_once("../Include/session.php"); ?>
<?php require_once("../Include/validation_functions.php") ?>
<?php require_once("../Include/dbConnection.php"); ?>

<?php

if(isset($_SESSION['login_user'])) {
    redirect_to("infex.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
 {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($connection,$_POST['username']);
    $mypassword = mysqli_real_escape_string($connection,$_POST['password']);

    $sql = "SELECT * FROM all_user WHERE user_name = '$myusername' and password =PASSWORD('$mypassword')";
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result);
    //$active = $row['active'];

    $count = mysqli_num_rows($result);


    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
        $_SESSION['login_user'] = $myusername;
        $_SESSION['type'] = $row["type"];
        $_SESSION['logged_in']=true;

        //header("location:userprofile.php ");
        if($row["type"]==="admin"){
          $_SESSION['admin_logged_in']= true;
          $_SESSION['user_logged_in']= false;
          $_SESSION['billOperator_logged_in']=false;
          redirect_to("profile.php");
        }
        elseif($row["type"]==="customer"){
          $_SESSION['user_logged_in']= true;
          $_SESSION['admin_logged_in']= false;
          $_SESSION['billOperator_logged_in']=false;
          $query1 = "SELECT balance FROM (bill NATURAL JOIN user_meter_con)NATURAL JOIN customer WHERE user_name='{$myusername}'";
          $result1 = mysqli_query($connection,$query1);
          confirm_query($result1);
          $result_set1 = mysqli_fetch_array($result1);
          $count1= mysqli_num_rows($result1);
          if($count1 == 1){
            $balance = $result_set1['balance'];
            if($balance>10000){
                $_SESSION['red_notification'] = true;
            }
          }
          redirect_to("profile.php");
        }
        elseif($row["type"]==="billOperator"){
          $_SESSION['admin_logged_in']= false;
          $_SESSION['user_logged_in']= false;
          $_SESSION['billOperator_logged_in']=true;
          redirect_to("profile.php");
        }

    }else {
        $error = "Your Login Name or Password is invalid";
        echo "<script type='text/javascript'>alert(\"$error\");</script>";
    }
}
}
?>
