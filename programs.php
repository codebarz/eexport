<?php
require_once ("db.php");
$db = new MyDB();
session_start();

include ("addons.php");

$id = $_SESSION['log_id'];

$ssql = <<<EFO
SELECT * FROM users WHERE userid = $id;
EFO;

$sret = $db->query($ssql);

while ($srow = $sret->fetchArray(SQLITE3_ASSOC)) {
$userid = $srow['userid'];
$userimg = $srow['profimages'];

?>
<!DOCTYPE html>
<html>
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

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
</head>
<body>
<div class="sm_header">
    <div class="sm_user_prof_img"><?php echo "<img src='$userimg'>"?></div>
    <div class="notify_icon_2">
        <img src="images/notify.png">
    </div>
    <div class="toggle_sm">
        <div class="icon-bar-sm"></div>
        <div class="icon-bar-sm"></div>
        <div class="icon-bar-sm"></div>
    </div>
</div>
<div class="toggle_sm_menu"></div>
<div class="msg_sm_icon"><img src="images/sm_msg.png">
    <div class="not_count_2"></div></div>
<div class="fixed">
    <div class="padding">
        <div class="header" style="width: 100%">
            <div class="notify_icon" style="margin-left: 50px">
                <img src="images/notify.png">
            </div>
            <div class="request_icon">
                <img src="images/sell.png">
            </div>
            <div class="msgn_icon">
                <img src="images/messages.png">
            </div>
            <div class="chats_icon">
                <img src="images/chats.png">
            </div>
            <div class="contact_support">
                <p>Contact Support</p>
            </div>
            <div class="user_account">
                <div class="user_prof_image">
                    <?php echo "<img src='$userimg'>";?>
                </div>
                <div class="user_prof_func"><p><?php echo $_SESSION['log_name'];?></p></div>
            </div>
        </div>
        <div class="user_prof_menu">
            <ul>
                <li>
                    <?php

                    echo "<a href='useraccount.php?userid=$userid'>My Account</a>";


                    }
                    ?>
                </li>
                <li>
                    <form action="logout.php" method="post" enctype="multipart/form-data">
                        <input type="submit" name="logout" id="logout" value="Logout">
                    </form>
                </li>
            </ul>
        </div>
        <div class="header_menu" style="width: 100%">
            <form action="searchall.php" method="post" enctype="multipart/form-data">
                <input type="submit" name="search" id="submit_search" value="">
                <input type="search" name="search" id="search" placeholder="Ask your question">
            </form>
            <div class="main_nav">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="get_questions.php?category_id=5">CATEGORIES</a></li>
                    <li><a href="news.php">NEWS</a></li>
                    <li class="active"><a href="programs.php">PROGRAMS</a></li>
                    <li><a href="#">POTENTIALS</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="program_area">
    <div class="results">
        <form action="" method="post" enctype="multipart/form-data" id="search_progs">
            <input type="search" name="search_prog" id="search_prog" placeholder="Search based on program type">
            <input type="submit" name="sub_search_prog" id="sub_search_prog" value="">
        </form>

<?php

$sql = <<<EOF
SELECT COUNT(*) as count FROM programs;
EOF;

$ret = $db->querySingle($sql);

if ($ret == 0)
{
    echo "<div class='no_prog'>No programs currently advertised</div>";
}
else
{
    $rsql = <<<EOF
SELECT * FROM programs ORDER BY id DESC;
EOF;


    $rret = $db->query($rsql);

    while ($rrow = $rret->fetchArray(SQLITE3_ASSOC))
    {
        $banner = $rrow['banner'];
        $banner_2 = $rrow['banner_2'];
        $title = $rrow['sem_title'];
        $spons = $rrow['sem_spons'];
        $link = $rrow['sem_link'];
        $company = $rrow['sem_comp'];
        $brief = $rrow['sem_brief'];
        $ad_id = $rrow['userid'];

        $usql = <<<EOF
SELECT * FROM users WHERE userid = '$ad_id';
EOF;
        $uret = $db->query($usql);

        while ($urow = $uret->fetchArray(SQLITE3_ASSOC))
        {
            $ad_img = $urow['profimages'];
            $ad_name = $urow['fname'];


        echo "<div class=\"preview_prog\">
            <div class='posted_by'>
            <p><img src='$ad_img'></p>
</div>
<div class='ad_user_info'>
    <div class='ad_info'>
        <div class='ad_info_img'>
            <img src='$ad_img'>
        </div>
        <div class='ad_info_name'>
        <p>$ad_name</p>
</div>
        <div class='ad_info_conn'>
        <div class='ad_info_conn_btn'>
            ";
            ?>
            <?php
            $my_id = $_SESSION['log_id'];

            $msql = <<<EOF
SELECT COUNT(hash) FROM connect WHERE (user_one = '$my_id' AND user_two = '$ad_id') OR (user_one = '$ad_id' AND user_two = '$my_id');
EOF;
            $mret = $db->querySingle($msql);

            if ($mret == 1)
            {
                $hsql = <<<EOF
SELECT hash FROM connect WHERE (user_one = '$my_id' AND user_two = '$ad_id') OR (user_two = '$my_id' AND user_one = '$ad_id');
EOF;
                $hret = $db->query($hsql);

                while ($hrow = $hret->fetchArray(SQLITE3_ASSOC))
                {
                    $hash = $hrow['hash'];

                echo "<div class='conn_img'>
                <img src='images/messages.png'>
            </div>
<a href='user_msg.php?hash=$hash' class='conn_text' name='user_connect'>Message</a>";
                }
            }
            else
            {
                echo "<div class='conn_img'>
                <img src='images/connect.png'>
            </div>
<form action='connect_exec.php' method='post' id='connect_form' enctype='multipart/form-data'>
            <input type='text' name='conn_id' id='conn_id' value='$ad_id'>
            <input type='submit' name='connect' class='conn_text' id='connect' value='connect +'>
            </form>";
            }

            ?>
            <form action='connect_exec.php' method='post' id='connect_form' enctype='multipart/form-data'>
            <input type='text' name='conn_id' id='conn_id' value='$ad_id'>
            <input type='submit' name='connect' class='conn_text' id='connect' value='connect +'>
            <!--<a href='user_connect.php?userid=$ad_id' class='conn_text' name='user_connect'>Connect +</a>-->
            </form>
        <?php
     echo "</div>
</div>
    </div>
    <div class='msg_loader'></div>
</div>
            <div  class='preview_prog_img_2 cycle-slideshow'
            data-cycle-fx = \"fade\"
            data-cycle-speed = \"600\"
            data-cycle-timeout = \"5000\"
            data-cycle-pager = \"#pager\"
            data-cycle-next = \"#next\"
            data-cycle-prev = \"#prev\"
            data-cycle-manual-fx = \"scrollHorz\"
            data-cycle-manual-speed = \"400\"
            data-cycle-pager-fx = \"fade\">
                <img id=\"preview_prog_img\" src=\"$banner\">
                <img src='$banner_2'>
            </div>
            <div id=\"details_2\">
                <p>Program Title: </p>
                <p id=\"prog_titlev\">$title</p>
                <p>About:</p>
                <p id=\"prog_about\">$brief</p>
                <p>Company name: </p>
                <p id=\"prog_compv\">$company</p>
                <p>Visit: </p>
                <p id=\"prog_site\"><a href='$link'>$link</a></p>
                <p>Sponsored by: </p>
                <p id=\"prog_sponsv\">$spons</p>
            </div>
        </div>";
        }
    }
}


?>
    </div>
</div>
    <div class="sidebar"><br><br><br><br><br><br><br></div>
<div class="chat_box"></div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.user_prof_func').click(function () {
            $('.user_prof_menu').slideToggle();
        });
        $('.posted_by').click(function () {
            $(this).next().slideToggle();
//            $('.ad_user_info').slideToggle();
        });
        $('.toggle_sm').click(function () {
            $('.toggle_sm_menu').animate({width: 'toggle'}, 350);
        });
    });
    setInterval(function () {
        $.ajax({
            type: "GET",
            url: "msg_notify.php",
            dataType: "html",
            success: function (response) {
                $('.not_count_2').html(response);
            }
        });
    }, 2000);
</script>
</body>
</html>
