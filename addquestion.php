<?php
session_start();
require_once("db.php");
$db = new MyDB();
if (!isset($_SESSION['log_name']) || !isset($_SESSION['log_id']))
{
    echo "<script>alert('Please Login or Sign up')</script>";
    header("Location: admin.php");
}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/dashboard.css"> <!-- Resource style -->
    <link rel="stylesheet" href="css/cms.css">
    <script src="js/modernizr.js"></script>

    <title>Add Question | E-Xport</title>
</head>
<body>
<header class="cd-main-header">
    <a href="#0" class="cd-logo"><img src="images/cd-logo.svg" alt="Logo"></a>

    <div class="cd-search is-hidden">
        <form action="#0">
            <input type="search" placeholder="Search...">
        </form>
    </div> <!-- cd-search -->

    <a href="#0" class="cd-nav-trigger">Menu<span></span></a>

    <nav class="cd-nav">
        <ul class="cd-top-nav">
            <li class="has-children account">
                <a href="#0">
                    <img src="images/cd-avatar.png" alt="avatar">
                    Account
                </a>

                <ul>

                    <li><a href="#0">My Account</a></li>
                    <li><a href="#0">Edit Account</a></li>
                    <li><a href="#0">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header> <!-- .cd-main-header -->

<main class="cd-main-content">
    <nav class="cd-side-nav">
        <ul>
            <li class="cd-label">Main</li>
            <li class="has-children overview">
                <a href="dashboard.php">Overview</a>

                <ul>
                    <li><a href="#0">All Data</a></li>
                </ul>
            </li>

            <li class="has-children comments">
                <a href="#0">Categories</a>

                <ul>
                    <li><a href="#0">All Categories</a></li>
                    <li><a href="#0">Add Category</a></li>
                </ul>
            </li>
        </ul>

        <ul>
            <li class="cd-label">Secondary</li>

            <li class="has-children users">
                <a href="#0">Users</a>

                <ul>
                    <li><a href="#0">All Users</a></li>
                    <li><a href="#0">Edit User</a></li>
                    <li><a href="#0">Add User</a></li>
                </ul>
            </li>
        </ul>

        <ul>
            <li class="cd-label">Action</li>
            <li class="action-btn"><a href="exporter_reg.php">+ Page</a></li><br>
            <li class="action-btn"><a href="cms.php">+ Category</a></li><br>
            <li class="action-btn"><a href="addquestion.php">+ Question</a></li><br>
            <li class="action-btn"><a href="add_loans.php">+ Loans</a></li><br>
            <li class="action-btn"><a href="messages.php">Messages</a></li>
        </ul>
    </nav>

    <div class="content-wrapper">
        <div class="area">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="question" value="" placeholder="Question">
            <div class="drop">
            <select name="questioncat">
<?php
                $sql =<<<EOF
                SELECT catname, catID FROM addcategory;
EOF;
                $ret = $db->query($sql);
                while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
                    $catid = $row['catID'];
                    $catoption = $row['catname'];
                    echo "<option>
                    $catid
                </option>";
                }
?>
            </select>
            </div>
            <textarea type="text" name="answer" rows="20" placeholder="Your Answer"></textarea>
            <input type="submit" onclick="javascript:add()" class="action-btn" value="+ Question" name="add_question">
        </form>
<?php

        if (isset($_POST["add_question"])) {

            $question = $_POST["question"];
            $questioncat = $_POST["questioncat"];
            $ans = $_POST['answer'];
            $dateadded = date("d/M/Y");

            $asql = <<<EOF
INSERT INTO ans (answer_text, category_id)
VALUES ('$ans', '$questioncat');
EOF;
                $qsql = <<<EOF
INSERT INTO questions (question, access, date, answer, category_id)
VALUES ('$question','1','$dateadded','$ans','$questioncat');
EOF;
                $aret = $db->exec($asql);
                $qret = $db->exec($qsql);

                if (!$aret && !$qret) {
                    echo "Error saving question... Please try again";
                } else {
                    echo "Question successfully added";
                }
}
?>
        </div>
        <div class="catDisplay">
            <h2>Category Numbers</h2>
            <ul>
<?php
$csql = <<<EOF
SELECT * FROM addcategory;
EOF;

$cret = $db->query($csql);

while ($crow = $cret->fetchArray(SQLITE3_ASSOC)) {
    $catident = $crow['catID'];
    $catname = $crow['catname'];

    echo "<li>$catident - $catname</li>";
}

?>
                </ul>
        </div>
    </div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>