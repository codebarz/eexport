<?php
/**
 * Created by PhpStorm.
 * User: ORUME
 * Date: 2/25/2017
 * Time: 12:10 PM
 */
require_once ("db.php");
$db = new MyDB();
session_start();

$my_id = $_SESSION['log_id'];
$not_read = 0;

//$sql =<<<EOF
//SELECT hash FROM connect WHERE user_one = '$my_id' OR user_two = '$my_id';
//EOF;
//
//$ret = $db->query($sql);
//
//while ($row = $ret->fetchArray(SQLITE3_ASSOC))
//{
//    $hash = $row['hash'];

$hsql =<<<EOF
SELECT COUNT(group_hash) FROM messager WHERE flag = '$not_read' AND to_id = '$my_id';
EOF;

$hret = $db->querySingle($hsql);

if ($hret)
{
    echo "<div class='not_count'><p>$hret</p></div>";
//}

}
