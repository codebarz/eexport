<?php 
require_once ("db.php");
$db = new MyDb();

$limit = 7;
$page = $_GET['p'];
if ($page == '') 
{
	$page = 1;
	$start = 0;
}
else
{
	$start = $limit * ($page - 1);
}

$tot = "SELECT COUNT(*) as count FROM questions";
$total = $db->querySingle($tot);
$num_page = ceil($total/$limit);

function pagination ($page, $num_page)
{
	echo '<ul>';
	for($i=1;$i<=$num_page;$i++)
	{
		if ($i==$page) 
		{
			echo '<li>';
		}
		else
		{
			echo '<li>';
		}
	}
	echo '</ul>';
}
?>