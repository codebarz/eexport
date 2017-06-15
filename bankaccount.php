<?php
session_start();
require_once ("db.php");
$db = new MyDb();


if (!isset($_SESSION['bname']))
{
    header('Location: banks/index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Export Funding/Finance | Welcome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/banks.css" type="text/css" media="screen">

    <link rel="stylesheet" href="fonts/font-awesome.css">

    <script src="js/popup.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-3.1.0.js"></script>
    <script type="text/javascript" src="js/msg.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/cycle2.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/eexport.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body style="background: #f1f1f1;">
<div class="bank_content">
  <div class="notify_area">
      <form action='make_read.php' id='upd_unread' method='post' enctype='multipart/form-data'>
          <input type='submit' name='make_read' id='make_read' value='x'>
      </form>
      <div class="notify">

      </div>
  </div>
<?php

$bname = $_GET['bname'];
$_SESSION['bname'] = $bname;

// echo $bname;

$sql = $db->query("SELECT * FROM banks WHERE bname = '$bname'");

while ($row = $sql->fetchArray(SQLITE3_ASSOC)) {
    $id = $row['id'];
    $banklogo = $row['banklogo'];
    $bankbrief = $row['bankbrief'];
    $bankname = $row['bname'];
    $bankban = $row['bankbanner'];
    $bankreq = $row['bankreq'];

    echo "<div class='bank_prof_ban'>
    <div class='dim'></div>
    <div class='banklogout'>
        <form action='logout.php' method='post' enctype='multipart/form-data'>
            <input type='submit' name='logout' id='logout' value='Logout'>
        </form>
    </div>
    <div class='bank_prof_logo'>
      <img src='$banklogo'>
    </div>
    <div class='bank_name'><p>$bankname.</p></div>
    <div class='bank_icons'>
        <a href='editbankaccount.php?bname=$bankname'><div class='bank_icons_img' title='Edit Account'><img src='images/editbank.png'></div></a>";

        $unread = 0;

        $lsql = $db->query("SELECT group_hash FROM chatportal WHERE flag = '$unread' ORDER BY from_id ASC LIMIT 1");

        while ($lrow = $lsql->fetchArray(SQLITE3_ASSOC))
        {
            $group_hash = $lrow['group_hash'];

            echo "<a href='chatportal.php?group_hash=$group_hash'><div class='bank_icons_img ungray' title='Send a message'>
            <img src='images/bnsendmsg.png'>
            <div class='msgn_icon'></div>
            </div>
            </a>";
        }

        echo "<div class='bank_icons_img' title='Call'><img src='images/bncall.png'></div>
    </div>
    <img src='$bankban'>
    </div>
    <div class='bank_require'>
        <h2>About Us<img class='req_img' src='images/bout.png'></h2>
        <p>$bankbrief</p>
        <h2>Requirement for Export Funding/Finance<img class='req_img' src='images/req.png'></h2>
        <p>$bankreq</p>
    </div>
    ";
}
?>
<script type="text/javascript">
    $(document).ready(function () {
        setInterval(function () {
            $.ajax({
                type: "GET",
                url: "banknotify.php",
                dataType: "html",
                success: function (response) {
                    $('.msgn_icon').html(response);
                }
            });
        }, 2000);
        setInterval(function () {
            $.ajax({
                type: "GET",
                url: "bankpagesnotify.php",
                dataType: "html",
                success: function (response) {
                    $('.notify').html(response);
                }
            });
        }, 2000);
    });
</script>
</div>
</body>
</html>
