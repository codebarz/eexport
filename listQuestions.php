<?php
require_once("model.php");

$db = new Model();

$qsql =<<<EOF
    SELECT * FROM QUESTIONS;
EOF;

$qres = $db->query($qsql);

if(!$qres)
{
    die($db->db->lastErrorMsg());
}


?>
<html>
<head>
    <title>Xport - Questions list</title>
</head>
<body>
    <h1>All Questions</h1>
    <p><a href="insertQuestion.php">Add New Question</a></p>
    <table>
        <thead>
            <th>Question</th>
            <th>Category</th>
            <th>Answer</th>
        </thead>
        <tbody>
    <?php
    while($r = $qres->fetchArray(SQLITE3_ASSOC))
    {
        $question = $r['question'];
        $answerid = $r['answer_id'];
        $categoryid = $r['category_id'];

        $asql =<<<EOF
        SELECT ANSWER FROM ANSWERS WHERE id=$answerid
EOF;
        $ares = $db->query($asql);
        if(!$ares)
        {
            die($db->db->lastErrorMsg());
        }
        $answer = $ares->fetchArray(SQLITE3_ASSOC);
        $answer = $answer['answer'];

        $csql =<<<EOF
        SELECT CATEGORY FROM CATEGORIES WHERE id=$categoryid
EOF;
        $cres = $db->query($csql);
        if(!$csql)
        {
            die($db->db->lastErrorMsg());
        }
        $category = $cres->fetchArray(SQLITE3_ASSOC);
        $category = $category['category'];


        echo "<tr>";
        echo "<td>". $question ."</td>";
        echo "<td>". $category ."</td>";
        echo "<td>". $answer ."</td>";
        echo "<tr>";
    }
    $db->close();
    ?>
        </tbody>
    </table>
</body>
</html>
