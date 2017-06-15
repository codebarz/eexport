<?php
session_start();
if (isset($_SESSION['login_email'])) {
    $text = $_POST['text'];

    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='sentMsg'>(".date("g:i A").")<b>".$_SESSION['login_email']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
}