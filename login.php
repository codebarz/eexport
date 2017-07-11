<?php
session_start();
require_once ("db.php");
$db = new MyDB();
require_once ("functions.php");

if(isset($_POST['log_name']) && isset($_POST['log_password'])) {
    $username = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['log_name']);
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['log_password']);

    $sql = <<<EOF
SELECT * FROM users WHERE uname = '$username' AND pword = '$password';
EOF;
    $ret = $db->query($sql);

    $count = $db->querySingle("SELECT COUNT(*) as COUNT FROM users WHERE uname = '$username' AND pword = '$password'");

    if ($count == 1)
    {
        while ($row = $ret->fetchArray(SQLITE3_ASSOC))
        {
            $id = $row['userid'];
            $regas = $row['regas'];
            $uemail = $row['uemail'];

            $_SESSION['log_id'] = $id;
        $_SESSION['log_name'] = $username;
        $_SESSION['regas'] = $regas;
        $_SESSION['uemail'] = $uemail;
        header("Location: index.php?log_id=$id");
        exit();
        }
    }
    else
    {
        echo "Information incorrect";
        exit();
    }
}
