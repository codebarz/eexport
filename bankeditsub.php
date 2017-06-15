<?php
session_start();
require_once ("db.php");
$db = new MyDb();

if (isset($_POST['sub_ban_edit']))
{
    $bnameedit = $_POST['bnameedit'];
    $bankbriefedit = $_POST['banlbriefedit'];
    $banreqedit = $_POST['banreqedit'];

    $nsql = $db->exec("UPDATE banks SET bname = $bnameedit");
    $bsql = $db->exec("UPDATE banks SET bankbrief = $bankbriefedit");
    $rsql = $db->exec("UPDATE banks SET bankreq = $banreqedit");

    if ($nsql && $bsql && $rsql)
    {
        echo "<script>alert('Changes Successfully Saved')</script>";
    }
}
?>
