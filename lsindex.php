<?php
require_once ("db.php");

$db = new MyDB();
session_start();
if (!isset($_SESSION['username'])) {

} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-Xport | Learn Export</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-sclae=1.0">
    <link rel="stylesheet" href="css/main.css" type="text/css" media="screen">
    <link href="fonts/roboto/Roboto-Black.ttf" rel="stylesheet">
    <link href="fonts/roboto/Roboto-Light.ttf" rel="stylesheet">
    <link href="fonts/roboto/Roboto-Medium.ttf" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.1.0.js"></script>
    <script type="text/javascript" src="js/popup.js"></script>
</head>
<body>
<div id="login_area">
    <div class="loginForm">
        <div class="close"><img src="images/close.png"></div>
        <form action="login.php" method="post" enctype="multipart/form-data">
            <input type="email" name="login_email" value="" placeholder="Email">
            <input type="password" name="login_pass" value="" placeholder="Password">
            <input type="submit" name="login_submit" value="Log In"><br>
            <div align="center">
                <a href="">or Sign Up</a>
            </div>
        </div>
        </form>
    <div class="signupForm">
        <div class="close"><img src="images/close.png"></div>
        <form action="signup.php" method="post" enctype="multipart/form-data">
            <input type="text" name="full_name" placeholder="Full Name" value="">
            <input type="email" name="signup_email" value="" placeholder="Email">
            <input type="text" name="signup_user" value="" placeholder="Username">
            <input type="password" name="signup_pass" value="" placeholder="Password">
            <input type="submit" name="signup_submit" value="Sign Up"><br>
            <div align="center">
                <a href="">or Log In</a>
            </div>
        </form>
    </div>
</div>
<div class="ws-header">
    <?php
    $get = (isset($_GET['fail'])) ? $_GET['fail'] : '';
    if((!empty($get)) && ($get == 1))
    {
        echo "<script>alert('Incorrect Username or Password!...Please try again')</script>";
    }
    ?>
    <nav class="nav-home-page">
        <div class="logo"></div>
        <ul class="main-nav">
            <li class="active">
                <a class="nav-item" href="lsindex.php">HOME</a>
            </li>
            <li>
                <a class="nav-item" href="lsindex.php">ABOUT</a>
            </li>
            <li>
                <a class="nav-item" href="lsindex.php">FAQ</a>
            </li>
            <li>
                <a class="nav-item" href="lsindex.php">CONTACT</a>
            </li>
        </ul>
        <div class="btns">
            <div class="logBtn">LOG IN</div>
            <div class="signBtn">SIGN UP</div>
        </div>
    </nav>
</div>

<!-- Navigation for small screens -->
<div class="nav-sm">
<nav class="nav-sm-screen">
    <div class="menu-tog">
        <div class="icon-bar"></div>
        <div class="icon-bar"></div>
        <div class="icon-bar"></div>
    </div>
</nav>
<div class="menu-list">
    <ul>
        <li><a href="index.html">HOME</a></li>
        <li><a href="index.html">ABOUT</a></li>
        <li><a href="index.html">FAQ</a></li>
        <li><a href="index.html">CONTACT</a></li>
    </ul>
    <div class="sm-btns">
        <div class="smlogBtn">LOG IN</div>
        <div class="smsignBtn">SIGN UP</div>
    </div>
</div>

</div>
<div class="slider">
</div>
<div class="about-content">
<div class="about-visual">
    <img src="images/Screenshot_2016-11-23-10-10-11.png">
</div>
    <div class="about-brief">
        <h1>EASY TO USE INTERFACE</h1>
        <footer>Direct, Result Oriented</footer>
        <p>The E-Xport mobile app is efficient for on time response to your export questions. Lorem Ipsium amit
        dolor et la min de lar vagas tu est vas a min tu la min vi a te la tino mint ke espanyol. If coche tu amin
        numero de tu telefono est avi la vida. More is coming on the app. Enjoy the new E-Xport app and do your Export business
         with ease.</p><br>
        <h2>Qualities</h2>
        <ul>
            <li>Available on all Operating systems (android, iOS, windows)</li>
            <li>Easy to navigate</li>
            <li>Reliable and Quick response to questions.</li>
        </ul>

        <div class="downloadBtn">
            <a href="#">DOWNLOAD</a>
        </div>
    </div>
</div>
<div class="faq">
<div class="titles">
    <h1 align="center" style="color: #ffffff; font-size: 3rem; letter-spacing: 5px; margin-bottom: 50px">FAQ</h1>
</div>
    <form class="formSearch" method="post" action="">
        <input type="search" placeholder="Search...">
    </form>
</div>
<div class="contact" style="height: 85%;background-color: #f9f9f9">
    <div class="nlSubscribe">
        <h1 align="center" style="font-family: Roboto Light, Open Sans, Serif">Get Latest News On E-Xport</h1>
        <form action="" method="post"><br><br><br><br><br><br>
            <input style="cursor: auto; font-family: Roboto Light, Open Sans, Serif;
    display: block;
    width: 100%;
    height: auto;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    font-size: 2rem;
            border: none;
            text-align: center;
            border-bottom: 1px solid #999;
            padding-bottom: 0.22em;
            background-color: transparent;
            color: #212121;" type="email" value="" name="email" placeholder="Enter your mail">
<div align="center">
            <input type="submit" name="submit" value="SUBMIT" style="padding: 10px;
	color: #fff;
	background: #212121;
	width: 150px;
	border: 0px;
	font-family: Roboto Light, Open Sans, Serif;
	border-radius: 3px;
	cursor: pointer;
	transition: all linear 0.2s; margin-top: 40px;">
</div>
        </form>
    </div>
    <div class="sendMsg">
        <h1>Send Us A Message</h1>
        <form action="sendmsg.php" method="post">
            <?php
            $get = (isset($_GET['success'])) ? $_GET['success'] : '';
            if((!empty($get)) && ($get == 1))
            {
                echo "<script type='text/javascript'>alert('Message sent successfully.')</script>";
            }
            ?>
            <input type="text" name="name" value="" placeholder="First & Last Name">
            <input type="email" name="email" value="" placeholder="Your Email Address">
            <input type="text" name="subject" value="" placeholder="Your Subject">
            <textarea name="message" placeholder="Your Message" rows="5"></textarea>
            <input type="submit" name="send" value="SEND">
        </form>
    </div>
</div>
<div class="footer">
    <div class="quickNav">
        <ul>
            <li>Home</li>
            <li>About</li>
            <li>FAQ</li>
            <li>Contact</li>
            <li>Terms & Conditions</li>
            <li>Privacy Policies</li>
        </ul>
    </div>
    <div class="quickNav">
        <ul>
            <li>Home</li>
            <li>About</li>
            <li>FAQ</li>
            <li>Contact</li>
            <li>Terms & Conditions</li>
            <li>Privacy Policies</li>
        </ul>
    </div>
    <div class="quickNav">
        <ul>
            <li>Home</li>
            <li>About</li>
            <li>FAQ</li>
            <li>Contact</li>
            <li>Terms & Conditions</li>
            <li>Privacy Policies</li>
        </ul>
    </div>
    <div class="quickNav">
        <ul>
            <li>Home</li>
            <li>About</li>
            <li>FAQ</li>
            <li>Contact</li>
            <li>Terms & Conditions</li>
            <li>Privacy Policies</li>
        </ul>
    </div>
</div><br><br><br><br><br><br>
<div class="rights">
    <p style="padding-left: 50px; padding-top: 20px;">Copyright &copy; E-Xport 2016. All Rights Reserved.</p>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.menu-tog').click(function () {
            $('.menu-list').slideToggle(500);
            $('.menu-tog div:first-child').toggleClass('one');
            $('.menu-tog div:nth-child(2)').toggleClass('vanish');
            $('.menu-tog div:last-child').toggleClass('two');
        });
    });
    $(document).scroll(function () {
       var y = $(this).scrollTop();
        if (y > 100) {
            $(".main-nav:first-child").removeClass("active");
            $(".main-nav:nth-child(2)").addClass("active");
        }
    });
</script>

</body>
</html>
