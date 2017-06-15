<?php
require_once ("db.php");
$db = new MyDB();
session_start();

$sql =<<<EOF
SELECT COUNT(*) as count FROM users_request; 
EOF;

$ret = $db->querySingle($sql);



if ($ret =+ 1)
{
    echo "There is a new post";
}
else {
    echo "";
}
