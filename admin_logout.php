<?php
    session_start();
$logout = $_POST['logout'];
if ($logout)
{
    unset($_SESSION['username']);
    session_destroy();
    header("Location: admin.php");
}