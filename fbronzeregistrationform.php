<?php
require_once ("db.php");

$db = new MyDB();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Export Bronze | Welcome</title>
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
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<div class="formHeading"></div>
<div class="regFormArea">
  <div class="formInstruction">
      <h2>Instructions</h2>
      <p>*Your confirmation code is the number sent to you via email after payment verification</p>
      <p>- Please ensure you fill in all fields accurately and properly</p>
      <p>- Make sure all information given are correct</p>
      <p>- You have a period of 30 days to upgrade your plan.</p>
  </div>
  <div class="newFormArea">
      <form action="genformexec.php" method="post" enctype="multipart/form-data">
          <label class="type" for="ccode">*Your confirmation code is the series of numbers sent to your mail after payment verification</label>
          <input class="half" type="text" name="ccode" id="ccode" placeholder="Confirmation Code">
          <input class="half" type="email" name="uemail" id="uemail" placeholder="Email Address">
          <input class="half" type="text" name="fname" id="fname" placeholder="First Name">
          <input class="half" type="text" name="lname" id="lname" placeholder="Last Name">
          <input class="full" type="text" name="cname" id="cname" placeholder="Company Name">
          <input class="full" type="text" name="crcnum" id="crcnum" placeholder="Company RC/BN Number">
          <input class="full" type="text" name="uaddress" id="uaddress" placeholder="Residential Address">
          <input class="full" type="text" name="caddress" id="caddress" placeholder="Company Address">
          <textarea class="full" rows="7" name="briefdes" id="briefdes" placeholder="Brief description about your company"></textarea>
          <input class="half" type="text" name="uname" id="uname" placeholder="Username">
          <input class="half" type="text" name="uphone" id="uphone" placeholder="Phone Number">
          <input class="half" type="text" name="pword" id="pword" placeholder="Password">
          <input class="half" type="text" name="cfpword" id="cfpword" placeholder="Re-Type Password">
          <div class="profImage"><img src=""></div><br>
          <label for="profimages">Upload Company Logo/Profile Picture</label><br><br>
          <input type="file" name="profimages" id="profimages">
          <label class="type" for="regas">You are registering as:</label>
          <input type="text" class="full readonly" readonly name="regas" id="regas" value="Freight Forwarder">
          <label class="type" for="package">Package type:</label>
          <input type="text" class="full readonly" readonly name="package" id="package" value="Bronze">
          <input type="submit" name="regSubmit" id="regSubmit" value="Submit">
      </form>
  </div>
</div>
</body>
</html>
