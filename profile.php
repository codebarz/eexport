<?php
session_start();
require_once ("db.php");
$db = new MyDB();

if (!isset($_SESSION['log_name']) || !isset($_SESSION['log_id']))
{
    header("Location: index.php");
}
$id = (int)$_GET['post_id'];

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
$fname = $row['fname'];
$lname = $row['lname'];
$cname = $row['cname'];
$crcnum = $row['crcnum'];
$caddress = $row['caddress'];
$uaddress = $row['uaddress'];
$uphone = $row['uphone'];
$pword = $row['pword'];
$exporter = "Exporter";
$ibs = "International Buyer";
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
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<div class="profile_container">
<div class="ex_head">
    <div class="ex_head_content">
        <div class="ex_notify">
            <div class="ex_home"></div>
            <div class="ex_notification"></div>
            <div class="ex_msg_notification"></div>
            <div class="ex_request"></div>
        </div>
    </div>
</div>
<div class="ex_tog_menu">
    <ul>
        <li>
            <?php

            echo "<a href='account.php?userid=$userid'>
<div class='my_account_b'>
<img class='my_account_i' src='$profimages'><div class='badge'><div class='dot'></div><p>$badge</p></div>
</div>
</a>";


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
    <a href="exporter.php"><div class="ex_home_2"></div></a>
    <div class="ex_notification_2"></div>
    <div class="ex_msg_notification_2"></div>
    <div class="ex_request_2"></div>
</div>
<div class="togbar">
    <div class="closetogbar"><p>&Cross;</p></div>
    <ul class="togmenu">
        <li class="toghead">My Account</li>
        <li>Post Request</li>
        <li>Background Checks</li>
        <li><a href="<?php echo"commodityprofile.php?userid=$id"?>">Commodity Profile</a></li>
        <li>Commodity/Quality Control</li>
        <li>Messages</li>
        <li>Contact Support</li>
    </ul>
    <ul class="togmenu">
        <li class="toghead">MENU</li>
        <li>Home</li>
        <li>About Us</li>
        <li>Blog</li>
        <li>News</li>
        <li>Contact Us</li>
    </ul>
    <ul>
      <form action="logout.php" method="post" enctype="multipart/form-data">
          <input type="submit" name="searchlogout" id="searchlogout" class="searchlogout" value="Logout">
      </form>
    </ul>
</div>
<div class="userprofilecover">
  <div class="userprofilegeneral">
    <div class="searchtog">
        <div class="sicon-bar"></div>
        <div class="sicon-bar"></div>
        <div class="sicon-bar"></div>
    </div>
    <div class="userprofileimage_3">
        <?php echo "<img src='$profimages'>";?>
    </div>
    <div class="userprofilename"><p><?php echo "$cname";?></p></div>
    <div class="userprofcon">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="submit" name="usercon" id="usercon" value="connect">
        </form>
    </div>
  </div>
</div>
<div class="userprofileloc">
  <div class="plocimg">
    <img src="images/plocation.png">
  </div>
    <p><?php echo "$caddress";?></p>
</div>
<div class="userprofrecpost">
  <p>Recent Posts</p>
  <?php
$posql = <<<EOF
SELECT * FROM toex WHERE post_id='$id' ORDER BY req_id DESC LIMIT 2;
EOF;

$poret = $db->query($posql);

while ($porow = $poret->fetchArray(SQLITE3_ASSOC))
{
  $req_id = $porow['req_id'];
  $req_title = $porow['req_title'];
  $min_order = $porow['min_order'];
  $poi = $porow['poi'];
  $pay_method = $porow['pay_method'];
  $req_brief = $porow['req_brief'];
  $post_id = $porow['post_id'];
  $towho = $porow['towho'];
  $commodityimg = $porow['commodityimg'];

  echo '<div class="profpostslate">
      <div class="postimg"><img src="'.$commodityimg.'"></div>
      <div class="postuserrequest">
          <span class="posttitle">Request &#8628;</span>
          <p>'.$req_brief.'</p>
      </div>
      <div class="slatecot">
          <a class="postbtn" target="_blank" href="post.php?req_id='.$req_id.'">View Details</a>
      </div>
  </div>';
}

  ?>
</div>
<div class="profcommodity">
  <p>Commodity Uploads</p>
<?php

$csql = <<<EOF
SELECT * FROM commodity WHERE userid = '$id' ORDER BY id DESC;
EOF;

$cret = $db->query($csql);

while ($crow = $cret->fetchArray(SQLITE3_ASSOC))
{
    $commodity = $crow['commodity'];

    echo "<div class='profcom'><img src='$commodity'></div>";
}

}
?>
</div>
</div>
</body>
</html>
