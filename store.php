<?php
session_start();

require_once ("db.php");
$db = new MyDB();


if (isset($_SESSION['id'])) {
    echo $_SESSION['id'];
} else {
    echo "Not logged in";
}
?>
<!--<div class="loader"></div>-->]
<!-- <div class="grid">
    <div class="bn_grid_logo">
      <img src="images/heritage.png">
      <div class="dim"></div>
      <div class="bn_text">Heritage Bank is an International Bank Located across the Globe. Residing in over 500 countries across the
        globe. Present in over 5 continents of the world.. <br><br>
        <div class="bn_active">• Active</div>
      </div>
    </div>
    <div class="bn_grid_name">Heritage Bank</div>
    <div class="grid_icon_con">
    <div class="bn_grid_icon">
        <div class="grid_icon"><img src="images/more.png"></div>
        <div class="grid_icon"><img src="images/sendmsg.png"></div>
        <div class="grid_icon"><img src="images/call.png"></div>
    </div>
  </div>
</div>
<div class="grid">
    <div class="bn_grid_logo">
      <img src="images/diamond.png">
      <div class="dim"></div>
      <div class="bn_text">Diamond Bank is an International Bank Located across the Globe. Residing in over 500 countries across the globe...<br><br>
      <div class="bn_active">• Active</div>
      </div>
    </div>
    <div class="bn_grid_name">Diamond Bank</div>
    <div class="grid_icon_con">
    <div class="bn_grid_icon">
        <div class="grid_icon"><img src="images/more.png"></div>
        <div class="grid_icon"><img src="images/sendmsg.png"></div>
        <div class="grid_icon"><img src="images/call.png"></div>
    </div>
  </div>
</div>
<div class="grid">
  <div class="bn_grid_logo">
    <img src="images/fidelity.png">
    <div class="dim"></div>
    <div class="bn_text">Fidelity Bank is an International Bank Located across the Globe. Residing in over 500 countries across the globe...<br><br>
    <div class="bn_active">• Active</div>
    </div>
  </div>
  <div class="bn_grid_name">Fidelity Bank</div>
  <div class="grid_icon_con">
  <div class="bn_grid_icon">
      <div class="grid_icon"><img src="images/more.png"></div>
      <div class="grid_icon"><img src="images/sendmsg.png"></div>
      <div class="grid_icon"><img src="images/call.png"></div>
  </div>
</div>
</div>
<div class="grid">
  <div class="bn_grid_logo">
    <img src="images/firstbank.png">
    <div class="dim"></div>
    <div class="bn_text">First Bank Nigeria Plc. is an International Bank based in Nigeria with branches
      Located across the Globe. Residing in over 500 countries across the globe...<br><br>
      <div class="bn_active">• Active</div>
    </div>
  </div>
  <div class="bn_grid_name">First Bank</div>
  <div class="grid_icon_con">
  <div class="bn_grid_icon">
      <div class="grid_icon"><img src="images/more.png"></div>
      <div class="grid_icon"><img src="images/sendmsg.png"></div>
      <div class="grid_icon"><img src="images/call.png"></div>
  </div>
</div>
</div>
<div class="grid">
  <div class="bn_grid_logo">
    <img src="images/fcmb.png">
    <div class="dim"></div>
    <div class="bn_text">First City Monument Bank is an International Bank Located across the Globe.
      Residing in over 500 countries across the globe...<br><br>
      <div class="bn_active">• Active</div>
    </div>
  </div>
  <div class="bn_grid_name">First City Monument Bank</div>
  <div class="grid_icon_con">
  <div class="bn_grid_icon">
      <div class="grid_icon"><img src="images/more.png"></div>
      <div class="grid_icon"><img src="images/sendmsg.png"></div>
      <div class="grid_icon"><img src="images/call.png"></div>
  </div>
</div>
</div>
<div class="grid grayscale">
  <div class="bn_grid_logo">
    <img src="images/wema.png">
    <div class="dim"></div>
    <div class="bn_text">Wema Bank is an International Bank with many branches across the Globe.
      We offer loans with low interest rates. Residing in over 500 countries across the globe...<br>
    </div>
  </div>
  <div class="bn_grid_name">Wema Bank</div>
  <div class="grid_icon_con">
  <div class="bn_grid_icon">
      <div class="grid_icon"><img src="images/more.png"></div>
      <div class="grid_icon"><img src="images/sendmsg.png"></div>
      <div class="grid_icon"><img src="images/call.png"></div>
  </div>
</div>
</div>
<div class="grid">
  <div class="bn_grid_logo">
    <img src="images/stanbic.png">
    <div class="dim"></div>
    <div class="bn_text">Stanbic IBTC Bank is an International Bank with many branches across the Globe.
      We offer loans with low interest rates. Residing in over 500 countries across the globe...<br>
    </div>
  </div>
  <div class="bn_grid_name">Stanbic IBTC Bank</div>
  <div class="grid_icon_con">
  <div class="bn_grid_icon">
      <div class="grid_icon"><img src="images/more.png"></div>
      <div class="grid_icon"><img src="images/sendmsg.png"></div>
      <div class="grid_icon"><img src="images/call.png"></div>
  </div>
</div> -->
<!-- <div id="grid_container">
    <div style="height: 80px"><div><div class="dim"></div><img src="images/zenithlogo.png"></div></div>
    <div style="height: 160px"><div>2</div></div>
    <div style="height: 100px"><div>3</div></div>
    <div style="height: 190px"><div>4</div></div>
    <div style="height: 200px"><div>5</div></div>
    <div style="height: 240px"><div>6</div></div>
    <div style="height: 240px"><div>7</div></div>
    <div style="height: 140px"><div>8</div></div>
    <div style="height: 340px"><div>9</div></div>
    <div style="height: 160px"><div>10</div></div>
    <div style="height: 170px"><div>11</div></div>
    <div style="height: 150px"><div>12</div></div>
    <div style="height: 190px"><div>13</div></div>
    <div style="height: 170px"><div>14</div></div>
    <div style="height: 180px"><div>15</div></div>
    <div style="height: 130px"><div>16</div></div>
    <div style="height: 170px"><div>17</div></div>
    <div style="height: 210px"><div>18</div></div>
    <div style="height: 120px"><div>19</div></div>
    <div style="height: 160px"><div>20</div></div>
    <div style="height: 180px"><div>21</div></div>
    <div style="height: 130px"><div>22</div></div>
    <div style="height: 240px"><div>23</div></div>
</div> -->
<div class="side_nav">
    <div class="close_nav">
        <div class="icon-bar-user-3"></div>
        <div class="icon-bar-user-2"></div>
    </div>
    <div class="side_prof_img" >
        <div class="imageDisplay">
            <img src="images/avatar.png">
        </div>
        <div class="side_usern">
            <p align="center">Oke Tega</p>
        </div>
    </div>
    <div class="side-nav_menu">
        <ul>
            <li><a href="index.php"><img src="images/side_nav_home.png">Home</a></li>
            <li><a href="activity.php"><img src="images/side_nav_category.png">Categories</a></li>
            <li><a href="news.php"><img src="images/side_nav_news.png">News</a></li>
            <li><a href="seminar.php"><img src="images/side_nav_seminar.png">Seminars</a></li>
            <li><a href="potentials.php"><img src="images/side_nav_potentials.png">Potentials</a></li>
            <li><a href="gallery.php"><img src="images/side_nav_gallery.png">Gallery</a></li>
            <li><a href="faq.php"><img src="images/side_nav_faq.png">Faq</a></li>
        </ul>
    </div>
    <div class="side-nav_menu_dwn">
        <ul>
            <li><a href="faq.php"><img src="images/side_nav_chat.png">Message</a></li>
            <li><a href="index.php"><img src="images/side_nav_settings.png">Settings</a></li>
            <li><a href="index.php"><img src="images/side_nav_logout.png">Log Out</a></li>
        </ul>
    </div>
</div>
<div class="messaging_area">
    <div class="messaging_box">
        <div class="close"><img src="images/close.png"></div><br>
        <!--<div class="discussion"></div>-->
        <div class="msg_input">
            <form action="sendemail.php" method="post" enctype="multipart/form-data" name="message">
                <input type="mail" name="umail" placeholder="Enter your mail">
                <textarea type="text" name="ask" id="ask" value="" rows="5" placeholder="Your Question..."></textarea>
                <input type="submit" name="sendMsg" id="sendMsg" value="send">
            </form>
        </div>
    </div>
</div>
<div class="header">
    <div class="search_field">
    <div class="profilename"></div>
    <div class="profileImage"></div>
    <div class="search_icon">
        <img src="images/ic_search.png">
    </div>
    <div class="searchgen">
        <form>
            <input type="search" name="searchgen" placeholder="Search E-Xport...">
        </form>
    </div>
    </div>
    <div class="tog_2">
        <div class="icon-bar-user"></div>
        <div class="icon-bar-user"></div>
        <div class="icon-bar-user"></div>
    </div>
</div>
<div class="cat_image">
    <div class="tog">
        <div class="icon-bar-user"></div>
        <div class="icon-bar-user"></div>
        <div class="icon-bar-user"></div>
    </div>
    <div class="msg_icon"><img src="images/chat.png"></div>
    <ul class="options">
        <li class="active">
            <a class="nav-item" href="lsindex.php">Category</a>
        </li><br>
        <li>
            <a class="nav-item" href="lsindex.php">Ask Question</a>
        </li><br>
        <li>
            <a class="nav-item" href="lsindex.php">Message</a>
        </li><br>
    </ul>
    <div class="back" onclick="goBack()"><img src="images/back.png"></div>
</div>
<div class="page">
    <ul>
        <li><a href="index.php">Agro Commodities</a></li>
        <li class="active"><a href="activity.php">Export Commodities</a></li>
        <li><a href="index.php">Export Loans</a></li>
        <li><a href="index.php">Export News</a></li>
    </ul>
</div>
<div class="search">
    <form action="searchpage.php" method="post">
        <input type="search" placeholder="Search Category..." name="searchp">
        <input type="submit" name="searchpage" value="">
    </form>
</div>
<!-- FIX MESSAGING ICON
<div class="sendMsg"><img src="images/messaging.png"></div>-->
<div class="main_content">
        <?php
        $sql =<<<EOF
SELECT * FROM addcategory ORDER BY catID DESC;
EOF;

        $ret = $db->query($sql);

        while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
            $catname = $row['catname'];
            $catdes = $row['catbrief'];
            $catimage = $row['catpic'];
            $catid = $row['catID'];

            echo "<div class=\"catDescription\">
<div class=\"catname\"><p><a href='search.php?category_id=$catid'>$catname</a></p></div>
        <div class=\"catImage\"><img src='".$catimage."'></div>
        <div class=\"catprof\"><p>$catdes</p></div>
        <div class=\"rowCount\"></div>
        </div>";
        }


        ?>
?>
</div>
<div class="sidebar"></div>
<br><br>
<div class="fund_img">
  <div class="dim"></div>
    <img src="images/search.jpg"></div>
</div>
<div class="funding_area">
  <h1>Search Engine</h1>
    <p>New to the whole export business and finding the whole process cumbersome?
      You are in the right place. Learn the A-B-C of Export as we guide you through
      all the processes involved. Get answers to all your export questions all in one place.
</p>
</div>
<div class="row_thin_in">Subscrpition Packages</div>
<div class="packages" style="background: #fff;">
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
                    <a href="#"><div class="orange_a">Learn more</div></a><br>
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
                    <a href="#"><div class="d_green_a">Learn more</div></a><br>
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
                    <a href="#"><div class="green_a">Learn more</div></a><br>
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
                    <a href="#"><div class="dark_a">Learn more</div></a><br>
                </div>
            </div>
        </div>
    </div>
    -----------------------------------------------------------------------------------
    <!-- <div class="forms">
        <div class="formArea">
            <div class="close" onclick="formClose()"><img src="images/close.png"></div>
            <form class="login" method="post" action="login.php" enctype="multipart/form-data">
              <input type="text" name="log_name" id="log_name" placeholder="Username or email">
              <input type="password" name="log_password" id="log_password" placeholder="Password">
              <input type="submit" name="submit_log" id="submit_log" value="Login">
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
    </div> -->
    <!-- <div class="home_head">
      <div class="logo_x">
          <img src="images/logo.png">
      </div>
      <div class="navi">
          <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Gallery</a></li>
              <li><a href="#">Contact</a></li>
          </ul>
      </div>
        <?php
        // if (!isset($_SESSION['log_name']))
        // {
        //   echo "<div class=\"loginBtn\" onclick=\"formOpen()\">Login</div><div class=\"signupBtn\">Create an account</div>";
        // }
        // else
        // {
        //     echo "<form action=\"logout.php\" method=\"post\" enctype=\"multipart/form-data\">
        //         <input type=\"submit\" name=\"logout\" id=\"logout\" value=\"Logout\">
        //     </form><a href='exporter.php'>My Account</a>";
        // }
        ?>
    </div> -->
    -------------------------------------------------------------------------------------------------
<!--<br><br>
<div align="center">
    <a href="weblogout.php">Log Out</a>
</div>-->

<script type="text/javascript">
    $(document).ready(function () {
        $('.tog').click(function () {
            $('.options').slideToggle(500);
            $('.tog div:nth-child(2)').toggleClass("vanisher");
            $('.tog div:first-child').toggleClass("roright");
            $('.tog div:last-child').toggleClass("roleft");
        });
        $('.search_icon').click(function () {
            $('.searchgen').animate({'width': 'toggle'});
        });
        $('.msg_icon').click(function () {
            $('.messaging_area').fadeIn('slow');
        });
        $('.close').click(function () {
            $('.messaging_area').fadeOut('fast');
        });
        $('.close_nav').click(function () {
            $('.side_nav').animate({'width': 'toggle'});
        });
        $('.tog_2').click(function () {
            $('.side_nav').animate({'width': 'toggle'});
        });
        //AJAX STORE...
        $('.page a').click(function (e) {
            e.preventDefault();
            if (window.XMLHttpRequest) {
            var xhttp = new XMLHttpRequest();
        } else {
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                var response = xhttp.responseText;
                $('.cat_questions').html(response);
            }
        };
        <?php $catid = (int)$_GET['category_id'];?>
        var link = <?php echo $catid?>
            xhttp.open("GET", "category.php?category_id=link", true);
        xhttp.send();
    });
    });
    function goBack() {
        window.history.back();
    };
</script>
