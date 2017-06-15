<?php
require_once ("db.php");
$db = new MyDB();

session_start();
if (!isset($_SESSION['log_name']) || !isset($_SESSION['log_id']))
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

?>
<!doctype html>
<html xmlns:https="http://www.w3.org/1999/xhtml">
<head>
    <title>E-Xport | Welcome</title>
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
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
          rel="stylesheet">
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
            if ($badge == "Importer")
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
  <div id="cat_image">
      <div id="slideshow" class="cycle-slideshow"
           data-cycle-fx = "fade"
           data-cycle-speed = "600"
           data-cycle-timeout = "3000"
           data-cycle-pager = "#pager"
           data-cycle-next = "#next"
           data-cycle-prev = "#prev"
           data-cycle-manual-fx = "scrollHorz"
           data-cycle-manual-speed = "400"
           data-cycle-pager-fx = "fade">

          <?php
          $bsql = <<<EOF
SELECT banner FROM programs;
EOF;

          $bret = $db->query($bsql);

          if (!$bret)
          {
          }
          else
          {
              while ($brow = $bret->fetchArray(SQLITE3_ASSOC))
              {
                  $banner = $brow['banner'];

                  echo "<img src='$banner'>";
              }
          }

          ?>

      </div>
      <!--    <div id="pager"></div>-->
      <img id="prev" src="images/prev1.svg"/>
      <img id="next" src="images/next1.svg"/>
  </div>
    <div class="main_posts">
        <?php
        $pql = <<<EOF
SELECT * FROM users_request ORDER BY req_id DESC;
EOF;
            $pret = $db->query($pql);

            while ($prow = $pret->fetchArray(SQLITE3_ASSOC))
            {
                $req_title = $prow['req_title'];
                $min_order = $prow['min_order'];
                $poi = $prow['poi'];
                $pay_method = $prow['pay_method'];
                $req_brief = $prow['req_brief'];
                $post_id = $prow['post_id'];

                $usql =<<<EOF
SELECT * FROM users WHERE userid = '$post_id';
EOF;
                $uret = $db->query($usql);

                while ($urow = $uret->fetchArray(SQLITE3_ASSOC))
                {

                    $badge = $urow['regas'];
                    $cname = $urow['cname'];
                    $profimages = $urow['profimages'];

                    echo "<div class='user_post'>
            <div class=\"post_title\"><p>$req_title</p></div>
            <div class=\"poster\"><img src='$profimages'></div>
            <div class=\"poster_name\"><p>$cname</p></div>
            <div class=\"post_req_details\"><p>$req_brief</p></div>
            <div class=\"post_requirements\">
                <p>Min Order: <span>$min_order</span></p>
                <p>POI: <span>$poi</span></p>
                <p>Payment Method: <span>$pay_method</span></p>
            </div>";
                    echo "<div class=\"post_badge_contact\">";
                    ?>
                    <?php
                    if ($badge == "Exporter")
                    {
                        echo "<div class='badge_2'><div class='dot'></div><p>$badge</p></div>";
                    }
                    if ($badge == "Importer")
                    {
                        echo "<div class='badge_2' style='background: #0a8226'><div class='dot'></div><p>$badge</p></div>";
                    }
                    if ($badge == "Local Buying Agent")
                    {
                        echo "<div class='badge_2' style='background: #eb3c00'><div class='dot'></div><p>$badge</p></div>";
                    }
                    if ($badge == "Freight")
                    {
                        echo "<div class='badge_2' style='background: #a8590d'><div class='dot'></div><p>$badge</p></div>";
                    }
                    echo "</div></div>";
                }
            }
        }
        ?>
    </div>
    <div class="news_others">
        <div id="slide">
            <?php
            $nwql = <<<EOF
SELECT * FROM news_prev;
EOF;
            $nwret = $db->query($nwql);

            while ($nwrow = $nwret->fetchArray(SQLITE3_ASSOC))
            {
                $id = $nwrow['id'];
                $img = $nwrow['img'];
                $news_title = $nwrow['news_title'];
                $news_brief = $nwrow['news_brief'];
                $datestamp = $nwrow['date'];

                echo "<div>
<img src='$img'>
<p style='font-size: 16px;'><a style='color: #4abdac' href='fullnews.php?id=$id'>$news_title</a></p>
<p>$news_brief</p><br>
<p style='font-weight: 700; color: #999; font-style: italic'>$datestamp</p>
</div>";
            }

            ?>

        </div>
        <div id="banner">
            <img src="images/EXPORT%20BANNER.png">
        </div>
    </div>
</div>
<div class="foot"></div>
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
</body>
</html>
