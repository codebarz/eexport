<?php
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
}
?>
<!doctype html>
<html xmlns:https="http://www.w3.org/1999/xhtml">
<head>
    <title>Nigeriaeexport | Welcome</title>
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
    <!-- <script src="css/bootstrap-3.3.6/dist/css/bootstrap.css"></script> -->
    <script type="text/javascript" src="js/cycle2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        function searchq() {
            var searchTxt = $("input[name='hssearch']").val();

            $.post("drophssearch.php", {searchVal: searchTxt}, function (echo) {
                $('.searchdrop').html(echo);
            });
        }
        $(document).ready(function() {
          $('#hssearch').on("change keyup paste", function () {
              if ($('#hssearch').val().length > 0) {
                  $('.searchdrop').slideDown();
              } else {
                  $('.searchdrop').slideUp();
              }
          });
        });
    </script>
</head>
<body style="background: #fff">
<div class="ex_head">
    <div class="ex_head_content">
        <div class="ex_uname"><p><?php echo "$uname"; ?></p></div>
        <div class="ex_notify">
            <div class="ex_homepage"></div>
            <div class="ex_notification"></div>
            <div class="ex_msg_notification"></div>
            <div class="ex_request">
                <div class="condrop">
                    <ul>
                        <li>Export Search Engine</li>
                    </ul>
                </div>
            </div>
            <div class="ex_connecting">
              <div class='condrop'>
                  <ul>
                      <li>Connect with:</li>
                      <li>Exporters</li>
                      <li>International Buyers</li>
                      <li>LBAs</li>
                      <li>Freight Forwarders</li>
                      <li>Export Agencies</li>
                      <li class="agent">
                        Export Finance
                        <div class="consubdrop">
                          <ul>
                              <a href="funding.php"><li>Banks</li></a>
                              <li>NEXIM</li>
                          </ul>
                        </div>
                      </li>
                  </ul>
              </div>
            </div>
            <a href="hscodes.php"><div class="hscode">Search HS Code</div></a>
            <form action="drophssearch.php" method="post" enctype="multipart/form-data">
                <input type="search" class="hssearch" onkeydown="searchq();" name="hssearch" id="hssearch" placeholder="Search HS Code">
                <div class="searchdrop">
                  <?php

                  $hsql = $db->query("SELECT * FROM hscodes");

                  while ($hrow = $hsql->fetchArray(SQLITE3_ASSOC))
                  {
                      $heading = $hrow['heading'];
                      $tsn = $hrow['tsn'];
                      $description = $hrow['description'];
                      $su = $hrow['su'];
                      $hsid = $hrow['hsid'];
                      $iat = $hrow['iat'];
                      $vat = $hrow['vat'];

                      echo "<p class='hscodedis_2'>
                          Commodity Description - <span>$description </span>
                          Heading - <span>$heading</span>
                      </p>";
                  }

                  ?>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="ex_tog_menu">
    <ul>
        <li>
            <?php

            echo "<a href='account.php?userid=$userid'>
<div class='my_account_b'>
<img class='my_account_i' src='$profimages'>";
            ?>
            <?php
            if ($badge == "Exporter")
            {
                echo "<div class='badge'><div class='dot'></div><p>$badge</p></div>";
            }
            if ($badge == "International Buyer")
            {
                echo "<div class='badge' style='background: #0a8226'><div class='dot'></div><p>$badge</p></div>";
            }
            if ($badge == "Local Buying Agent")
            {
                echo "<div class='badge' style='background: #eb3c00'><div class='dot'></div><p>$badge</p></div>";
            }
            if ($badge == "Freight")
            {
                echo "<div class='badge' style='background: #a8590d'><div class='dot'></div><p>$badge</p></div>";
            }
            echo "</div></a>";
            ?>
        </li>
        <li>
            <form action="logout.php" method="post" enctype="multipart/form-data">
                <input type="submit" value="Logout" name="logout">
            </form>
        </li>
    </ul>
</div>
<div class="side_menu">
    <div class="ex_user"></div>
    <div class="ex_notification_2"></div>
    <div class="ex_msg_notification_2"></div>
    <div class="ex_request_2"></div>
</div>
<div class="all_contents">
  <div class="user_nav_2">
      <ul>
          <li style="color: #4abdac;">&rightarrow;</li>
          <li><a href="">Upcoming Trainings/Seminar</a></li>
          <li><a href="">Add Upcoming Training/Seminar</a></li>
          <li><a href="">Request Background Check</a></li>
          <li><a href="">Connections</a></li>
      </ul>
  </div>
</div>
<div class="mainposts">
<?php
if ($badge == "International Buyer")
{
    $isql = <<<EOF
    SELECT * FROM toibs ORDER BY req_id DESC;
EOF;

$iret = $db->query($isql);

while ($irow = $iret->fetchArray(SQLITE3_ASSOC))
{
    $req_id = $irow['req_id'];
    $req_title = $irow['req_title'];
    $min_order = $irow['min_order'];
    $poi = $irow['poi'];
    $pay_method = $irow['pay_method'];
    $req_brief = $irow['req_brief'];
    $post_id = $irow['post_id'];
    $_SESSION['post_id'] = $postid;
    $towho = $irow['towho'];
    $commodityimg = $irow['commodityimg'];

    $psql = <<<EOF
    SELECT * FROM users WHERE userid = '$post_id';
EOF;

    $pret = $db->query($psql);

    while ($prow = $pret->fetchArray(SQLITE3_ASSOC))
    {
        $cname = $prow['cname'];
        $profimages = $prow['profimages'];

    echo '<div class="postslate">
        <div class="userpostimg"><img src="'.$profimages.'"></div>
        <div class="postimg"><img src="'.$commodityimg.'"></div>
        <div class="postuser">
            <span class="posttitle">Request By &#8628;</span>
            <p>'.$cname.'</p>
        </div>
        <div class="postuserrequest">
            <span class="posttitle">Request &#8628;</span>
            <p>'.$req_brief.'</p>
        </div>
        <div class="slatecot">
            <a class="postbtn" target="_blank" href="post.php?req_id='.$req_id.'&post_id='.$post_id.'">View Details</a>
            <a class="postbtn" href="profile.php?post_id='.$post_id.'">View Profile</a>
        </div>
    </div>';
  }
}
}
if ($badge == "Exporter")
{
    $isql = <<<EOF
    SELECT * FROM toexapp ORDER BY req_id DESC;
EOF;

$iret = $db->query($isql);

while ($irow = $iret->fetchArray(SQLITE3_ASSOC))
{
    $req_id = $irow['req_id'];
    $req_title = $irow['req_title'];
    $min_order = $irow['min_order'];
    $poi = $irow['poi'];
    $pay_method = $irow['pay_method'];
    $req_brief = $irow['req_brief'];
    $post_id = $irow['post_id'];
    $towho = $irow['towho'];
    $commodityimg = $irow['commodityimg'];

    $psql = <<<EOF
    SELECT * FROM users WHERE userid = '$post_id';
EOF;

    $pret = $db->query($psql);

    while ($prow = $pret->fetchArray(SQLITE3_ASSOC))
    {
        $cname = $prow['cname'];
        $profimages = $prow['profimages'];

    echo '<div class="postslate">
        <div class="userpostimg"><img src="'.$profimages.'"></div>
        <div class="postimg"><img src="'.$commodityimg.'"></div>
        <div class="postuser">
            <span class="posttitle">Request By &#8628;</span>
            <p>'.$cname.'</p>
        </div>
        <div class="postuserrequest">
            <span class="posttitle">Request &#8628;</span>
            <p>'.$req_brief.'</p>
        </div>
        <div class="slatecot">
            <a class="postbtn" target="_blank" href="post.php?req_id='.$req_id.'">View Details</a>
            <a class="postbtn" href="profile.php?post_id='.$post_id.'">View Profile</a>
        </div>
    </div>';
  }
}
}
?>
</div>
<div class="mainsidebars"></div>
<script type="text/javascript">
    $(document).ready(function () {
        var tog_menu = document.getElementsByClassName('ex_tog_menu');
        var username = document.getElementsByClassName('ex_uname');
        $(username).click(function () {
            $(tog_menu).slideToggle(200);
        });
        $('#slide div:first-child').addClass('current');
        $('.ex_connecting').mouseenter(function() {
            $(this).find('.condrop').slideDown(300);
        });
        $('.ex_connecting').mouseleave(function() {
            $(this).find('.condrop').slideUp(100);
        });
        $('.ex_request').mouseenter(function() {
            $(this).find('.condrop').slideDown(300);
        });
        $('.ex_request').mouseleave(function() {
            $(this).find('.condrop').slideUp(100);
        });
        var finance = $('.condrop ul li')[6];
        $('.agent').mouseenter(function() {
            $(this).find('.consubdrop').slideDown(300);
        });
        $('.agent').mouseleave(function() {
            $(this).find('.consubdrop').slideUp(100);
        });
    });
    $(function () {

        setInterval ("slideImages()", 5000);

    });

    function slideImages () {
        var oCurImage = $("#slide div.current");
        var oNxtImage = oCurImage.next();

        if (oNxtImage.length == 0) {
            oNxtImage = $("#slide div:first-child");
        }

            oCurImage.fadeOut().removeClass('current');
            oNxtImage.fadeIn().addClass('current').animate({opacity: 1.0}, 1000);
    }
</script>
