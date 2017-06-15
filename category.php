<?php
/**
 * Created by PhpStorm.
 * User: ORUME
 * Date: 1/30/2017
 * Time: 2:14 PM
 */
require_once ("db.php");
$db = new MyDB();
include_once ("addons.php");
$catid = (int)$_GET['category_id'];

$sql = <<<EOF
SELECT * FROM questions WHERE category_id = {$catid} ORDER BY category_id DESC; 
EOF;

$ret = $db->query($sql);

while ($row = $ret->fetchArray(SQLITE3_ASSOC))
{
    $question = $row['question'];
    $answer = $row['answer'];

    echo "<div class='cat_ques_ans'><div class='catques'>$question</div><div class='catans'>$answer</div>
<div class='tickstamp'>Asked $timestamp ago</div></div>";

}
