<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start();
require_once ("db.php");
$db = new MyDb();

if (!isset($_SESSION['log_name']) || !isset($_SESSION['log_id']))
{
    // echo "<div class='bankAlert'>
    // <div class='bnMsgBox'>
    // <img src='images/sadface.png'>
    // <p>You need to have an account to chat with the bank</p>
    // </div>
    // </div>";
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
<?php

$bname = $_GET['bname'];
$_SESSION['bname'] = $bname;

// echo $bname;

$sql = $db->query("SELECT * FROM banks WHERE bname = '$bname'");

while ($row = $sql->fetchArray(SQLITE3_ASSOC)) {
    $my_id = $_SESSION['log_id'];
    $id = $row['id'];
    $banklogo = $row['banklogo'];
    $bankbrief = $row['bankbrief'];
    $bankname = $row['bname'];
    $bankban = $row['bankbanner'];
    $bankreq = $row['bankreq'];

    echo "<div class='bank_prof_ban'>
    <div class='dim'></div>
    <div class='bank_prof_logo'>
      <img src='$banklogo'>
    </div>
    <div class='bank_name'><p>$bankname.</p></div>
    <div class='bank_icons'>";

    $msql = <<<EOF
SELECT COUNT(hash) FROM bankconnects WHERE (user = '$my_id' AND bank = '$bankname');
EOF;
    $mret = $db->querySingle($msql);

    if ($mret == 1)
    {
        $hsql = <<<EOF
SELECT hash FROM bankconnects WHERE (user = '$my_id' AND bank = '$bankname');
EOF;
        $hret = $db->query($hsql);

        while ($hrow = $hret->fetchArray(SQLITE3_ASSOC))
        {
            $hash = $hrow['hash'];

        echo "<a href='chatportal.php?group_hash=$hash' class='bank_icons_img_btn' name='user_connect'></a>";
        }
    }
    else
    {
    echo "<form action='b_connect_exec.php' method='post' enctype='multipart/form-data'>
        <input type='submit' class='bank_icons_img_btn' value='' name='bank_con' id='bank_con' title='Send a message'>
        </form>";
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
</body>
</html>
