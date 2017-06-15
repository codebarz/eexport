<?php
    session_start();
$logout = $_POST['logout'];
$search = $_POST['searchlogout'];
if ($logout || $search)
{
    unset($_SESSION['username']);
    unset($_SESSION['log_id']);
    session_destroy();
    header("Location: index.php");
}
