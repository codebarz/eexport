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
<body style="background: #eee">
<div class="allHs">

</div>  
<div class="small_nav">
  <ul>
      <?php echo'<a href="exporter.php?userid='.$id.'"><li class="typcn typcn-home tabactive"><p>Home</p></li></a>';?>
      <?php echo'<a href="postings.php?userid='.$id.'"><li class="typcn typcn-wi-fi"><p>Requests</p></li></a>';?>
      <li class="fa fa-bell"><p>Notifications</p></li>
      <?php echo'<a href="chatbox.php?userid='.$id.'"><li class="fa fa-paper-plane"><p>Messages</p></li></a>';?>
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
<?php echo'<a href="search.php?userid='.$id.'"><li>Export Search Engine</li></a>';?>
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
<!-- <div class="postBtn"></<i class="typcn typcn-wi-fi"></i>Post Request></div> -->
<div class="container">
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
    $req_brief = $irow['req_brief'];
    $post_id = $irow['post_id'];
    // $_SESSION['post_id'] = $postid;
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
        $regas = $prow['regas'];

        if ($regas == "International Buyer")
        {
            echo '<div class="postSlate">
            <ul class="slateDetails"><li><img class="ibdetails" src="'.$profimages.'"></li><li>'.$cname.'</li></ul>
            <div class="slateImg"><img src="'.$commodityimg.'"></div>
            <div class="slateTitle ibtitle"><p>'.$req_title.'</p></div>
            <div class="slateBrief"><p>'.$req_brief.'</p></div>
            <div class="slateBtn">
            <ul>
            <li><a target="_blank" href="post.php?req_id='.$req_id.'&post_id='.$post_id.'">View Post Details</a></li></ul>
            </div>
            </div>';
        }
        if ($regas == "Exporter")
        {
            echo '<div class="postSlate">
            <ul class="slateDetails"><li><img class="exdetails" src="'.$profimages.'"></li><li>'.$cname.'</li></ul>
            <div class="slateImg"><img src="'.$commodityimg.'"></div>
            <div class="slateTitle extitle"><p>'.$req_title.'</p></div>
            <div class="slateBrief"><p>'.$req_brief.'</p></div>
            <div class="slateBtn">
            <ul>
            <li><a target="_blank" href="post.php?req_id='.$req_id.'&post_id='.$post_id.'">View Post Details</a></li></ul>
            </div>
            </div>';
        }
    }
}
}
if ($badge == "Exporter")
{
    $exql =<<< EOF
    SELECT * FROM toexapp ORDER BY req_id DESC;
EOF;

$exret = $db->query($exql);

while ($exrow = $exret->fetchArray(SQLITE3_ASSOC))
{
    $req_id = $exrow['req_id'];
    $req_title = $exrow['req_title'];
    $min_order = $exrow['min_order'];
    $poi = $exrow['poi'];
    $pay_method = $exrow['pay_method'];
    $req_brief = $exrow['req_brief'];
    $post_id = $exrow['post_id'];
    $towho = $exrow['towho'];
    $commodityimg = $exrow['commodityimg'];

    $uexql =<<<EOF
    SELECT * FROM users WHERE userid = '$post_id';
EOF;

    $uexret = $db->query($uexql);

    while ($uexrow = $uexret ->fetchArray(SQLITE3_ASSOC))
    {
        $cname = $uexrow['cname'];
        $profimages = $uexrow['profimages'];
        $regas = $uexrow['regas'];

        if ($regas == "International Buyer")
        {
            echo '<div class="postSlate">
            <ul class="slateDetails"><li><img class="ibdetails" src="'.$profimages.'"></li><li>'.$cname.'</li></ul>
            <div class="slateImg"><img src="'.$commodityimg.'"></div>
            <div class="slateTitle ibtitle"><p>'.$req_title.'</p></div>
            <div class="slateBrief"><p>'.$req_brief.'</p></div>
            <div class="slateBtn">
            <ul>
            <li><a target="_blank" href="post.php?req_id='.$req_id.'&post_id='.$post_id.'">View Post Details</a></li></ul>
            </div>
            </div>';
        }
        if ($regas == "Exporter")
        {
            echo '<div class="postSlate">
            <ul class="slateDetails"><li><img class="exdetails" src="'.$profimages.'"></li><li>'.$cname.'</li></ul>
            <div class="slateImg"><img src="'.$commodityimg.'"></div>
            <div class="slateTitle extitle"><p>'.$req_title.'</p></div>
            <div class="slateBrief"><p>'.$req_brief.'</p></div>
            <div class="slateBtn">
            <ul>
            <li><a target="_blank" href="post.php?req_id='.$req_id.'&post_id='.$post_id.'">View Post Details</a></li></ul>
            </div>
            </div>';
        }

    }
}
}
}
?>
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
