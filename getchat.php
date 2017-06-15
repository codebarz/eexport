<?php
require_once ("db.php");

$db = new MyDB();

session_start();
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/main.css" type="text/css" media="screen">

        <link rel="stylesheet" href="fonts/font-awesome.css">

        <script src="js/popup.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="js/msg.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/cycle2.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    </head>
    <body style="background-color: #eee">
<?php
    $us_id = $_SESSION['log_id'];

//echo empty($_SESSION['hash']) ? 'not set' : $_SESSION['hash'];


$hasher = $_SESSION['hash'];

    $mesql =<<<EOF
SELECT from_id, to_id, message FROM chatportal WHERE group_hash = '$hasher';
EOF;
    $cesql =<<<EOF
SELECT from_id, to_id, message FROM messager WHERE group_hash = '$hasher';
EOF;

    $meret = $db->query($mesql);
    $ceret = $db->query($cesql);

    while ($merow = $meret->fetchArray(SQLITE3_ASSOC))
    {
        $from_id = $merow['from_id'];
        $messages = $merow['message'];


        $usql =<<<EOF
SELECT * FROM banks WHERE bname = '$from_id';
EOF;
        $uret = $db->query($usql);

        while ($urow = $uret->fetchArray(SQLITE3_ASSOC)) {
            $from_fname = $urow['bname'];
            $from_img = $urow['banklogo'];


            if ($from_id != $_SESSION['bname']) {

                echo "
<div class='from_bubble'><div class='from_img'><img src='$from_img'></div><p>$messages</p></div><br>";
            }
            if ($from_id = $_SESSION['log_id']) {
                echo "
<div class='rep_bubble'><div class='rep_img'><img src='$from_img'></div><p>$messages</p></div><br>";
            }
        }
        $csql =<<<EOF
         SELECT * FROM users WHERE userid = '$from_id';
EOF;
             $cret = $db->query($csql);

             while ($crow = $cret->fetchArray(SQLITE3_ASSOC)) {
                 $from_fname = $crow['fname'];
                 $from_img = $crow['profimages'];


                 if ($from_id = $_SESSION['log_id']) {

                     echo "
         <div class='from_bubble'><div class='from_img'><img src='$from_img'></div><p>$messages</p></div><br>";
                 } else {
                     echo "
         <div class='rep_bubble'><div class='rep_img'><img src='$from_img'></div><p>$messages</p></div><br>";
                 }
             }
}
// while ($cerow = $ceret->fetchArray(SQLITE3_ASSOC))
// {
//     $from_id = $cerow['from_id'];
//     $messages = $cerow['message'];
//
//
//     $csql =<<<EOF
// SELECT * FROM users WHERE userid = '$from_id';
// EOF;
//     $cret = $db->query($csql);
//
//     while ($crow = $cret->fetchArray(SQLITE3_ASSOC)) {
//         $from_fname = $crow['fname'];
//         $from_img = $crow['profimages'];
//
//
//         if ($from_id = $_SESSION['log_id']) {
//
//             echo "
// <div class='from_bubble'><div class='from_img'><img src='$from_img'></div><p>$messages</p></div><br>";
//         } else {
//             echo "
// <div class='rep_bubble'><div class='rep_img'><img src='$from_img'></div><p>$messages</p></div><br>";
//         }
//     }
// }
?>
    </body>
    </html>
