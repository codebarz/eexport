<?php
session_start();
require_once ("db.php");
$db = new MyDB();

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
<div class="ex_head">
    <div class="ex_head_content">
        <div class="ex_uname"><p><?php echo "$uname";?></p></div>
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
<!-- <div class="account_details">
    <div class="account_l">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="account_i">
                    <label for="edit_i"><i><img src="images/edit.png"></i></label>
                    <input type="file" name="edit_i" id="edit_i">
                <?php
                echo "<img src='$profimages'>";
                ?>
            </div>
            <label for="edit_uname">Username: </label>
            <input type="text" name="edit_uname" id="edit_uname" value="<?php echo $uname;?>" placeholder="">
            <label for="edit_fname">First Name: </label>
            <input type="text" name="edit_fname" id="edit_fname" value="<?php echo $fname;?>" placeholder=""><br>
            <label for="edit_lname">Last Name: </label>
            <input type="text" name="edit_lname" id="edit_lname" value="<?php echo $lname;?>" placeholder="">
            <label for="edit_cname">Company Name: </label>
            <input type="text" name="edit_cname" id="edit_cname" value="<?php echo $cname;?>" placeholder=""><br>
            <label for="edit_crcnum">RC Number: </label>
            <input type="text" name="edit_crcnum" id="edit_crcnum" value="<?php echo $crcnum;?>" placeholder="">
            <input type="submit" name="save_changes" id="save_changes" value="save changes">
            <a href="#">Change Password</a>
        </form>
    </div>
</div> -->
<div class="searchtog">
    <div class="sicon-bar"></div>
    <div class="sicon-bar"></div>
    <div class="sicon-bar"></div>
</div>
<div class="togbar">
    <div class="closetogbar"><p>&Cross;</p></div>
        <div class="userprofileimage_2"><?php echo "<img src='$profimages'>";?></div>
    <ul class="togmenu">
        <li class="toghead">My Account</li>
        <li>Post Request</li>
        <li>Background Checks</li>
        <li><a href="commodityprofile.php">Commodity Profile</a></li>
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
<div class="commodityimages">
  <?php
  $gsql =<<<EOF
  SELECT * FROM commodity WHERE userid = '$userid';
EOF;
  $gret = $db->query($gsql);

  while ($grow = $gret->fetchArray(SQLITE3_ASSOC))
  {
      $commodity = $grow['commodity'];

      echo "<div class='commodityshow'><img src='$commodity'></div>";
  }

}
  ?>
    <div class="commodityuploads">
      <div class="commoditypreview"><img id="commoditypreview" src=""></div>
        <div class="commodityform">
            <form action="commodityup.php" id="commodities" method="post" enctype="multipart/form-data">
                <label for="commodity">Upload Image</label>
                <input type="file" onchange="commoditypreview()" name="commodity" id="commodity">
                <input type="submit" name="uploadcommodity" id="uploadcommodity" value="Save">
            </form>
        </div>
    </div>
</div>
<div class="commoditysidebar"></div>
</body>
<script type="text/javascript">
$(document).ready(function() {
  $('.searchtog').click(function (e) {
    e.stopPropagation();
      $('.togbar').animate({width: 'toggle'}, 350);
  });
  $('.closetogbar').click(function (e) {
    e.stopPropagation();
      $('.togbar').animate({width: 'toggle'}, 350);
  });
  $(document).click(function (e) {
    e.stopPropagation();
      $('.togbar').animate({width: 'toggle'}, 350);
  });
  function commodityPreview(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#commoditypreview').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
  $('#commodity').change(function () {
      commodityPreview(this);
  });
});
</script>
</html>
