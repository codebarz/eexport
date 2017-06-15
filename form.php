<?php
require_once ("db.php");

$db = new MyDB();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Freight Forwarder Registration | Welcome</title>
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
<style type="text/css">
    .row_thin_head_ex {
        text-align: left;
        background: #0a7b7c;
        color: #fff;
        font-family: 'Raleway', sans-serif;
        font-size: 16px;
        font-style: italic;
        padding: 15px 20px;
        font-weight: bold;
        float: left;
        position: relative;
    }
    .row_thin_head_ex:after {
        content: '';
        position: absolute;
        top: 0;
        left: 100%;
        width: 0;
        height: 0;
        border: 25px solid transparent;
        border-left: 15px solid #0a7b7c;
        z-index: 2;
    }
    .row_thin ul li {
        list-style: disc;
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        font-style: italic;
        font-weight: 700;
        padding: 8px 0;
        color: #0a7b7c;
    }
    .row_thin p a {
        color: #4abdac;
    }
    .row_thin_btn {
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        color: #ffffff;
        font-style: italic;
        padding: 10px 35px;
        background: #0a7b7c;
        margin: 30px 0 0 0;
        float: left;
        font-weight: bold;
        cursor: pointer;
    }
</style>
<body style="background: #ffffff;">
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
<div class="home_head" style="position: static">
    <div class="loginBtn" onclick="formOpen()">LOGIN</div>
    <div class="signupBtn">Sign Up</div>
</div>
<!-- <div class="d_green">FREIGHT FORWARDER REGISTRATION BRIEFING (please read carefully)
    <span class="close_det">&Cross;</span>
</div> -->
<div class="reg_btns">
    <a href="exporter_reg.php" class="reg_btns_btn">Exporter</a>
    <a href="importer_reg.php" class="reg_btns_btn" style="background: #0a8226">Importer</a>
    <a href="lba_reg.php" class="reg_btns_btn" style="background: #eb3c00">Local Buying Agent</a>
    <a href="freight_reg.php" class="reg_btns_btn shadow_in" style="background: #0a7b7c;">Freight Forwarding</a>
</div>

<br>
<div class="row_label">
    <div class="row_thin_head_ex">Your Benefits</div>
</div>
<div class="row_thin">
    <p><strong style="font-size: 14px">*</strong>This package is exclusive for freight forwarders looking to get their names out there
. We recommend the <a href="#">interactive package</a>
        to speak to an experienced practitioner for assistance.</p>
    <ul><br>
      <p style="font-size: 26px;"><strong>We get you connected to...</strong></p>
        <li><span>Exporters </span></li>
        <li><span>Freight Forwarders</span></li>
        <p style="font-size: 26px;"><strong>While also providing access to...</strong></p>
        <li><span>Export Search Engine</span></li>
        <li><span>Shipping Companies Schedules</sapn></li>
        <li><span>Exclusive Consulting Services</span></li>
        <li><span>Professionals and Experienced Practitioners</span></li>
        <li><span>24/7 access to support team on any issue</span></li>
    </ul>
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
<div class="row_thin">
    <p><strong>*Please fill in all fields</strong></p>
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
            <input type="text" name="reg_as" id="reg_as" placeholder="" readonly value="Freight">
        </div>
        <div class="row_thin_txt">
            <input type="password" name="p_word" id="p_word" placeholder="Password">
            <input type="text" name="c_p_word" id="c_p_word" placeholder="Confirm Password">
        </div>
        <div class="row_thin_txt">
            <input type="submit" name="register" id="register" value="Register" style="margin: 0; background: #0a7b7c">
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var row_thin = document.getElementsByClassName('row_thin')[3];
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
