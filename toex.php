<?php
require_once ("db.php");
$db = new MyDB();

session_start();
if (!isset($_SESSION['log_name']) || !isset($_SESSION['log_id']))
{
    header("Location: index.php");
}
$id = $_SESSION['log_id'];

$sql =<<<EOF
SELECT * FROM users WHERE userid = '$id';
EOF;

$ret = $db->query($sql);

while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
    $uname = $row['uname'];
    $userid = $row['userid'];
    $badge = $row['regas'];
    $profimages = $row['profimages'];
}
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
<div class="success"></div>
<div class="post_req">
    <form action="toex_exec.php" method="post" enctype="multipart/form-data" id="post_form">
        <input type="text" name="req_title" id="req_title" placeholder="Request title. (Example: Dried Cashew Nuts)">
        <input type="text" name="req_min" id="req_min" placeholder="Minimum Order. (Example: 2 Tons, 7800 units, 40 container, 1 Barrel)">
        <div class="form_division">
            <input type="text" name="req_entry" id="req_entry" placeholder="Point of Entry">
            <input type="text" name="req_payment" id="req_payment" placeholder="Payment Method">
        </div>
        <div class="imgprev"><img id="imgprev" src=""></div>
        <label for="comimg">Upload Commodity Image</label><br>
        <input type="file" onchange="commoditypreview()" name="comimg" id="comimg">
        <input style="background: #f7f7f7; border: none" type="text" name="to_who" id="towho" readonly value="Exporter">
        <textarea name="post_req" id="post_req" placeholder="Briefly describe your request" rows="6"></textarea><br>
        <input type="submit" name="submit_req" id="submit_req" value="Post Request">
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var tog_menu = document.getElementsByClassName('ex_tog_menu');
        var username = document.getElementsByClassName('ex_uname');
        $(username).click(function () {
            $(tog_menu).slideToggle(200);
        });
        var poi = document.getElementsByName("req_entry");

        function commodityPreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgprev').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#comimg').change(function () {
            commodityPreview(this);
        });
    });
</script>
</body>
</html>
