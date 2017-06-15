<?php

require_once ("db.php");
$db = new  MyDB();

session_start();


if (isset($_POST['searchVal'])) {
    $searchquery = $_POST['searchVal'];
//    $searchquery = preg_replace("#[^0-9a-z]#i","",$searchquery);

    $csql = <<<EOF
SELECT COUNT(*) FROM banks WHERE bname LIKE '%$searchquery%';
EOF;
    $cret = $db->querySingle($csql);

    if ($cret == 0)
    {
        echo  "<div class='results'><p>This bank is not available.</p></div>";
    }
    else
    {
        $sql = <<< EOF
SELECT * FROM banks WHERE bname LIKE '%$searchquery%';
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

          $banklogo = $row['banklogo'];
          $bankbrief = $row['bankbrief'];
          $bankname = $row['bname'];

          if ($bankbrief == "Nil" || $bankbrief == "nil") {
            echo "<a href='bankprofile.php?bname=$bankname'><div class='grid'>
              <div class='bn_grid_logo'>
                <img src='$banklogo'>
            </div></div></a>";
          }
          else
          {
            echo "<a href='bankprofile.php?bname=$bankname'><div class='grid'>
              <div class='bn_grid_logo'>
                <img src='$banklogo'>
            </div></div></a>";
        }
    }
}
}
