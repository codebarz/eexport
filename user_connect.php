<?php
/**
 * Created by PhpStorm.
 * User: ORUME
 * Date: 2/8/2017
 * Time: 1:29 PM
 */
require_once ("db.php");
$db = new MyDB();
session_start();

$my_id = $_SESSION['log_id'];
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
<body>
<div class="page_back"></div>
<div class="user_connections">

    <?php
    if (isset($_GET['hash']) && !empty($_GET['hash']))
    {
        echo "Show messages";
    }
    else {
        echo "Your conversations";

        $gsql = <<<EOF
SELECT hash, user_one, user_two FROM connect WHERE user_one = '$my_id' OR user_two = '$my_id';
EOF;
        $gret = $db->query($gsql);

        while ($grow = $gret->fetchArray(SQLITE3_ASSOC)) {
            $hash = $grow['hash'];
            $user_one = $grow['user_one'];
            $user_two = $grow['user_two'];

            if ($user_one == $my_id) {
                $select_id = $user_two;
            } else {
                $select_id = $user_one;
            }

            $sesql = <<<EOF
SELECT * FROM User WHERE ID = '$select_id';
EOF;
            $seret = $db->query($sesql);

            while ($serow = $seret->fetchArray(SQLITE3_ASSOC)) {
                $select_uname = $serow['fname'];

                echo "<br><br><br><br><div class='text'><a href='user_msg.php?hash=$hash'>$select_uname</a></div>
<script type='text/javascript'>
//    $('.text a').click(function (e) {
//        e.preventDefault();
//            $('.boxes').fadeIn('slow').load('user_msg.php?hash=$hash');
//    });
</script>";
            }

        }

    }
    ?>

</div>
<div class="msg_pop">

<?php
echo "<br><br><br><form action='' method='post' enctype='multipart/form-data'>
        <input type='text' name='user_msg' placeholder='Send a message (press enter to send)'>
        <input type='submit' value='Send' name='send_user_msg' id='send_user_msg'>";
if (isset($_POST['send_user_msg']) || isset($_POST['user_msg']) && !empty($_POST['user_msg']))
{


    $my_id = $_SESSION['log_id'];
    $ad_id = $_GET['userid'];
    $rand_num = rand();
    $message = $_POST['user_msg'];

    $hsql =<<<EOF
SELECT COUNT(hash) as count FROM connect WHERE (user_one = '$my_id' AND user_two = '$ad_id') OR (user_one = '$ad_id' AND user_two = '$my_id');
EOF;
    $hret = $db->querySingle($hsql);

    if ($hret == 1)
    {
        echo "<script>alert('$my_id you are already connectd to $ad_id')</script>";
    }
    else
    {

    $csql =<<<EOF
INSERT INTO connect (user_one, user_two, hash) VALUES ('$my_id', '$ad_id', '$rand_num');
EOF;
        $msql =<<<EOF
INSERT INTO messager (message, group_hash, from_id) VALUES ('$message', '$rand_num', '$my_id');
EOF;

    $cret = $db->exec($csql);
        $mret = $db->exec($msql);

    if (!$cret && !$mret)
    {
        echo "<script>alert('Error connecting!!.. Please try again later')</script>";
    }
    else
    {
        echo "<script>alert('Connected and sent to $ad_id')</script>";
        header("Location: user_connect.php?userid=$ad_id");
    }
    }
}
?>
    </form>
</div>


</body>
</html>