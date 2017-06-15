<?php
/**
 * Created by PhpStorm.
 * User: ORUME
 * Date: 2/26/2017
 * Time: 3:25 PM
 */
require_once ("db.php");
$db = new MyDB();
session_start();

$log_id = $_SESSION['log_id'];
$unread = 0;

$sql =<<<EOF
SELECT *, COUNT(group_hash) AS NumOccurrences FROM messager WHERE from_id != '$log_id' AND to_id = '$log_id' AND flag = '$unread' GROUP BY group_hash, message ORDER BY from_id DESC; 
EOF;

$ret = $db->query($sql);

$by_hash = array();

while ($row = $ret->fetchArray(SQLITE3_ASSOC))
{
    $hash = $row['group_hash'];
    $message = $row['message'];
    $from_id = $row['from_id'];

    if(!isset($by_hash[$hash])) $by_hash[$hash] = '';
      $by_hash[$hash] .= $message;

      $ssql =<<<EOF
SELECT from_id FROM messager WHERE to_id = '$log_id';
EOF;
      $sret = $db->query($ssql);

      $by_name = array();
      while ($srow = $sret->fetchArray(SQLITE3_ASSOC))
      {
          $from_id = $srow['from_id'];


          $sesql = <<<EOF
SELECT * FROM users WHERE userid = '$from_id';
EOF;
          $seret = $db->query($sesql);

          while ($serow = $seret->fetchArray(SQLITE3_ASSOC)) {
              $select_uname = $serow['fname'];
              $select_uimg = $serow['profimages'];

          }
      }

}

$csql =<<<EOF
SELECT COUNT(group_hash) FROM messager WHERE to_id = '$log_id' AND flag = '$unread';
EOF;

$count_ret = $db->querySingle($csql);


echo "<p class='pending'>($count_ret) Message(s) Pending (Check Messager)</p>";
foreach ($by_hash as $key => $str)
{
//    <p>From: $select_uname</p>
//    echo "<div class='not_msg_area'>";
    echo "<div class='not_msg_display'><div class='not_bubble'><p>".$str."</p></div></div>";
    echo "<input type='text'>";
//    echo "</div>";
        echo "
        <script type='text/javascript'>
            $(document).ready(function() {
//                $('.not_bubble_closer').click(function () {
//                    $(this).next().fadeOut('slow');
//                });
$('.upd_unread').submit(function (e) {
                e.preventDefault();
               $.ajax({
                   type: \"POST\",
                   url: \"make_read.php\",
                   dataType: \"html\",
                   success: function () {
                       $(this).next().fadeOut();
                   }

               });
            });
            });
        </script>";
}

