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
<body style="background: #eeeeee;">
<!--<div class='head_msg'></div>-->
<div class="msg_user_area">
    <br><br><br>
    <?php
        echo "<div class='text'><h4>Your conversations</h4></div>";

        $my_id = $_SESSION['log_id'];

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
SELECT * FROM users WHERE userid = '$select_id';
EOF;
            $besql = <<<EOF
SELECT * FROM banks WHERE bname = '$select_id';
EOF;
            $seret = $db->query($sesql);
            $beret = $db->query($besql);

            while ($serow = $seret->fetchArray(SQLITE3_ASSOC)) {
                $select_uname = $serow['fname'];
                $select_uimg = $serow['profimages'];

                echo "<a href='user_msg.php?hash=$hash'><div class='text'><img src='$select_uimg'><p>$select_uname</p></div></a>";
            }
            while ($berow = $beret->fetchArray(SQLITE3_ASSOC)) {
                $select_uname = $berow['bname'];
                $select_uimg = $berow['banklogo'];

                echo "<a href='user_msg.php?hash=$hash'><div class='text'><img src='$select_uimg'><p>$select_uname</p></div></a>";
            }
    }
    ?>

</div>
<div class="msg_with">
  <div class="msg_toggle"></div>
  <div class="msg_home"></div>
  <div class="chat_wth">
      <!-- <img src="<?php echo $select_uimg;?>"> -->
  </div>
</div>
    <div class="messages">
    <div class='msg_area'>
<?php
if (isset($_GET['hash']) && !empty($_GET['hash']))
{
    $hash = $_GET['hash'];
    $us_id = $_SESSION['log_id'];

    $_SESSION['hash'] = $hash;
    echo "<input style='display: none' type='text' class='hash' name='hash' value='$hash' id='hash'>";


}
?>
    </div>
    <div class="rep_area">
        <form action="send_chat.php" id="send_rep" method="post" enctype="multipart/form-data">
<textarea name='rep_msg' id='rep_msg' placeholder='Message here'>
</textarea>
<input type="submit" value="">
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function (){
        setInterval(function () {
            var msg_area = $('.msg_area');
            msg_area.animate({scrollTop: msg_area.prop("scrollHeight")}, 2000);
        }, 2000);

        var lastResponse = ''

        setInterval(function () {
            $.ajax({
                type: "GET",
                url: "get_chat.php",
                dataType: "html",
                success: function (response) {
                    $(".msg_area").html(response);
                    if (response !== lastResponse) {
                        var audio = new Audio('audio/solemn.mp3')
                        audio.play()
                    }
                    lastResponse = response
                }
            });
        }, 2000);
            $('#send_rep').submit(function (e) {
                e.preventDefault();
                var $form = $(this), url = $form.attr('action');

                var posting = $.post(url, {rep_msg: $('#rep_msg').val(), hash: $('#hash').val()});


                posting.done(function (data) {
                    $('#rep_msg').val('');
                });
            });
            $('.msg_toggle').click(function () {
                $('.msg_user_area').animate({width: 'toggle'}, 350);
            });
    });
</script>
</body>
</html>
