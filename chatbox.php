<?php
error_reporting(0);
require_once ("db.php");
$db = new MyDB();

session_start();
if (!isset($_SESSION['log_name']) || !isset($_SESSION['log_id']) || !isset($_SESSION['regas']))
{
    header("Location: index.php");
}
$id = $_SESSION['log_id'];

$sql =<<<EOF
SELECT * FROM users WHERE userid = '$id';
EOF;

$ret = $db->query($sql);

while ($row = $ret->fetchArray(SQLITE3_ASSOC))
{
$uname = $row['uname'];
$userid = $row['userid'];
$badge = $row['regas'];
$profimages = $row['profimages'];
$cname = $row['cname'];
$package = $row['package'];
$exporter = "Exporter";
$ibs = "International Buyer";
$lba = "Local Buying Agent";
$ff = "Freight Forwarder";
$free = "Free Membership";
?>
<!doctype html>
<html xmlns:https="http://www.w3.org/1999/xhtml">
<head>
    <title>Inbox | Chatbox</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/font/typicons.css">
    <link rel="stylesheet" href="js/OwlCarousel2-2.2.1/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="js/OwlCarousel2-2.2.1/dist/assets/owl.theme.default.min.css">
    <script src="js/popup.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-3.1.0.js"></script>
    <script src="js/masonry/masonry.pkgd.js"></script>
    <script src="js/OwlCarousel2-2.2.1/dist/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/msg.js"></script>
    <!-- <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> -->
    <!-- <script src="css/bootstrap-3.3.6/dist/css/bootstrap.css"></script> -->
    <script type="text/javascript" src="js/cycle2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <script type="text/javascript">
        function searchq() {
            var searchTxt = $("input[name='hssearch']").val();

            $.post("drophssearch.php", {searchVal: searchTxt}, function (echo) {
                $('.searchdrop').html(echo);
            });
        }
        function searchq_4() {
            var searchTxt = $("input[name='hssearch']").val();

            $.post("allhssearch.php", {searchVal: searchTxt}, function (echo) {
                $('.allHs').html(echo);
            });
        }
        $(document).ready(function() {
          $('#hssearch').on("change keyup paste", function () {
              if ($('#hssearch').val().length > 0) {
                  $('.allHs').fadeIn().animate({maxHeight: "300px"}, 350);
              } else {
                  $('.allHs').fadeOut();
              }
          });
        });
    </script>
</head>
<body style="background: #dcdbdb">
  <div class="allHs">

</div> 
<div class="small_nav">
  <ul>
      <?php echo'<a href="exporter.php?userid='.$id.'"><li class="typcn typcn-home"><p>Home</p></li></a>';?>
      <?php echo'<a href="postings.php?userid='.$id.'"><li class="typcn typcn-wi-fi"><p>Requests</p></li></a>';?>
      <li class="fa fa-bell"><p>Notifications</p></li>
      <?php echo'<a href="chatbox.php?userid='.$id.'"><li class="fa fa-paper-plane tabactive"><p>Messages</p></li></a>';?>
      <?php echo'<a href="user.php?userid='.$id.'"><li class="typcn typcn-user" style="font-size: 30px"><p>My Account</p></li></a>';?>
      <form action="logout.php" method="post">
          <label for="logout"><li class="fa fa-sign-out"><p>Logout</p></li></label>
          <input style="display: none" type="submit" name="logout" id="logout">
      </form>
  </ul>
</div>
<div class="main_board">
<ul>
<i class="fa fa-times-circle closing"></i>
<i style="display:none"class="fa fa-bars opening"></i>
<li class="nohover">
<form action="" method="post" enctype="multipart/form-data">
<input type="search" onkeydown="searchq_4()" name="hssearch" class="hssearch" id="hssearch" placeholder="Search HS Codes">
</form>
</li>
<li class="barheading">Menu</li>
<?php echo'<a href="search.php?userid='.$userid.'"><li>Export Search Engine</li></a>';?>
<?php echo '<a href="backgroundcheck.php?userid='.$id.'"><li>Background Checks</li></a>';?>
<li>Quality Control</li>
<li class="barheading">Main Site</li>
<a href="index.php"><li>Home</li></a>
<a href="about.php"><li>About Us</li></a>
<a href="blog.php"><li>Blog</li></a>
<a href="gallery.php"><li>Gallery</li></a>
<a href="contact.php"><li>Contact Us</li></a>
</ul>
</div>
<div class="chatNav">
<i class="fa fa-bars opens"></i>
<i class="fa fa-bars closes"></i>
<?php

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

            echo "<a href='chatbox.php?hash=$hash'><div class='msgUserSlate'><img src='$select_uimg'>";

            $unql =<<<EOF
            SELECT COUNT(*) as count FROM messager WHERE flag = '0' AND to_id = '$my_id';
EOF;

            $unreadcount = $db->querySingle($unql);

            // if ($unreadcount >= 1)
            // {
            //     echo '<i style="color: #dd352e; display: none; position: absolute; left: 35px; top: 2px; font-size: 10px" class="fa fa-circle"></i>';
            // }
            // else
            // {
            //     echo "<i></i>";
            // }
            echo"<p>$select_uname</p></div></a>";
        }
        while ($berow = $beret->fetchArray(SQLITE3_ASSOC)) {
            $select_uname = $berow['bname'];
            $select_uimg = $berow['banklogo'];

            echo "<a href='chatbox.php?hash=$hash'><div class='msgUserSlate'><img src='$select_uimg'>";

            $unql =<<<EOF
            SELECT COUNT(*) as count FROM chatportal WHERE flag = '0' AND to_id = '$my_id';
EOF;

            $unreadcount = $db->querySingle($unql);

            // if ($unreadcount >= 1)
            // {
            //     echo '<i style="color: #dd352e; display: none; position: absolute; left: 35px; top: 2px; font-size: 10px" class="fa fa-circle"></i>';
            // }
            // else
            // {
            //     echo "<i></i>";
            // }
            echo"<p>$select_uname</p></div></a>";
          }
      }
?>
</div>
<div class="userSideBar">
  <div class="exNews">
    <div id="slide_2">
    <?php
    $nsql =<<<EOF
    SELECT * FROM news_prev ORDER BY id DESC LIMIT 5;
EOF;

    $nret = $db->query($nsql);

    while ($nrow = $nret->fetchArray(SQLITE3_ASSOC))
        {
            $id = $nrow['id'];
            $img = $nrow['img'];
            $news_title = $nrow['news_title'];
            $news_brief = $nrow['news_brief'];
            $datestamp = $nrow['date'];

            echo "<div>
            <img src='$img'>
            <p style='font-size: 12px;'><a style='color: #111' href='fullnews.php?id=$id'>$news_title</a></p>
            </div>";
        }
    ?>
  </div>
</div>
<div class="exBanking">
<div class="owl-carousel owl-theme">
  <?php
  $bsql = $db->query("SELECT * FROM banks");

  while ($brow = $bsql->fetchArray(SQLITE3_ASSOC))
  {
      $id = $brow['id'];
      $banklogo = $brow['banklogo'];
      $bankbrief = $brow['bankbrief'];
      $bankname = $brow['bname'];

      echo "<a href='bankprofile.php?bname=$bankname'><div class='item' data-merge='2'><div class='exBanks'>
      <img src='$banklogo'>
      </div>
      </div></a>";
  }
  ?>
</div>
</div>
<div class="exSupport">
<h3>Supported By</h3>
<div class="supportLogo">
<div id="slide_3">
<div><img src="images/nexim.png"></div>
<div><img src="images/nepc.png"></div>
<div><img src="images/nepza.png"></div>
</div>
</div>
</div>
</div>
<div class="exFundingSide">
<?php
$bsql = $db->query("SELECT * FROM banks");

while ($brow = $bsql->fetchArray(SQLITE3_ASSOC))
{
    $id = $brow['id'];
    $banklogo = $brow['banklogo'];
    $bankbrief = $brow['bankbrief'];
    $bankname = $brow['bname'];

    echo "<a href='bankprofile.php?bname=$bankname'><div class='grid_2'>
        <div class='bn_grid_logo_2'>
          <img src='$banklogo'>
      </div>
    </div></a>";
}
?>
</div>
<div class="accContent" style="padding: 0px;">
<div class="userPostArea">
    <div class="msgArea">
        <div class="msgHead">
          <?php
          $hashes = (int) $_GET['hash'];

          $msql =<<<EOF
          SELECT * FROM connect WHERE hash = '$hashes';
EOF;

          $mret = $db->query($msql);

          while ($mrow = $mret->fetchArray(SQLITE3_ASSOC))
          {
              $user_one = $mrow['user_one'];
              $user_two = $mrow['user_two'];

              if ($user_one == $userid)
              {
                  $sendto = $user_two;
              }
              if ($user_two == $userid)
              {
                  $sendto = $user_one;
              }

              $userql =<<<EOF
              SELECT * FROM users WHERE userid = '$sendto';
EOF;

              $useret = $db->query($userql);

              while ($userow = $useret->fetchArray(SQLITE3_ASSOC))
              {
                  $profimage = $userow['profimages'];

                  echo '<img src="'.$profimage.'">';
              }

          }

        }
          ?>
        </div>
    </div>
    <div class="chatBox">
      <div class="msgView">
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
      <div class="msgSend">
          <form action="send_chat.php" method="post" id="msgSender" enctype="multipart/form-data">
            <div class="attachBtn"><label for="attachDoc"><i class="fa fa-paperclip"></i></label><input type="file" name="attachDoc" id="attachDoc" value="Attach"></div>
              <input type="text" name="userMsgField" id="userMsgField" placeholder="Type a message">
              <div class="sendMsg"><label for="sendText"><i class="fa fa-paper-plane"></i></label><input type="submit" name="sendText" id="sendText" value="Send"></div>
          </form>
      </div>
    </div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  setTimeout(function() {
    var msgView = $('.msgView');
    msgView.animate({scrollTop: msgView.prop("scrollHeight")}, 300);
  }, 2000);

  var lastResponse = '';

  var update = 0;
  var chatUpdate = function () {
      $.ajax({
          type: "GET",
          url: "get_chat.php",
          dataType: "html",
          success: function (response) {
              $(".msgView").html(response);
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

  $.ajax({
        type: "POST", //or "GET", if you want that
        url: "read.php",
        dataType: "html", //here goes the return's expected format. You should read more about that on the jQuery documentation
        success: function(response) {
            console.log(response);
        }
    });

  $("#msgSender").submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST", //or "GET", if you want that
        url: "send_chat.php",
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

setInterval(function() {
  $('.msgUserSlate i').fadeIn().fadeOut();
}, 2000);

  $('.main_board').animate({width: '50px'}, 350);
  $('.exFundingSide').animate({width: '10%'}, 350);
      $('.allHs').animate({left: '130px'}, 350);
      $('.chatNav').animate({marginLeft: '120px'}, 350);
      $('.exBanking').animate({width: '0%'}, 350).fadeOut();
      $('.owl-dots').hide();
      $('.exSupport').animate({marginTop: '50px'}, 350);
      $('.userPostArea').animate({marginLeft: '120px'}, 350);
      $('.main_board li').fadeOut();
      $('.chatBox').animate({left: '200px'}, 350);
      $('.closing').hide();
      $('.opening').fadeIn();
      $('.chatNav').animate({width: '50px'}, 350);
      // $('.msgUserSlate').animate({height; '50px'}, 350);
      $('.msgUserSlate img').animate({height: '40px', width: '40px', marginTop: '5px', marginLeft: '5px'}, 350);
      $('.msgUserSlate').animate({height: '50px'}, 350);
      $('.msgUserSlate p').css("display", "none");
      $('.msgHead img').animate({marginLeft: "100px"}, 350);
  $('.main_board i').click(function (e) {
    e.stopPropagation();
      $('.main_board').animate({width: '50px'}, 350);
      $('.exFundingSide').animate({width: '10%'}, 350);
      $('.allHs').animate({left: '130px'}, 350);
      $('.chatNav').animate({marginLeft: '120px'}, 350);
      $('.exBanking').animate({width: '0%'}, 350).fadeOut();
      $('.owl-dots').hide();
      $('.exSupport').animate({marginTop: '50px'}, 350);
      $('.userPostArea').animate({marginLeft: '120px'}, 350);
      $('.main_board li').fadeOut();
      $('.chatBox').animate({left: '200px'}, 350);
      $('.closing').hide();
      $('.opening').fadeIn();
  });
  $('.opening').click(function() {
      $('.main_board').animate({width: '230px'}, 350);
      $('.exFundingSide').animate({width: '0%'}, 350);
      $('.allHs').animate({left: '310px'}, 350);
      $('.chatBox').animate({left: '350px'}, 350);
      $('.chatNav').animate({marginLeft: '300px'}, 350);
      $('.exBanking').animate({width: '100%'}, 350).fadeIn();
      $('.owl-dots').show();
      $('.userPostArea').animate({marginLeft: '300px'}, 350);
      $('.opening').hide();
      $('.closing').fadeIn();
      $('.main_board li').fadeIn();
  });
  $('.closes').css("display", "none");
  $('.chatNav .closes').click(function () {
      $('.closes').css("display", "none");
      $('.opens').css("display", "block");
      $('.chatNav').animate({width: '50px'}, 350);
      // $('.msgUserSlate').animate({height; '50px'}, 350);
      $('.msgUserSlate img').animate({height: '40px', width: '40px', marginTop: '5px', marginLeft: '5px'}, 350);
      $('.msgUserSlate').animate({height: '50px'}, 350);
      $('.msgUserSlate p').css("display", "none");
      $('.msgHead img').animate({marginLeft: "100px"}, 350);
    });
    $('.chatNav .opens').click(function (e) {
      e.stopPropagation();
        $('.opens').css("display", "none");
        $('.closes').css("display", "block");
        $('.chatNav').animate({width: '300px'}, 350);
        // $('.msgUserSlate').animate({height; '50px'}, 350);
        $('.msgUserSlate img').animate({height: '50px', width: '50px', marginTop: '10px', marginLeft: '10px'}, 350);
        $('.msgUserSlate').animate({height: '70px'}, 350);
        $('.msgUserSlate p').css("display", "block");
      });
  $('.toibs').click(function (e) {
      e.preventDefault();
      $(".loadingArea").load("toibs.php", function (response, status, xhr) {
          if (status == "error") {
              console.log(msg + xhr.status + " " + xhr.statusText);
          }
      });
  });
  $('.toex').click(function (e) {
      e.preventDefault();
      $(".loadingArea").load("toex.php", function (response, status, xhr) {
          if (status == "error") {
              console.log(msg + xhr.status + " " + xhr.statusText);
          }
      });
  });
  $('.tolbas').click(function (e) {
      e.preventDefault();
      $(".loadingArea").load("tolbas.php", function (response, status, xhr) {
          if (status == "error") {
              console.log(msg + xhr.status + " " + xhr.statusText);
          }
      });
  });
  $('.toffs').click(function (e) {
      e.preventDefault();
      $(".loadingArea").load("toffs.php", function (response, status, xhr) {
          if (status == "error") {
              console.log(msg + xhr.status + " " + xhr.statusText);
          }
      });
  });
  $('.act').click(function () {
      $('.act').removeClass('factive');
      $(this).addClass('factive');
  });
  $('.act a').click(function () {
      $('.act a').removeClass('factive');
      $(this).addClass('factive');
  });
  $('.owl-carousel').owlCarousel({
    items:7,
    loop:true,
    margin:5,
    merge:true,
    responsive:{
        678:{
            mergeFit:true
        },
        1000:{
            mergeFit:false
        }
    }
});
});
$(function () {

    setInterval ("slideImages()", 5000);

});

setInterval (function() {
    $('.alertSuccess').fadeOut();
}, 5000);

function slideImages () {
    var oCurImage = $("#slide_2 div.current");
    var oNxtImage = oCurImage.next();

    if (oNxtImage.length == 0) {
        oNxtImage = $("#slide_2 div:first-child");
    }

    oCurImage.fadeOut().removeClass('current');
    oNxtImage.fadeIn().addClass('current').animate({opacity: 1.0}, 1000);
}
$(function () {

    setInterval ("slideLogos()", 5000);

});

function slideLogos () {
    var oCurImage = $("#slide_3 div.current");
    var oNxtImage = oCurImage.next();

    if (oNxtImage.length == 0) {
        oNxtImage = $("#slide_3 div:first-child");
    }

    oCurImage.fadeOut().removeClass('current');
    oNxtImage.fadeIn().addClass('current').animate({opacity: 1.0}, 1000);
}
</script>
<script>
$(window).on('load', function() {
    $('div.container').masonry({
        columnWidth: 'div.postSlate',
        itemSelector: 'div.postSlate'
    });
});
</script>
</body>
</html>
