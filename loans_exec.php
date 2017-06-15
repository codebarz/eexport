<?php
require_once ("db.php");
$db = new MyDB();
session_start();

if (isset($_POST['loan_save']))
{
    $name = $_POST['loaner_name'];
    $brief = $_POST['loaner_brief'];
    $requirements = $_POST['loaner_requirements'];
    $logo_dir = './loaners_logo/';
    $logoname = $_FILES['loaner_logo']['name'];
    $logotmpname = $_FILES['loaner_logo']['tmp_name'];
    $logotype = $_FILES['loaner_logo']['type'];
    $logosize = $_FILES['loaner_logo']['size'];

    $logopath = $logo_dir . $logoname;

    $logoret = move_uploaded_file($logotmpname, $logopath);

    if (!$logoret)
    {
        echo "<script>alert('Oops! Sorry, Error Uploading Logo!... Please try again')</script>";
        exit();
    }
    if (!get_magic_quotes_gpc())
    {
        $logoname = addslashes($logoname);
        $logopath = addslashes($logopath);
    }

    $sql =<<<EOF
INSERT INTO loaners (loaner_name, loaner_des, loaner_req, loaner_logo) VALUES ('$name', '$brief', '$requirements', '$logopath');
EOF;

    $ret = $db->exec($sql);

    if (!$ret)
    {
        echo "<script>alert('Error saving details!...Please try again')</script>";
    }
    else
    {
        echo "<script>alert('Loaner Added Successfully')</script>";
        header("Location: add_loans.php");
    }

}