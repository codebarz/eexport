<?php
session_start();
require_once ("db.php");
$db = new MyDB();
require_once ("functions.php");

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['username']);
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['password']);

    $sql = <<<EOF
SELECT * FROM admin WHERE username = '$username' AND password = '$password';
EOF;
    $ret = $db->query($sql);

    $count = $db->querySingle("SELECT COUNT(*) as COUNT FROM admin WHERE username = '$username' AND password = '$password'");

    if ($count == 1)
    {
        while ($row = $ret->fetchArray(SQLITE3_ASSOC))
        {
            $id = $row['ID'];

            $_SESSION['log_id'] = $id;
            $_SESSION['log_name'] = $username;
            header("Location: dashboard.php");
            exit();
        }
    }
    else
    {
        echo "Information incorrect";
        exit();
    }
}