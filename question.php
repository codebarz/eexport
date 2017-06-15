<?php

require_once ("db.php");
$db = new MyDB();

?>

<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/dashboard.css"> <!-- Resource style -->
    <link rel="stylesheet" href="css/questions.css">
    <link rel="stylesheet" href="css/cms.css">
    <script src="js/modernizr.js"></script>

    <title>Questions | E-Xport</title>
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
            <li class="has-children comments">
                <a href="question.php">Questions</a>
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
            <li class="action-btn"><a href="messages.php">Messages</a></li>
        </ul>
    </nav>

    <div class="content-wrapper">
        <?php

        $countsql =<<<EOF
    SELECT COUNT(*) FROM QUESTIONS;
EOF;
        $countres = $db->query($countsql);
        if(!$countres)
        {
            die($db->lastErrorMsg());
        }
        $count = $countres->fetchArray(SQLITE3_ASSOC);
        $count = $count['COUNT(*)'];
        if($count == 0)
        {
            echo "<p class='msg'>No questions available</p>";
        }
        else
        {
            echo "<table class='table'>
                <thead>
                <th>Question</th>
                <th>Category</th>
                <th>Answer</th>
                </thead>
                <tbody>";

            $qsql =<<<EOF
    SELECT * FROM QUESTIONS;
EOF;

            $qres = $db->query($qsql);

            if(!$qres)
            {
                die($db->db->lastErrorMsg());
            }


            while($r = $qres->fetchArray(SQLITE3_ASSOC))
            {
                $question = $r['question'];
                $answer = $r['answer'];
                $categoryid = $r['category_id'];

                $asql =<<<EOF
        SELECT ANSWER_TEXT FROM ANS WHERE answer_text = $answer;
EOF;
                $ares = $db->query($asql);
                if(!$ares)
                {
                    die($db->lastErrorMsg());
                }
                $answer = $ares->fetchArray(SQLITE3_ASSOC);
                $answer = $answer['answer_text'];

                $sql =<<<EOF
        SELECT CATNAME FROM ADDCATEGORY WHERE catID=$categoryid
EOF;
                $ret = $db->query($sql);
                if(!$ret)
                {
                    die($db->lastErrorMsg());
                }
                $category = $ret->fetchArray(SQLITE3_ASSOC);
                $category = $category['catname'];


                echo "<tr>";
                echo "<td>". $question ."</td>";
                echo "<td>". $category ."</td>";
                echo "<td>". $answer ."</td>";
                echo "<tr>";
            }
            $db->close();
            echo "</tbody>
                </table>";
        }
        ?>

        <div class="action-btn">
            <a href="addquestion.php">+ Question</a>
        </div>

    </div>

</main> <!-- .cd-main-content -->
<?php



?>
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>