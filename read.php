<?php
session_start();
require_once ("db.php");
$db = new MyDb();

if (isset($_GET['hash']) && !empty($_GET['hash'])) 
{

	$hash = (int) $_GET['hash'];
	$read = 1;
	$userid = $_SESSION['log_id'];

	$stmt = <<<EOF
	UPDATE messager SET flag = '1' WHERE group_hash = {$hash} AND to_id = {$userid};
EOF;

	$result = $db->exec($stmt);

	if (!$result) {
		echo "<script>alert('wORKEd')</script>";
	}
}