<?php
error_reporting(0);
require_once ("db.php");
$db = new MyDb();

session_start();


if (!isset($_SESSION['log_name']))
{
    $_SESSION['log_id'] = $id;
    echo "<script>alert('Please ensure you login or signup')</script>";
}
else
{


}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nigeriaeexport | Welcome</title>
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/eexport.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body style="background: #fff;">
<div class="popup">
  <div class="pop_content"></div>
</div>
<div class="forms">
    <div class="formArea"><br>
        <div class="close" onclick="formClose()"><img src="images/close_2.png"></div><br>
        <div class="logo_area"><img src='images/nigeriaeexport.png'></div>
        <form class="login" method="post" action="login.php" enctype="multipart/form-data">
            <input type="text" name="log_name" id="log_name" placeholder="Username or email">
            <input type="password" name="log_password" id="log_password" placeholder="Password">
            <input type="submit" name="submit_log" id="submit_log" value="LOG IN">
            <p>Don't have an account? <a id="togreg" href="#">SIGN UP</a></p>
        </form>
        <form class="signup" method="post" action="register.php" enctype="multipart/form-data">
            <input type="text" name="fname" id="fname" placeholder="Your Full Name">
            <input type="email" name="email" id="email" placeholder="Your email">
            <input type="text" name="uname" id="uname" placeholder="Username">
            <p>Register as (Buyer/Seller)</p>
            <select id="reg_as" name="reg_as">
                <option name="buyer" value="buyer">Buyer</option>
                <option name="seller" value="seller">Seller</option>
            </select>
            <input type="password" name="password" id="password" placeholder="Password">
            <input type="password" name="cfpassword" id="cfpassword" placeholder="Confirm Password">
            <input type="submit" name="submitreg" id="submitreg" value="Sign up"><br>
            <p>Already have an account? <a href="#" id="toglog">LOGIN</a> </p>
        </form>
    </div>
</div>
<div class="home_head">
  <div class="logo_x">
      <img src="images/logos.png">
  </div>
  <div class="navi">
      <ul>
          <li><a href="index.php">HOME</a></li>
          <li><a href="about.php">ABOUT</a></li>
          <li><a href="blog.php">BLOG</a></li>
          <li><a href="gallery.php">GALLERY</a></li>
          <li><a href="contact.php">CONTACT</a></li>
      </ul>
  </div>
    <?php
    if (!isset($_SESSION['log_name']) && !isset($_SESSION['log_id']))
    {
      echo "<div class=\"loginBtn\" onclick=\"formOpen()\">Login</div><div class=\"signupBtn\">Create an account</div>";
    }
    else
    {

        $id = $_SESSION['log_id'];
        echo "<form action=\"logout.php\" method=\"post\" enctype=\"multipart/form-data\">
            <input type=\"submit\" name=\"logout\" id=\"logout\" value=\"Logout\">
        </form><a class='myAcc' href='exporter.php?log_id=$id'>My Account</a>";
    }
    ?>
</div>
<div class="content">
<!--    <div class="users_amnt">-->
<!--    --><?php
//    $usql =<<<EOF
//SELECT COUNT(id) as COUNT FROM User;
//EOF;
//
//    $uret = $db->querySingle($usql);
//
//    if ($uret)
//    {
//        echo "<p>Over $uret users World Wide</p>";
//    }
//    ?>
<!--    </div>-->
    <div class="latest_prog">
        <div class="push_down"></div>
<!--        <div class="shade"></div>-->
            <div id="slideshow" class="cycle-slideshow"
                 data-cycle-fx = "fade"
                 data-cycle-speed = "600"
                 data-cycle-timeout = "5000"
                 data-cycle-pager = "#pager"
                 data-cycle-next = "#next"
                 data-cycle-prev = "#prev"
                 data-cycle-manual-fx = "scrollHorz"
                 data-cycle-manual-speed = "400"
                 data-cycle-pager-fx = "fade">

                <?php
//                 $bsql = <<<EOF
// SELECT banner FROM programs;
// EOF;
//
//
//                 $bret = $db->query($bsql);
//
//                 if (!$bret)
//                 {
//                 }
//                 else
//                 {
//                     while ($brow = $bret->fetchArray(SQLITE3_ASSOC))
//                     {
//                         $banner = $brow['banner'];
//
//                         echo "<img src='$banner'>";
//                     }
//                 }

                ?>
                <img src="images/1.jpg">
                <img src="images/5.jpg">
                <img src="images/3.jpg">
                <img src="images/6.jpg">
                <img src="images/8.jpg">
                <img src="images/2.jpg">
                <img src="images/4.jpg">
                <img src="images/7.jpg">
                <img src="images/9.jpg">
                <img src="images/10.jpg">
            </div>
            <img id="prev" src="images/prev1.svg"/>
            <img id="next" src="images/next1.svg"/>
    </div>
    <div class="ad_left_1"><img src="images/glo.jpg"></div>
    <div class="ad_right_1"><img src="images/sirtel.jpg"></div>
    <div class="we_do">
        <div class="we_do_area">
            <div class="we_do_con"><br>
              <h1>What we do</h1><br>
                <a href="connected.php"><div class="con_rows connect">
                    <div class="con_rows_img">
                        <img src="images/networking.jpeg">
                    </div>
                    <h4>Connect</h4>
                    <div class="con_rows_img_3">
                        <p>Our B2B platform connects you to international buyers, Exporters, LBAs who are eager to do business with you.</p>
                    </div>
                </div></a>
                <a href="searchengine.php"><div class="con_rows">
                    <div class="con_rows_img">
                        <img src="images/search.jpg">
                    </div>
                    <h4>Search Engine</h4>
                    <div class="con_rows_img_3">
                        <p>
                          Our Search Engine will navigate you through all your questions and export processes.
                        </p>
                    </div>
                </div></a>
                <a href="funding.php" class="funding"><div class="con_rows funding">
                    <div class="con_rows_img">
                        <img src="images/funding.jpg">
                    </div>
                    <h4>Export Funding/Finance</h4>
                    <div class="con_rows_img">
                    <p>
                      Avail yourself of the various export funding from banks in Nigeria while also interacting online with your bank officials.
                    </p>
                    </div>
                </div></a>
                <!-- <div class="con_rows"></div> -->
            </div>
            <!-- <div class="we_do_news">
                <div id="slide_2">
                    <?php
//                     $nwql = <<<EOF
// SELECT * FROM news_prev;
// EOF;
//                     $nwret = $db->query($nwql);
//
//                     while ($nwrow = $nwret->fetchArray(SQLITE3_ASSOC))
//                     {
//                         $id = $nwrow['id'];
//                         $img = $nwrow['img'];
//                         $news_title = $nwrow['news_title'];
//                         $news_brief = $nwrow['news_brief'];
//                         $datestamp = $nwrow['date'];
//
//                         echo "<div>
// <img src='$img'>
// <p style='font-size: 12px;'><a style='color: #4abdac' href='fullnews.php?id=$id'>$news_title</a></p>
// <p>$news_brief</p>
// <p style='font-weight: 700; color: #999; font-style: italic'>$datestamp</p>
// </div>";
//                     }

                    ?>

                </div>
            </div> -->
            <br><br>
        </div>
    </div>
    <div class="ad_left_2"><img src="images/mtn.jpg"></div>
    <div class="ad_right_2"><img src="images/uni.jpg"></div>
    <div class="we_do">
        <div class="we_do_area">
          <a href="backgroundchecks.php"><div class="con_rows">
              <div class="con_rows_img">
                  <img src="images/backgroundcheck.jpg">
              </div>
              <h4>Background Checks</h4>
              <div class="con_rows_img">
                  <p>If you are in Doubt. Click here.</p>
              </div>
          </div></a>
          <div class="con_rows">
              <div class="con_rows_img">
                  <img src="images/qualitycontorl.png">
              </div>
              <h4>Commodity/Quality Control</h4>
              <div class="con_rows_img">
              <p>
                Not sure if your goods is up to standard/ We've got you covered! Click here to ensure zero rejects for your commodities.
              </p>
              </div>
          </div>
          <div class="con_rows">
              <div class="con_rows_img">
                  <img src="images/9.jpg">
              </div>
              <h4>Interactive Session</h4>
              <div class="con_rows_img">
              <p>
                Meet with our export experts and professionals who will assit and guide you through your export journey.
              </p>
              </div>
          </div>
        </div>
    </div>
    <div class="pacs">
        <div class="pac_con">
            <img src="images/play.png">
            <div class="pac_tit">
                <h3>Videos</h3>
            </div>
            <div class="pac_brief">
              <p>
                  Gain access to our video tutorial on correct export processes and tutorials
                  to meet international standards
              </p>
            </div>
        </div>
        <div class="pac_con">
            <img src="images/live.png">
            <div class="pac_tit">
                <h3>Live Chat</h3>
            </div>
            <div class="pac_brief">
              <p>
                  Experience live chat sessions with our expert professionals & 
                  practisioners in the industry and other users on the platform.
              </p>
            </div>
        </div>
        <div class="pac_con">
            <img src="images/support.png">
            <div class="pac_tit">
                <h3>24/7 Support</h3>
            </div>
            <div class="pac_brief">
              <p>
                  Our team of professionals are always available to attend to your 
                  questions and provide support on any issue you might experience 
                  when using the platform.
              </p>
            </div>
        </div>

            <!-- <div class="sub_pac_btn">
                View Packages
            </div> -->
            <div class="row_thin_in">Subscrpition Packages</div>

    </div><br>
    <div class="packages">
        <div class="packages_area">
            <div class="row_4">
                <div class="row_head">SUBSCRIPTION PACKAGES</div>
                <div class="col_3">
                    <div class="min_col">
                      <div class="pac_img">
                          <img src="images/export.jpg">
                      </div>
                        <p class="red">
                            <img src="images/exporter.png">Exporter
                        </p>
                        <p class="briefing">Are you an Exporter? And you want to export your
                          products out of the country? Do you wish to access buyers for your
                          products or expand your client base and gain more visibility for your business?
<br><br>
                        </p>
                        <a href="exporter_reg.php"><div class="red_a">Learn more</div></a><br>
                    </div>
                </div>
                <div class="col_3">
                    <div class="min_col">
                      <div class="pac_img">
                          <img src="images/import.jpg">
                      </div>
                        <p class="l_green">
                            <img src="images/importer.png">International Buyer
                        </p>
                        <p class="briefing">Are you looking for potential and verified exporters to do business with?
                          Do you want to get the best value for your money? Are you looking to run a background check on your exporter?
                          Register here and make your choice from our database of verified Exporter waiting to do business with you.
                        </p>
                        <a href="importer_reg.php"><div class="l_green_a">Learn more</div></a><br>
                    </div>
                </div>
                <div class="col_3">
                    <div class="min_col">
                      <div class="pac_img">
                          <img src="images/local.png">
                      </div>
                        <p class="orange">
                            <img src="images/lba.png">LBA
                        </p>
                        <p class="briefing">Are you a Local Buying Agent? Do you wish to
                          expand your client base and make more sales? Do you want to showcase your commodities
                          and your expertise and gain more visibility? Register here and gain access to
                          thousands of Exporters willing and eager to do business with you.
                        </p>
                        <a href="lba_reg.php"><div class="orange_a">Learn more</div></a><br>
                    </div>
                </div>
                <div class="col_3">
                    <div class="min_col">
                      <div class="pac_img">
                          <img src="images/freights.png">
                      </div>
                        <p class="d_green">
                            <img src="images/freight.png">Freight Forwarder
                        </p>
                        <p class="briefing">Are you a Freight forwarder wishing to get your name out there?
                          Do you wish to increase your client base and get more market for your business?
                          Register with NigeriaEExport and connected to exporters looking for verified and reliable
                          freight forwarders to do business with
                        </p>
                        <a href="freight_reg.php"><div class="d_green_a">Learn more</div></a><br>
                    </div>
                </div>
                <div class="col_3">
                    <div class="min_col">
                      <div class="pac_img">
                          <img src="images/interact.jpg">
                      </div>
                        <p class="green">
                            <img src="images/interactive.png">Interactive
                        </p>
                        <p class="briefing">New to the Export industry and don’t know where to get started?
                          Are you an exporter looking for help with any of the export process?
                          Or are you stuck in your export business and looking for professional advice on the way forward?
                          Register here and get connected to an online professional and experienced
                          practitioners in the industry that will provide all the answers you need.
                        </p>
                        <a href="interactive_reg.php"><div class="green_a">Learn more</div></a><br>
                    </div>
                </div>
                <div class="col_3">
                    <div class="min_col">
                      <div class="pac_img">
                          <img src="images/silent.jpg">
                      </div>
                        <p class="green">
                            <img src="images/lowkey.png">Silent User
                        </p>
                        <p class="briefing">Want help with a Buyer, Seller, or Freight Forwarder etc
                        </p>
                        <a href="silentuser.php"><div class="dark_a">Learn more</div></a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="empty"></div>
    <div class="ex_news">
        <!-- <h3>NEWS & HAPPENINGS</h3> -->
        <!-- <div class="news_posts">
            <img src="images/uni.jpg">
        </div> -->
        <div class="news_main">
            <?php
                    $nwql = <<<EOF
SELECT * FROM news_prev ORDER BY id DESC LIMIT 3;
EOF;
                    $nwret = $db->query($nwql);

                    while ($nwrow = $nwret->fetchArray(SQLITE3_ASSOC))
                    {
                        $id = $nwrow['id'];
                        $img = $nwrow['img'];
                        $news_title = $nwrow['news_title'];
                        $news_brief = $nwrow['news_brief'];
                        $datestamp = $nwrow['date'];

                        echo "<div class='news_posts'>
                            <div class='news_posts_img'>
                                <img src='$img'>
                            </div>
                            <div class='news_post_title'>
                                <a href='#'>$news_title</a>
                            </div>
                            <div class='news_post_brief'><p>$news_brief</p></div>
                            <p class='datestamp'>$datestamp</p>
                        </div>";
                    }

            ?>
          </div>
        <!-- <div class="news_posts"></div>
        <div class="news_posts"></div>
        <div class="news_posts"></div> -->
    </div>
<!--    <div class="int_packs">-->
<!--        <div class="dim">-->
<!--            <div class="rose"></div>-->
<!--            <div class="rose"></div>-->
<!--            <div class="rose"></div>-->
<!--        </div>-->
<!--    </div>-->
<div class="blog_posts">
    <div class="ad_left_3">
        <img src="images/zenith.png">
    </div>
    <div class="blog_post">
        <div class="post_ft_img">
            <img src="images/backgroundcheck.jpg">
        </div>
        <div class="post_ft_title">
            <h4>Learn To Clear Your Goods</h4>
        </div>
        <div class="blog_post_main">
            <p>The movement of goods/services may be stressful in some cases which
            shouldn't be. It is as easy as knife through butter.
            The movement of goods/services may be stressful in some cases which
            shouldn't be. It is as easy as knife through butter...</p>
        </div>
        <div class="blog_post_date">
            <p>Monady, 29th of january, 2017 </p>
        </div>
    </div>
    <div class="blog_post">
      <div class="post_ft_img">
          <img src="images/funding.jpg">
      </div>
      <div class="post_ft_title">
          <h4>How to Find Export Funding</h4>
      </div>
      <div class="blog_post_main">
          <p>The movement of goods/services may be stressful in some cases which
          shouldn't be. It is as easy as knife through butter.
          The movement of goods/services may be stressful in some cases which
          shouldn't be. It is as easy as knife through butter...</p>
      </div>
      <div class="blog_post_date">
          <p>Monady, 29th of january, 2017 </p>
      </div>
    </div>
    <div class="ad_right_3">
        <img src="images/sterling.jpg">
    </div>
</div>
<div class="main_footer">
    <div id="slide_2_txt">
        <p>Connect and Grow</p>
        <h1>Get Started</h1>
        <div class="pack_btn">View Subscription Packages</div>
    </div>
    <div class="dim"></div>
    <div id='slide_7'>
        <div class="current"><img src="images/connection.jpg"></div>
        <div><img src="images/search.jpg"></div>
        <div><img src="images/funding.jpg"></div>
        <div><img src="images/backgroundcheck.jpg"></div>
        <div><img src="images/qualitycontorl.png"></div>
    </div>
</div>
<div class="f_foot">
  <div class="f_foot_area">
    <div class="f_smi_area"><br><br>
      <div class="logo_x">
          <img src="images/logo.png">
      </div><br>
        <h6>NigeriaEexport is a one stop platform for everything export in Nigeria. We provide you with all the necessary
          information that you need to be a successful Exporter in Nigeria and in Africa.
</h6>
<div class="f_smi">
    <img src="images/f_ft.png">
    <img src="images/f_tw.png">
    <img src="images/f_yo.png">
    <img src="images/f_ln.png">
    <img src="images/f_ig.png">
</div>
<h6>&copy; Nigeriaeexport 2017</h6>
    </div>
    <div class="support_by">
<ul>
  <li><img src="images/nepza.png"></li>
  <li><img src="images/nepc.png"></li>
  <li><img src="images/nex.png"></li>
</ul>
</div>
  </div>
</div>
<script type="text/javascript">
$(document).scroll(function() {
  var x = $(this).scrollTop();
  if (x > 200)
  {
      $('.home_head').css("position", "fixed");
  }
  else
  {
      $('.home_head').css("position", "relative", "transition", ".5s");
  }
});
    $(document).ready(function () {
        $('#togreg').click(function (e) {
            e.preventDefault();
            $('.login').addClass('shift').fadeOut('fast');
            $('.signup').removeClass('shift').fadeIn('fast');
            $('.formArea').css("padding-top", "10px");
        });
        // $('.connect').click(function(e) {
        //     e.preventDefault();
        //     $('.popup').fadeIn('slow');
        //     $('.popup').load("connections.php", function (response, status, xhr) {
        //         if (status == "error") {
        //             console.log(msg + xhr.status + " " + xhr.statusText);
        //           }
        //         });
        // });
        // $('.funding').click(function(e) {
        //     e.preventDefault();
        //     $('.popup').fadeIn('slow');
        //     $('.pop_content').load("funding.php", function (response, status, xhr) {
        //         if (status == "error") {
        //             console.log(msg + xhr.status + " " + xhr.statusText);
        //           }
        //         });
        // });
        $('.cls_connect').click(function() {
            $('.popup').fadeOut('slow');
        });
        $('#toglog').click(function (e) {
            e.preventDefault();
            $('.signup').addClass('shift').fadeOut('fast');
            $('.login').removeClass('shift').fadeIn('fast');
        });
        $('#slide_2 div:first-child').addClass('current');
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

        setInterval ("slideFotImages()", 5000);

    });

    function slideFotImages () {
        var oCurImage = $("#slide_7 div.current");
        var oNxtImage = oCurImage.next();

        if (oNxtImage.length == 0) {
            oNxtImage = $("#slide_7 div:first-child");
        }

        oCurImage.fadeOut().removeClass('current');
        oNxtImage.fadeIn().addClass('current').animate({opacity: 1.0}, 1000);
    }
</script>
</body>
</html>
