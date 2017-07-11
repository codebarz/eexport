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
$package = $row['package'];
$profimages = $row['profimages'];
$cname = $row['cname'];
$uaddress = $row['uaddress'];
$caddress = $row['caddress'];
$uphone = $row['uphone'];
$exporter = "Exporter";
$ibs = "International Buyer";
?>
<!doctype html>
<html xmlns:https="http://www.w3.org/1999/xhtml">
<head>
    <title>User Profile</title>
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
    <script type="text/javascript" src="js/searchengine.js"></script>
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
<body style="background: #f1f1f1">
<div class="allHs">

</div>
<div class="small_nav">
  <ul>
      <?php echo'<a href="exporter.php?userid='.$id.'"><li class="typcn typcn-home"><p>Home</p></li></a>';?>
      <?php echo'<a href="postings.php?userid='.$id.'"><li class="typcn typcn-wi-fi"><p>Requests</p></li></a>';?>
      <li class="fa fa-bell"><p>Notifications</p></li>
      <?php echo'<a href="chatbox.php?userid='.$id.'"><li class="fa fa-paper-plane"><p>Messages</p></li></a>';?>
      <?php echo'<a href="user.php?userid='.$id.'"><li class="typcn typcn-user tabactive" style="font-size: 30px"><p>My Account</p></li></a>';?>
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
<form action="drophssearch.php" method="post" enctype="multipart/form-data">
<input type="search" onkeydown="searchq_4()" name="hssearch" class="hssearch" id="hssearch" placeholder="Search HS Codes">
</form>
<div class="hsResults">

</div>
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
<div class="accContent">
<div class="userPostArea">
<div class="container">
  <div class="loadingArea_2">
    <form action="userupdate.php" method="post" enctype="multipart/form-data">
      <div class="prof">
    <div class="userProfName">
      <h4>Account Details</h4>
      <?php
        $get = (isset($_GET['successProf'])) ? $_GET['successProf'] : '';
        if((!empty($get)) && ($get == 1))
        {
            echo "<div class='alertSuccess'>Profile successfully update.</div>";
        }
        ?>
      <?php
            $get = (isset($_GET['fillProf'])) ? $_GET['fillProf'] : '';
            if((!empty($get)) && ($get == 1))
            {
                echo "<div class='alertFailure'>There was an error updating. Please try again.</div>";
            }
            ?>
      <div class="userProfImage">
        <?php echo '<img src="'.$profimages.'">';?>
        <label for="profIedit"><i class="fa fa-pencil-square"></i></label>
        <input type="file" name="profIedit" id="profIedit">
      </div>
      <div class="namesEdit">
          <input type="text" class="half" name="unameEdit" id="unameEdit" value="<?php echo "$uname"; ?>">
          <input type="text" class="half" name="cnameEdit" id="cnameEdit" value="<?php echo "$cname"; ?>">
          <input type="text" class="full" name="uphoneEdit" id="uphoneEdit" value="<?php echo "$uphone"; ?>">
          <input type="text" class="full" name="uaddressEdit" id="uaddressEdit" value="<?php echo "$uaddress"; ?>">
          <input type="text" class="full" name="caddressEdit" id="caddressEdit" value="<?php echo "$caddress";?>">
          <input type="submit" name="editSub" id="editSub" value="Save Changes">
      </div>
    </div>
  </div>
  </form>
  <form action="commodityup.php" method="post" enctype="multipart/form-data">
  <div class="userProfName">
    <?php
      $get = (isset($_GET['successImg'])) ? $_GET['successImg'] : '';
      if((!empty($get)) && ($get == 1))
      {
          echo "<div class='alertSuccess'>The image was uploaded successfully.</div>";
      }
      ?>
    <?php
          $get = (isset($_GET['fillImg'])) ? $_GET['fillImg'] : '';
          if((!empty($get)) && ($get == 1))
          {
              echo "<div class='alertFailure'>There was an error uploading the image. Please try again.</div>";
          }
          ?>
    <h4>Commodity Profile</h4>
    <div class="namesEdit_2">
    <?php
    $imsql = $db->query("SELECT * FROM commodity WHERE userid = $userid");

    while ($imrow = $imsql->fetchArray(SQLITE3_ASSOC))
    {
        $commodity = $imrow['commodity'];
        $commoditydescription = $imrow['commoditydescription'];

        echo '<div class="imgSlate">
        <img src="'.$commodity.'">
        <div class="imgSlateTitle"><p>'.$commoditydescription.'</p></div>
        </div>';
    }
    ?>
    <div class="imgPreview">
      <img id="commoditypreview" src="">
      <input type="file" onchange="commodityPreview()" name="upImg" id="upImg" value="Upload Image">
      <input type="text" name="commodityDes" id="commodityDes" placeholder="Image title">
    </div><br>
<input type="submit" class="editSub" name="editSub" id="editSub" value="Upload Image">
  </div>
</div>
  </form>
  <form action="updatepword.php" method="post" enctype="multipart/form-data">
    <?php
      $get = (isset($_GET['successPword'])) ? $_GET['successPword'] : '';
      if((!empty($get)) && ($get == 1))
      {
          echo "<div class='alertSuccess'>Password successfully update.</div>";
      }
      ?>
    <?php
          $get = (isset($_GET['fillPword'])) ? $_GET['fillPword'] : '';
          if((!empty($get)) && ($get == 1))
          {
              echo "<div class='alertFailure'>There was an error updating your password. Please try again.</div>";
          }
    ?>
  <div class="userProfName">
    <h4>Change Password</h4>
    <div class="namesEdit">
    <input type="text" class="half" name="pwordEdit" id="pwordEdit" placeholder="Current password">
    <input type="text" class="half" name="newPword" id="newPword" placeholder="New password">
    <input type="text" class="full" name="cnewPword" id="cnewPword" placeholder="Confirm new password">
    <input type="submit" name="editSub" id="editSub" value="Change password">
  </div>
</div>
  </form>
  <form action="" method="post" enctype="multipart/form-data">
  <div class="userProfName">
    <h4>Request Account Upgrade</h4>
    <div class="namesEdit" id="accUp">
    <input type="text" class="half" name="planEdit" id="planEdit" value="<?php echo "$package";?>">
    <select name="upgradeOptions" class="half">
    <?php
    if ($package == "Free Membership")
    {
        echo '<option>Bronze</option><option>Silver</option><option>Gold</option>';
    }
    if ($package == "Bronze")
    {
        echo '<option>Silver</option><option>Gold</option>';
    }
    if ($package == "Silver")
    {
        echo '<option>Gold</option>';
    }
    if ($package == "Gold")
    {
        echo '<option>You Subscribed to the highest package</option>';
    }

    }
    ?>
    </select>
    <input type="submit" name="editSub" id="editSub" value="Request Upgrade">
  </div>
</div>
  </form>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $('.main_board i').click(function (e) {
    e.stopPropagation();
      $('.main_board').animate({width: '50px'}, 350);
      $('.exFundingSide').animate({width: '10%'}, 350);
      $('.allHs').animate({left: '130px'}, 350);
      $('.exBanking').animate({width: '0%'}, 350).fadeOut();
      $('.owl-dots').hide();
      $('.exSupport').animate({marginTop: '50px'}, 350);
      $('.userPostArea').animate({marginLeft: '120px'}, 350);
      $('.main_board li').fadeOut();
      $('.closing').hide();
      $('.opening').fadeIn();
  });
  $('.opening').click(function() {
      $('.main_board').animate({width: '230px'}, 350);
      $('.exFundingSide').animate({width: '0%'}, 350);
      $('.allHs').animate({left: '310px'}, 350);
      $('.exBanking').animate({width: '100%'}, 350).fadeIn();
      $('.owl-dots').show();
      $('.userPostArea').animate({marginLeft: '300px'}, 350);
      $('.opening').hide();
      $('.closing').fadeIn();
      $('.main_board li').fadeIn();
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
setInterval (function() {
    $('.alertSuccess').fadeOut();
}, 8000);
setInterval (function() {
    $('.alertFailure').fadeOut();
}, 8000);
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
function commodityPreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#commoditypreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('#upImg').change(function () {
    commodityPreview(this);
});
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
