<?php
session_start();
require_once("db.php");
$db = new MyDB();

if (isset($_POST['hssubmit']))
{
    $hsheading = $_POST['hsheading'];
    $hstsn = $_POST['hstsn'];
    $hscomdes = $_POST['hscomdes'];
    $hssu = $_POST['hssu'];
    $hsid = $_POST['hsid'];
    $hsiat = $_POST['hsiat'];
    $hsvat = $_POST['hsvat'];

    $sql = $db->prepare('INSERT INTO hscodes (heading, tsn, description, su, hsid, iat, vat)
    VALUES (:heading, :tsn, :description, :su, :hsid, :iat, :vat)');

    $sql->bindValue(':heading', $hsheading, SQLITE3_TEXT);
    $sql->bindValue(':tsn', $hstsn, SQLITE3_TEXT);
    $sql->bindValue(':description', $hscomdes, SQLITE3_TEXT);
    $sql->bindValue(':su', $hssu, SQLITE3_TEXT);
    $sql->bindValue(':hsid', $hsid, SQLITE3_TEXT);
    $sql->bindValue(':iat', $hsiat, SQLITE3_TEXT);
    $sql->bindValue(':vat', $hsvat, SQLITE3_TEXT);

    $result = $sql->execute();

    if ($result) {
        echo "HS Code Successfully added";
        header("Location: addhscode.php");
    }
}
?>
