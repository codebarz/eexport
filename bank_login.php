<?php
require_once ("db.php");
$db = new MyDb();

session_start();

if (isset($_POST['b_uname']) && isset($_POST['b_pword']))
{
    $email = strip_tags(@$_POST['b_uname']);
    $password = strip_tags(@$_POST['b_pword']);

    $sql = $db->query("SELECT * FROM banks WHERE bankemail = '$email' AND bankpword = '$password'");
    $countsql = $db->querySingle("SELECT COUNT(*) as count FROM banks WHERE bankemail = '$email' AND bankpword = '$password'");

    if ($countsql == 1)
    {
        while ($row = $sql->fetchArray(SQLITE3_ASSOC))
        {
            $id = $row['id'];
            $banklogo = $row['banklogo'];
            $bankbrief = $row['bankbrief'];
            $bankname = $row['bname'];
            $bankban = $row['bankbanner'];
            $bankreq = $row['bankreq'];

            $_SESSION['bname'] = $bankname;
            $_SESSION['id'] = $id;
            header("Location: bankaccount.php?bname=$bankname");
        }
    }
    else
    {
        echo "<script>alert('The email or password you entered is incorrect')</script>";
    }
}
?>
