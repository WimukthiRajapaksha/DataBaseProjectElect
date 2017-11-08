
<?php //include("../Include/functions.php") ?>
<?php //require_once("../Include/session.php"); ?>
<?php //require_once("../Include/validation_functions.php") ?>
<?php include("../Include/header1.php"); ?>
<?php require_once("../Include/dbConnection.php"); ?>
<li><a href="infex.php">Home</a></li>
<li><a href="contactUs.php">Contact Us</a></li>
<li><a href="aboutUs.php">About Us</a></li>
<li class="active"><a href="login2.php">Log In</a></li>
<?php include("../Include/header2.php"); ?>
<link rel="stylesheet" type="text/css" href="CSS/test.css">
<br><br><br><br>
<?php include("../Public/PHP/log_val.php") ?>



    <div class="container">
        <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 loginbox">
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title"> Sign In </div>
                    <div class="forgot-password"> <a href="#">Forgot password?</a> </div>
                </div>
                <div class="panel-body panel-pad">
                    <div id="login-alert" class="alert alert-danger col-sm-12 login-alert"></div>
                    <form id="loginform" class="form-horizontal" role="form"  method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="input-group margT25">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                            <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username" />
                        </div>
                        <div class="input-group margT25">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="password"/>
                        </div>
                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
                        </div>
                        <div class="form-group margT10">
                            <div class="col-sm-12 controls">
                                <input id="btn-login" href="#" class="btn btn-block btn-success" type="submit" name="Login" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div class="no-acc">
                                    Don't have an account!
                                    <a href="#"> Sign Up Here </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



<?php include("../Include/footer.php"); ?>
