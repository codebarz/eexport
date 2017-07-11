<?php
require_once ("db.php");
$db = new MyDB();

session_start();

$userid = $_SESSION['log_id'];

if (isset($_POST['editSub']))
{
  $commodityDes = $_POST['commodityDes'];
  $commodity_dir = './commodities/';
  $commodityname = $_FILES['upImg']['name'];
  $commoditytempname = $_FILES['upImg']['tmp_name'];
  $commoditytype = $_FILES['upImg']['type'];
  $commoditysize = $_FILES['upImg']['size'];

  $commoditypath = $commodity_dir . $commodityname;

  $commodityresult = move_uploaded_file($commoditytempname, $commoditypath);

  if (!$commodityresult)
  {
      header('Location:user.php?fillImg=1');
      exit();
  }
  if (!get_magic_quotes_gpc())
  {
      $commodityname = addslashes($commodityname);
      $commoditypath = addslashes($commoditypath);;
  }
  $csql = <<<EOF
INSERT INTO commodity (userid, commodity, commoditydescription)
VALUES ('$userid', '$commoditypath', '$commodityDes');
EOF;
  $cret = $db->exec($csql);

  if (!$cret)
  {
      echo "<script>alert('Error posting programs!. Please try again')</script>";
      header('Location:user.php?fillImg=1');
  }
  else
  {
      header('Location:user.php?successImg=1');
  }
}
?>
