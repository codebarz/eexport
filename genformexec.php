<?php
session_start();
require_once ("db.php");
$db = new MyDB();

// if (isset($_SESSION['log_id']))
// {
//     header("Location: exporter.php?userid=$_SESSION['log_id']");
// }
// else
// {
//     header("Location: index.php");
// }

$message = "";

if (isset($_POST['regSubmit']))
{


  $fname = strip_tags(@$_POST['fname']);
  $lname = strip_tags(@$_POST['lname']);
  $cname = strip_tags(@$_POST['cname']);
  $crnum = strip_tags(@$_POST['crcnum']);
  $uaddress = strip_tags(@$_POST['uaddress']);
  $caddress = strip_tags(@$_POST['caddress']);
  $briefdes = strip_tags(@$_POST['briefdes']);
  $uname = strip_tags(@$_POST['uname']);
  $uphone = strip_tags(@$_POST['uphone']);
  $pword = $_POST['pword'];
  $cfpword = $_POST['cfpword'];
  $uemail = $_POST['uemail'];
  $regas = strip_tags(@$_POST['regas']);
  $package = strip_tags(@$_POST['package']);
  $imagedir = './profimages/';
  $profimages = $_FILES['profimages']['name'];
  $profimagestmpname = $_FILES['profimages']['tmp_name'];
  $profimages = $_FILES['profimages']['type'];
  $profimages = $_FILES['profimages']['size'];
  $regdate = date('d/m/Y');
  $ccode = strip_tags(@$_POST['ccode']);

  $csql = <<<EOF
SELECT COUNT(*) as count FROM paymentverification WHERE code = $ccode;
EOF;

$psql = <<<EOF
SELECT * FROM paymentverification WHERE code = $ccode;
EOF;

$cret = $db->querySingle($csql);
$pret = $db->query($psql);

if ($cret == 1)
{
  while ($prow = $pret->fetchArray(SQLITE3_ASSOC))
  {
    $cpackage = $prow['package'];

    if ($cpackage == $package)
    {

  $cql = <<<EOF
  SELECT COUNT(*) FROM users WHERE ccode = $ccode;
EOF;

  $count = $db->querySingle($cql);

  if ($count == 1)
  {
    echo "This code as already been used";
  }
  else
  {

  $imagepath = $imagedir . $profimages;

  $imageresult = move_uploaded_file($profimagestmpname, $imagepath);

  if (!$imageresult)
  {
      echo "Error uploading Company Logo/Profile Picture";
  }
  if (!get_magic_quotes_gpc())
  {
      $profimages = addslashes($profimages);
      $imagepath = addslashes($imagepath);
  }

  $stmt = $db->prepare('INSERT INTO users (fname, lname, cname, crcnum, caddress, uaddress, briefdes, uemail, uphone, uname, regas, pword, cfpword, profimages, package, regdate, ccode)
  VALUES (:fname, :lname, :cname, :crnum, :caddress, :uaddress, :briefdes, :uemail, :uphone, :uname, :regas, :pword, :cfpword, :profimages, :package, :regdate, :ccode)');

  $stmt->bindValue(':fname', $fname, SQLITE3_TEXT);
  $stmt->bindValue(':lname', $lname, SQLITE3_TEXT);
  $stmt->bindValue(':cname', $cname, SQLITE3_TEXT);
  $stmt->bindValue(':crnum', $crnum, SQLITE3_TEXT);
  $stmt->bindValue(':caddress', $caddress, SQLITE3_TEXT);
  $stmt->bindValue(':uaddress', $uaddress, SQLITE3_TEXT);
  $stmt->bindValue(':briefdes', $briefdes, SQLITE3_TEXT);
  $stmt->bindValue(':uemail', $uemail, SQLITE3_TEXT);
  $stmt->bindValue(':uphone', $uphone, SQLITE3_TEXT);
  $stmt->bindValue(':regas', $regas, SQLITE3_TEXT);
  $stmt->bindValue(':regdate', $regdate, SQLITE3_TEXT);
  $stmt->bindValue(':uname', $uname, SQLITE3_TEXT);
  //Come back to password_hash password $stmt->bindValue(':pword', password_hash($pword, PASSWORD_BCRYPT));
  $stmt->bindValue(':pword', $pword, SQLITE3_TEXT);
  $stmt->bindValue(':cfpword', $cfpword, SQLITE3_TEXT);
  $stmt->bindValue(':profimages', $imagepath, SQLITE3_TEXT);
  $stmt->bindValue(':package', $package, SQLITE3_TEXT);
  $stmt->bindValue(':ccode', $ccode, SQLITE3_INTEGER);

  $result = $stmt->execute();

  if ($result)
  {
      $message = "Account Successfully Created";
  }
  else
  {
      $message = "Sorry!.....There was an issue creating your account. Please try again";
  }
}
}
else
{
    echo "You payed for the $cpackage package";
    exit();
}
}
}
}
?>
