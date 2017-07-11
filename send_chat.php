<?php
require_once ("db.php");
$db = new MyDB();
session_start();

if (isset($_POST['userMsgField']) && !empty($_POST['userMsgField']) || isset($_POST['hash']) && !empty($_POST['hash']))
{
    $my_id = $_SESSION['log_id'];
    $rep_msg = $_POST['userMsgField'];
    $hash = $_SESSION['hash'];
    $flag = 0;

    $sql =<<<EOF
    SELECT * FROM connect WHERE (user_one = '$my_id' AND hash = '$hash') OR (user_two = '$my_id' AND hash = '$hash');
EOF;

    $ret = $db->query($sql);

    while ($row = $ret->fetchArray(SQLITE3_ASSOC))
    {
        $user_one = $row['user_one'];
        $user_two = $row['user_two'];

        if ($user_one == $my_id)
        {
            $to_id = $user_two;
        }
        else
        {
            $to_id = $user_one;
        }


        $isql =<<<EOF
        INSERT INTO messager (message, group_hash, from_id, flag, to_id) VALUES (:message, :group_hash, :from_id, :flag, :to_id);
EOF;
        $bsql =<<<EOF
        INSERT INTO chatportal (message, group_hash, from_id, flag, to_id) VALUES (:message, :group_hash, :from_id, :flag, :to_id);
EOF;

        $stmt = $db->prepare($isql);
        $bstmt = $db->prepare($bsql);

        $stmt->bindValue(':message', $rep_msg, SQLITE3_TEXT);
        $stmt->bindValue(':group_hash', $hash, SQLITE3_INTEGER);
        $stmt->bindValue(':from_id', $my_id, SQLITE3_INTEGER);
        $stmt->bindValue(':flag', $flag, SQLITE3_INTEGER);
        $stmt->bindValue(':to_id', $to_id, SQLITE3_TEXT);

        $bstmt->bindValue(':message', $rep_msg, SQLITE3_TEXT);
        $bstmt->bindValue(':group_hash', $hash, SQLITE3_INTEGER);
        $bstmt->bindValue(':from_id', $my_id, SQLITE3_INTEGER);
        $bstmt->bindValue(':flag', $flag, SQLITE3_INTEGER);
        $bstmt->bindValue(':to_id', $to_id, SQLITE3_TEXT);

        $result = $stmt->execute();
        $bresult = $bstmt->execute();

        if ($reuslt && $bresult)
        {
            echo "GHood";
        }
    }
}

