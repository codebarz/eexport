<?php
session_start();
require_once("db.php");
$db = new MyDB();
if (!isset($_SESSION['log_name']) || !isset($_SESSION['log_id']))
{
    echo "<script>alert('Please Login or Sign up')</script>";
    header("Location: admin.php");
}

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/dashboard.css"> <!-- Resource style -->
    <link rel="stylesheet" href="css/main.css">
    <script src="js/modernizr.js"></script> <!-- Modernizr -->

    <title>Admin Dashboard | E-Xport</title>
</head>
<body>
<header class="cd-main-header">
    <a href="#0" class="cd-logo"><img src="images/cd-logo.svg" alt="Logo"></a>

    <div class="cd-search is-hidden">
        <form action="#0">
            <input type="search" placeholder="Search...">
        </form>
    </div> <!-- cd-search -->

    <a href="#0" class="cd-nav-trigger">Menu<span></span></a>

    <nav class="cd-nav">
        <ul class="cd-top-nav">
            <li class="has-children account">
                <a href="#0">
                    <img src="images/cd-avatar.png" alt="avatar">
                    Account
                </a>

                <ul>

                    <li><a href="#0">My Account</a></li>
                    <li><a href="#0">Edit Account</a></li>
                    <li>
                        <form action="admin_logout.php" method="post" enctype="multipart/form-data">
                            <input type="submit" name="logout" id="logout" value="Logout" style="border: none; background: #4abdac;
color: #fff; font-family: 'Open Sans', sans-serif; font-weight: bold; padding: 5px; font-size: 14px">
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header> <!-- .cd-main-header -->

<main class="cd-main-content">
    <nav class="cd-side-nav">
        <ul>
            <li class="cd-label">Main</li>
            <li class="has-children overview">
                <a href="#0">Overview</a>

                <ul>
                    <li><a href="#0">All Data</a></li>
                    <li><a href="#0">Category 1</a></li>
                    <li><a href="#0">Category 2</a></li>
                </ul>
            </li>

            <li class="has-children comments">
                <a href="#0">Categories</a>

                <ul>
                    <li><a href="#0">All Categories</a></li>
                    <li><a href="#0">Add Category</a></li>
                </ul>
            </li>
            <li class="has-children comments">
                <a href="question.php">Questions</a>
            </li>
        </ul>

        <ul>
            <li class="cd-label">Secondary</li>

            <li class="has-children users">
                <a href="#0">Users</a>

                <ul>
                    <li><a href="#0">All Users</a></li>
                    <li><a href="#0">Edit User</a></li>
                    <li><a href="#0">Add User</a></li>
                </ul>
            </li>
        </ul>

        <ul>
            <li class="cd-label">Action</li>
            <li class="action-btn"><a href="exporter_reg.php">+ Page</a></li><br>
            <li class="action-btn"><a href="cms.php">+ Category</a></li><br>
            <li class="action-btn"><a href="addquestion.php">+ Question</a></li><br>
            <li class="action-btn"><a href="addnews.php">+ News</a></li><br>
            <li class="action-btn"><a href="add_loans.php">+ Loans</a></li><br>
            <li class="action-btn"><a href="messages.php">Messages</a></li>
        </ul>
    </nav>

    <div class="content-wrapper">
        <p align="left" class="warning">*Carefully preview your news posts</p>
        <div class="news_preview">
            <img src="" id="news_preview">
        </div>
        <div class="news_forms">
            <form action="add_news_exec.php" method="post" enctype="multipart/form-data">
                <label for="news_img">Featured Image</label><br>
                <input type="file" name="news_img" onchange="news_img_prev()" id="news_img"><br><br>
                <input type="text" name="news_title" id="news_title" placeholder="News Title"><br><br>
                <textarea name="news_brief" id="news_brief" rows="5" placeholder="Headline For the News"></textarea><br><br>
                <textarea name="news_main" id="news_main" rows="10" placeholder="The News Proper"></textarea>
                <div class="news_preview">
                    <img src="" id="news_preview_2">
                </div>
                <label for="news_img_2">Second Image</label><br>
                <input type="file" name="news_img_2" onchange="news_img_prev_2()" id="news_img_2"><br><br>
                <textarea name="news_main_2" id="news_main_2" rows="10" placeholder="The News Proper Continued"></textarea>
                <input type="submit" name="add_news" class="save-btn" value="Add News">
            </form>
        </div>
    </div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
<script type="text/javascript">
    function news_img_prev(input) {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#news_preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#news_img').change(function () {
        news_img_prev(this);
    });
    function news_img_prev_2(input) {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#news_preview_2').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#news_img_2').change(function () {
        news_img_prev_2(this);
    });
</script>
</body>
</html>
