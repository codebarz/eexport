<?php
require_once ("db.php");
$db = new MyDb();

if (isset($_POST['searchVal'])) {
    $searchquery = $_POST['searchVal'];
//    $searchquery = preg_replace("#[^0-9a-z]#i","",$searchquery);

$bsql = <<< EOF
SELECT * FROM banks WHERE bname LIKE '%$searchquery%' or bankbrief LIKE '%$searchquery%';
EOF;

        $bret = $db->query($bsql);

        while ($brow = $bret->fetchArray(SQLITE3_ASSOC)) {
            $bname = $brow['bname'];
            $bankbrief = $brow['bankbrief'];
            $bankaddress = $brow['bankaddress'];
            $banklogo = $brow['banklogo'];
            $founded = $brow['founded'];
            $owner = $brow['owner'];
            $available = $brow['available'];

            echo '<div class="modulecontent">
                <div class="modulename">
                    <div class="mname">'.$bname.'</div>
                    <div class="mlogo"><img src="'.$banklogo.'"></div>
                </div>
                <div class="modulebrief">'.$bankbrief.'</div>
                <div class="modulelinks">
                    <div class="mfound">Founded: <span>'.$founded.'</span></div>
                    <div class="mowned">Ownd By: <span>'.$owner.'</span></div>
                    <div class="mavailable">Available for Export Loan: <span>'.$available.'</span></div>
                </div>
            </div>';
        }
      }
    }
?>
