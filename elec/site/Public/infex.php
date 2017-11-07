
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

<div id="back" class="grad1">


     <nav class="navbar navbar-default  ">
  <div class="container-fluid " >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header navbarpic" >
      <a href="#" class="navbar-brand">Ceylon Electricity Board</span></a>
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
        <li class="active"><a href="#">Home</a></li>
        <li ><a href="contactUs.php">Contact Us</a></li>
        <li><a href="aboutUs.php">About Us</a></li>
        <li><a href="login.php">Log In</a></li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br>
<br>
<div id="myCarousel" class="carousel slide">

  <ol class="carousel-indicators">
    <li data-target ="#myCarousel" data-slide-to ="0" class="active"></li>
    <li data-target ="#myCarousel" data-slide-to ="1"></li>
    <li data-target ="#myCarousel" data-slide-to ="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
      <img src="img/index4.jpg" alt="City" class="img-responsive">
    </div>
    <div class="item">
      <img src="img/index2.jpg" alt="City" class="img-responsive">
    </div>
    <div class="item">
      <img src="img/index1.jpg" alt="City" class="img-responsive">
    </div>
    <script script type="text/javascript">
      $('#myCarousel').carousel({interval:1000})
    </script>﻿
  </div>
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
  </a>

</div>


<div id="contentback" class="gradContent">


<div class="container" >
  <div class="row">
    <div class="col-md-4 jumbotron jumbotron1">
      <h3>Create Profile</h3>
    <p><a class="btn btn-primary btn-lg" href="createAccount.php" role="button">Create</a></p>
  </div>
    <div class="col-md-4 jumbotron jumbotron2">
      <h3>Job Opportunities</h3>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">More Info</a></p>

    </div>
    <div class="col-md-4 jumbotron jumbotron3">
      <h3>Online Payment</h3>
      <p><a class="btn btn-primary btn-lg" href="payment.php" role="button">More Info</a></p>

    </div>

  </div>

</div>
<div class="container">
<div class="row" >

  <div class="col-md-4 jumbotron jumbotron4">
    <h3>New Connection</h3>
    <p><a class="btn btn-primary btn-lg" href="newConnection.php" role="button">Requset</a></p>

  </div>

    <div class="col-md-4">
        <div>
            <div id="map"></div>
            <script>
                function initMap() {
                    var uluru = {lat: 6.925901, lng: 79.943796};
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 4,
                        center: uluru
                    });
                    var marker = new google.maps.Marker({
                        position: uluru,
                        map: map
                    });
                }
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbJ5RaWlZ99UBp2LsYRKZqdbW6MdjFeSE&callback=initMap">
            </script>
        </div>
    </div>
  </div>
</div>
  </div>
<?php include("../Include/footer.php"); ?>
