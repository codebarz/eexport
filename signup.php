<?php
require_once ('db.php');
$db = new MyDB();
if (isset($_POST['signup_submit'])) {
    $name = $_POST['full_name'];
    $email = $_POST['signup_email'];
    $username = $_POST['signup_user'];
    $password = $_POST['signup_pass'];
    $stamp = date("d/m/Y");

    $sql =<<<EOF
INSERT INTO USER (email, password, fname, access, image, date, username)
VALUES ('$email', '$password', '$name', '1', 'soon', '$stamp', '$username');
EOF;

    $ret = $db->exec($sql);

    if (!$ret) {
        echo $db->lastErrorMsg();
    } else {
        header("Location: index.php");
    }
$db->close();
}