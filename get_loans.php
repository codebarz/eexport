<?php
require_once ("db.php");
$db = new MyDB();

$sql =<<<EOF
SELECT * FROM loaners;
EOF;

$ret = $db->prepare($sql);
$ret = $db->query($sql);

while ($row = $ret->fetchArray(SQLITE3_ASSOC))
{
    $loaner_name = $row['loaner_name'];
    $loaner_des = $row['loaner_des'];
    $loaner_req = $row['loaner_req'];
    $loaner_logo = $row['loaner_logo'];

    echo "<div class='loaner_info_area'>
            <div class='loaner_info'>
                <div class='loaner_logo'><img src='$loaner_logo' id='loan_logo_prev'></div>
                <div class='loaner_name'><p>$loaner_name</p></div>
                <div class='loaner_brief'><p>$loaner_des</p></div>
            </div>
            <div class='loaner_requirements'>
                <div class='loaner_verified'><img src='images/verified.png'><p>Verified</p></div>
                <div class='loaner_req_btn'><img src='images/require.png'><p>More Info</p></div>
            </div>
            <div class='req_details'><p>$loaner_req</p></div>
        </div>";
}
