<?php
session_start();
require_once ("db.php");
$db = new MyDB();

if (isset($_POST["submit_req"])) {
    $check_req = $_POST['check_req'];
    $userid = $_SESSION['log_id'];

    $sql =<<<EOF
    SELECT * FROM users WHERE userid = '$userid';
EOF;

    $ret = $db->query($sql);

    while ($row = $ret->fetchArray(SQLITE3_ASSOC))
    {
        $uname = $row['uname'];
        $umail = $row['uemail'];
    $from = "Email from $uname";
    $to = "oketegah@gmail.com";
    $subject = "Background Check request by $uname ";

    $body = "From: $uname\n E-Mail: $umail\n Background Check Request: $check_req\n";

if ($uname == "" || $umail == "" || $check_req == "") {
    header('Location:backgroundcheck.php?fill=1');
} else {
// If there are no errors, send the email
        if (mail ($to, $subject, $body, $from)) {
            header('Location:backgroundcheck.php?success=1');
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
}


 ?>
