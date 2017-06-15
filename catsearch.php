<?php
require_once ("db.php");

$db = new MyDB();
include_once ("addons.php");
?>
    <!DOCTYPE html>
    <html>
    <title>E-Xport | Search Results</title>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/main.css" type="text/css" media="screen">
    </head>
    <body>
    <div class="header">
        <div class="logoic"><h2>E-Xport</h2></div>
        <div class="profilename"></div>
        <div class="profileImage"></div>
        <div class="search_icon">
            <img src="images/search_icon.png">
        </div>
        <div class="searchgen">
            <form>
                <input type="search" name="searchgen" placeholder="Search E-Xport...">
            </form>
        </div>
    </div>
<?php
if (isset($_POST['subsearchcat'])) {
    $searchcat = $_POST['searchcat'];


    $count = $db->querySingle("SELECT COUNT(*) as count FROM questions WHERE question LIKE '%$searchcat%'");

    if ($count == 0) {
        echo "<div class='noresults'>No results found! Please send us your question ...</div>
<div class='catemail'>
<form action='catq.php'>
<input type='email' name='catmail'>
<input type='text' name='catq'>
<input type='submit' name='catsub'>
</form>
</div>";
    } else {

        $sql = <<< EOF
SELECT * FROM questions WHERE question LIKE '%$searchcat%' or answer LIKE '%$searchcat%';
EOF;

        $ret = $db->query($sql);

        while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
            $catquestion = $row['question'];
            $catans = $row['answer'];

            echo "<div class=\"catDescriptionques\">
<div class=\"catnameques\"><p>$catquestion</p></div>
        <div class=\"catprofques\"><p>$catans</p></div>
        <div class=\"timestamp\"><p>Asked $timestamp ago</p></div>
        </div>";
            echo $count;
        }
    }
}