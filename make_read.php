<?php
/**
 * Created by PhpStorm.
 * User: ORUME
 * Date: 2/27/2017
 * Time: 5:00 PM
 */
require_once ("db.php");
$db = new MyDB();
session_start();


if (isset($_POST['make_read']))
{
$log_id = $_SESSION['log_id'];
$read = 1;
$unread = 0;

$sql =<<<EOF
SELECT group_hash, flag FROM messager WHERE to_id = '$log_id' AND flag = '$unread';
EOF;

$ret = $db->query($sql);

while ($row = $ret->fetchArray(SQLITE3_ASSOC))
{
    $to_id = $row['to_id'];
    $flag = $row['flag'];

    $isql =<<<EOF
UPDATE messager SET flag = '$read' WHERE to_id = '$log_id';
EOF;

    $iret = $db->exec($isql);

    if ($iret) {
        echo "success";
    }

}

}
