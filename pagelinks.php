<?php

require_once ("db.php");

$db = new MyDB();

?>

<!DOCTYPE html>
<html>
<head>
    <title>E-Xport | Welcome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" type="text/css" media="screen">
    <script src="js/popup.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-3.1.0.js"></script>
    <script type="text/javascript" src="js/msg.js"></script>
</head>
<body>
<div class="messaging_area">
    <div class="messaging_box">
        <div class="close"><img src="images/close.png"></div><br>
        <div class="discussion"></div>
        <div class="msg_input">
            <form action="" method="post" enctype="multipart/form-data" name="message">
                <input type="text" name="ask" id="ask" value="" placeholder="Ask...">
                <input type="submit" name="sendMsg" id="sendMsg" value="send">
            </form>
        </div>
    </div>
</div>
<div class="header">
    <div class="logoic"><h2>E-Xport</h2></div>
    <div class="profilename"></div>
    <div class="profileImage"></div>
    <div class="search_icon">
        <img src="images/search_icon.png">
    </div>
    <div class="searchgen">
        <form>
            <input type="search" name="searchgen" placeholder="Search E-Xport...">
        </form>
    </div>
</div>
<div class="cat_image">
    <div class="tog">
        <div class="icon-bar-user"></div>
        <div class="icon-bar-user"></div>
        <div class="icon-bar-user"></div>
    </div>
    <div class="msg_icon"><img src="images/chat.png"></div>
    <ul class="options">
        <li class="active">
            <a class="nav-item" href="lsindex.php">Category</a>
        </li><br>
        <li>
            <a class="nav-item" href="lsindex.php">Ask Question</a>
        </li><br>
        <li>
            <a class="nav-item" href="lsindex.php">Message</a>
        </li><br>
    </ul>
    <div class="back"><img src="images/back.png"></div>
    <div class="shadow"></div>
</div>
<div class="page"><h3>Category</h3></div>

<form action="searchpage.php" method="post" class="search">
    <input type="search" placeholder="Search Category..." name="searchp">
    <input type="submit" name="searchpage" value="">
</form>
<!-- FIX MESSAGING ICON
<div class="sendMsg"><img src="images/messaging.png"></div>-->
<div class="main_content">
   <div class="pagelink">

   </div>
</div>
<div class="sidebar"></div>

<!--<br><br>
<div align="center">
    <a href="weblogout.php">Log Out</a>
</div>-->

<script type="text/javascript">
    $(document).ready(function () {
        $('.tog').click(function () {
            $('.options').slideToggle(500);
            $('.tog div:nth-child(2)').toggleClass("vanisher");
            $('.tog div:first-child').toggleClass("roright");
            $('.tog div:last-child').toggleClass("roleft");
        });
        $('.search_icon').click(function () {
            $('.searchgen').animate({'width': 'toggle'});
        });
        $('.msg_icon').click(function () {
            $('.messaging_area').fadeIn('slow');
        });
        $('.close').click(function () {
            $('.messaging_area').fadeOut('fast');
        });
    });
</script>
</body>
</html>
