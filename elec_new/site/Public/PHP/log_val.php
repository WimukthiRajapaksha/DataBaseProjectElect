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
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);


    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
        $_SESSION['login_user'] = $myusername;
        $_SESSION['user_type'] = $row["type"];

        //header("location:userprofile.php ");
        if($row["type"]==="admin"){
          $_SESSION['admin_logged_in']= true;
          $_SESSION['user_logged_in']= false;
          redirect_to("adminProfile.php");
        }
        if($row["type"]==="customer"){
          $_SESSION['user_logged_in']= true;
          $_SESSION['admin_logged_in']= false;
          redirect_to("userProfile.php");
        }

    }else {
        $error = "Your Login Name or Password is invalid";
        echo "<script type='text/javascript'>alert(\"$error\");</script>";
    }
}
}
?>
