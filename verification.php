<?php
if (isset($_POST["verify_sub"])) {
    $transactionid = $_POST['transactionid'];
    $payname = $_POST['payname'];
    $bankname = $_POST['bankname'];
    $paymail = $_POST['paymail'];
    $from = "Email from $payname";
    $to = "oketegah@gmail.com";
    $subject = "Payment Verification request by $payname ";

    $body = "From: $payname\n E-Mail: $paymail\n Transaction ID: $transactionid\n Bank Name: $bankname\n";

if ($payname == "" || $paymail == "" || $transactionid == "" || $bankname == "") {
    header('Location:verify.php?fill=1');
} else {
// If there are no errors, send the email
        if (mail ($to, $subject, $body, $from)) {
            header('Location:verify.php?success=1');
        } else {
            echo "<script>alert('Sorry there was an error sending your request. Please try again later')</script>";
            header("Location: verify.php");
        }
}
        $feedback = 'your information has been successfully sent';
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $header .= "Content-type: text/html\r\n";
        $fromRep = "<h1 class='heading'>From: Nigeriaeexport Verification team</h1>";
        $subjectRep = "Subscription Payment Verification";
        $messageRep = "Thank you for using Nigeriaeexport. Your request for payment verification was gotten. We would get back to you in 24 hours.";
        mail($email, $subjectRep, $messageRep);
    }
}
?>
