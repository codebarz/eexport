<?php
// require_once ("db.php");
// $db = new MyDb();
//
// session_start();
// if (!isset($_SESSION['log_name']))
// {
//     echo "<script>alert('Please ensure you login or signup')</script>";
// }
// else
// {
//
// }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Connections | Welcome</title>
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
<body>
  <div class="forms">
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
  </div>
  <div class="home_head">
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
      if (!isset($_SESSION['log_name']))
      {
        echo "<div class=\"loginBtn\" onclick=\"formOpen()\">Login</div><div class=\"signupBtn\">Create an account</div>";
      }
      else
      {
          echo "<form action=\"logout.php\" method=\"post\" enctype=\"multipart/form-data\">
              <input type=\"submit\" name=\"logout\" id=\"logout\" value=\"Logout\">
          </form><a href='exporter.php'>My Account</a>";
      }
      ?>
  </div><br><br>
  <div class="fund_img" style="width: 60%; margin: auto">
    <div class="dim"></div>
      <img src="images/connection.jpg"></div>
  </div>
  <div class="funding_area" style="background: none;">
    <!-- <h1 style="width: 90%; margin: auto">Connect</h1>
      <p style="width: 90%; margin: auto">Get connected to exporters of different commodities in the country as the
      showcase their products and their area of expertise offering their
      commodities at very competitive prices. </p> -->
      <h1 style="width: 60%; margin: auto; text-align: center; padding: 20px 0;">Connect</h1>
        <p style="width: 60%; margin: auto">Get connected to buyers and sellers of different commodities as they
        showcase their products and their area of expertise offering their
        commodities at very competitive prices.<br></p>
        <h2 style="width: 60%; margin: auto; text-align: center; padding: 20px 0;">We connect you to</h2>
        <div class="p_txt" style="width: 60%; margin: auto">
    <p style="width: 50%; float: left">- Exporters<br><br>
    - International Buyers<br><br>
    - LBAs<br><br>
    - Freight Forwarders<br><br>
    - Export Professionals and Experienced Practitioners<br><br>
    - Export Agencies<br><br>
    - Export Financing<br><br>
    Come on Board and Get Started Now<br><br>
   </p>
   <img style="width: 30%; float: left" src="images/Telcos.jpg">
 </div>
   <div class="row_thin_in">Subscrpition Packages</div>
  </div>
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
  </div>

</body>
</html>

  <!-- <p class="cls_connect">&Cross;</p>
  <p class="cls_content">
      Get connected to exporters of different commodities in the country as the
      showcase their products and their area of expertise offering their
      commodities at very competitive prices.
  </p>
    Connection
    <script type="text/javascript">
      $(document).ready(function () {
        $('.cls_connect').click(function() {
            $('.popup').fadeOut('slow');
        });
      });
    </script> -->
