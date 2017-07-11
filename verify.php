<?php
require_once ("db.php");

$db = new MyDB();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Exporter Registration | Welcome</title>
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
  <?php
    $get = (isset($_GET['success'])) ? $_GET['success'] : '';
    if((!empty($get)) && ($get == 1))
    {
        echo "<script type='text/javascript'>alert('Registration Successful..Please check your email for verification.')</script>";
    }
    ?>
  <?php
        $get = (isset($_GET['fill'])) ? $_GET['fill'] : '';
        if((!empty($get)) && ($get == 1))
        {
            echo "<script type='text/javascript'>alert('Please fill in all fields!.')</script>";
        }
        ?>
<div class="verificationform">
<h1>Payment Verification</h1>
<form action="verification.php" method="post" enctype="multipart/form-data">
<input type="text" name="transactionid" id="transactionid" placeholder="Transaction ID">
<input type="text" name="payname" id="payname" placeholder="Name Used for Payment">
<input type="text" name="bankname" id="bankname" placeholder="Name of Bank">
<input type="email" name="paymail" id="paymail" placeholder="Your email address"><br><br>
<input type="submit" name="verify_sub" id="verify_sub" value="Submit">
</form>
</div>
</body>
</html>
