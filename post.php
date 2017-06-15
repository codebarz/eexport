<?php
session_start();
if(isset($_SESSION['username'])){
    $text = $_POST['text'];

    $cb = fopen("log.html", 'a');
    fwrite($cb, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['username']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($cb);
}