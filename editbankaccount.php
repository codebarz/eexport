<?php
session_start();
require_once ("db.php");
$db = new MyDb();


if (!isset($_SESSION['bname']))
{
    header('Location: banks/index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Export Funding/Finance | Welcome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/banks.css" type="text/css" media="screen">

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
<body style="background: #f1f1f1;">
  <?php

  $bname = $_GET['bname'];

  // echo $bname;

  $sql = $db->query("SELECT * FROM banks WHERE bname = '$bname'");

  while ($row = $sql->fetchArray(SQLITE3_ASSOC)) {
      $id = $row['id'];
      $banklogo = $row['banklogo'];
      $bankbrief = $row['bankbrief'];
      $bankname = $row['bname'];
      $bankban = $row['bankbanner'];
      $bankreq = $row['bankreq'];

      echo "<div class='bank_prof_ban'>
      <div class='dim'></div>
      <div class='banklogout'>
          <form action='logout.php' method='post' enctype='multipart/form-data'>
              <input type='submit' name='logout' id='logout' value='Logout'>
          </form>
      </div>
      <div class='bank_prof_logo'>
        <img src='$banklogo'>
      </div>
      <div class='bank_name'><p>$bankname</p>.</div>
      <div class='bank_icons'>
          <a href='editbankaccount.php?bname=$bankname'><div class='bank_icons_img' title='Edit Account'><img src='images/editbank.png'></div></a>
          <div class='bank_icons_img' title='Send a message'><img src='images/bnsendmsg.png'></div>
          <div class='bank_icons_img' title='Call'><img src='images/bncall.png'></div>
      </div>
      <img src='$bankban'>
      </div>
      <form action='' method='post' enctype='multipart/form-data'>
      <div class='bank_require'>
          <h2>Bank Name</h2>
          <input type='text' name='bnameedit' id='bnameedit' value='$bankname'>
          <h2>About Us<img class='req_img' src='images/bout.png'></h2>
          <textarea name='bankbriefedit' id='bankbriefedit' rows='5' value=''>$bankbrief</textarea>
          <h2>Requirement for Export Funding/Finance<img class='req_img' src='images/req.png'></h2>
          <textarea name='banreqedit' id='bankreqedit' rows='10' value=''>$bankreq</textarea>
          <input type='submit' name='sub_ban_edit' id='sub_ban_edit' value='Save Changes'>
          </form>
      </div>
      ";

      //Submit Bank Profile Editing
      if (isset($_POST['sub_ban_edit']))
      {
          $bnameedit = $_POST['bnameedit'];
          $bankbriefedit = $_POST['bankbriefedit'];
          $banreqedit = $_POST['banreqedit'];

$nsql = <<<EOF
UPDATE banks SET bname = '$bnameedit' WHERE id = {$id};
EOF;
$bsql = <<<EOF
UPDATE banks SET bankbrief = '$bankbriefedit' WHERE id = {$id};
EOF;
$rsql = <<<EOF
UPDATE banks SET bankreq = '$banreqedit' WHERE id = {$id};
EOF;

          $nret = $db->exec($nsql);
          $bret = $db->exec($bsql);
          $rret = $db->exec($rsql);

          if ($nret && $bret && $rret)
          {
              echo "<script>alert('Changes Successfully Saved')</script>";
          }
      }
  }
  ?>

</body>
</html>
