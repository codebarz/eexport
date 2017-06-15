<?php
require_once ("db.php");
$db = new MyDB();
session_start();
if (!isset($_SESSION['log_name']) || !isset($_SESSION['log_id']))
{
    echo "<script>alert('Please Login or Sign up')</script>";
    header("Location: index.php");
}

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
<html xmlns:https="http://www.w3.org/1999/xhtml">
    <head>
        <title>E-Xport | Welcome</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/main.css" media="screen">

        <link rel="stylesheet" href="fonts/font-awesome.css">

        <script type="text/javascript" src="js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/cycle2.js"></script>
        <script type="text/javascript" src="js/msg.js"></script>
        <script src="js/popup.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript">
            function searchq() {
                var searchTxt = $("input[name='cat_search']").val();

                $.post("instant_search.php", {searchVal: searchTxt}, function (echo) {
                    $('.cat_questions').html(echo);
                });
            }
        </script>
    </head>
    <body>
    <div class="padding">
    <div class="head_col">
    <div class="header">
        <div class="notify_icon">
        </div>
        <div class="request_icon">
        </div>
        <a href="user_msg.php" target="_blank"><div class="msgn_icon">
        </div></a>
        <div class="chats_icon">
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
    <div class="divider"></div>
    <div class="header_menu">
        <form action="searchall.php" method="post" enctype="multipart/form-data">
            <input type="submit" name="search" id="submit_search" value="">
            <input type="search" name="search" id="search" placeholder="Ask your question">
        </form>
        <div class="main_nav">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li class="active"><a href="get_questions.php?category_id=5">CATEGORIES</a></li>
                <li><a href="news.php">NEWS</a></li>
                <li><a href="programs.php">PROGRAMS</a></li>
                <li><a href="#">POTENTIALS</a></li>
            </ul>
        </div>
    </div>
    </div>
</div>
<!--    <div class="notify_2">-->
<!--        <div class="notify_area_2">-->
<!--            <form action='make_read.php' id='upd_unread' method='post' enctype='multipart/form-data'>-->
<!--                <input type='submit' name='make_read' id='make_read' value='x'>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<div class="notify_area">
    <form action='make_read.php' id='upd_unread' method='post' enctype='multipart/form-data'>
        <input type='submit' name='make_read' id='make_read' value='x'>
    </form>
    <div class="notify">

    </div>
</div>
    <div id="cat_image">
        <div id="slideshow" class="cycle-slideshow"
             data-cycle-fx = "fade"
             data-cycle-speed = "600"
             data-cycle-timeout = "3000"
             data-cycle-pager = "#pager"
             data-cycle-next = "#next"
             data-cycle-prev = "#prev"
             data-cycle-manual-fx = "scrollHorz"
             data-cycle-manual-speed = "400"
             data-cycle-pager-fx = "fade">

            <?php
            $bsql = <<<EOF
SELECT banner FROM programs;
EOF;

            $bret = $db->query($bsql);

            if (!$bret)
            {
            }
            else
            {
                while ($brow = $bret->fetchArray(SQLITE3_ASSOC))
                {
                    $banner = $brow['banner'];

                    echo "<img src='$banner'>";
                }
            }

            ?>

        </div>
        <!--    <div id="pager"></div>-->
        <img id="prev" src="images/prev1.svg"/>
        <img id="next" src="images/next1.svg"/>
    </div>
    <div class="page">
        <ul>
            <?php
            $sql =<<<EOF
SELECT * FROM addcategory;
EOF;
            $ret = $db->query($sql);

            while ($row = $ret->fetchArray(SQLITE3_ASSOC))
            {
                $id = $row['catID'];
                $catname = $row['catname'];

                echo "<li class='act'><a href='get_questions.php?category_id=$id'>$catname</a></li>";
            }

            ?>
            <!--        <li class='act'><a href="activity.php">Agro Export</a></li>-->
            <!--        <li class='act'><a href="activity.php">Manufactured Export</a></li>-->
            <!--        <li class='act'><a href="activity.php">Solid Minerals Export</a></li>-->
            <!--        <li class='act'><a href="activity.php">Service Export</a></li>-->
        </ul>
    </div>
    <div class="cat_search">
        <form method="post" action="instant_search.php" enctype="multipart/form-data">
            <input type="search" onkeydown="searchq();" name="cat_search" id="cat_search" autocomplete="off" placeholder="Ask your question">
            <input type="submit" name="sub_cat_search" id="sub_cat_search" value="">
        </form>
    </div>
<!--    <div class="radio_btn"><input type="radio" name="search_results" value="0" id="search_results">-->
<!--        <label for="search_results">Search Results</label>-->
<!--        <input type="radio" name="suggestions" value="1" id="suggestions">-->
<!--        <label for="suggestions">Suggestions</label>-->
<!--    </div>-->

    <div class="cat_content">
        <div class="cat_questions">
                <?php
                $catid = (int)$_GET['category_id'];

                $sql =<<<EOF
SELECT * FROM questions WHERE category_id = {$catid} ORDER BY category_id DESC;
EOF;

                $ret = $db->query($sql);

                while ($row = $ret->fetchArray(SQLITE3_ASSOC))
                {
                    $question = $row['question'];
                    $answer = $row['answer'];

                    echo "<div class='cat_question_area'><div class='cat_question'><p>$question</p></div><div class='cat_answer'><p>$answer</p></div></div>";
                }

                ?>
            </div>
        <div class="cat_news"></div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#submit_search').click(function (e) {
                e.preventDefault();
                $('#search').fadeIn('fast');
            });
            $('.user_prof_func').click(function () {
                $('.user_prof_menu').slideToggle();
            });
            $('#cat_search').on("change keyup paste", function () {
                if ($('#cat_search').val().length > 0) {
                    $('#cat_image').slideUp();
                } else {
                    $('#cat_image').slideDown();
                }
            });
            $('.act').click(function () {
                $('.act').removeClass('active');
                $(this).addClass('active');
            });
            setInterval(function () {
                $.ajax({
                    type: "GET",
                    url: "msg_notify.php",
                    dataType: "html",
                    success: function (response) {
                        $('.msgn_icon').html(response);
                    }
                });
            }, 2000);
            setInterval(function () {
                $.ajax({
                    type: "GET",
                    url: "all_page_notify.php",
                    dataType: "html",
                    success: function (response) {
                        $('.notify').html(response);
                    }
                });
            }, 2000);
        });
    </script>
</body>
</html>