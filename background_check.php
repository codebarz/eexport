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
<div class="post_req">
    <p>*Request would be sent to us and further discussion would continue via the email you registered with</p>
    <form action="" method="post" enctype="multipart/form-data">
        <textarea name="check_req" id="check_req" placeholder="example: Iwould like a background check on Ace Welding Co., 42, Lagos Rd. on how good they are with export"
                  rows="6"></textarea><br>
        <input type="submit" name="submit_req" id="submit_req" value="Send Request">
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
    });
</script>
</body>
</html>
