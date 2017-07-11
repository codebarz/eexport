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
				<li class="action-btn"><a href="messages.php">Messages</a></li><br>
        <li class="action-btn"><a href="payments.php">Payments</a></li>
			</ul>
		</nav>

		<div class="content-wrapper">
			<div class="page-title">
                <h2>Approve Payment Verification</h2>
            </div>
            <div class="verificationform">
            <form action="paymentverification.php" method="post" enctype="multipart/form-data">
            <input type="text" name="transactionid" id="transactionid" placeholder="Transaction ID">
            <input type="text" name="payname" id="payname" placeholder="Name Used for Payment">
            <input type="text" name="bankname" id="bankname" placeholder="Name of Bank">
            <input type="email" name="paymail" id="paymail" placeholder="Your email address"><br><br>
            <select name="package">
                <option>Gold</option>
                <option>Silver</option>
                <option>Bronze</option>
            </select>
            <input type="submit" name="verify_sub" id="verify_sub" value="Submit">
            </form>
            </div>
            <div class="vercodes">
            	<table style="width: 100%; text-align: center">
            		<tr>
            				<th>Name</th>
            				<th>Email</th>
            				<th>Package</th>
            				<th>Code</th>
            		</tr>
            	<tbody>	
            	<?php 
            	$sql =<<<EOF
            	SELECT * FROM paymentverification;
EOF;
				$ret = $db->query($sql);

				while ($row = $ret->fetchArray(SQLITE3_ASSOC))
				{
					$payname = $row['payname'];
					$code = $row['code'];
					$package = $row['package'];
					$paymail = $row['paymail'];

					echo "
						<tr>
							<td>$payname</td>
							<td>$paymail</td>
							<td>$package</td>
							<td>$code</td>
						</tr>
					";
				}
            	?>
            </tbody>
        </table>
            </div>
          </div>
        </body>
        </html>
