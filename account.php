<?php
session_start();
require_once ("db.php");
$db = new MyDB();

if (!isset($_SESSION['log_name']) || !isset($_SESSION['log_id']))
{
    header("Location: index.php");
}
$id = $_SESSION['log_id'];

$sql =<<<EOF
SELECT * FROM users WHERE userid = '$id';
EOF;

$ret = $db->query($sql);

while ($row = $ret->fetchArray(SQLITE3_ASSOC))
{
$uname = $row['uname'];
$userid = $row['userid'];
$badge = $row['regas'];
$profimages = $row['profimages'];
$fname = $row['fname'];
$lname = $row['lname'];
$cname = $row['cname'];
$crcnum = $row['crcnum'];
$caddress = $row['caddress'];
$uaddress = $row['uaddress'];
$uphone = $row['uphone'];
$pword = $row['pword'];
$exporter = "Exporter";
$ibs = "International Buyer";
?>
<!doctype html>
<html xmlns:https="http://www.w3.org/1999/xhtml">
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
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<div class="ex_head">
    <div class="ex_head_content">
        <div class="ex_uname"><p><?php echo "$uname";?></p></div>
        <div class="ex_notify">
            <div class="ex_home"></div>
            <div class="ex_notification"></div>
            <div class="ex_msg_notification"></div>
            <div class="ex_request"></div>
        </div>
    </div>
</div>
<div class="ex_tog_menu">
    <ul>
        <li>
            <?php

            echo "<a href='account.php?userid=$userid'>
<div class='my_account_b'>
<img class='my_account_i' src='$profimages'><div class='badge'><div class='dot'></div><p>$badge</p></div>
</div>
</a>";


            ?>
        </li>
        <li>
            <form action="logout.php" method="post" enctype="multipart/form-data">
                <input type="submit" value="Logout" name="logout">
            </form>
        </li>
    </ul>
</div>
<div class="side_menu">
    <a href="exporter.php"><div class="ex_home_2"></div></a>
    <div class="ex_notification_2"></div>
    <div class="ex_msg_notification_2"></div>
    <div class="ex_request_2"></div>
</div>
<div class="togbar">
    <div class="closetogbar"><p>&Cross;</p></div>
    <ul class="togmenu">
        <li class="toghead">My Account</li>
        <li>Post Request</li>
        <li>Background Checks</li>
        <li><a href="<?php echo"commodityprofile.php?userid=$id"?>">Commodity Profile</a></li>
        <li>Commodity/Quality Control</li>
        <li>Messages</li>
        <li>Contact Support</li>
    </ul>
    <ul class="togmenu">
        <li class="toghead">MENU</li>
        <li>Home</li>
        <li>About Us</li>
        <li>Blog</li>
        <li>News</li>
        <li>Contact Us</li>
    </ul>
    <ul>
      <form action="logout.php" method="post" enctype="multipart/form-data">
          <input type="submit" name="searchlogout" id="searchlogout" class="searchlogout" value="Logout">
      </form>
    </ul>
</div>
<div class="userprofilecover">
  <div class="userprofilegeneral">
    <div class="searchtog">
        <div class="sicon-bar"></div>
        <div class="sicon-bar"></div>
        <div class="sicon-bar"></div>
    </div>
    <div class="userprofileimage">
        <?php echo "<img src='$profimages'>";?>
    </div>
  </div>
</div>
<div class="user_nav">
    <ul>
        <li><a href="#">Post Request</a></li>
        <li><a href="#">Add Upcomung Training/Seminar</a></li>
        <li><a href="#">Request Background Check</a></li>
        <li><a href="#">View Connections</a></li>
    </ul>
</div>
<div class="form_type">
    <ul>
      <li>Select request direction</li>
      <?php
        if ($badge == $exporter)
        {
            echo "<li class='act'><a class='toibs' class='act' href='#'>International Buyers</a></li>
            <li class='act'><a class='tolbas' href='#'>LBAs</a></li>
            <li class='act'><a class='toffs' href='#'>Freight Forwarders</a></li>";
        }
        if ($badge == $ibs)
        {
            echo "<li class='act'><a class='toex' href='#'>Exporter</a></li>
            <li class='act'><a class='tolbas' href='#'>LBAs</a></li>
            <li class='act'><a class='toffs' href='#'>Freight Forwarders</a></li>";
        }
      }
      ?>
    </ul>
</div>
<div class="form_loader"></div>
<script type="text/javascript">
    $(document).ready(function () {
        var tog_menu = document.getElementsByClassName('ex_tog_menu');
        var username = document.getElementsByClassName('ex_uname');
        $(username).click(function () {
            $(tog_menu).slideToggle(200);
        });
        $('.act').click(function () {
            $('.act').removeClass('factive');
            $(this).addClass('factive');
        });
        $('.act a').click(function () {
            $('.act a').removeClass('factive');
            $(this).addClass('factive');
        });
        $('.searchtog').click(function (e) {
          e.stopPropagation();
            $('.togbar').animate({width: 'toggle'}, 350);
        });
        $('.closetogbar').click(function (e) {
          e.stopPropagation();
            $('.togbar').animate({width: 'toggle'}, 350);
        });
        $(document).click(function (e) {
          e.stopPropagation();
            $('.togbar').animate({width: 'toggle'}, 350);
        });
        $('.searchtog').mouseenter(function() {
            var sicons = document.getElementByClassName('sicon-bar');
            $(sicons).css("background", "#fff");
        });
        var links = $(".user_nav li a");
        var req_link = $(links)[0];
        var trainings = $(links)[1]
        var check_link = $(links)[2];
        $(req_link).click(function (e) {
            e.preventDefault();
            $(".form_loader").load("requests.php", function (response, status, xhr) {
                if (status == "error") {
                    console.log(msg + xhr.status + " " + xhr.statusText);
                }
            });
        });
        $('.toibs').click(function (e) {
            e.preventDefault();
            $(".form_loader").load("toibs.php", function (response, status, xhr) {
                if (status == "error") {
                    console.log(msg + xhr.status + " " + xhr.statusText);
                }
            });
        });
        $('.toex').click(function (e) {
            e.preventDefault();
            $(".form_loader").load("toex.php", function (response, status, xhr) {
                if (status == "error") {
                    console.log(msg + xhr.status + " " + xhr.statusText);
                }
            });
        });
        $('.tolbas').click(function (e) {
            e.preventDefault();
            $(".form_loader").load("tolbas.php", function (response, status, xhr) {
                if (status == "error") {
                    console.log(msg + xhr.status + " " + xhr.statusText);
                }
            });
        });
        $('.toffs').click(function (e) {
            e.preventDefault();
            $(".form_loader").load("toffs.php", function (response, status, xhr) {
                if (status == "error") {
                    console.log(msg + xhr.status + " " + xhr.statusText);
                }
            });
        });
        $(trainings).click(function (e) {
            e.preventDefault();
            $(".form_loader").load("training_seminars.php", function (response, status, xhr) {
                if (status == "error") {
                    console.log(msg + xhr.status + " " + xhr.statusText);
                }
            });
        });
        $(check_link).click(function (e) {
            e.preventDefault();
            $(".form_loader").load("background_check.php", function (response, status, xhr) {
                if (status == "error") {
                    console.log(msg + xhr.status + " " + xhr.statusText);
                }
            });
        });
    });
</script>
</body>
</html>
