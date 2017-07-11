<?php

require_once ("db.php");
$db = new  MyDB();

session_start();


if (isset($_POST['searchVal'])) {
    $searchquery = $_POST['searchVal'];
//    $searchquery = preg_replace("#[^0-9a-z]#i","",$searchquery);

        $sql = <<< EOF
SELECT * FROM hscodes WHERE Description LIKE '%$searchquery%';
EOF;

        $ret = $db->query($sql);

        while ($row = $ret->fetchArray(SQLITE3_ASSOC))
        {

          $code = $row['CET_code'];
          $description = $row['Description'];

          echo "
              <p>Commodity Description - <span>$description </span></p>
              <p>Heading - <span>$code</span></p>
          ";
    }
}
?>
