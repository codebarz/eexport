<?php
require_once ("db.php");
$db = new MyDb();

session_start();
if (!isset($_SESSION['log_name']))
{
    // echo "<script>alert('Please ensure you login or signup')</script>";
}
else
{

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>About Us | Welcome</title>
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
<div class="popup">
  <div class="pop_content"></div>
</div>
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
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="contact.php">Contact</a></li>
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
</div>
<div class="latest_prog_2">
    <div class="tagline">YOUR ONE STOP EXPORT <br>PLATFORM.</div>
    <div class="dim"></div>
    <img src="images/bg_blur.jpg">
</div>
<div class="ourvision">
  <h3>About Us</h3>
  <p>NigeriaEExport is a one stop shop for everything export in Nigeria.
  We provide you with all the necessary information that you need to be
  a successful Exporter in Nigeria and in Africa. We take you by hand and
  lead you all through the stages and process involved in Exports including
  where to source and your commodities. The site will also allow for great number
  of interactivity among registered members. Registered members will have
  access to all the facilities they need including background checks on
  companies, live chat with export agencies, financial institutions,
  professionals and experienced practitioners in the industry while
  having the opportunity to leverage on the search engine to gain access
  and solutions to grey areas in export and export activities.</p>
  <h3>Our Vision</h3>
  <p>To be the best and foremost online platform where Exporters will
  access all information needed to successfully carry out exports in Nigeria and Africa.</p>
  <h3>Our Mission</h3>
  <p>To provide a one stop platform where new and existing exporters will
  be able to access comprehensive information and interact with export
  agencies and experienced practitioners in the industry.</p>
</div>
<div class="latest_prog_2">
    <div class="tagline_2">
        <h3>Our Journey</h3>
        <div class="jicons">
            <img class="aimg" src="images/alive.png"><br><br>
            <p>20,000 +</p><br><br>
            <sapn>user connects weekly</span>
        </div>
        <div class="jicons">
            <img class="aimg" src="images/ausers.png"><br><br>
            <p>1,700000 +</p><br><br>
            <sapn>registered users</span>
        </div>
        <div class="jicons">
            <img class="aimg" src="images/alearn.png"><br><br>
            <p>15,000 +</p><br><br>
            <sapn>users learn monthly</span>
        </div>
    </div>
    <div class="tick_dim"></div>
    <img src="images/duck.jpg">
</div>
        <!-- <p>
          NigeriaEExport is a one stop shop for everything export in Nigeria.
          We provide you with all the necessary information that you need to be
          a successful Exporter in Nigeria and in Africa. We take you by hand and
          lead you all through the stages and process involved in Exports including
          where to source and your commodities. The site will also allow for great number
          of interactivity among registered members. Registered members will have
          access to all the facilities they need including background checks on
          companies, live chat with export agencies, financial institutions,
          professionals and experienced practitioners in the industry while
          having the opportunity to leverage on the search engine to gain access
          and solutions to grey areas in export and export activities.
        </p>
    </div>
    <div class="about_headings">
      <span><img src="images/vision.png"></span><h2>Our Vision</h2>
    </div>
    <div class="about_paras">
        <p>
          To be the best and foremost online platform where Exporters will
          access all information needed to successfully carry out exports in Nigeria and Africa.
        </p>
    </div>
    <div class="about_headings">
      <span><img src="images/mission.png"></span><h2>Our Mission</h2>
    </div>
    <div class="about_paras">
        <p>
          To provide a one stop platform where new and existing exporters will
          be able to access comprehensive information and interact with export
          agencies and experienced practitioners in the industry.
        </p>
    </div>
    <div class="about_headings">
      <span><img src="images/core.png"></span><h2>Core Values</h2>
    </div>
    <div class="about_paras">
        <p>
          -  Integrity<br><br>
-  Teamwork<br><br>
-  Responsiveness<br><br>
-  Commitment

        </p>
    </div>
    <div class="about_headings">
      <span><img src="images/fetaures.png"></span><h2>Our Features</h2>
    </div>
    <div class="about_paras">
        <p>
          - To provide a platform where Exporters can register and have their own export page<br><br>
- To provide a platform where Local Booking Agencies can register and have their own LBA page.<br><br>
- Buyer-Sellers Meet platform.<br><br>
- Access to Export funding from banks and other financial institutions.<br><br>
- Access to Export Agencies- NEXXIM, NEPC, NEPZA<br><br>
- Interactive sessions with Export Practitioners and professionals where exporters can ask and have their questions answered.<br><br>
- Export Search Engine<br><br>
- Carrying out Background Checks i.e. verify existence of your buyer anywhere in the world, verifying companies and exporters in Nigeria and Africa.<br><br>
- Conducting commodity checks for quality control<br><br>
- Access to Export training and Seminars<br><br>

        </p>
    </div>
    <div class="about_headings">
      <span><img src="images/why.png"></span><h2>Why you Need Us</h2>
    </div>
    <div class="about_paras">
        <p>
          - We guide you through the whole export processes including sourcing and grading of your export commodities.<br><br>
  -  We connect you with Exporters and LBAs for effective sourcing.<br><br>
  -  We provide you buyers for your commodities,<br><br>
  - We help you conduct Background checks on your buyers, exporters and companies.<br><br>
  - We give you firsthand information on Export trainings and seminars<br><br>
  - We provide you with the first ever Export Search Engine.<br><br>
  - We give you access to the latest news and current trends in the industry, new policies etc.<br><br>


</p>-->
        <!--- <div class="main_footer" style="height: 350px">
    </div>
        <div id="slide_2_txt">
            <p>Connect and Grow</p>
            <h1>Get Started</h1>
            <div class="pack_btn">View Subscription Packages</div>
        </div>
        <div class="dim"></div>
        <div id='slide_2'>
            <div class="current"><img src="images/connection.jpg"></div>
            <div><img src="images/search.jpg"></div>
            <div><img src="images/funding.jpg"></div>
            <div><img src="images/backgroundcheck.jpg"></div>
            <div><img src="images/qualitycontorl.png"></div>
        </div> -->
    <!---</div>
  </div><br>
  <div class="f_foot">
    <div class="f_foot_area">
      <div class="f_smi_area"><br><br>
        <div class="logo_x">
            <img src="images/logo.png">
        </div><br>
          <h6>NigeriaEexport is a one stop shop for everything export in Nigeria. We provide you with all the necessary
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
    </div>
  </div> -->
  <script type="text/javascript">
  $(document).scroll(function() {
    var x = $(this).scrollTop();
    if (x > 200)
    {
        $('.home_head').css("background", "#fff");
    }
    else
    {
        $('.home_head').css("background", "transparent", "transition", ".5s");
    }
  });
  </script>
</body>
</html>
