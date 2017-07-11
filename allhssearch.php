<?php

require_once ("db.php");
$db = new  MyDB();

session_start();


if (isset($_POST['searchVal'])) {
    $searchquery = $_POST['searchVal'];
//    $searchquery = preg_replace("#[^0-9a-z]#i","",$searchquery);

$hstmt = $db->prepare("SELECT * FROM hscodes WHERE Description LIKE '%$searchquery%'");

        $result = $hstmt->execute();

while ($row = $result->fetchArray(SQLITE3_ASSOC))
{
    $CET_code = $row['CET_code'];
    $Description = $row['Description'];

    echo '<div class="hsSlate"><p><span>Description: </span>'.$Description.'</p><p><span>Code: </span>'.$CET_code.'</p></div>';
}
}
?>
