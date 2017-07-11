<?php
session_start();
require_once ("db.php");

$db = new MyDB();
?>
<!DOCTYPE html>
<html>
<head>
    <title>International Buyers Registration | Welcome</title>
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
<style>
.reg_btns_btn {
    background: #0a8226;
}
.row_thin_btn {
    background: #0a8226;
}
.row_thin_head_ex {
    background: #0a8226;
}
.row_thin_head_ex:after {
    border-left: 15px solid #0a8226;
}
.row_thin ul li {
    color: #0a8226;
}
</style>
<body style="height: auto;">
<div class="blur_bg"></div>
<div class="back_to_top"></div>
<div class="forms">
    <div class="formArea">
        <div class="close" onclick="formClose()"><img src="images/close.png"></div>
        <form class="login" method="post" action="login.php" enctype="multipart/form-data">
            <input type="text" name="log_name" id="log_name" placeholder="Username or email">
            <input type="password" name="log_password" id="log_password" placeholder="Password">
            <input type="submit" name="submit_log" id="submit_log" value="Login">
            <p>Can't remember your password?</p>
        </form>
    </div>
</div>
<!-- <div class="home_head" style="position: static; background: rgba(0, 0, 0, .5)">
    <div class="loginBtn" onclick="formOpen()">LOGIN</div>
    <div class="signupBtn">Sign Up</div>
</div> -->
<div class="home_head" style="position: static; background: rgba(0, 0, 0, .5)">
  <div class="logo_x">
      <!-- <img src="images/logo.png"> -->
  </div>
  <div class="navi">
      <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Gallery</a></li>
          <li><a href="#">Contact</a></li>
      </ul>
  </div>
    <?php
    if (!isset($_SESSION['log_name']))
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
<!-- <div class="red" >EXPORTERS REGISTRATION BRIEFING (please read carefully)
<span class="close_det">&Cross;</span>
</div> -->
<div class="contents_side">
<div class="reg_btns">
    <a href="exporter_reg.php" class="reg_btns_btn">Exporter</a>
    <a href="importer_reg.php" class="reg_btns_btn shadow_in">International Buyers</a>
    <a href="lba_reg.php" class="reg_btns_btn">Local Buying Agent</a>
    <a href="freight_reg.php" class="reg_btns_btn">Freight Forwarding</a>
</div>
<br><br><br><br>
<br>
<div class="row_label">
    <div class="row_thin_head_ex">Your Benefits</div>
</div>
<div class="row_thin">
    <p><strong style="font-size: 14px">*</strong>*This package is for International buyers looking to buy products.
      We recommend the <a href="#">interactive package</a> to speak to an experienced practitioner for assistance.
        to get you started.</p>
    <ul><br>
      <p style="font-size: 26px;"><strong>We get you connected to...</strong></p>
        <li><span>Exporters</span></li>
        <li><span>Freight Forwarders</span></li>
        <li><span>Local Buying Agents</span></li>
        <p style="font-size: 26px;"><strong>While also providing access to...</strong></p>
        <li><span>Export Search Engine</span></li>
        <li><span>HS Codes</span></li>
        <li><span>Shipping Companies Schedules</sapn></li>
        <li><span>Background Checks</span></li>
        <li><span>Commodity Prices</span></li>
        <li><span>Exclusive Consulting Services</span></li>
        <li><span>Commodities Quality control</span></li>
        <li><span>Professionals and Experienced Practitioners</span></li>
        <li><span>Export Financial Facilities</span></li>
        <li><span>24/7 access to support team on any issue</span></li>
    </ul>
</div>
<div class="row_label">
    <div class="row_thin_head_ex">Requirements</div>
</div>
<div class="row_thin">
    <ul>
        <li><span>A registered company</span></li>
        <li><span>Proof of registration (scanned copy) as this will be uploaded in registration process</span></li>
        <li><span>Company Details</span></li>
        <li><span>Company Profile</span></li>
    </ul>
</div>
<!-- <div class="row_label">
    <div class="row_thin_head_ex">FOLLOW THESE STEPS TO COMPLETE REGISTRATION</div>
</div> -->
<div class="row_thin">
    <!-- <ul>
        <li><span>Get all required documents listed above</span></li>
        <li><span>Click on register button below and provide all information in form as required</span></li>
        <li><span>You would receive a verification in your mail if registration is successful.</span></li>
    </ul> -->
    <div class="row_label">
        <div class="row_thin_btn">click to register</div>
    </div>
</div>
</div>
<div class="row_thin_pacs">
    <!-- <p><strong>*Please fill in all fields</strong></p>
    <form action="alreg.php" method="post" enctype="multipart/form-data">
        <div class="row_thin_txt">
            <input type="text" name="fname" id="fname" placeholder="First Name">
            <input type="text" name="lname" id="lname" placeholder="Last Name">
        </div>
        <div class="row_thin_txt">
            <input type="text" name="company_name" id="company_name" placeholder="Company Name">
            <input type="number" name="rc_num" id="rc_num" placeholder="Company's RC Number">
        </div>
        <div class="row_thin_txt">
            <input type="text" name="company_loc" id="company_loc" placeholder="Company Address">
            <input type="text" name="your_loc" id="your_loc" placeholder="Your Address">
        </div>
        <div class="row_thin_txt">
            <textarea name="company_des" id="company_des" rows="7" placeholder="Briefly describe your company"></textarea>
        </div>
        <div class="row_thin_txt">
            <input type="email" name="email" id="email" placeholder="Email Address">
            <input type="number" name="tel_num" id="tel_num" placeholder="Phone No.">
        </div>
        <div class="row_thin_txt">
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="text" name="reg_as" id="reg_as" placeholder="" readonly value="Exporter">
        </div>
        <div class="row_thin_txt">
            <input type="password" name="p_word" id="p_word" placeholder="Password">
            <input type="text" name="c_p_word" id="c_p_word" placeholder="Confirm Password">
        </div>
        <div class="row_thin_txt">
            <input type="submit" name="register" id="register" value="Register" style="margin: 0">
        </div>
    </form> -->
    <!-- <div class="sub_package" style="background: #fff">
      <div class="sub_pac_top">
        <div class="sub_stamp">
            <img src="images/gold.png">
        </div>
        <h1>GOLD</h1>
      </div>
      <div class="pricing">
          <h1>&dollar; 100</h1>/yearly
      </div>
        <p class="p_high">
            <span>&#10003;</span> Export Search Engine<br>
            <span>&#10003;</span> Commodity/Quality Control<br>
            <span>&#10003;</span> Background Check<br>
            <span>&#10003;</span> 24/7 Live Support<br>
            <span>&#10003;</span> Shipping Line Schedules<br>
            <span>&#10003;</span> Live Chat With Our Export Experts<br>
            <span>&#10003;</span> Commodity Prices<br>
            <span>&#10003;</span> All Other Free Services<br>
        </p>
        <div class="sub_now">
            <p>Subscribe</p>
        </div><br>
    </div>
    <div class="sub_package" style="background: #fff">
      <div class="sub_pac_top">
        <div class="sub_stamp">
            <img src="images/silver.png">
        </div>
        <h1>SILVER</h1>
      </div>
      <div class="pricing">
          <h1>&dollar; 50</h1>/yearly
      </div>
        <p class="p_high">
          <span>&#10003;</span> Export Search Engine<br>
          <span>&#10003;</span> Commodity/Quality Control<br>
          <span>&#10003;</span> Background Check<br>
          <span>&#10003;</span> 24/7 Live Support<br>
          <span>&#10003;</span> Shipping Line Schedules<br>
          <span>&#10003;</span> Commodity Prices<br>
          <span>&#10003;</span> All Other Free Services<br>
          <span style="color: #ccc">&Cross;</span> <span style="color: #ccc">Live Chat With Our Export Experts</span><br>
        </p>
        <div class="sub_now">
            <p>Subscribe</p>
        </div><br>
    </div>
    <div class="sub_package" style="background: #fff; margin: 60px 0">
      <div class="sub_pac_top">
        <div class="sub_stamp">
        </div>
        <h1></h1>
      </div>
      <div class="pricing">
          <h1>Free 30 Day Trial</h1>/yearly
      </div>
        <p class="p_high">
          <span>&#10003;</span> Commodity/Quality Control<br>
          <span>&#10003;</span> Background Check<br>
          <span>&#10003;</span> 24/7 Live Support<br>
          <span>&#10003;</span> Shipping Line Schedules<br>
          <span>&#10003;</span> Commodity Prices<br>
          <span>&#10003;</span> All Other Free Services<br>
          <span style="color: #ccc">&Cross;</span> <span style="color: #ccc;">Live Chat With Our Export Experts</span><br>
          <span style="color: #ccc">&Cross;</span> <span style="color: #ccc">Export Search Engine</span><br>
        </p>
        <div class="sub_now">
            <p>Subscribe</p>
        </div>
    </div> -->
    <div class="price_table">
        <!-- <div class="price_card pack">
              <div class="price_header">
                  <span class="price" style="color: #212121">Benefits</span>
                  <span class="name" style="color: #fff">  ....</span>
              </div>
              <ul class="features">
                  <li>Export Search Engine</li>
                  <li>Shipping Line Schedules</li>
                  <li>Commodity Prices</li>
                  <li>Live Chat With our Export Experts</li>
                  <li> Export Search Engine</li>
                  <li> Commodity/Quality Control</li>
                  <li> Background Check</li>
                  <li> 24/7 Live Support</li>
                  <li> Shipping Line Schedules</li>
                  <li> Live Chat With Our Export Experts</li>
                  <li> Commodity Prices</li>
                  <li> All Other Free Services</li>
              </ul>
              <button>Choose Plan</button>
        </div> -->
        <div class="price_card gold">
              <div class="price_header">
                  <span class="priceicon"><img src="images/free.png"></span>
                  <span class="price">Free</span>
                  <span class="name">30 Day Free Trial</span>
              </div>
              <ul class="features">
                  <li>&#10003; Export Search Engine</li>
                  <li>&#10003; Shipping Line Schedules</li>
                  <li>&#10003; Commodity Prices</li>
                  <li>&#10003; Live Chat With our Export Experts</li>
                  <li>&cross; Commodity/Quality Control</li>
                  <li>&cross; Background Check</li>
                  <li>&cross; 24/7 Live Support</li>
                  <li>&cross; All Other Free Services</li>
              </ul>
              <a href="registrationform.php"><button>Choose Plan</button></a>
        </div>
        <div class="price_card gold">
              <div class="price_header">
                  <span class="priceicon"><img src="images/silv.png"></span>
                  <span class="price">&dollar; 50</span>
                  <span class="name">SILVER</span>
              </div>
              <ul class="features">
                  <li>&#10003; Export Search Engine</li>
                  <li>&#10003; Shipping Line Schedules</li>
                  <li>&#10003; Commodity Prices</li>
                  <li>&#10003; Commodity/Quality Control</li>
                  <li>&#10003; Background Check</li>
                  <li>&#10003; 24/7 Live Support</li>
                  <li>&#10003; All Other Free Services</li>
                  <li>&cross; Live Chat With our Export Experts</li>
              </ul>
              <button><form method="POST" action="https://voguepay.com/pay/"><input type="hidden" name="v_merchant_id" value="5556-0047094" /><input type="hidden" name="memo" value="Order from Tega Oke" /><input type="hidden" name="cur" value="USD" /><input type="hidden" name="item_1" value="Nigeriaeexport Silver Plan" /><input type="hidden" name="price_1" value="100" /><input type="hidden" name="description_1" value="Subscription for Nigeriaeexport Gold Plan" /><br /><input type="image" src="https://voguepay.com/images/buttons/subscribe_green.png" alt="PAY" /></form></button>
        </div>
        <div class="price_card gold">
              <div class="price_header">
                  <span class="priceicon"><img src="images/gol.png"></span>
                  <span class="price">&dollar; 100</span>
                  <span class="name">GOLD</span>
              </div>
              <ul class="features">
                  <li>&#10003; Export Search Engine</li>
                  <li>&#10003; Shipping Line Schedules</li>
                  <li>&#10003; Commodity Prices</li>
                  <li>&#10003; Live Chat With our Export Experts</li>
                  <li>&#10003; Commodity/Quality Control</li>
                  <li>&#10003; Background Check</li>
                  <li>&#10003; 24/7 Live Support</li>
                  <li>&#10003; All Other Free Services</li>
              </ul>
              <button>Choose Plan</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var row_thin = document.getElementsByClassName('row_thin_pacs');
        var row_thin_btn = document.getElementsByClassName('row_thin_btn')[0];
        var back_to_top = document.getElementsByClassName('back_to_top');
        var page_top = document.getElementsByClassName('home_head');
        $(row_thin).css("display", "none");
        $(row_thin_btn).click(function () {
            $(row_thin).fadeIn('slow');
            $('html, body').animate({
                scrollTop: $(row_thin).offset().top
            }, 'slow');
        });
        $(back_to_top).click(function () {
            $('html, body').animate({
                scrollTop: $(page_top).offset().top
            }, 'slow');
        });
    });
    $(document).scroll(function () {
        var x = $(this).scrollTop();
        if (x > 200)
        {
            $('.back_to_top').fadeIn('slow');
        }
        else
        {
            $('.back_to_top').fadeOut('fast');
        }
    });
</script>
</body>
</html>
