<?php
error_reporting(0);
require_once ("db.php");

$db = new MyDB();

session_start();

    $us_id = $_SESSION['log_id'];

//echo empty($_SESSION['hash']) ? 'not set' : $_SESSION['hash'];

$hasher = $_SESSION['hash'];

    $mesql =<<<EOF
SELECT from_id, message FROM messager WHERE group_hash = '$hasher';
EOF;
    $meret = $db->query($mesql);
    while ($merow = $meret->fetchArray(SQLITE3_ASSOC))
    {
        $from_id = $merow['from_id'];
        $messages = $merow['message'];


        $usql =<<<EOF
SELECT * FROM users WHERE userid = '$from_id';
EOF;
        $uret = $db->query($usql);

        while ($urow = $uret->fetchArray(SQLITE3_ASSOC)) {
            $from_fname = $urow['fname'];
            $from_img = $urow['profimages'];


            if ($from_id != $_SESSION['log_id']) {

                echo '
                <div class="recMsgBubble">
                    <div class="recBubbleImg"><img src="'.$from_img.'"></div>
                    <div class="recBubbleMsg">'.$messages.'</div>
                </div>';
                //<div class='from_bubble'><div class='from_img'><img src='$from_img'></div><p>$messages</p></div><br>
            } else {
                echo '
                <div class="userMsgBubble">
                    <div class="userBubbleImg"><img src="'.$from_img.'"></div>
                    <div class="userBubbleMsg">'.$messages.'</div>
                </div>';
                //<div class='rep_bubble'><div class='rep_img'><img src='$from_img'></div><p>$messages</p></div><br>
            }
        }
        $csql =<<<EOF
         SELECT * FROM banks WHERE bname = '$from_id';
EOF;
             $cret = $db->query($csql);

             while ($crow = $cret->fetchArray(SQLITE3_ASSOC)) {
                 $from_fname = $crow['bname'];
                 $from_img = $crow['banklogo'];


                 if ($from_id = $from_fname) {

                     echo '<div class="recMsgBubble">
                         <div class="recBubbleImg"><img src="'.$from_img.'"></div>
                         <div class="recBubbleMsg">'.$messages.'</div>
                     </div>';
                 } else {
                     echo '<div class="userMsgBubble">
                         <div class="userBubbleImg"><img src="'.$from_img.'"></div>
                         <div class="userBubbleMsg">'.$messages.'</div>
                     </div>';
                 }
             }
}
?>
