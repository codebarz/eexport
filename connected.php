<?php
error_reporting(0);
session_start();
require_once ("db.php");
$db = new MyDb();

if (!isset($_SESSION['log_name']))
{
    $_SESSION['log_id'] = $id;
    // echo "<script>alert('Please ensure you login or signup')</script>";
}
else
{

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Get Connected | Welcome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" type="text/css" media="screen">

    <link rel="stylesheet" href="fonts/font-awesome.css">

    <script src="js/popup.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-3.1.0.js"></script>
    <script type="text/javascript" src="js/msg.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/cycle2.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/eexport.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body style="background: url('images/conbg.jpg') #fff no-repeat; background-size: cover;">
<div class="popup">
  <div class="pop_content"></div>
</div>
<div class="forms">
    <div class="formArea"><br>
        <div class="close" onclick="formClose()"><img src="images/close_2.png"></div><br>
        <div class="logo_area"><img src='images/nigeriaeexport.png'></div>
        <form class="login" method="post" action="login.php" enctype="multipart/form-data">
            <input type="text" name="log_name" id="log_name" placeholder="Username or email">
            <input type="password" name="log_password" id="log_password" placeholder="Password">
            <input type="submit" name="submit_log" id="submit_log" value="LOG IN">
            <p>Don't have an account? <a id="togreg" href="#">SIGN UP</a></p>
        </form>
        <form class="signup" method="post" action="register.php" enctype="multipart/form-data">
            <input type="text" name="fname" id="fname" placeholder="Your Full Name">
            <input type="email" name="email" id="email" placeholder="Your email">
            <input type="text" name="uname" id="uname" placeholder="Username">
            <p>Register as (Buyer/Seller)</p>
            <select id="reg_as" name="reg_as">
                <option name="buyer" value="buyer">Buyer</option>
                <option name="seller" value="seller">Seller</option>
            </select>
            <input type="password" name="password" id="password" placeholder="Password">
            <input type="password" name="cfpassword" id="cfpassword" placeholder="Confirm Password">
            <input type="submit" name="submitreg" id="submitreg" value="Sign up"><br>
            <p>Already have an account? <a href="#" id="toglog">LOGIN</a> </p>
        </form>
    </div>
</div>
<div class="home_head_2">
  <div class="logo_x">
      <img src="images/logos.png">
  </div>
  <div class="navi">
      <ul>
          <li><a href="index.php">HOME</a></li>
          <li><a href="about.php">ABOUT</a></li>
          <li><a href="blog.php">BLOG</a></li>
          <li><a href="gallery.php">GALLERY</a></li>
          <li><a href="contact.php">CONTACT</a></li>
      </ul>
  </div>
    <?php
    if (!isset($_SESSION['log_name']) && !isset($_SESSION['log_id']))
    {
      echo "<div class=\"loginBtn\" onclick=\"formOpen()\">Login</div><div class=\"signupBtn\">Create an account</div>";
    }
    else
    {
        $id = $_SESSION['log_id'];
        echo "<form action=\"logout.php\" method=\"post\" enctype=\"multipart/form-data\">
            <input type=\"submit\" name=\"logout\" id=\"logout\" value=\"Logout\">
        </form><a class='myAcc' href='exporter.php?log_id=$id'>My Account</a>";
    }
    ?>
</div>
<div class="contentdim">
  <h2>WE GET YOU CONNECTED TO</h2>
<div class="acons">
<a href="packages.php"><div class="con1">
<div class="conimag"><img src="images/cusers.png"></div>
<p>Exporters, Local Buying Agents, Frieght Forwarders.</p>
</div></a>
<div class="con2">
<div class="smbox left">
  <div class="conimag left"><img src="images/csupport.png"></div>
  <p>Experts and proffesionals in the export business.</p>
</div>
<a href="funding.php"><div class="smbox right">
  <div class="conimag right"><img src="images/cagency.png"></div>
  <p>Export Funding and Finance.</p>
</div></a>
</div>
<a href="searchengine.php"><div class="con3">
<div class="conimag"><img src="images/csearch.png"></div>
<p>Direct real time answers to your questions through our export search engine.</p>
</div></a>
</div>
<div class="blankcopyright"><p style="color: #000">&copy; 2017 Nigeriaeexport All Rights Reserved. Designed by Arklar Technologies.</p></div>
</div>
<!-- <div class="dim_2"></div> -->
</body>
</html>
