<?php
/**
 * Created by PhpStorm.
 * User: ORUME
 * Date: 1/28/2017
 * Time: 2:43 PM
 */
require_once ("db.php");
$db = new MyDB();

session_start();

if (isset($_POST['sub_prog'])) {
    $userid = $_SESSION['log_id'];
    $title = $_POST['prog_title'];
    $brief = $_POST['prog_brief'];
    $company = $_POST['prog_comp'];
    $link = $_POST['prog_link'];
    $sponsor = $_POST['prog_spons'];
    $banner_dir = './banners/';
    $bannername = $_FILES['prog_banner']['name'];
    $btempname = $_FILES['prog_banner']['tmp_name'];
    $btype = $_FILES['prog_banner']['type'];
    $bsize = $_FILES['prog_banner']['size'];
    $bannername_2 = $_FILES['prog_banner_2']['name'];
    $btempname_2 = $_FILES['prog_banner_2']['tmp_name'];
    $btype_2 = $_FILES['prog_banner_2']['type'];
    $bsize_2 = $_FILES['prog_banner_2']['size'];

    $bpath = $banner_dir . $bannername;
    $bpath_2 = $banner_dir . $bannername_2;

    $bresult = move_uploaded_file($btempname, $bpath);
    $bresult_2 = move_uploaded_file($btempname_2, $bpath_2);
    if (!$bresult && !$bresult_2)
    {
        echo "<script>alert('Error uploading banner!!..Please try again')</script>";
        exit();
    }
    if (!get_magic_quotes_gpc())
    {
        $bannername = addslashes($bannername);
        $bpath = addslashes($bpath);
        $bannername_2 = addslashes($bannername_2);
        $bpath_2 = addslashes($bpath_2);
    }

    $bsql = <<<EOF
INSERT INTO programs (userid, banner, banner_2, sem_brief, sem_title, sem_spons, sem_link, sem_comp)
VALUES ('$userid', '$bpath', '$bpath_2', '$brief', '$title', '$sponsor', '$link', '$company');
EOF;
    $bret = $db->exec($bsql);

    if (!$bret)
    {
        echo "<script>alert('Error posting programs!. Please try again')</script>";
        header("Location: account.php?userid=$userid");
    }
    else
    {
        echo "<script>alert('Program posted')</script>";
        header("Location: account.php?userid=$userid");
    }
}