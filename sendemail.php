<?php
if (isset($_POST['sendMsg'])) {
    $mail = $_POST['usermail'];
    $ask = $_POST['ask'];
    $to = "oketegah@gmail.com";
    $from = "Question Asked By $mail";

    $subject = "E-Xport question asked by $mail";

    $body = "From: $mail\n";

    if (mail ($to, $subject, $body, $from)) {
        header('Location: index.php');
    } else {
        $result = '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
    }
    $feedback = 'your question has been successfully sent';
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $fromRep = "From: E-Xport";
        $subjectRep = "Question Gotten";
        $messageRep = "We got your question and would get back to you shortly. Thank you";
        mail($mail, $subjectRep, $messageRep);
    }
}