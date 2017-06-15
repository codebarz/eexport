<?php

if (isset($_POST['send'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $from = "Message from $name on E-Xport website";
    $to = "oketegah@gmail.com";

    $body = "From: $name\n Email: $email\n Subject: $subject\n Message: $message";

    if (mail($to, $subject, $body, $from)) {
        header("Location: index.php?success=1");
    } else {
        echo "<script type='text/javascript'>alert('An error occurred. Try again.')</script>";
    }
    $feedback = 'Message sent';
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $fromRep = "From: e-Xport";
        $subjectRep = "Subject: Message form";
        $messageRep = "Thanks for contacting us, We will get back to you shortly.";
        mail($email, $subjectRep, $messageRep);
    }
}