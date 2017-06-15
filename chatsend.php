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
    $bank_id = $_SESSION['bname'];
    $rep_msg = $_POST['rep_msg'];
    $hash = $_SESSION['hash'];
    $flag = 0;


    $sql =<<<EOF
SELECT * FROM bankconnects WHERE (user = '$my_id' AND hash = '$hash') OR (bank = '$my_id' AND hash = '$hash');
EOF;
    $ret = $db->query($sql);

    while ($row = $ret->fetchArray(SQLITE3_ASSOC))
    {
        $user = $row['user'];
        $bank = $row['bank'];

        if ($user = $my_id)
        {
            $to_id = $my_id;
        }
        else
        {
            $to_id = $bank_id;
        }

        $rsql = <<<EOF
INSERT INTO chatportal (message, group_hash, from_id, to_id, flag) VALUES('$rep_msg', '$hash', '$bank_id', '$to_id', '$flag');
EOF;
        $bnsql = <<<EOF
INSERT INTO messager (message, group_hash, from_id, to_id, flag) VALUES('$rep_msg', '$hash', '$bank_id', '$to_id', '$flag');
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
