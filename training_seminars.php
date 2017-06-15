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
<div class="add_new_prog">
    <div class="prog_p_title"><div align="center"><p>Advertise new program</p></div></div>
    <div class="add_prog_form">
        <form action="addprograms.php" method="post" enctype="multipart/form-data" id="prog_form">
            <div class="banner_prev">
                <img id="banner_prev" src=''>
                <div align="center">
                    <label for="prog_banner">Upload First banner</label>
                </div>
                <input type="file" onchange="banPreview()" name="prog_banner" id="prog_banner">
            </div><br>
            <div class="banner_prev">
                <img id="banner_prev_2" src=''>
                <div align="center">
                    <label for="prog_banner_2">Upload Second banner</label>
                </div>
                <input type="file" onchange="banPreview2()" name="prog_banner_2" id="prog_banner_2">
            </div>
            <div class="prog_inputs">
                <input type="text" name="prog_title" id="prog_title" placeholder="Your program title (required)">
                <textarea name="prog_brief" id="prog_brief" rows="7" placeholder="Brief Description (required)"></textarea>
                <span class="counter"></span>
                <input type="text" name="prog_comp" id="prog_comp" placeholder="Company name (required)">
                <input type="text" name="prog_link" id="prog_link" placeholder="Website for inquiry (not required)">
                <input type="text" name="prog_spons" id="prog_spons" placeholder="Sponsered by... (required)">
                <input type="submit" name="sub_prog" id="sub_prog" value="Ad Program">
            </div>
        </form>
    </div>
</div>
<div class="rec_add_prog">
    <div class="prog_p_title"><div align="center"><p>Already Added</p></div></div>
    <div class="preview_prog">
        <div class="preview_prog_img">
            <img id="preview_prog_img" src="">
        </div>
        <div id="details_btn">
            <p>More details</p>
        </div>
        <div id="details">
            <p>Program Title: </p>
            <p id="prog_titlev"></p>
            <p>About:</p>
            <p id="prog_about"></p>
            <p>Company name: </p>
            <p id="prog_compv"></p>
            <p>Visit: </p>
            <p id="prog_site"></p>
            <p>Sponsored by: </p>
            <p id="prog_sponsv"></p>
        </div>
    </div>
    <?php
    $userid = $_SESSION['log_id'];
    $sql = <<<EOF
SELECT COUNT(*) as count FROM programs WHERE userid = '$userid';
EOF;

    $ret = $db->querySingle($sql);

    if ($ret == 0)
    {
        echo "<div class='no_prog'>You have no programs added</div>";
    }
    else
    {
        $ssql = <<<EOF
SELECT * FROM programs WHERE userid = '$userid' ORDER BY id DESC;
EOF;

        $sret = $db->query($ssql);

        while ($row = $sret->fetchArray(SQLITE3_ASSOC))
        {
            $banner = $row['banner'];
            $banner_2 = $row['banner_2'];
            $title = $row['sem_title'];
            $spons = $row['sem_spons'];
            $link = $row['sem_link'];
            $company = $row['sem_comp'];
            $brief = $row['sem_brief'];

            echo "<div class=\"preview_prog\">
            <div class=\"preview_prog_img\">
                <img class='current' id=\"preview_prog_img\" src=\"$banner\">
            </div>
            <div id=\"details_2\">
                <p>Program Title: </p>
                <p id=\"prog_titlev\">$title</p>
                <p>About:</p>
                <p id=\"prog_about\">$brief</p>
                <p>Company name: </p>
                <p id=\"prog_compv\">$company</p>
                <p>Visit: </p>
                <p id=\"prog_site\">$link</p>
                <p>Sponsored by: </p>
                <p id=\"prog_sponsv\">$spons</p>
            </div>
        </div>";
        }
    }
    ?>
</div>
<script type="text/javascript">
    function updateCounter() {
        var remaining = 200 - $('#prog_brief').val().length;
        $('.counter').text(remaining + ' characters remaining.');
        if (remaining <= 0) {
            $('.counter').css("color", "red");
            $('#prog_brief').keypress(function (e) {
                e.preventDefault();
            });
        } else {
            $('.counter').css("color", "#999");
            $('#prog_brief').unbind('keypress');
        }
    }
    function banPreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#banner_prev').attr('src', e.target.result);
                $('#preview_prog_img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#prog_banner').change(function () {
        banPreview(this);
    });
    function banPreview2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#banner_prev_2').attr('src', e.target.result);
                $('#preview_prog_img_2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#prog_banner_2').change(function () {
        banPreview2(this);
    });
    $(document).ready(function ($) {
        updateCounter();
        $('#prog_brief').on("change keyup", function (e) {
            updateCounter();
        });
        $('#prog_brief').keyup(function () {
            $('#prog_about').html($(this).val());
        });
        $('#prog_title').keyup(function () {
            $('#prog_titlev').html($(this).val());
        });
        $('#prog_link').keyup(function () {
            $('#prog_site').html($(this).val());
        });
        $('#prog_spons').keyup(function () {
            $('#prog_sponsv').html($(this).val());
        });
        $('#prog_comp').keyup(function () {
            $('#prog_compv').html($(this).val());
        });
        $('#details_btn').click(function () {
            $('#details').slideToggle();
        });
        $('#sub_prog').click(function () {
            $.post(
                $('#prog_form').attr('action'),
                $('#prog_form :input').serializeArray(),
                function (result) {
                    $('.alert').html(result).fadeIn(function () {
                        setTimeout(function () {
                            $('.alert').fadeOut();
                        }, 5000);
                    });
                }
            );
        });
    });
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
