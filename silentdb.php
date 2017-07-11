<?php
require_once ("db.php");
$db = new MyDb();

if (isset($_POST['reqSubmit']))
{
    $semail = $_POST['semail'];
    $sphone = $_POST['sphone'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $cname = $_POST['cname'];
    $crcnum = $_POST['crcnum'];
    $saddress = $_POST['saddress'];
    $caddress = $_POST['caddress'];
    $reqfor = $_POST['reqfor'];
    $briefdes = $_POST['briefdes'];
    $from = "Email from $semail";
    $to = "oketegah@gmail.com";
    $subject = "Silent User Request by $fname $lname";

    $body = "From: $fname $lname\n Email: $semail\n Company Name: $cname\n Residential Address: $saddress\n Company Address: $caddress\n Requesting for: $reqfor\n Request Description: $briefdes\n";

    $stmt = $db->prepare('INSERT INTO silentreq (semail, sphone, fname, lname, cname, crcnum, saddress, caddress, reqfor, briefdes) VALUES (:semail, :sphone, :fname, :lname, :cname, :crcnum, :saddress, :caddress, :reqfor, :briefdes)');

    $stmt->bindValue(':semail', $semail, SQLITE3_TEXT);
    $stmt->bindValue(':sphone', $sphone, SQLITE3_TEXT);
    $stmt->bindValue(':fname', $fname, SQLITE3_TEXT);
    $stmt->bindValue(':lname', $lname, SQLITE3_TEXT);
    $stmt->bindValue(':cname', $cname, SQLITE3_TEXT);
    $stmt->bindValue(':crcnum', $crcnum, SQLITE3_TEXT);
    $stmt->bindValue(':saddress', $saddress, SQLITE3_TEXT);
    $stmt->bindValue(':caddress', $caddress, SQLITE3_TEXT);
    $stmt->bindValue(':reqfor', $reqfor, SQLITE3_TEXT);
    $stmt->bindValue(':briefdes', $briefdes, SQLITE3_TEXT);


    if ($semail == "" || $sphone == "" || $cname == "" || $caddress == "" || $saddress == "" || $reqfor == "" || $briefdes == "")
    {
      echo "<script>alert('Please fill in all fields and try again later')</script>";
    }
    else
    {
        $result = $stmt->execute();
        if ($result)
        {
            if (mail ($to, $subject, $body, $from))
            {
                echo "<script>alert('Request successfully sent. We would get back to you in the next 24 hours')</script>";
            }
            else
            {
                echo "<script>alert('There was an error sending your request.Please try again.')</script>";
            }
        }
    }

    $feedback = 'This is to acknowledge that we got your request and we would get back to you within the next 24 hours';

    if(filter_var($semail, FILTER_VALIDATE_EMAIL))
    {
        $header .= "Content-type: text/html\r\n";
        $fromRep = "<h1 class='heading'>From: Nigeriaeexport Request team</h1>";
        $subjectRep = "Silent Users Request";
        $messageRep = "Thank you for using Nigeriaeexport. Your request was gotten. We would get back to you within the next 24 hours.";
        mail($semail, $subjectRep, $messageRep);
        echo "<script>alert('Request has been successfully sent. We would get back to you within the next 24 hours')</script>";
    }
}
?>
