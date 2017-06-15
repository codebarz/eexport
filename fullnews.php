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

while ($row = $ret->fetchArray(SQLITE3_ASSOC))
{
$uname = $row['uname'];
$userid = $row['userid'];
$badge = $row['regas'];
$profimages = $row['profimages'];
$cname = $row['cname'];

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
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
          rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<div class="ex_head">
    <div class="ex_head_content">
        <div class="ex_uname"><p><?php echo "$uname"; ?></p></div>
        <div class="ex_notify">
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
<img class='my_account_i' src='$profimages'>";
            ?>
            <?php
            if ($badge == "Exporter")
            {
                echo "<div class='badge'><div class='dot'></div><p>$badge</p></div>";
            }
            if ($badge == "Importer")
            {
                echo "<div class='badge' style='background: #0a8226'><div class='dot'></div><p>$badge</p></div>";
            }
            if ($badge == "Local Buying Agent")
            {
                echo "<div class='badge' style='background: #eb3c00'><div class='dot'></div><p>$badge</p></div>";
            }
            if ($badge == "Freight")
            {
                echo "<div class='badge' style='background: #a8590d'><div class='dot'></div><p>$badge</p></div>";
            }
            echo "</div></a>";
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
    <div class="ex_user"></div>
    <div class="ex_notification_2"></div>
    <div class="ex_msg_notification_2"></div>
    <div class="ex_request_2"></div>
</div>
<div class="all_contents">
    <div class="user_nav_2">
        <ul>
            <li style="color: #4abdac;">&rightarrow;</li>
            <li><a href="">Upcoming Trainings/Seminar</a></li>
            <li><a href="">Add Upcoming Training/Seminar</a></li>
            <li><a href="">Request Background Check</a></li>
            <li><a href="">Connections</a></li>
        </ul>
    </div>
    <div class="main_posts">
        <?php
        $pql = <<<EOF
SELECT * FROM users_request ORDER BY req_id DESC;
EOF;
        $pret = $db->query($pql);

        while ($prow = $pret->fetchArray(SQLITE3_ASSOC))
        {
            $req_title = $prow['req_title'];
            $min_order = $prow['min_order'];
            $poi = $prow['poi'];
            $pay_method = $prow['pay_method'];
            $req_brief = $prow['req_brief'];
            $post_id = $prow['post_id'];

            $usql =<<<EOF
SELECT * FROM users WHERE userid = '$post_id';
EOF;
            $uret = $db->query($usql);

            while ($urow = $uret->fetchArray(SQLITE3_ASSOC))
            {

                $badge = $urow['regas'];
                $cname = $urow['cname'];
                $profimages = $urow['profimages'];

                echo "<div class='user_post'>
            <div class=\"post_title\"><p>$req_title</p></div>
            <div class=\"poster\"><img src='$profimages'></div>
            <div class=\"poster_name\"><p>$cname</p></div>
            <div class=\"post_req_details\"><p>$req_brief</p></div>
            <div class=\"post_requirements\">
                <p>Min Order: <span>$min_order</span></p>
                <p>POI: <span>$poi</span></p>
                <p>Payment Method: <span>$pay_method</span></p>
            </div><div class=\"post_badge_contact\">";
                ?>
                <?php
                if ($badge == "Exporter")
                {
                    echo "<div class='badge_2'><div class='dot'></div><p>$badge</p></div>";
                }
                if ($badge == "Importer")
                {
                    echo "<div class='badge_2' style='background: #0a8226'><div class='dot'></div><p>$badge</p></div>";
                }
                if ($badge == "Local Buying Agent")
                {
                    echo "<div class='badge_2' style='background: #eb3c00'><div class='dot'></div><p>$badge</p></div>";
                }
                if ($badge == "Freight")
                {
                    echo "<div class='badge_2' style='background: #a8590d'><div class='dot'></div><p>$badge</p></div>";
                }
                echo "</div></div></div>";
            }
        }
        }
        ?>
    </div>
    <div class="news_others">
        <div id="slide">
            <?php
            $nwql = <<<EOF
SELECT * FROM news_prev;
EOF;
            $nwret = $db->query($nwql);

            while ($nwrow = $nwret->fetchArray(SQLITE3_ASSOC))
            {
                $id = $nwrow['id'];
                $img = $nwrow['img'];
                $news_title = $nwrow['news_title'];
                $news_brief = $nwrow['news_brief'];

                echo "<div>
<img src='$img'>
<p style='font-size: 16px;'><a style='color: #4abdac' href='fullnews.php?id=$id'>$news_title</a></p>
<p>$news_brief</p>
</div>";
            }

            ?>

        </div>
        <div id="banner">
            <img src="images/EXPORT%20BANNER.png">
        </div>
    </div>
</div>
<div class="foot"></div>
<script type="text/javascript">
    $(document).ready(function () {
        var tog_menu = document.getElementsByClassName('ex_tog_menu');
        var username = document.getElementsByClassName('ex_uname');
        $(username).click(function () {
            $(tog_menu).slideToggle(200);
        });
        $('#slide div:first-child').addClass('current');
    });
    $(function () {

        setInterval ("slideImages()", 5000);

    });

    function slideImages () {
        var oCurImage = $("#slide div.current");
        var oNxtImage = oCurImage.next();

        if (oNxtImage.length == 0) {
            oNxtImage = $("#slide div:first-child");
        }

        oCurImage.fadeOut().removeClass('current');
        oNxtImage.fadeIn().addClass('current').animate({opacity: 1.0}, 1000);
    }
</script>
</body>
</html>
