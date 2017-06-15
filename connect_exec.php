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

if (isset($_POST['connect']))
{
    $my_id = $_SESSION['log_id'];
    $ad_id = $_POST['conn_id'];
    $rand_num = rand();

    $hsql =<<<EOF
SELECT COUNT(hash) as count FROM connect WHERE (user_one = '$my_id' AND user_two = '$ad_id') OR (user_one = '$ad_id' AND user_two = '$my_id');
EOF;

    $hret = $db->querySingle($hsql);

    if ($hret == 1)
    {
        echo "<script>alert('You are already connected')</script>";
    }
    else
    {
        $csql =<<<EOF
INSERT INTO connect (user_one, user_two, hash) VALUES ('$my_id', '$ad_id', '$rand_num');
EOF;
        $cret = $db->exec($csql);

        if (!$cret)
        {
            echo "Error connecting to '$ad_id'";
        }
        else
        {
            header("Location: programs.php");
            echo "Successful";
        }
    }
}