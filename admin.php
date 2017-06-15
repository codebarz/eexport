<?php
session_start();
require_once("db.php");

$db = new MyDB();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>admin portal</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <script src="js/jquery-3.1.0.js" type="text/javascript"></script>
    <script src="js/jquery-ui-1.12.1.custom" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
</head>

<body>
<div id="head"></div>
    <div align="center">
    <div class="form-area">
        <form action="admin_log.php" id="log_from" method="post" enctype="multipart/form-data">
            <input type="text" name="username" value="" placeholder="Username"><br>
            <input type="password" name="password" value="" placeholder="Password"><br>
            <input type="submit" name="login" value="Log In"><br>
            <a href="#">Forgot Password?</a><a class="reg_form" href="#"> or Register Here</a>
        </form>
        <form action="admin_req.php" method="post" enctype="multipart/form-data" id="reg_form">
            <input type="text" name="fname" value="" placeholder="Full Name"><br>
            <input type="email" name="email" value="" placeholder="Email"><br>
            <input type="text" name="username" value="" placeholder="Username"><br>
            <input type="password" name="password" value="" placeholder="Password"><br>
            <input type="submit" name="reg" value="Register"><br>
            <a href="#">Forgot Password?</a><a class="log_form" href="#"> or Login Here</a>
        </form>
    </div>
    </div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.reg_form').click(function (e) {
            $('.form-area').css("margin-top", "60px");
            e.preventDefault();
            $('#log_from').hide();
            $('#reg_form').fadeIn('slow');
        });
        $('.log_form').click(function (e) {
            $('.form-area').css("margin-top", "100px");
            e.preventDefault();
            $('#reg_form').hide();
            $('#log_from').fadeIn('slow');
        });
    });
</script>
</body>
</html>


