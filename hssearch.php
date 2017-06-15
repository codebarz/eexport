<?php

require_once ("db.php");
$db = new  MyDB();

session_start();


if (isset($_POST['searchVal'])) {
    $searchquery = $_POST['searchVal'];
//    $searchquery = preg_replace("#[^0-9a-z]#i","",$searchquery);

    $csql = <<<EOF
SELECT COUNT(*) FROM hscodes WHERE description LIKE '%$searchquery%';
EOF;
    $cret = $db->querySingle($csql);

    if ($cret == 0)
    {
        echo  "<div class='results'><p>This code is not available.</p></div>";
    }
    else
    {
        $sql = <<< EOF
SELECT * FROM hscodes WHERE description LIKE '%$searchquery%';
EOF;

        $ret = $db->query($sql);

        if ($cret > 1)
        {
        echo "<div class='results_3'><p>$cret results found</p></div>";
        }
        elseif ($cret <= 1) {
        echo "<div class='results_3'><p>$cret result found</p></div>";
        }
        else {
            echo "<div class='results_3'><p>$cret result found</p></div>";
        }
        while ($row = $ret->fetchArray(SQLITE3_ASSOC))
        {

          $heading = $row['heading'];
          $tsn = $row['tsn'];
          $description = $row['description'];
          $su = $row['su'];
          $hsid = $row['hsid'];
          $iat = $row['iat'];
          $vat = $row['vat'];

          echo "<div class='hscodedis'>
              <h5>Commodity Description - <span>$description</span></h5>
              <h5>Heading - <span>$heading</span></h5>
              <h5>T.S.N - <span>$tsn</span></h5>
              <h5>S.U. - <span>$su</span></h5>
              <h5>I.D. - <span>$hsid</span></h5>
              <h5>IAT - <span>$iat</span></h5>
              <h5>VAT - <span>$vat</span></h5>
          </div>";
    }
}
}
