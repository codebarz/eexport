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
						<li>
                            <form action="admin_logout.php" method="post" enctype="multipart/form-data">
                                <input type="submit" name="logout" id="logout" value="Logout" style="border: none; background: #4abdac;
color: #fff; font-family: 'Open Sans', sans-serif; font-weight: bold; padding: 5px; font-size: 14px">
                            </form>
                        </li>
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
				<li class="action-btn"><a href="addhscode.php">+ HS Codes</a></li><br>
				<li class="action-btn"><a href="cms.php">+ Category</a></li><br>
				<li class="action-btn"><a href="addquestion.php">+ Question</a></li><br>
                <li class="action-btn"><a href="addnews.php">+ News</a></li><br>
                <li class="action-btn"><a href="add_loans.php">+ Loans</a></li><br>
                <li class="action-btn"><a href="videouploads.php">+ Videos</a></li><br>
				<li class="action-btn"><a href="messages.php">Messages</a></li><br>
        <li class="action-btn"><a href="payments.php">Payments</a></li>
			</ul>
		</nav>

		<div class="content-wrapper">
			<div class="page-title">
                <h2>Recent Requests</h2>
            </div>
            <?php
            $sql = <<<EOF
SELECT * FROM toex ORDER BY req_id DESC;
EOF;

            $ret = $db->query($sql);

            while ($row = $ret->fetchArray(SQLITE3_ASSOC))
            {
                $req_title = $row['req_title'];
                $min_order = $row['min_order'];
                $poi = $row['poi'];
                $pay_method = $row['pay_method'];
                $req_brief = $row['req_brief'];
                $post_id = $row['post_id'];
                $towho = $row['towho'];
                $commodityimg = $row['commodityimg'];


                $usql =<<<EOF
                SELECT * FROM users WHERE userid = '$post_id';
EOF;

                $uret = $db->query($usql);

                while ($urow = $uret->fetchArray(SQLITE3_ASSOC)) {
                      $badge = $urow['regas'];
                      $cname = $urow['cname'];
                      $profimages = $urow['profimages'];

                      echo "<div class='user_post'>
                      <div class='post_details'>
              <div class=\"post_title\"><p>$req_title</p></div>
              <div class=\"poster\"><img src='$profimages'></div>
              <div class=\"poster_name\"><p>$cname</p></div>
              <div class=\"post_req_details\"><p>$req_brief</p></div>
              <div class=\"post_requirements\">
                  <p>Min Order: <span>$min_order</span></p>
                  <p>POI: <span>$poi</span></p>
                  <p>Payment Method: <span>$pay_method</span></p>
              </div></div>";
                      echo "<div class=\"post_badge_contact\">";
                      ?>
                      <?php
                      if ($badge == "Exporter")
                      {
                          echo "<div class='badge_2'><div class='dot'></div><p>$badge</p></div>";
                      }
                      if ($badge == "International Buyer")
                      {
                          echo "<div class='badge_2' style='background: #0a8226'><div class='dot'></div><p>$badge</p></div>";
                      }
                      if ($badge == "Local Buying Agent")
                      {
                          echo "<div class='badge_2' style='background: #eb3c00'><div class='dot'></div><p>$badge</p></div>";
                      }
                      if ($badge == "Freight")
                      {
                          echo "<div class='badge_2' style='background: #a8590d'><div class='dot'></div><p>$badge</p></div>";
                      }

                      $csql = <<<EOF
                      SELECT COUNT(*) as count FROM toexapp WHERE req_brief = '$req_brief' AND post_id = '$post_id';
EOF;

$cret = $db->querySingle($csql);

if ($cret == 1)
{
  echo '<div class="allowpost">
    <form action="toexapp.php" method="post" enctype="multipart/form-data">
    <input style="display: none" type="text" name="req_title" id="req_title" value="'.$req_title.'">
    <input type="text" style="display: none" name="req_min" id="req_min" value="'.$min_order.'">
    <div class="form_division" style="display: none">
        <input type="text" name="req_entry" id="req_entry" value="'.$poi.'">
        <input type="text" name="req_payment" id="req_payment" value="'.$pay_method.'">
    </div>
    <input type="text" style="display: none" name="postid" value="'.$post_id.'">
    <input style="background: #f7f7f7; display: none; border: none" type="text" name="to_who" id="towho" readonly value="'.$towho.'">
    <textarea name="post_req" id="post_req" style="display: none;" rows="6">'.$row["req_brief"].'</textarea><br>
        <input type="submit" name="apppost" type="apppost" value="Approved">
    </form>
  </div>';
}
else {

                      echo '<div class="allowpost">
                        <form action="toexapp.php" method="post" enctype="multipart/form-data">
                        <input style="display: none" type="text" name="req_title" id="req_title" value="'.$req_title.'">
                        <input type="text" style="display: none" name="req_min" id="req_min" value="'.$min_order.'">
                        <div class="form_division" style="display: none">
                            <input type="text" name="req_entry" id="req_entry" value="'.$poi.'">
                            <input type="text" name="req_payment" id="req_payment" value="'.$pay_method.'">
                        </div>
                        <input type="text" style="display: none" name="postid" value="'.$post_id.'">
                        <input style="background: #f7f7f7; display: none; border: none" type="text" name="to_who" id="towho" readonly value="'.$towho.'">
                        <textarea name="post_req" id="post_req" style="display: none;" rows="6">'.$row["req_brief"].'</textarea><br>
                        <textarea name="commodityimg" style="display: none">'.$commodityimg.'</textarea>
                            <input type="submit" name="apppost" type="apppost" value="Approve">
                        </form>
                      </div>';
                    }
                      echo "</div></div>";
                }
            }
            ?>
		</div> <!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
