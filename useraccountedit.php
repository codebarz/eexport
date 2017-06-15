<?php
/**
 * Created by PhpStorm.
 * User: ORUME
 * Date: 1/26/2017
 * Time: 1:54 PM
 */
require_once ("db.php");
$db = new MyDB();

$userid = (int)$_GET['userid'];
$sql = <<<EOF
SELECT * FROM users WHERE userid = {$userid};
EOF;

$ret = $db->query($sql);

while ($row = $ret->fetchArray(SQLITE3_ASSOC))
{
    $fname = $row['fname'];
    $user = $row['uname'];
    $password = $row['pword'];
    $profimage = $row['profimages'];
}
