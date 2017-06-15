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
    <script src="js/jquery-3.1.0.js" type="text/javascript"></script>
    <script src="js/jquery-ui-1.12.1.custom/jquery-ui.js" type="text/javascript"></script>

    <title>Admin Dashboard | E-Xport</title>
</head>
<body style="background: #f5f5f5">
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
                    <li><a href='logout.php'>Logout</a></li>
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
            <li class="action-btn"><a href="add_loans.php">+ Loans</a></li><br>
            <li class="action-btn"><a href="messages.php">Messages</a></li>
        </ul>
    </nav>

    <div class="content-wrapper">
        <div class="loans_header">
            <h2>Recently Added</h2>
        </div>
        <div class="save_ret"></div>
        <form action="loans_exec.php" method="post" enctype="multipart/form-data" id="loaners">
            <input type="text" name="loaner_name" id="loaner_name" placeholder="Loaner's Name">
            <textarea name="loaner_brief" id="loaners_brief" rows="5" placeholder="Brief Description About Loaner"></textarea>
            <textarea name="loaner_requirements" id="loaners_requirements" rows="10" placeholder="Loaner's Requirements"></textarea>
            <div class="loan_img_text"><p>Image size 305px x 150px</p></div>
            <label for="loaner_logo">Upload Logo</label>
            <input type="file" onchange="logoPreview()" name="loaner_logo" id="loaner_logo">
            <input type="submit" name="loan_save" class="save-btn" value="Save">
        </form>

        <div class="loaner_info_area">
            <div class="loaner_info">
                <div class="loaner_logo"><img src="" id="loan_logo_prev"></div>
                <div class="loaner_name"><p></p></div>
                <div class="loaner_brief"><p></p></div>
            </div>
            <div class="loaner_requirements">
                <div class="loaner_verified"><img src="images/verified.png"><p>Verified</p></div>
                <div class="loaner_req_btn"><img src="images/require.png"><p>More Info</p></div>
            </div>
            <div class="req_details"><p></p></div>
        </div>

    </div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->

<script type="text/javascript">
    function logoPreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#loan_logo_prev').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#loaner_logo').change(function () {
        logoPreview(this);
    });
    $(document).ready(function () {
        $('#loaner_name').keyup(function () {
            $('.loaner_name p').html($(this).val());
        });
        $('#loaners_brief').keyup(function () {
            $('.loaner_brief p').html($(this).val());
        });
        $('#loaners_requirements').keyup(function () {
            $('.req_details p').html($(this).val());
        });
        $('.loaner_requirements').click(function () {
            $(this).next().slideToggle();
        });
    });
</script>
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
