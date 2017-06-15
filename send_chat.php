<?php
/**
 * Created by PhpStorm.
 * User: ORUME
 * Date: 2/19/2017
 * Time: 1:48 PM
 */
require_once ("db.php");
$db = new MyDB();
session_start();

if (isset($_POST['rep_msg']) && !empty($_POST['rep_msg']) || isset($_POST['hash']) && !empty($_POST['hash']))
{
    $hash = (int)$_GET['hash'];
    $my_id = $_SESSION['log_id'];
    $rep_msg = $_POST['rep_msg'];
    $hash = $_SESSION['hash'];
    $flag = 0;


    $sql =<<<EOF
SELECT hash, user_one, user_two FROM connect WHERE (user_one = '$my_id' AND hash = '$hash') OR (user_two = '$my_id' AND hash = '$hash');
EOF;
    $ret = $db->query($sql);

    while ($row = $ret->fetchArray(SQLITE3_ASSOC))
    {
        $user_one = $row['user_one'];
        $user_two = $row['user_two'];

        if ($user_one = $my_id)
        {
            $to_id = $user_two;
        }
        else
        {
            $to_id = $user_one;
        }

        $rsql = <<<EOF
INSERT INTO messager (message, group_hash, from_id, to_id, flag) VALUES('$rep_msg', '$hash', '$my_id', '$to_id', '$flag');
EOF;

        $bnsql = <<<EOF
INSERT INTO chatportal (message, group_hash, from_id, to_id, flag) VALUES('$rep_msg', '$hash', '$my_id', '$to_id', '$flag');
EOF;
        $rret = $db->exec($rsql);
        $bnret = $db->exec($bnsql);

        $ursql = <<<EOF
SELECT * FROM users WHERE userid = '$my_id';
EOF;


        $urret = $db->query($ursql);

        while ($urrow = $urret->fetchArray(SQLITE3_ASSOC)) {
            $from_fname = $urrow['fname'];
            $from_img = $urrow['image'];

            header('Location: user_msg.php?hash=' . $hash);
        }
    }
}
