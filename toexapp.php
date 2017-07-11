<?php
require_once ("db.php");
$db = new MyDB();
session_start();

if (isset($_POST['apppost']))
{
    $postid = $_POST['postid'];
    $req_title = $_POST['req_title'];
    $req_min = $_POST['req_min'];
    $req_entry = $_POST['req_entry'];
    $req_payment = $_POST['req_payment'];
    $post_req = $_POST['post_req'];
    $towho = $_POST['to_who'];
    $commodityimg = $_POST['commodityimg'];

    echo $postid;

    $stmt = $db->prepare('INSERT INTO toexapp (req_title, min_order, poi, pay_method, req_brief, post_id, towho, commodityimg) VALUES (:req_title, :min_order, :poi, :pay_method, :req_brief, :post_id, :towho, :commodityimg)');
    $stmt->bindValue(':req_title', $req_title, SQLITE3_TEXT);
    $stmt->bindValue(':min_order', $req_min, SQLITE3_TEXT);
    $stmt->bindValue(':poi', $req_entry, SQLITE3_TEXT);
    $stmt->bindValue(':pay_method', $req_payment, SQLITE3_TEXT);
    $stmt->bindValue(':req_brief', $post_req, SQLITE3_TEXT);
    $stmt->bindValue(':towho', $towho, SQLITE3_TEXT);
    $stmt->bindValue(':post_id', $postid, SQLITE3_INTEGER);
    $stmt->bindValue(':commodityimg', $commodityimg, SQLITE3_TEXT);

    $result = $stmt->execute();

    if ($result)
    {
        echo "<p>Request post successful</p>";
        header("Location: dashboard.php");
    }
}
