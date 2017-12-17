
<?php include("../Include/header1.php"); ?>

<li  ><a href="infex.php">Home</a></li>
<li class="active"><a href="contactUs.php">Contact Us</a></li>

<li><a href="aboutUs.php">About Us</a></li>
<li ><a href="login2.php">Log In</a></li>
<?php include("../Include/header2.php") ?>

<html>
<head>
    <meta charset="utf-8">
    <title>CONTACT US</title>

  <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald|Pathway+Gothic+One|Play|Titillium+Web" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://use.fontawesome.com/622cc25ba3.js"></script>


  <style media="screen">
  .contact_us{
  position: relative;
  background-color: #252626;
  padding: 0px 0 0px 0;
  overflow: hidden;
  min-width: 300px;
  height: 300px;
  background-image: url(http://lorempixel.com/output/sports-q-g-300-300-5.jpg);
  background-size: cover;
  background-attachment:fixed;
  background-position:right top;
  }
  .contact_us_fon{
  background-color: #232424;
  padding: 60px 0 0px 0;
  width: 100%;
  height: 100%;
  top: 0px;
  opacity: 0.8;
  }
  .contact_us_left{
  display: inline-block;
  margin: 0px 0px 0px 10%;
  width: 40%;
  }
  .contact_us_big_text{
  display: block;
  }
  .contact_us_big_text{
  color: white;
  font-size: 60px;
  padding: 0px 5px 0px 5px;
  text-transform: uppercase;
  font-family: 'Fjalla One', sans-serif;
  }
  .red_text{
  background-color: red;
  padding: 0px 10px 0px 10px;
  }
  .contact_us_small_text{
  color: white;
  font-size: 15px;
  margin: 10px 10px 10px 10px;
  word-spacing: 5px;
  font-family: 'Titillium Web', sans-serif;
  }

  .mail:before {font-family: FontAwesome;content: "\f015";}
  .phone_number:before {font-family: FontAwesome;content: "\f0e0";}
  .adress:before {font-family: FontAwesome;content: "\f095";}


  .contact_us_right{
  display: inline-block;
  margin: 0px 8% 0px 0;
  width: 40%;
  height: 200px;
  position: absolute;
  border-left: 1px solid #808080;
  }
  .contact_us_icons{
  margin: 0px 0px 0px 20px;
  }
  .icon{
  background-color: white;
  display: inline-block;
  margin: 0px 0px 0px 10px;
  width: 50px;
  height: 50px;
  font-size: 25px;
  text-align: center;
  line-height: 1.9;
  color:  #252626;
  -webkit-transition:  0.9s;
  }
  .icon_facebook:before {font-family: FontAwesome; content: "\f09a";}
  .icon_twitter:before {font-family: FontAwesome; content: "\f099";}
  .icon_google_plus:before {font-family: FontAwesome; content: "\f0d5";}
  .icon_linkedin:before {font-family: FontAwesome; content: "\f0e1";}

  .daniel_knafo{
  background-color: #232424;
  padding: 30px 0 0 80px;
  overflow: hidden;
  height: 90px;
  color: #696969;
  font-family: 'Titillium Web', sans-serif;
  }
  .red_text_2{
  padding: 0px 0 10px 0px;
  color: red;
  }



  .icon:hover {
  background-color: red;
  color:  white;
  }

  A {
  text-decoration: none;
   color: red;
  }
  A:hover {
  text-decoration: underline;
  color: red;
  }
  @media screen and (min-width:300px) and (max-width:899px) {
  /*contact_us///////////////////////////////////////////////////*/
  .contact_us{
  min-width: 300px;
  }
  .contact_us_fon{
  padding: 30px 0 0px 0;
  }
  .contact_us_left{
  display: block;
  width: 100%;
  margin: 10px 0px 0px 60px;
  }
  .contact_us_big_text{
  color: white;
  font-size: 50px;
  }
  .contact_us_right{
  display: block;
  margin: 10px 0px 0px 40px;
  border: none;
  width: 100%;

  }
  </style>
</head>


<body>
<br><br>
  <div class="contact_us">
    <div class="contact_us_fon">
    <div class="contact_us_left">

      <div class="contact_us_big_text">
           <span class="contact_us_big_text">contact <span class="red_text">us</span></span>
      </div>

      <div class="contact_us_small_text adress"> 121, Melbourne road, Sri Lanka</div>
      <div class="contact_us_small_text phone_number"> phone: +011 2 789 00</div>
      <div class="contact_us_small_text mail"> ceb@info.com</div>
    </div>


    <div class="contact_us_right">

      <div class="contact_us_icons">
        <a href="#"><div class="icon icon_facebook"></div></a>
        <a href="#"><div class="icon icon_twitter"></div></a>
        <a href="#"><div class="icon icon_google_plus"></div></a>
        <a href="#"><div class="icon icon_linkedin"></div></a>
      </div>

    </div>
    </div>
  </div>

  <div class="daniel_knafo">
    <div class="red_text_2">ARTBOOK</span></div>
    <div>Daniel Knafo</div>
  </div>
</body>

<?php include("../Include/footer.php"); ?>
