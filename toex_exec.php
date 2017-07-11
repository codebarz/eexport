<?php
require_once ("db.php");
$db = new MyDB();
session_start();

if (isset($_POST['submit_req']))
{
    $req_title = $_POST['req_title'];
    $req_min = $_POST['req_min'];
    $req_entry = $_POST['req_entry'];
    $req_payment = $_POST['req_payment'];
    $post_req = $_POST['post_req'];
    $towho = $_POST['to_who'];
    $postid = $_SESSION['log_id'];
    $commodity_dir = './commodities/';
    $commodityname = $_FILES['comimg']['name'];
    $commoditytempname = $_FILES['comimg']['tmp_name'];
    $commoditytype = $_FILES['comimg']['type'];
    $commoditysize = $_FILES['comimg']['size'];

    $commoditypath = $commodity_dir . $commodityname;

    $commodityresult = move_uploaded_file($commoditytempname, $commoditypath);

    if (!$commodityresult)
    {
        echo "<script>alert('Error uploading image!!..Please try again')</script>";
        exit();
    }
    if (!get_magic_quotes_gpc())
    {
        $commodityname = addslashes($commodityname);
        $commoditypath = addslashes($commoditypath);
    }

    $stmt = $db->prepare('INSERT INTO toex (req_title, min_order, poi, pay_method, req_brief, post_id, towho, commodityimg) VALUES (:req_title, :min_order, :poi, :pay_method, :req_brief, :post_id, :towho, :commodityimg)');
    $stmt->bindValue(':req_title', $req_title, SQLITE3_TEXT);
    $stmt->bindValue(':min_order', $req_min, SQLITE3_TEXT);
    $stmt->bindValue(':poi', $req_entry, SQLITE3_TEXT);
    $stmt->bindValue(':pay_method', $req_payment, SQLITE3_TEXT);
    $stmt->bindValue(':req_brief', $post_req, SQLITE3_TEXT);
    $stmt->bindValue(':towho', $towho, SQLITE3_TEXT);
    $stmt->bindValue(':post_id', $postid, SQLITE3_INTEGER);
    $stmt->bindValue(':commodityimg', $commoditypath, SQLITE3_TEXT);

    $result = $stmt->execute();

    if ($result)
    {
        echo "<p>Request post successful</p>";
    }
}
