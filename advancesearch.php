<?php
require_once ("db.php");
$db = new MyDb();

if (isset($_POST['limit']) && isset($_POST['start'])) {

$start = $_POST["start"];
$limit = $_POST["limit"];

$query =<<<EOF
SELECT * FROM questions ORDER BY quiz_id DESC LIMIT '$start', '$limit';
EOF;

// echo $query;

$result = $db->query($query);

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
  echo '<div class="quesbox_2">
      <div class="questitle">
          <h2>'.$row["question"].'</h2>
      </div>
      <div class="quesanswer">'.$row["answer"].'</div>
        <div class="quesdatetime"><img src="images/questime.png" alt="export question">'.$row["date"].'</div>
  </div>';
}

}
if (isset($_POST['mainSearch'])) 
{

    if (!empty($_POST['mainSearch']))
    {
        $searchquery = $_POST['mainSearch'];

        $query = str_replace(" ", "+", $_POST['mainSearch']);
        header("Location: searchresult.php?mainSearch=" . $query);

    }
    else 
    {
        header('Location:searchresult.php?empty=1');
    }

}
?>
