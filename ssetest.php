<!-- <!DOCTYPE html>
<html>
<head>
<title>SSE</title>	
<script type="text/javascript" src="js/events.js"></script>
</head>
</html>
 -->
 <?php 
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

require_once("db.php");
$db = new MyDb();

$stmt = "SELECT message FROM messager WHERE from_id = 6";
$ret = $db->query($stmt);

while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
	$message = $row['message'];

echo "retry: 15000" . PHP_EOL; 	
echo "data: <div style='color: #dd0d0d'>$message</div>" . PHP_EOL;
echo PHP_EOL;
flush();
}
 ?>