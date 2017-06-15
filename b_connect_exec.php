<?php
/**
 * Created by PhpStorm.
 * User: ORUME
 * Date: 2/17/2017
 * Time: 10:39 AM
 */
require_once ("db.php");
$db = new MyDB();

session_start();

if (isset($_POST['bank_con']))
{
    $my_id = $_SESSION['log_id'];
    $bank_id = $_SESSION['bname'];
    $rand_num = rand();

    $hsql =<<<EOF
SELECT COUNT(hash) as count FROM bankconnects WHERE (user = '$my_id' AND bank = '$bank_id');
EOF;

    $hret = $db->querySingle($hsql);

    if ($hret == 1)
    {
        echo "<script>alert('You are already connected to this bank')</script>";
    }
    else
    {
        $csql =<<<EOF
INSERT INTO bankconnects (user, bank, hash) VALUES ('$my_id', '$bank_id', '$rand_num');
EOF;

$usql =<<<EOF
INSERT INTO connect (user_one, user_two, hash) VALUES ('$my_id', '$bank_id', '$rand_num');
EOF;
        $cret = $db->exec($csql);
        $uret = $db->exec($usql);

        if (!$cret && !$uret)
        {
            echo "Error connecting to '$bank_id'";
        }
        else
        {
            echo "Successful";
        }
    }
}
