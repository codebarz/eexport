<?php
session_start();
require_once ("db.php");
$db = new MyDB();
$req_id = (int) $_GET['req_id'];
$id = $_SESSION['log_id'];
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
    <!-- <script src="css/bootstrap-3.3.6/dist/css/bootstrap.css"></script> -->
    <script type="text/javascript" src="js/cycle2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<style type="text/css">
.row_thin_head_ex {
    background: #45b475;
}
.row_thin_head_ex:after {
    border-left: 15px solid #45b475;
}
</style>
<body style="background: url('images/bankbg.jpg') repeat-y center; background-size: cover;">
<?php
if (!isset($_SESSION['log_name']) && !isset($_SESSION['log_id']))
{
    header("Location: index.php");
}
else
{
$sql = <<<EOF
SELECT * FROM users WHERE userid = '$id';
EOF;

$result = $db->query($sql);

while ($row = $result->fetchArray(SQLITE3_ASSOC))
{
    $badge = $row['regas'];

    if ($badge == "International Buyer")
    {
        $isql = <<<EOF
        SELECT * FROM toibs WHERE req_id = '$req_id';
EOF;

        $iret = $db->query($isql);

        while ($irow = $iret->fetchArray(SQLITE3_ASSOC))
        {
          $req_id = $irow['req_id'];
          $req_title = $irow['req_title'];
          $min_order = $irow['min_order'];
          $poi = $irow['poi'];
          $pay_method = $irow['pay_method'];
          $req_brief = $irow['req_brief'];
          $post_id = $irow['post_id'];
          $towho = $irow['towho'];
          $commodityimg = $irow['commodityimg'];
          $commodityimg_2 - $irow['commodityimg_2'];

          $psql = <<<EOF
          SELECT * FROM users WHERE userid = '$post_id';
EOF;

          $pret = $db->query($psql);

          while ($prow = $pret->fetchArray(SQLITE3_ASSOC))
          {
              $cname = $prow['cname'];
              $profimages = $prow['profimages'];
              $postbadge = $prow['regas'];

              echo '<div class="postviewslate">
              <div class="row_label">
                  <div class="row_thin_head_ex_2">Posted By</div>
              </div><br><br>
              <div class="postviewuimg"><img src="'.$profimages.'"></div>
              <div class="postviewposted">';
              if ($postbadge == "Exporter")
              {
                  echo "<div class='badge_2'><div class='dot'></div><p>$badge</p></div>";
              }
              if ($postbadge == "International Buyer")
              {
                  echo "<div class='badge_2' style='background: #0a8226'><div class='dot'></div><p>$badge</p></div>";
              }
              if ($postbadge == "Local Buying Agent")
              {
                  echo "<div class='badge' style='background: #eb3c00'><div class='dot'></div><p>$badge</p></div>";
              }
              if ($postbadge == "Freight")
              {
                  echo "<div class='badge' style='background: #a8590d'><div class='dot'></div><p>$badge</p></div>";
              }

              echo'<p>'.$cname.'</p></div>
                <div class="row_label">
                    <div class="row_thin_head_ex">Post Title</div>
                </div>
                <div class="textview">'.$req_title.'</div>
                <div class="row_label">
                    <div class="row_thin_head_ex">Post Description</div>
                </div>
                <div class="textview">'.$req_brief.'</div>
                <div class="row_label">
                    <div class="row_thin_head_ex">Commodity Image</div>
                </div>
                <div class="textview"><img src="'.$commodityimg.'"></div>
                <div class="textview"><img src="'.$commodityimg_2.'"></div>
              </div>';
            }
        }
    }
    if ($badge == "Exporter")
    {
        $isql = <<<EOF
        SELECT * FROM toexapp WHERE req_id = '$req_id';
EOF;

        $iret = $db->query($isql);

        while ($irow = $iret->fetchArray(SQLITE3_ASSOC))
        {
          $req_id = $irow['req_id'];
          $req_title = $irow['req_title'];
          $min_order = $irow['min_order'];
          $poi = $irow['poi'];
          $pay_method = $irow['pay_method'];
          $req_brief = $irow['req_brief'];
          $post_id = $irow['post_id'];
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
              $postbadge = $prow['regas'];

              echo '<div class="postviewslate">
              <div class="row_label">
                  <div class="row_thin_head_ex_2">Posted By</div>
              </div><br><br>
              <div class="postviewuimg"><img src="'.$profimages.'"></div>
              <div class="postviewposted">';
              if ($postbadge == "Exporter")
              {
                  echo "<div class='badge_2'><div class='dot'></div><p>$badge</p></div>";
              }
              if ($postbadge == "International Buyer")
              {
                  echo "<div class='badge_2' style='background: #0a8226'><div class='dot'></div><p>$badge</p></div>";
              }
              if ($postbadge == "Local Buying Agent")
              {
                  echo "<div class='badge' style='background: #eb3c00'><div class='dot'></div><p>$badge</p></div>";
              }
              if ($postbadge == "Freight")
              {
                  echo "<div class='badge' style='background: #a8590d'><div class='dot'></div><p>$badge</p></div>";
              }

              echo'<p>'.$cname.'</p></div>
                <div class="row_label">
                    <div class="row_thin_head_ex">Post Title</div>
                </div>
                <div class="textview">'.$req_title.'</div>
                <div class="row_label">
                    <div class="row_thin_head_ex">Post Description</div>
                </div>
                <div class="textview">'.$req_brief.'</div>
                <div class="row_label">
                    <div class="row_thin_head_ex">Commodity Image</div>
                </div>
                <div class="textview"><img src="'.$commodityimg.'"></div>
              </div>';
            }
        }
    }
}
}
?>
</body>
</html>
