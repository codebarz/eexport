<?php
require_once ("db.php");
$db = new MyDB();

session_start();

if (isset($_POST['add_news']))
{
    $userid = $_SESSION['log_id'];
    $username = $_SESSION['log_name'];
    $news_img_dir = './news/';
    $news_title = $_POST['news_title'];
    $news_brief = $_POST['news_brief'];
    $news_main = $_POST['news_main'];
    $news_main_2 = $_POST['news_main_2'];
    $news_img = $_FILES['news_img']['name'];
    $news_temp = $_FILES['news_img']['tmp_name'];
    $news_type= $_FILES['news_img']['type'];
    $news_size = $_FILES['news_img']['size'];
    $news_img_2 = $_FILES['news_img_2']['name'];
    $news_temp_2 = $_FILES['news_img_2']['tmp_name'];
    $news_type_2= $_FILES['news_img_2']['type'];
    $news_size_2 = $_FILES['news_img_2']['size'];
    $time_stamp = date('l jS\of F Y h:i:s A');

    $npath = $news_img_dir . $news_img;
    $npath_2 = $news_img_dir . $news_img_2;

    $nresult = move_uploaded_file($news_temp, $npath);
    $nresult_2 = move_uploaded_file($news_temp_2, $npath_2);

    if (!$nresult && !$nresult_2)
    {
        echo "<script>alert('Oops!!. Something went wrong while uploading the images..Please try again')</script>";
    }
    if (!get_magic_quotes_gpc())
    {
        $news_img = addslashes($news_img);
        $npath = addslashes($npath);
        $news_img_2 = addslashes($news_img_2);
        $npath_2 = addslashes($npath_2);
    }
    $nql =<<<EOF
INSERT INTO news (img, news_title, news_brief, news_main, img_2, news_main_2, poster, date)
VALUES ('$npath', '$news_title', '$news_brief', '$news_main', '$npath_2', '$news_main_2', '$userid', '$time_stamp');
EOF;
    $fql =<<<EOF
INSERT INTO news_prev (img, news_title, news_brief, date)
VALUES ('$npath', '$news_title', '$news_brief', '$time_stamp');
EOF;

    $nret = $db->exec($nql);
    $fret = $db->exec($fql);

    if (!$nret && !$fret)
    {
        echo "<script>alert('Error posting news')</script>";
    }
    else
    {
        echo "<script>alert('News Successfully Posted')</script>";
        header("Location: dashboard.php");
    }
}

