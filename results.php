<?php
// error_reporting(0);
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
    <!--<script type="text/javascript" src="js/searchenginehome.js"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body>
  <?php
  if (!isset($_SESSION['log_name']) || !isset($_SESSION['log_id']))
  {
      header("Location: searchengine.php");
  }
  else
  {
  }
  ?>
  <?php
    $get = (isset($_GET['empty'])) ? $_GET['empty'] : '';
    if((!empty($get)) && ($get == 1))
    {
        echo "<div class='alertSFail'>Please input a question in the serach box!.</div>";
    }
    ?>
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
  <div class="searchNav" style="height: 130px;">
      <div class="searchtog">
          <div class="sicon-bar"></div>
          <div class="sicon-bar"></div>
          <div class="sicon-bar"></div>
      </div>
      <div class="searchsmi"><img src="images/stw.png"></div>
      <div class="searchsmi"><img src="images/sfb.png"></div>
      <div class="searchsmi"><img src="images/sig.png"></div>
      <div class="searchsmi"><img src="images/sln.png"></div>
      <div class="mainSearch_3">
     <form action="advancesearch.php" method="post" enctype="multipart/form-data">
      <div class="sLogo">
          <img src="images/searchlogo.png">
      </div>
         <input type="search" name="mainSearch" id="mainSearch" value="<?php if (isset($_GET["mainSearch"])) echo $_GET["mainSearch"]; ?>">
     </form>
  </div>
  </div>
  <div class="quesDisplay_2">
      <div  class="quesans">
        <div class="quesnansonly">
          <div class="quesarea">


        
<?php 
 if (isset($_GET["mainSearch"])) 
    {
      $condition = '';
      $mainSearch = SQLite3::escapeString($_GET['mainSearch']);
      $keyword = $_GET['mainSearch'];
      $query = explode(" ", $keyword);
      $perpageview=7;
      if($_GET["pageno"]){
           $page=$_GET["pageno"];
     }else{
      $page=1;
     }
  $frompage = $page*$perpageview+1-$perpageview;
      foreach ($query as $text) 
      {
          $condition .= "question LIKE '%".SQLite3::escapeString($text)."%' OR answer LIKE '%".SQLite3::escapeString($text)."%' OR ";
      }
      $condition = substr($condition, 0, -4);


      $order = " ORDER BY quiz_id DESC ";
      $sql_query = "SELECT * FROM questions WHERE " . $condition . ' '. $order.' LIMIT '.$frompage.','.$perpageview;
      $sql_query_count = "SELECT COUNT(*) as count FROM questions WHERE " . $condition .' '. $order;
      $result = $db->query($sql_query);
      $resultCount = $db->querySingle($sql_query_count);
      $pagecount = ceil($resultCount/$perpageview);
      if ($resultCount > 0)
      {
      if ($result)
      {
          while ($row = $result->fetchArray(SQLITE3_ASSOC))
          {

              $wording = str_replace($text, "<span style='font-weight: bold;'>".$text."</span>", $row['answer']);

               echo '<div class="quesbox_3">
                <div class="questitle">
                    <h2>'.$row["question"].'</h2>
                </div>
                <div class="quesanswer">'.$wording.'</div>
            </div>';
          }
          for ($i=1; $i <= $pagecount; $i++) { 
             echo '<a href="results.php?mainSearch='.$mainSearch.'&pageno='.$i.'">'.$i.'</a>';
          }
      }
      }
      else
      {
          echo "No results found";
      }
    }
?>
<?php 
function highlightKeyWord ($wording, $keyword)
{

}
?>
<div class="page_controls"></div>
</div>

          <div class="loadingmsg"><img src="svg-loaders/three-dots.svg"></div>
          <div class="loadfin"><img src="svg-loaders/tick-inside-a-circle.svg"></div>
        </div>
      </div>
  </div>
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
    setTimeout(function() {
      $('.alertSFail').fadeOut();
    }, 6000);   
  });
  </script>
</body>
</html>