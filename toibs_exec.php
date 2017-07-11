<?php
require_once ("db.php");
$db = new MyDB();
session_start();

if (isset($_POST['submit_req']))
{
    $req_title = $_POST['req_title'];
    $req_min = $_POST['req_min'];
    $req_entry = $_POST['req_entry'];
    $post_req = $_POST['post_req'];
    $towho = $_POST['to_who'];
    $postid = $_SESSION['log_id'];
    $commodity_dir = './commodities/';
    $commodityname = $_FILES['comimg']['name'];
    $commoditytempname = $_FILES['comimg']['tmp_name'];
    $commoditytype = $_FILES['comimg']['type'];
    $commoditysize = $_FILES['comimg']['size'];
    $commodityname_2 = $_FILES['comimg_2']['name'];
    $commoditytempname_2 = $_FILES['comimg_2']['tmp_name'];
    $commoditytype_2 = $_FILES['comimg_2']['type'];
    $commoditysize_2 = $_FILES['comimg_2']['size'];

    $commoditypath = $commodity_dir . $commodityname;
    $commoditypath_2 = $commodity_dir . $commodityname_2;

    $commodityresult = move_uploaded_file($commoditytempname, $commoditypath);
    $commodityresult_2 = move_uploaded_file($commoditytempname_2, $commoditypath_2);

    if (!$commodityresult && !$commodityresult_2)
    {
        echo "<script>alert('Error uploading image!!..Please try again')</script>";
        exit();
    }
    if (!get_magic_quotes_gpc())
    {
        $commodityname = addslashes($commodityname);
        $commoditypath = addslashes($commoditypath);
        $commodityname_2 = addslashes($commodityname_2);
        $commoditypath_2 = addslashes($commoditypath_2);
    }

    $stmt = $db->prepare('INSERT INTO toibs (req_title, min_order, poi, req_brief, post_id, towho, commodityimg, commodityimg_2) VALUES (:req_title, :min_order, :poi, :req_brief, :post_id, :towho, :commodityimg, :commodityimg_2)');
    $stmt->bindValue(':req_title', $req_title, SQLITE3_TEXT);
    $stmt->bindValue(':min_order', $req_min, SQLITE3_TEXT);
    $stmt->bindValue(':poi', $req_entry, SQLITE3_TEXT);
    $stmt->bindValue(':req_brief', $post_req, SQLITE3_TEXT);
    $stmt->bindValue(':towho', $towho, SQLITE3_TEXT);
    $stmt->bindValue(':post_id', $postid, SQLITE3_INTEGER);
    $stmt->bindValue(':commodityimg', $commoditypath, SQLITE3_TEXT);
    $stmt->bindValue(':commodityimg_2', $commoditypath_2, SQLITE3_TEXT);

    $result = $stmt->execute();

    if ($result)
    {
        header('Location:postings.php?success=1');
    }
}
