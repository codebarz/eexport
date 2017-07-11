<?php
session_start();
require_once ("db.php");
$db = new MyDB();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" type="text/css" media="screen">

    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/font/typicons.css">

    <script src="js/popup.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-3.1.0.js"></script>
    <script type="text/javascript" src="js/msg.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/cycle2.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
</head>
<body style="background: #dcdbdb;">
<!--<div class='head_msg'></div>-->
<div class="small_nav">
  <ul>
      <?php echo'<a href="bankaccount.php?bname='.$_SESSION['bname'].'"><li class="typcn typcn-home"><p>Home</p></li></a>';?>
      <?php echo'<a href="chatportal.php?banme='.$_SESSION['bname'].'"><li class="fa fa-paper-plane tabactive"><p>Messages</p></li></a>';?>
      <?php echo'<a href="editbankaccount.php?bname='.$_SESSION['bname'].'"><li class="typcn typcn-user" style="font-size: 30px"><p>My Account</p></li></a>';?>
      <form action="logout.php" method="post">
          <label for="logout"><li class="fa fa-sign-out"><p>Logout</p></li></label>
          <input style="display: none" type="submit" name="logout" id="logout">
      </form>
  </ul>
</div>
<div class="chatNav_2">
    <br><br><br>
    <?php
        // echo "<div class='text'><h4>Your conversations</h4></div>";

        $my_id = $_SESSION['bname'];

        $gsql = <<<EOF
SELECT * FROM bankconnects WHERE bank = '$my_id';
EOF;
        $gret = $db->query($gsql);

        while ($grow = $gret->fetchArray(SQLITE3_ASSOC)) {
            $hash = $grow['hash'];
            $user = $grow['user'];
            $bank = $grow['bank'];

            // if ($user == $my_id) {
            //     $select_id = $user_two;
            // } else {
            //     $select_id = $user_one;
            // }

            $sesql = <<<EOF
SELECT * FROM users WHERE userid = '$user';
EOF;
            $seret = $db->query($sesql);

            while ($serow = $seret->fetchArray(SQLITE3_ASSOC)) {
                $select_uname = $serow['fname'];
                $select_uimg = $serow['profimages'];

                echo "<a href='chatportal.php?group_hash=$hash'><div class='msgUserSlate'><img src='$select_uimg'><p>$select_uname</p></div></a>";
            }
    }
    ?>
</div>
<div class="bankTrack">
<ul>
<li><i class="fa fa-eye"></i><span>Keep Track Here</span></li>
<li><i class="fa fa-users"></i><span>3,000 Connections</span></li>
<li><i class="fa fa-truck"></i><span>150 Freight Forwarders</span></li>
</ul>
</div>
<div class="msg_with">
  <div class="msg_toggle"></div>
  <div class="msg_home"></div>
  <div class="chat_wth">
      <!-- <img src="<?php echo $select_uimg;?>"> -->
  </div>
</div>
    <div class="messages">
    <div class='msg_area' style="background: #dcdbdb">
<?php
if (isset($_GET['group_hash']) && !empty($_GET['group_hash']))
{
    $hash = $_GET['group_hash'];
    $us_id = $_SESSION['bname'];

    $_SESSION['group_hash'] = $hash;

    echo "<input style='display: none' type='text' class='hash' name='hash' value='$hash' id='hash'>";


}
?>
    </div>
    <div class="rep_area" style="background: #dcdbdb">
        <form action="chatsend.php" id="msgSender" method="post" enctype="multipart/form-data">
<textarea name='userMsgField' id='userMsgField' placeholder='Message here'></textarea>
<input type="submit" name="sendText" id="sendText" value="">
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function (){
        setTimeout(function () {
            var msg_area = $('.msg_area');
            msg_area.animate({scrollTop: msg_area.prop("scrollHeight")}, 300);
        }, 2000);

        var lastResponse = ''

        var chatUpdate = function () {
            $.ajax({
                type: "GET",
                url: "getchat.php",
                dataType: "html",
                success: function (response) {
                    $(".msg_area").html(response);
                    if (response !== lastResponse) {
                        var audio = new Audio('audio/solemn.mp3')
                        audio.play()
                        var msgView = $('.msgView');
                  msgView.animate({scrollTop: msgView.prop("scrollHeight")}, 2000);
                    }
                    lastResponse = response
                    setTimeout(chatUpdate, 15000);
                }
            });
        };
        setTimeout(chatUpdate, 2000);
        $("#msgSender").submit(function(e) {
          e.preventDefault();
          $.ajax({
              type: "POST", //or "GET", if you want that
              url: "chatsend.php",
              data: $(this).serializeArray(), //here goes the data you want to send to your server. In this case, you're sending your A and B inputs.
              dataType: "json", //here goes the return's expected format. You should read more about that on the jQuery documentation
              success: function(response) {
                  //function called if your request succeeds
                  //do whatever you want with your response json;
                  //as you're learning, try that to see on console:
                  console.log(response);
              },
              error: function(response) {
                  //function called if your request failed
                  //do whatever you want with your error :/
              }
          });
          $('#userMsgField').val("");
      });
    });
</script>
</body>
</html>
