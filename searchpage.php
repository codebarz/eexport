<?php
require_once ("db.php");

$db = new MyDB();

?>
<!DOCTYPE html>
<html>
<title>E-Xport | Search Results</title>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css" type="text/css" media="screen">
</head>
<body>
<div class="header">
    <div class="logoic"><h2>E-Xport</h2></div>
    <div class="profilename"></div>
    <div class="profileImage"></div>
    <div class="search_icon">
        <img src="images/search_icon.png">
    </div>
    <div class="searchgen">
        <form>
            <input type="search" name="searchgen" placeholder="Search E-Xport...">
        </form>
    </div>
</div>

<?php

if (isset($_POST['searchpage'])) {
    $searchq = $_POST['searchp'];



    $sql =<<<EOF
SELECT * FROM addcategory WHERE catname LIKE '%$searchq%' OR catbrief LIKE '%$searchq%';
EOF;

    $ret = $db->query($sql);

    if (!$ret) {
        echo "There was no search result!";
    } else {
        while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
            $catname = $row['catname'];
            $catdes = $row['catbrief'];
            $catimage = $row['catpic'];
            $catid = $row['catID'];


        echo "<div class=\"catDescription\">
        <div class=\"catname\"><p><a href='search.php?category_id=$catid'>$catname</a></p></div>
                <div class=\"catImage\"><img src='".$catimage."'></div>
                <div class=\"catprof\"><p>$catdes</p></div>
                </div>";
        }
    }
}

?>

</body>
</html>