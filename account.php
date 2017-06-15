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
<div class="account_details">
    <div class="account_l">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="account_i">
                    <label for="edit_i"><i><img src="images/edit.png"></i></label>
                    <input type="file" name="edit_i" id="edit_i">
                <?php
                echo "<img src='$profimages'>";
                ?>
            </div>
            <label for="edit_uname">Username: </label>
            <input type="text" name="edit_uname" id="edit_uname" value="<?php echo $uname;?>" placeholder="">
            <label for="edit_fname">First Name: </label>
            <input type="text" name="edit_fname" id="edit_fname" value="<?php echo $fname;?>" placeholder=""><br>
            <label for="edit_lname">Last Name: </label>
            <input type="text" name="edit_lname" id="edit_lname" value="<?php echo $lname;?>" placeholder="">
            <label for="edit_cname">Company Name: </label>
            <input type="text" name="edit_cname" id="edit_cname" value="<?php echo $cname;?>" placeholder=""><br>
            <label for="edit_crcnum">RC Number: </label>
            <input type="text" name="edit_crcnum" id="edit_crcnum" value="<?php echo $crcnum;}?>" placeholder="">
            <input type="submit" name="save_changes" id="save_changes" value="save changes">
            <a href="#">Change Password</a>
        </form>
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
<div class="form_loader"></div>
<script type="text/javascript">
    $(document).ready(function () {
        var tog_menu = document.getElementsByClassName('ex_tog_menu');
        var username = document.getElementsByClassName('ex_uname');
        $(username).click(function () {
            $(tog_menu).slideToggle(200);
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

