<?php
require_once ("db.php");
$db= new MyDb();

session_start();
if (isset($_POST['sub_b_reg'])) {
    #Variable for each form input type
    $bankname = $_POST['b_acc_name'];
    $bankrcnum = $_POST['b_acc_r_num'];
    $bankemail = $_POST['b_acc_em'];
    $bankaddress = $_POST['b_acc_add'];
    $bankpword = $_POST['b_acc_pword'];
    $bankcpword = $_POST['b_acc_r_pword'];
    $bankdir = './bankimg/';
    $logoname = $_FILES['b_c_logo']['name'];
    $logotmpname = $_FILES['b_c_logo']['tmp_name'];
    $logotype = $_FILES['b_c_logo']['type'];
    $logosize = $_FILES['b_c_logo']['size'];
    $banname = $_FILES['b_c_ban']['name'];
    $bantmpname = $_FILES['b_c_ban']['tmp_name'];
    $bantype = $_FILES['b_c_ban']['type'];
    $bansize = $_FILES['b_c_ban']['size'];
    $bankbrief = $_POST['bank_brief'];
    $bankreq = $_POST['bank_req'];

    #Paths to store Bank logo and Banner
    $logopath = $bankdir . $logoname;
    $banpath = $bankdir . $banname;

    #Carry out Logoand Banner FileUpload
    $logoret = move_uploaded_file($logotmpname, $logopath);
    $banret = move_uploaded_file($banname, $banpath);

    #If logo and banner upload fails
    if (!$logoret && !$banret)
    {
        echo "<script>alert('Error uploading images...Please try again')</script>";
        exit();
    }
    if (!get_magic_quotes_gpc()) {
        $logoname = addslashes($logoname);
        $logopath = addslashes($logopath);
        $banname = addslashes($banname);
        $banpath = addslashes($banpath);
    }

    $countdb = $db->querySingle("SELECT COUNT(*) as count FROM banks WHERE bname = '$bankname'");

    if ($countdb == 1)
    {
        echo "<script>alert('This bank has already been registered')</script>";
    }

    else
    {

    #Insert Statement to insert into db
    $sql = $db->prepare('INSERT INTO banks (bname, bankrcnum, bankemail, bankaddress, bankpword, bankcpword, banklogo, bankbanner, bankbrief, bankreq)
    VALUES(:bankname, :bankrcnum, :bankemail, :bankaddress, :bankpword, :bankcpword, :banklogo, :bankbanner, :bankbrief, :bankreq)');

    #Bind all VALUES
    $sql->bindValue(':bankname', $bankname, SQLITE3_TEXT);
    $sql->bindValue(':bankrcnum', $bankrcnum, SQLITE3_TEXT);
    $sql->bindValue(':bankemail', $bankemail, SQLITE3_TEXT);
    $sql->bindValue(':bankaddress', $bankaddress, SQLITE3_TEXT);
    $sql->bindValue(':bankpword', $bankpword, SQLITE3_TEXT);
    $sql->bindValue(':bankcpword', $bankcpword, SQLITE3_TEXT);
    $sql->bindValue(':banklogo', $logopath, SQLITE3_TEXT);
    $sql->bindValue(':bankbanner', $banpath, SQLITE3_TEXT);
    $sql->bindValue(':bankbrief', $bankbrief, SQLITE3_TEXT);
    $sql->bindValue(':bankreq', $bankreq, SQLITE3_TEXT);

    $result = $sql->execute();

    if ($result)
    {
        echo "<script>alert('Account Successfully Created')</script>";
    }
}
}
