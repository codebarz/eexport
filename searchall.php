<?php
require_once ("db.php");

$db = new MyDb();


if (isset($_POST['searchallVal'])) {
    $searchquery = $_POST['searchallVal'];
    $searchquery = preg_replace("#[^0-9a-z]#i","",$searchquery);

    $sql = <<<EOF
SELECT * FROM addcategory WHERE catname LIKE '%$searchquery%' OR catbrief LIKE '%$searchquery%';
EOF;
    $ret = $db->query($sql);

    if (!$ret) {
        echo "There was no search result";
    } else {
        while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
            $catname = $row['catname'];
            $catdes = $row['catbrief'];
            $catimage = $row['catpic'];

            $output .= '<div class=\"catDescription\">
            <div class=\"catname\"><p> '.$catname.' </p></div>
            <div class=\"catImage\"><img src='.$catimage.'</div>
            <div class=\"catprof\"><p>'.$catdes.'</p></div>
            </div>';

//            echo "<div class=\"catDescription\">
//        <div class=\"catname\"><p>$catname</p></div>
//                <div class=\"catImage\"><img src='" . $catimage . "'></div>
//                <div class=\"catprof\"><p>$catdes</p></div>
//                </div>";
        }
    }
}
echo ($output);