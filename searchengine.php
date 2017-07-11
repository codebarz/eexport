<?php
session_start();
require_once ("db.php");
$db = new MyDb();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Export Search Engine | Welcome</title>
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
    <script type="text/javascript" src="js/searchenginehome.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body style="background: url('images/search1.png') no-repeat fixed; background-size: cover;">
  <?php
  if (!isset($_SESSION['log_name']) || !isset($_SESSION['log_id']))
  {
    
  echo "<div class='ses_forms'><br><br><br><br>
  <div class='formArea_2' style='background: transparent'>
  <form class='login_2' method='post' action='login.php' enctype='multipart/form-data'>
  <h3>Please Login or Register</h3>
      <input type='text' name='log_name' id='log_name' placeholder='Username or email'>
      <input type='password' name='log_password' id='log_password' placeholder='Password'>
      <input type='submit' name='submit_log' id='submit_log' value='Login'>
      <p>Don't have an account? <a id='togreg' href='#'>SIGN UP</a></p>
  </form>
  </div>
  </div>";
  }
  else
  {

    $log_id = $_SESSION['log_id'];

    $sql =<<<EOF
    SELECT * FROM users WHERE userid = $log_id;
EOF;

    $ret = $db->query($sql);

    while ($row = $ret->fetchArray(SQLITE3_ASSOC)) 
    {
        $userid = $row['userid'];
    echo '
  <div class="togbar">
      <div class="closetogbar"><p>&Cross;</p></div>
      <ul class="togmenu">
          <li class="toghead">My Account</li>
          <li><a href="postings.php?userid='.$log_id.'">Post Request</a></li>
          <li><a href="backgroundcheck.php?userid='.$log_id.'">Background Checks</a></li>
          <li>Commodity/Quality Control</li>
          <li><a href="chatbox.php?userid='.$log_id.'">Messages</a></li>
          <li>Contact Support</li>
      </ul>
      <ul class="togmenu">
          <li class="toghead">MENU</li>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="news.php">News</a></li>
          <li><a href="contact.php">Contact Us</a></li>
      </ul>
      <ul>
        <form action="logout.php" method="post" enctype="multipart/form-data">
            <input type="submit" name="searchlogout" id="searchlogout" class="searchlogout" value="Logout">
        </form>
      </ul>
  </div>
  <div class="searchNav">
      <div class="searchtog">
          <div class="sicon-bar"></div>
          <div class="sicon-bar"></div>
          <div class="sicon-bar"></div>
      </div>
      <div class="searchsmi"><img src="images/stw.png"></div>
      <div class="searchsmi"><img src="images/sfb.png"></div>
      <div class="searchsmi"><img src="images/sig.png"></div>
      <div class="searchsmi"><img src="images/sln.png"></div>
  </div>
  <div class="mainSearch">
     <form action="advancesearch.php" method="post" enctype="multipart/form-data">
         <input type="search" name="mainSearch" id="mainSearch" placeholder="Enter your Question">
     </form>
  </div>
  <div class="quesDisplay">
      <div  class="quesans">
        <div class="quesnansonly">
          <div class="quesarea">


        </div>
          <div class="loadingmsg"><img src="svg-loaders/three-dots.svg"></div>
          <div class="loadfin"><img src="svg-loaders/tick-inside-a-circle.svg"></div>
        </div>
      </div>
  </div>
  ';
}
}
?>
   <script type="text/javascript">

   </script>
</body>
</html>
