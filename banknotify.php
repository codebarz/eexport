<?php
/**
 * Created by PhpStorm.
 * User: ORUME
 * Date: 2/25/2017
 * Time: 12:10 PM
 */
 error_reporting(0);
 ini_set('display_errors', 0);
require_once ("db.php");
$db = new MyDB();
session_start();


$my_id = $_SESSION['log_id'];
$not_read = 0;
$bname = $_SESSION['bname'];

$hsql =<<<EOF
SELECT COUNT(group_hash) FROM chatportal WHERE flag = '$not_read' AND to_id = '$bname';
EOF;

$hret = $db->querySingle($hsql);

if ($hret)
{
    echo "<div class='not_count'><p>$hret</p></div>";
}
