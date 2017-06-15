<?php
require_once ("db.php");
$db = new MyDB();

session_start();

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
    <link rel="stylesheet" href="css/cms.css">
    <script src="js/modernizr.js"></script> <!-- Modernizr -->
    <script src="js/jquery-3.1.0.js" type="text/javascript"></script>

    <title>Add Category | E-Xport</title>
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
                    <li><a href="#0">Logout</a></li>
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
                <a href="dashboard.php">Overview</a>

                <ul>
                    <li><a href="#0">All Data</a></li>
                </ul>
            </li>

            <li class="has-children comments">
                <a href="#0">Categories</a>

                <ul>
                    <li><a href="#0">All Categories</a></li>
                    <li><a href="#0">Add Category</a></li>
                </ul>
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
            <li class="action-btn"><a href="add_loans.php">+ Loans</a></li><br>
            <li class="action-btn"><a href="messages.php">Messages</a></li>
        </ul>
    </nav>

    <div class="content-wrapper">
        <hr class="hr">
        <h3>Add new category</h3>
        <hr class="hr">
        <div class="respond"></div>
        <form action="cms_exec.php" method="post" enctype="multipart/form-data" id="add" class="form-horizontal">
            <label class="control-label" for="catname">Category Name.</label>
            <input class="form-control" type="text" id="catname" name="catname" placeholder="Enter Category Name" value=""/>
            <label for="catimg" class="control-label" style="display: block;
    margin: 0 5%;
    padding: 1em 0;
    background-color: #4abdac;
    border-radius: .25em;
    font-family: 'Roboto Light', 'Open Sans', sans-serif;
    border: none;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.2);
    text-align: center;
    color: #ffffff;
    font-weight: bold;">Categroy Icon.</label>
            <input type="file" id="catimg" name="catimage" accept="image/*" />
            <div class="cat_prev"></div>
            <input type="submit" name="btnsave" class="save-btn">
        </form>
    </div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->
<script type="text/javascript">
    $(document).ready(function () {
        $('.form-horizontal').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: 'cms_exec.php',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'html'
            })
                .done(function (data) {
                    $('.respond').fadeIn('slow').html(data);
                });
        });
    });
</script>
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>