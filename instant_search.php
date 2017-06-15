<?php

require_once ("db.php");
$db = new  MyDB();

session_start();


if (isset($_POST['searchVal'])) {
    $searchquery = $_POST['searchVal'];
//    $searchquery = preg_replace("#[^0-9a-z]#i","",$searchquery);

    $csql = <<<EOF
SELECT COUNT(*) FROM questions WHERE question LIKE '%$searchquery%' OR answer LIKE '%$searchquery%';
EOF;
    $cret = $db->querySingle($csql);

    if ($cret == 0)
    {
        echo  "<div class='results'><p>Please send us your question</p></div>
<div class='send_us'><form action='' method='post' enctype='multipart/form-data'>
<textarea name='send_us_txt' id='send_us_txt' placeholder='What is your question'></textarea>
<input type='submit' name='send_text' id='send_txt' value='Send'>
</form></div>";
    }
    else
    {
        $sql = <<< EOF
SELECT * FROM questions WHERE question LIKE '%$searchquery%' or answer LIKE '%$searchquery%';
EOF;

        $ret = $db->query($sql);

        if ($cret > 1)
        {
        echo "<div class='results_2'><p>$cret results found</p></div>";
        }
        else {
            echo "<div class='results_2'><p>$cret result found</p></div>";
        }
        while ($row = $ret->fetchArray(SQLITE3_ASSOC))
        {

            $question = $row['question'];
            $answer = $row['answer'];
            $cid = $row['category_id'];

            echo "<div class=\"cat_question_area\">
            <div class=\"cat_question\"><p> $question </p></div>
            <div class=\"cat_answer\"><p> $answer </p></div>
            </div>";
        }
    }
}
