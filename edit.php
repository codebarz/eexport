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
        <link rel="stylesheet" href="css/main.css">
        <script src="js/modernizr.js"></script> <!-- Modernizr -->

        <title>Admin Dashboard | E-Xport</title>
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
                        <li><a href='logout.php'>Logout</a></li>
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
                    <a href="#0">Overview</a>

                    <ul>
                        <li><a href="#0">All Data</a></li>
                        <li><a href="#0">Category 1</a></li>
                        <li><a href="#0">Category 2</a></li>
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
            <form action="" method="post" enctype="multipart/form-data">
<?php
$catid = (int)$_GET['catID'];
$sql = <<< EOF
SELECT * FROM addcategory WHERE catID = {$catid};
EOF;
$ret = $db->query($sql);

while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
    $catpic = $row['catpic'];
    $catname = $row['catname'];
    $catbrief = $row['catbrief'];

    echo "<div class='edit_img'><img src='$catpic'></div><br>
<input class='edit_input' type='text' name='name_update' value='$catname'><br>
<textarea class='edit_textarea' name='brief_update' rows='10'>$catbrief</textarea>";
}

if (isset($_POST['update'])) {
    $nameupdate = $_POST['name_update'];
    $briefupdate = $_POST['brief_update'];

    $usql = <<< EOF
UPDATE addcategory set catname = '$nameupdate' WHERE catID = {$catid};
EOF;
    $bsql = <<< EOF
UPDATE addcategory set catbrief = '$briefupdate' WHERE catID = {$catid};
EOF;

    $uret = $db->exec($usql);
    $bret = $db->exec($bsql);

    if (!$uret && !$bret) {
        echo "Error updating";
    } else {
        echo "<script>alert('Successfully Added')</script>";
    }
    $db->close();
}

?>
<input type="submit" onclick="javascript:add()" class="action-btn" value="Update" name="update">
</form>
        </div> <!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>