<?php
session_start();
require_once ("db.php");
$db = new MyDB();

$userid = $_SESSION['log_id'];

if (isset($_POST['editSub'])) {
    $unameEdit = strip_tags(@$_POST['unameEdit']);
    $cnameEdit = strip_tags(@$_POST['cnameEdit']);
    $uphoneEdit = strip_tags(@$_POST['uphoneEdit']);
    $uaddressEdit = strip_tags(@$_POST['uaddressEdit']);
    $caddressEdit = strip_tags(@$_POST['caddressEdit']);
    $upload_dir = './profimages/';
    $picname = $_FILES['profIedit']['name'];
    $tmpname = $_FILES['profIedit']['tmp_name'];
    $picsize = $_FILES['profIedit']['size'];
    $pictype = $_FILES['profIedit']['type'];

    $picpath = $upload_dir . $picname;

    $result = move_uploaded_file($tmpname, $picpath);
    // if (!$result) {
    //     die();
    // }
    if (!get_magic_quotes_gpc()) {
        $picname = addslashes($picname);
        $picpath = addslashes($picpath);
    }

    $uusql = <<<EOF
UPDATE users SET uname = '$unameEdit' WHERE userid = {$userid};
EOF;
    $ucsql = <<<EOF
UPDATE users SET cname = '$cnameEdit' WHERE userid = {$userid};
EOF;
    $upsql = <<<EOF
UPDATE users SET uphone = '$uphoneEdit' WHERE userid = {$userid};
EOF;
    $ppsql = <<<EOF
UPDATE users SET profimages = '$picpath' WHERE userid = {$userid};
EOF;


    $uuret = $db->exec($uusql);
    $ucret = $db->exec($ucsql);
    $upret = $db->exec($upsql);
    $ppret = $db->exec($ppsql);

    if ($uuret || $uuret || $upret || $ppret) {
    {
        echo "<script>alert('Account successfully updated')</script>";
        header('Location:user.php?successProf=1');
    }
    $db->close();
}
}
?>
