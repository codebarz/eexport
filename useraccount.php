<?php
require_once ("db.php");
$db = new MyDB();
session_start();
if (!isset($_SESSION['log_name']) || !isset($_SESSION['log_id']))
{
    echo "<script>alert('Please Login or Sign up')</script>";
    header("Location: index.php");
}
include "useraccountedit.php";

$userid = (int)$_GET['userid'];

$sql = <<<EOF
SELECT * FROM users WHERE userid = {$userid};
EOF;

$ret = $db->query($sql);

while ($row = $ret->fetchArray(SQLITE3_ASSOC))
{
    $fname = $row['fname'];
    $user = $row['uname'];
    $password = $row['pword'];
    $profimage = $row['profimages'];
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

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
</head>
<body style="background: #ffffff">
<div class="padding">
    <div class="header" style="width: 80%; float: right">
        <div class="user_account">
            <div class="user_prof_image">
                <?php echo "<img src='$profimage'>";}?>
            </div>
            <div class="user_prof_func"><p><?php echo $_SESSION['log_name'];?></p></div>
        </div>
    </div>
    <div class="user_prof_menu">
        <ul>
            <li>
                <a href="#">My Account</a>
            </li>
            <li>
                <form action="logout.php" method="post" enctype="multipart/form-data">
                    <input type="submit" name="logout" id="logout" value="Logout">
                </form>
            </li>
        </ul>
    </div>
    <div class="header_menu" style="width: 80%; float: right">
        <form action="searchall.php" method="post" enctype="multipart/form-data">
            <input type="submit" name="search" id="submit_search" value="">
            <input type="search" name="search" id="search" placeholder="Ask your question">
        </form>
        <div class="main_nav">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="activity.php">CATEGORIES</a></li>
                <li><a href="#">NEWS</a></li>
                <li><a href="programs.php">PROGRAMS</a></li>
                <li><a href="#">POTENTIALS</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="profile_area">
    <div class="sidebar"></div>
    <div class="user_profile">
        <div class="prof_details">
            <div class="upd_func">
            <div class="prof_info_edit">
                <form action="" method="post" enctype="multipart/form-data">
<?php
$userid = (int)$_GET['userid'];
$sql = <<<EOF
SELECT * FROM users WHERE userid = {$userid};
EOF;

$ret = $db->query($sql);

while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {

    $fname = $row['fname'];
    $user = $row['username'];
    $password = $row['password'];
    $profimage = $row['image'];

    echo "<div class='image_edit'>
            <div class='prof_image'>
                <img id='view' src='$profimage'>
             </div>
             <label class='label' for='edit_prof_image'>Change Display Image</label>
             <input type='file' class='rounded' onchange='picPreview()' name='edit_prof_image' id='edit_prof_image'>
          </div>
<label for='fname_edit'>Full name:</label><input type='text' name='fname_edit' id='fname_edit' value='$fname'>
<label for='uname_edit'>Username:</label><input type='text' name='uname_edit' id='uname_edit' value='$user'><br>
<label for='pword_edit'>Password:</label><input type='password' name='pword_edit' id='pword_edit' value='$password'><br>";
}

if (isset($_POST['upd_prof'])) {
    $fname_edit = strip_tags(@$_POST['fname_edit']);
    $uname_edit = strip_tags(@$_POST['uname_edit']);
    $pword_edit = strip_tags(@$_POST['pword_edit']);
    $upload_dir = './profimages/';
    $picname = $_FILES['edit_prof_image']['name'];
    $tmpname = $_FILES['edit_prof_image']['tmp_name'];
    $picsize = $_FILES['edit_prof_image']['size'];
    $pictype = $_FILES['edit_prof_image']['type'];

    $picpath = $upload_dir . $picname;

    $result = move_uploaded_file($tmpname, $picpath);
    if (!$result) {
        echo "Error changing profile image";
        exit();
    }
    if (!get_magic_quotes_gpc()) {
        $picname = addslashes($picname);
        $picpath = addslashes($picpath);
    }

    $ufsql = <<<EOF
UPDATE User SET fname = '$fname_edit' WHERE ID = {$userid};
EOF;
    $uusql = <<<EOF
UPDATE User SET username = '$uname_edit' WHERE ID = {$userid};
EOF;
    $upsql = <<<EOF
UPDATE User SET password = '$pword_edit' WHERE ID = {$userid};
EOF;
    $ppsql = <<<EOF
UPDATE User SET image = '$picpath' WHERE ID = {$userid};
EOF;


    $ufret = $db->exec($ufsql);
    $uuret = $db->exec($uusql);
    $upret = $db->exec($upsql);
    $ppret = $db->exec($ppsql);

    if (!$ufret || !$uuret || !$upret || !$ppret) {
        echo "<script>alert('Error updating account')</script>";
    } else {
        echo "<script>alert('Account successfully updated')</script>";
    }
    $db->close();
}

?>
                    <input type="submit" name="upd_prof" id="upd_prof" value="Update">
                </form>
            </div>
        </div>
            <div class="user_set_menu">
                <ul>
                    <li class="active"><a href="#">Programs</a></li>
                    <li><a href="#">Requests</a></li>
                </ul>
            </div>
        </div>
        <div class="seminars">
            <div class="spacing"></div>
        </div>
    </div>
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
        var y = $(this).scrollTop(function () {
            if (y >= 200) {
                $('.add_prog_form').addClass('fixed');
            } else {
                $('.add_new_prog').removeClass('fixed');
            }
        });
        $('.seminars').load("addseminars.php");
        $('.user_set_menu li:first-child').click(function (e) {
            e.preventDefault();
            $('.seminars').load("addseminars.php", function (response, status, xhr) {
                if (status == "error") {
                    console.log(msg + xhr.status + " " + xhr.statusText);
                }
            });
        });
    });
    function picPreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#view').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#edit_prof_image').change(function () {
        picPreview(this);
    });
    var prev = document.getElementsByClassName('user_prof_image').src;
    prev.change(function () {
        picPreview(this);
    })
</script>
</body>
</html>