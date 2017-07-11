<?php
/**
 * Created by PhpStorm.
 * User: TEGA
 * Date: 2/19/2017
 * Time: 1:48 PM
 */
 /**
  * Created by PhpStorm.
  * User: TEGA
  * Date: 2/19/2017
  * Time: 1:48 PM
  */
 require_once ("db.php");
 $db = new MyDB();
 session_start();

 if (isset($_POST['userMsgField']) && !empty($_POST['userMsgField']) || isset($_POST['hash']) && !empty($_POST['hash']))
 {
         $rep_msg = $_POST['userMsgField'];
         $flag = 0;
        //  $my_id = $_SESSION['log_id'];
         $bank_id = $_SESSION['bname'];
         $hash = $_SESSION['group_hash'];

     $sql =<<<EOF
     SELECT * FROM bankconnects WHERE (user = '$bank_id' AND hash = '$hash') OR (bank = '$bank_id' AND hash = '$hash');
EOF;

     $ret = $db->query($sql);

     while ($row = $ret->fetchArray(SQLITE3_ASSOC))
     {
         $user = $row['user'];
         $bank = $row['bank'];

        echo $bank;
        echo $user;

         if ($bank_id == $user)
         {
             $to_id = $bank_id;
         }
         else
         {
             $to_id = $user;
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
         $stmt->bindValue(':from_id', $bank_id, SQLITE3_TEXT);
         $stmt->bindValue(':flag', $flag, SQLITE3_INTEGER);
         $stmt->bindValue(':to_id', $user, SQLITE3_TEXT);

         $bstmt->bindValue(':message', $rep_msg, SQLITE3_TEXT);
         $bstmt->bindValue(':group_hash', $hash, SQLITE3_INTEGER);
         $bstmt->bindValue(':from_id', $bank_id, SQLITE3_TEXT);
         $bstmt->bindValue(':flag', $flag, SQLITE3_INTEGER);
         $bstmt->bindValue(':to_id', $user, SQLITE3_TEXT);

         $result = $stmt->execute();
         $bresult = $bstmt->execute();

         if ($result && $bresult)
         {
             echo "GHood";
         }
     }
}
