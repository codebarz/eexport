<?php
require_once ("db.php");
$db = new MyDB();

if (isset($_POST['verify_sub']))
{
  $transactionid = $_POST['transactionid'];
  $payname = $_POST['payname'];
  $bankname = $_POST['bankname'];
  $paymail = $_POST['paymail'];
  $package = $_POST['package'];
  $number = rand();

  $stmt = $db->prepare('INSERT INTO paymentverification (transactionid, payname, bankname, paymail, package, code) VALUES(:transactionid, :payname, :bankname, :paymail, :package, :code)');

  $stmt->bindValue(":transactionid", $transactionid, SQLITE3_TEXT);
  $stmt->bindValue(":payname", $payname, SQLITE3_TEXT);
  $stmt->bindValue(":bankname", $bankname, SQLITE3_TEXT);
  $stmt->bindValue(":package", $package, SQLITE3_TEXT);
  $stmt->bindValue(":paymail", $paymail, SQLITE3_TEXT);
  $stmt->bindValue(":code", $number, SQLITE3_TEXT);

  $result = $stmt->execute();

  if ($result) {
      echo '<script>alert("Success")</script>';
  }
}
?>
