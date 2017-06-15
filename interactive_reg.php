<?php
require_once ("db.php");

$db = new MyDB();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Importer Registration | Welcome</title>
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
        background: #4abdac;
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
        border-left: 15px solid #4abdac;
        z-index: 2;
    }
    .row_thin ul li {
        list-style: disc;
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        font-style: italic;
        font-weight: 700;
        padding: 8px 0;
        color: #4abdac;
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
        background: #4abdac;
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
<div class="home_head">
    <div class="loginBtn" onclick="formOpen()">LOGIN</div>
    <div class="signupBtn">Sign Up</div>
</div>
<div class="l_green">INTERACTIVE REGISTRATION BRIEFING (please read carefully)
    <span class="close_det">&Cross;</span>
</div>
<div class="reg_btns">
    <a href="exporter_reg.php" class="reg_btns_btn">Exporter</a>
    <a href="importer_reg.php" class="reg_btns_btn" style="background: #0a8226">Importer</a>
    <a href="lba_reg.php" class="reg_btns_btn" style="background: #eb3c00">Local Buying Agent</a>
    <a href="freight_reg.php" class="reg_btns_btn" style="background: #0a7b7c;">Freight Forwarding</a>
    <a href="interactive_reg.php" class="reg_btns_btn shadow_in" style="background: #4abdac; border-bottom-right-radius: 30px">Interactive</a>
</div>

<br>
<div class="row_label">
    <div class="row_thin_head_ex">Your Benefits</div>
</div>
<div class="row_thin">
    <p><strong style="font-size: 14px">*</strong>The interactive package is for Individuals looking to
        interact with professionals while carrying out business as exporters, importers, local buying agents, or freight forwarder.
        This packages is for Learners/ Professionals in the export/import business who want a large knowledge base in the business.
    <ul>
        <li><span>Talk directly to a professional in the export/import business</span></li>
        <li><span>Get immediate answers to questions you might have</span></li>
        <li><span>Access to the platforms search engine</span></li>
        <li><span>Advertise and request buyers for your available products or services ready for export</span></li>
        <li><span>Get sure links to verified importers on the exportonline platform</span></li>
        <li><span>Advertise your upcoming seminar/program to all exportonline subscribers</span></li>
        <li><span>Access to real-time chat system to connections (people you have been linked to by exportonline)</span></li>
        <li><span>24/7 access to support team on any issue</span></li>
    </ul>
</div>
<div class="row_label">
    <div class="row_thin_head_ex">Requirements</div>
</div>
<div class="row_thin">
    <ul>
        <p>*If you are registering as a company</p>
        <li><span>An established well registered company</span></li>
        <li><span>Proof of company registration (scanned copy) as this will be uploaded in registration process</span></li>
        <li><span>Company name</span></li>
        <li><span>Company logo</span></li>
        <li><span>Brief description of your company.</span></li>
    </ul><br>
    <ul>
        <p>*If you are registering as an Individual</p>
        <li><span>A form of identification (National ID card, Driver's License etc)</span></li>
        <li><span>Brief description about yourself.</span></li>
    </ul>
</div>
<div class="row_label">
    <div class="row_thin_head_ex">FOLLOW THESE STEPS TO COMPLETE REGISTRATION</div>
</div>
<div class="row_thin">
    <ul>
        <li><span>Get all required documents listed above</span></li>
        <li><span>Click on register button below and provide all information in form as required</span></li>
        <li><span>You would receive a verification in your mail if registration is successful.</span></li>
    </ul>
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
            <input type="text" name="reg_as" id="reg_as" placeholder="" readonly value="Importer">
        </div>
        <div class="row_thin_txt">
            <input type="password" name="p_word" id="p_word" placeholder="Password">
            <input type="text" name="c_p_word" id="c_p_word" placeholder="Confirm Password">
        </div>
        <div class="row_thin_txt">
            <input type="submit" name="register" id="register" value="Register" style="margin: 0; background: #0a8226">
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
