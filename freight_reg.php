<?php
session_start();
require_once ("db.php");

$db = new MyDB();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Freight Forwarders Registration | Welcome</title>
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
    background: #0a7b7c;
}
.row_thin_btn {
    background: #0a7b7c;
}
.row_thin_head_ex {
    background: #0a7b7c;
}
.row_thin_head_ex:after {
    border-left: 15px solid #0a7b7c;
}
.row_thin ul li {
    color: #0a7b7c;
}
</style>
<div class="payment">
  <div class="close_6"><img src="images/close.png"></div>
    <div class="bank_pay">
      <img src="images/fcmb.png">
      <div class="condrop_2">
          Account Name: Nigeriaeexport<br>
          Account Number: 2008046860
      </div>
    </div>
    <div class="bank_pay">
        <img src="images/fidelity.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 201983748
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/firstbank.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 0187289387
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/wema.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 8493084759
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/heritage.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 9102839430
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/skye.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 2008046860
        </div>
      </div>
    <div class="bank_pay">
        <img src="images/gtbank.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 7263538392
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/sterling.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 8273920211
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/zenithbank.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 91827265363
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/stanbic.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 9383939302
        </div>
    </div>
    <div class="pay_verify">
        <a href="verify.php">Verify Payment</a>
        <a  class="payverlink" href="exbronzeregistrationform.php">Continue to registration</a>
    </div>
</div>
<div class="bpayment">
  <div class="close_6"><img src="images/close.png"></div>
    <div class="bank_pay">
      <img src="images/fcmb.png">
      <div class="condrop_2">
          Account Name: Nigeriaeexport<br>
          Account Number: 2008046860
      </div>
    </div>
    <div class="bank_pay">
        <img src="images/fidelity.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 201983748
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/firstbank.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 0187289387
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/wema.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 8493084759
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/heritage.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 9102839430
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/skye.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 2008046860
        </div>
      </div>
    <div class="bank_pay">
        <img src="images/gtbank.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 7263538392
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/sterling.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 8273920211
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/zenithbank.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 91827265363
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/stanbic.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 9383939302
        </div>
    </div>
    <div class="pay_verify">
        <a href="verify.php">Verify Payment</a>
        <a  class="payverlink" href="fbronzeregistrationform.php">Continue to registration</a>
    </div>
</div>
<div class="gpayment">
  <div class="close_6"><img src="images/close.png"></div>
    <div class="bank_pay">
      <img src="images/fcmb.png">
      <div class="condrop_2">
          Account Name: Nigeriaeexport<br>
          Account Number: 2008046860
      </div>
    </div>
    <div class="bank_pay">
        <img src="images/fidelity.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 201983748
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/firstbank.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 0187289387
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/wema.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 8493084759
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/heritage.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 9102839430
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/skye.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 2008046860
        </div>
      </div>
    <div class="bank_pay">
        <img src="images/gtbank.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 7263538392
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/sterling.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 8273920211
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/zenithbank.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 91827265363
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/stanbic.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 9383939302
        </div>
    </div>
    <div class="pay_verify">
        <a href="verify.php">Verify Payment</a>
        <a  class="payverlink" href="fgoldregistrationform.php">Continue to registration</a>
    </div>
</div>
<div class="bpayment">
  <div class="close_6"><img src="images/close.png"></div>
    <div class="bank_pay">
      <img src="images/fcmb.png">
      <div class="condrop_2">
          Account Name: Nigeriaeexport<br>
          Account Number: 2008046860
      </div>
    </div>
    <div class="bank_pay">
        <img src="images/fidelity.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 201983748
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/firstbank.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 0187289387
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/wema.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 8493084759
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/heritage.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 9102839430
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/skye.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 2008046860
        </div>
      </div>
    <div class="bank_pay">
        <img src="images/gtbank.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 7263538392
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/sterling.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 8273920211
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/zenithbank.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 91827265363
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/stanbic.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 9383939302
        </div>
    </div>
    <div class="pay_verify">
        <a href="verify.php">Verify Payment</a>
        <a  class="payverlink" href="fbronzeregistrationform.php">Continue to registration</a>
    </div>
</div>
<div class="spayment">
  <div class="close_6"><img src="images/close.png"></div>
    <div class="bank_pay">
      <img src="images/fcmb.png">
      <div class="condrop_2">
          Account Name: Nigeriaeexport<br>
          Account Number: 2008046860
      </div>
    </div>
    <div class="bank_pay">
        <img src="images/fidelity.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 201983748
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/firstbank.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 0187289387
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/wema.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 8493084759
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/heritage.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 9102839430
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/skye.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 2008046860
        </div>
      </div>
    <div class="bank_pay">
        <img src="images/gtbank.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 7263538392
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/sterling.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 8273920211
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/zenithbank.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 91827265363
        </div>
    </div>
    <div class="bank_pay">
        <img src="images/stanbic.png">
        <div class="condrop_2">
            Account Name: Nigeriaeexport<br>
          Account Number: 9383939302
        </div>
    </div>
    <div class="pay_verify">
        <a href="verify.php">Verify Payment</a>
        <a  class="payverlink" href="fsilverregistrationform.php">Continue to registration</a>
    </div>
</div>
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

<div class="home_head" style="position: static; background: rgba(0, 0, 0, .5)">
  <div class="logo_x">
  </div>
  <div class="navi">
      <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
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
<div class="contents_side">
<div class="reg_btns">
    <a href="exporter_reg.php" class="reg_btns_btn">Exporter</a>
    <a href="importer_reg.php" class="reg_btns_btn">International Buyers</a>
    <a href="lba_reg.php" class="reg_btns_btn">Local Buying Agent</a>
    <a href="freight_reg.php" class="reg_btns_btn shadow_in">Freight Forwarding</a>
</div>
<br><br><br><br>
<br>
<div class="row_label">
    <div class="row_thin_head_ex">Your Benefits</div>
</div>
<div class="row_thin">
    <p><strong style="font-size: 14px">*</strong>*This package is for Freight Forwarders looking to get their names out there.
      We recommend the <a href="#">interactive package</a> to speak to an experienced practitioner for assistance.</p>
    <ul><br>
      <p style="font-size: 26px;"><strong>We get you connected to...</strong></p>
        <li><span>Exporters</span></li>
        <li><span>International Buyers</span></li>
        <li><span>Local Buying Agents</span></li> 
        <p style="font-size: 26px;"><strong>While also providing access to...</strong></p>
        <li><span>Export Search Engine</span></li>
        <li><span>HS Codes</span></li>
        <li><span>Shipping Companies Schedules</sapn></li>
        <li><span>Exclusive Consulting Services</span></li>
        <li><span>Professionals and Experienced Practitioners</span></li>
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
<div class="row_thin">
    <div class="row_label">
        <div class="row_thin_btn">click to register</div>
    </div>
</div>
</div>
<div class="row_thin_pacs">
    <div class="price_table">
      <div class="price_card gold">
            <div class="price_header">
                <span class="priceicon"><img src="images/free.png"></span>
                <span class="price">FREE</span>
                <span class="name">FREE MEMBERSHIP</span>
            </div>
            <ul class="features">
                <li>&#10003; Shipping Line Schedules</li>
                <li>&#10003; All Other Free Services</li>
                <li>&#10003; Access to HS Codes</li>
                <li>&Cross; Export Search Engine</li>
                <li>&Cross; Commodity Prices</li>
                <li>&Cross; Live Chat With our Export Experts</li>
                <li>&Cross; Commodity/Quality Control</li>
                <li>&Cross; Background Check</li>
                <li>&Cross; 24/7 Live Support</li>
            </ul>
            <a href="fregistrationform.php"><button>CHOOSE PLAN</button></a>
      </div>
    <div class="price_card gold">
          <div class="price_header">
              <span class="priceicon"><img src="images/bronz.png"></span>
              <span class="price">&#8358; 30,000</span>
              <span class="name">BRONZE</span>
          </div>
          <ul class="features">
              <li>&#10003; Export Search Engine</li>
              <li>&#10003; Shipping Line Schedules</li>
              <li>&#10003; Commodity Prices</li>
              <li>&#10003; Live Chat With our Export Experts</li>
              <li>&#10003; Access to HS Codes</li>
              <li>&Cross; Commodity/Quality Control</li>
              <li>&Cross; Background Check</li>
              <li>&Cross; 24/7 Live Support</li>
              <li>&Cross; All Other Free Services</li>
          </ul>
          <button class="bronzepac">Choose Plan</button>
    </div>
    <div class="price_card gold">
          <div class="price_header">
              <span class="priceicon"><img src="images/silv.png"></span>
              <span class="price">&#8358; 50,000</span>
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
              <li>&#10003; Access to HS Codes</li>
              <li>&Cross; Live Chat With our Export Experts</li>
          </ul>
          <button class="silverpac">Choose Plan</button>
    </div>
    <div class="price_card gold">
          <div class="price_header">
              <span class="priceicon"><img src="images/gol.png"></span>
              <span class="price">&#8358; 100,000</span>
              <span class="name">GOLD</span>
          </div>
          <ul class="features">
              <li>&#10003; Export Search Engine</li>
              <li>&#10003; Shipping Line Schedules</li>
              <li>&#10003; Commodity Prices</li>
              <li>&#10003; Live Chat With our Export Experts</li>
              <li>&#10003; Commodity/Quality Control</li>
              <li>&#10003; Background Check</li>
              <li>&#10003; Access to HS Codes</li>
              <li>&#10003; 24/7 Live Support</li>
              <li>&#10003; All Other Free Services</li>
          </ul>
          <button class="goldpac">Choose Plan</button>
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
    $('.bank_pay').mouseenter(function() {
        $(this).find('.condrop_2').slideDown(300);
    });
    $('.bank_pay').mouseleave(function() {
        $(this).find('.condrop_2').slideUp(100);
    });
    $('.price_card button').click(function() {
        $('.payment').fadeIn('slow');
    });
    $('.price_card .bronzepac').click(function() {
        $('.bpayment').fadeIn('slow');
    });
    $('.price_card .silverpac').click(function() {
        $('.spayment').fadeIn('slow');
    });
    $('.price_card .goldpac').click(function() {
        $('.gpayment').fadeIn('slow');
    });
    $('.close_6').click(function() {
        $('.payment').fadeOut('slow');
    });
    $('.close_6').click(function() {
        $('.bpayment').fadeOut('slow');
    });
    $('.close_6').click(function() {
        $('.spayment').fadeOut('slow');
    });
    $('.close_6').click(function() {
        $('.gpayment').fadeOut('slow');
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
