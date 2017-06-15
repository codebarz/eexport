<?php
require_once ("db.php");
$db = new MyDB();
session_start();
if (!isset($_SESSION['log_name']) || !isset($_SESSION['log_id']))
{
    echo "<script>alert('Please Login or Sign up')</script>";
    header("Location: index.php");
}
include ("addons.php");

$id = $_SESSION['log_id'];

$ssql = <<<EFO
SELECT * FROM User WHERE ID = $id;
EFO;

$sret = $db->query($ssql);

while ($srow = $sret->fetchArray(SQLITE3_ASSOC)) {
    $userid = $srow['ID'];
    $userimg = $srow['image'];


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
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
</head>
<body>
<div class="padding">
    <div class="head_col">
    <div class="header">
        <div class="notify_icon">
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

echo "<a href='useraccount.php?ID=$userid'>My Account</a>";


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
                <li><a href="#">HOME</a></li>
                <li class="active"><a href="#">CATEGORIES</a></li>
                <li><a href="#">NEWS</a></li>
                <li><a href="programs.php">PROGRAMS</a></li>
                <li><a href="#">POTENTIALS</a></li>
                <li><a href="#">LOANS</a></li>
            </ul>
        </div>
    </div>
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
<div class="notify"></div>
<div class="cat_search">
    <form method="post" action="" enctype="multipart/form-data">
        <input type="search" name="cat_search" id="cat_search" placeholder="Ask your question">
        <input type="submit" name="sub_cat_search" id="sub_cat_search" value="">
    </form>
</div>
<div class="cat_content">
    <div class="cat_questions">
        <div class="cat_question_area">
            <div class="cat_question"></div>
            <div class="cat_answer"></div>
        </div>
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
    });
</script>
</body>
</html>