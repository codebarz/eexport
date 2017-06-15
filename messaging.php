<?php
require_once ("db.php");
$db = new MyDB();


if (isset($_GET['hash']) && !empty($_GET['hash']))
{
    $hash = $_GET['hash'];
    $us_id = $_SESSION['log_id'];

    if (isset($_POST['rep_msg']) && !empty($_POST['rep_msg']))
    {
        $rep_msg = $_POST['rep_msg'];
        $rsql =<<<EOF
INSERT INTO messager (message, group_hash, from_id) VALUES('$rep_msg', '$hash', '$us_id');
EOF;
        $rret = $db->exec($rsql);

        $ursql =<<<EOF
SELECT * FROM User WHERE ID = '$us_id';
EOF;
        $urret = $db->query($ursql);

        while ($urrow = $urret->fetchArray(SQLITE3_ASSOC))
        {
            $from_fname = $urrow['fname'];
            $from_img = $urrow['image'];

            if ($us_id != $_SESSION['log_id'])
            {

                echo "
<div class='from_bubble'><div class='from_img'><img src='$from_img'></div><div class='from_txt'><p>$rep_msg</p></div></div>";
            }
            else
            {
                echo "
<div class='rep_bubble'><div class='rep_img'><img src='$from_img'></div><div class='rep_txt'><p>$rep_msg</p></div></div>";
            }

        }

    }

}