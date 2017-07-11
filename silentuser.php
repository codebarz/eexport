<?php
error_reporting(0);
require_once ("db.php");
$db = new MyDb();

session_start();


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
    <title>E-Xport | Welcome</title>
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
<body class="dark">
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
<div class="home_head transparent">
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
        echo "<form action=\"logout.php\" method=\"post\" enctype=\"multipart/form-data\">
            <input type=\"submit\" name=\"logout\" id=\"logout\" value=\"Logout\">
        </form><a href='exporter.php?userid=$id'>My Account</a>";
    }
    ?>
</div>
<div class="regFormArea_2">
  <div class="formInstruction">
      <div class="silentico"><img src="images/silentuser.png"></div>
      <h2>Please Note</h2>
      <p>*Ensure you input the Email or Phone Number we can reach you with.</p>
      <p>- You will be contacted within 24 hours.</p>
      <p>- Make sure all information given are correct</p>
  </div>
  <div class="newFormArea">
      <form action="silentdb.php" method="post" enctype="multipart/form-data">
          <!-- <label class="type" for="ccode">*Your confirmation code is the series of numbers sent to your mail after payment verification</label>
          <input class="half" type="text" name="ccode" id="ccode" placeholder="Confirmation Code"> -->
          <input class="half" type="email" name="semail" id="semail" placeholder="Email Address">
          <input class="half" type="text" name="sphone" id="sphone" placeholder="Phone Number">
          <input class="half" type="text" name="fname" id="fname" placeholder="First Name">
          <input class="half" type="text" name="lname" id="lname" placeholder="Last Name">
          <input class="full" type="text" name="cname" id="cname" placeholder="Company Name">
          <input class="full" type="text" name="crcnum" id="crcnum" placeholder="Company RC/BN Number">
          <input class="full" type="text" name="saddress" id="saddress" placeholder="Residential Address">
          <input class="full" type="text" name="caddress" id="caddress" placeholder="Company Address">
          <label class="type" for="reqfor">You are requesting for:</label>
          <select class="full" name="reqfor" id="reqfor">
          <option value="Background Check">Exporter</option>
          <option value="international Buyer">International Buyer</option>
          <option value="Freight Forwarder">Freight Forwarder</option>
          <option value="Local Buying Agent">Local Buying Agent</option>
          <option value="Export Funding">Export Funding</option>
          <option value="Background Check">Export Professional/Expert</option>
          <option value="Commodity/Quality Control">Commodity/Quality Control</option>
          <option value="Background Check">Background Check</option>
          </select>
          <textarea class="full" rows="7" name="briefdes" id="briefdes" placeholder="Briefly explain your request"></textarea>
          <input type="submit" name="reqSubmit" id="reqSubmit" value="Send Request">
      </form>
  </div>
</div>
<div class="blankcopyright"><p>&copy; 2017 Nigeriaeexport All Rights Reserved. Designed by Arklar Technologies.</p></div>
</body>
</html>
