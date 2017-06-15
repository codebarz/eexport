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

            $.post("hssearch.php", {searchVal: searchTxt}, function (echo) {
                $('.hs_area').html(echo);
            });
        }
    </script>
</head>
<body style="background: #eee">
<div class="ex_head">
    <div class="ex_head_content">
        <div class="ex_uname"><p><?php echo "$uname"; ?></p></div>
        <div class="ex_notify">
            <div class="ex_notification"></div>
            <div class="ex_msg_notification"></div>
            <div class="ex_request"></div>
            <div class="ex_connecting"></div>
            <div class="hscode">Search HS Code</div>
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
    <div class="ex_homepage"></div>
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
  <div class="bn_search">
  <form action="hssearch.php" method="post" enctype="multipart/form-data">
      <input type="search" name="hssearch" id="hssearch" onkeydown="searchq();" placeholder="Search by Commodity Description">
  </form>
</div>
  <div class="hs_area">
  <!-- <div class="hscodedis">
      <h5>Commodity Description - <span>Example</span></h5>
      <h5>Heading - <span>01.01</span></h5>
      <h5>T.S.N - <span>001.02.02.93</span></h5>
      <h5>S.U. - <span>u</span></h5>
      <h5>I.D. - <span>10</span></h5>
      <h5>IAT - <span>3</span></h5>
      <h5>VAT - <span>5</span></h5>
  </div> -->
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

      echo "<div class='hscodedis'>
          <h5>Commodity Description - <span>$description</span></h5>
          <h5>Heading - <span>$heading</span></h5>
          <h5>T.S.N - <span>$tsn</span></h5>
          <h5>S.U. - <span>$su</span></h5>
          <h5>I.D. - <span>$hsid</span></h5>
          <h5>IAT - <span>$iat</span></h5>
          <h5>VAT - <span>$vat</span></h5>
      </div>";
  }

  ?>
</div>
</div>
</body>
</html>
