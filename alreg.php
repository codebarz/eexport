<?php
require_once ("db.php");
$db = new MyDB();

$fname = strip_tags(@$_POST['fname']);
$lname = strip_tags(@$_POST['lname']);
$company_name = strip_tags(@$_POST['company_name']);
$rc_num = strip_tags(@$_POST['rc_num']);
$company_loc = strip_tags(@$_POST['company_loc']);
$your_loc = strip_tags(@$_POST['your_loc']);
$company_des = strip_tags(@$_POST['company_des']);
$email = strip_tags(@$_POST['email']);
$tel_num = strip_tags(@$_POST['tel_num']);
$username = strip_tags(@$_POST['username']);
$reg_as = strip_tags(@$_POST['reg_as']);
$p_word = strip_tags(@$_POST['p_word']);
$c_p_word = strip_tags($_POST['c_p_word']);
$register = strip_tags(@$_POST['register']);
$freight = "Freight";
$importer = "Importer";
$exporter = "Exporter";
$lba = "Local Buying Agent";
$interactive = "Interactive";

if ($register)
{
    //check if all fields are field
    if ($fname && $lname && $company_name && $rc_num && $company_loc && $your_loc && $company_des && $email && $tel_num
    && $username && $reg_as && $p_word && $c_p_word)
    {
        if ($p_word == $c_p_word)
        {
            if (strlen($fname) > 25 || strlen($lname) > 25 || strlen($username) > 25)
            {
                echo "<p>Maximum limit for First name, lastname or username is 25 characters</p>";
            }
            else
            {
                if (strlen($p_word) > 30 || strlen($p_word) < 5)
                {
                    echo "<p>Your password must be between 5 and 30 characters long</p>";
                }
                else
                {
                    $ssql =<<<EOF
SELECT COUNT(uemail) as count FROM users WHERE uemail = '$email';
EOF;
                    $ret = $db->querySingle($ssql);

                    if ($ret == 1)
                    {
                        echo "<p>This email has already been used</p>";
                    }
                    else
                    {
                        if ($reg_as == $exporter)
                        {
                            $sql =<<<EOF
INSERT INTO users (fname, lname, cname, crcnum, caddress, uaddress, briefdes, uemail, uphone, uname, regas, pword, cfpword, profimages) 
VALUES ('$fname', '$lname', '$company_name', '$rc_num', '$company_loc', '$your_loc', '$company_des', '$email', '$tel_num', '$username', '$reg_as', '$p_word', '$c_p_word', 1);

INSERT INTO exporter (fname, lname, cname, crcnum, caddress, uaddress, briefdes, uemail, uphone, uname, regas, pword, cfpword, profimages) 
VALUES ('$fname', '$lname', '$company_name', '$rc_num', '$company_loc', '$your_loc', '$company_des', '$email', '$tel_num', '$username', '$reg_as', '$p_word', '$c_p_word', 1);

EOF;

                            $stmt = $db->exec($sql);

                            if (!$stmt)
                            {
                                echo "<script>alert('There was an error some where!.. Please try again')</script>";
                            }
                            else
                            {
                                header("Location: index.php");
                            }
                        }
                        if ($reg_as == $importer)
                        {
                            $sql =<<<EOF
INSERT INTO users (fname, lname, cname, crcnum, caddress, uaddress, briefdes, uemail, uphone, uname, regas, pword, cfpword, profimages) 
VALUES ('$fname', '$lname', '$company_name', '$rc_num', '$company_loc', '$your_loc', '$company_des', '$email', '$tel_num', '$username', '$reg_as', '$p_word', '$c_p_word', 1);

INSERT INTO importer (fname, lname, cname, crcnum, caddress, uaddress, briefdes, uemail, uphone, uname, regas, pword, cfpword, profimages) 
VALUES ('$fname', '$lname', '$company_name', '$rc_num', '$company_loc', '$your_loc', '$company_des', '$email', '$tel_num', '$username', '$reg_as', '$p_word', '$c_p_word', 1);

EOF;

                            $stmt = $db->exec($sql);

                            if (!$stmt)
                            {
                                echo "<script>alert('There was an error some where!.. Please try again')</script>";
                            }
                            else
                            {
                                header("Location: index.php");
                            }
                        }
                        if ($reg_as == $freight)
                        {
                            $sql =<<<EOF
INSERT INTO users (fname, lname, cname, crcnum, caddress, uaddress, briefdes, uemail, uphone, uname, regas, pword, cfpword, profimages) 
VALUES ('$fname', '$lname', '$company_name', '$rc_num', '$company_loc', '$your_loc', '$company_des', '$email', '$tel_num', '$username', '$reg_as', '$p_word', '$c_p_word', 1);

INSERT INTO freight (fname, lname, cname, crcnum, caddress, uaddress, briefdes, uemail, uphone, uname, regas, pword, cfpword, profimages) 
VALUES ('$fname', '$lname', '$company_name', '$rc_num', '$company_loc', '$your_loc', '$company_des', '$email', '$tel_num', '$username', '$reg_as', '$p_word', '$c_p_word', 1);

EOF;

                            $stmt = $db->exec($sql);

                            if (!$stmt)
                            {
                                echo "<script>alert('There was an error some where!.. Please try again')</script>";
                            }
                            else
                            {
                                header("Location: index.php");
                            }
                        }
                        if ($reg_as == $lba)
                        {
                            $sql =<<<EOF
INSERT INTO users (fname, lname, cname, crcnum, caddress, uaddress, briefdes, uemail, uphone, uname, regas, pword, cfpword, profimages) 
VALUES ('$fname', '$lname', '$company_name', '$rc_num', '$company_loc', '$your_loc', '$company_des', '$email', '$tel_num', '$username', '$reg_as', '$p_word', '$c_p_word', 1);

INSERT INTO lba (fname, lname, cname, crcnum, caddress, uaddress, briefdes, uemail, uphone, uname, regas, pword, cfpword, profimages) 
VALUES ('$fname', '$lname', '$company_name', '$rc_num', '$company_loc', '$your_loc', '$company_des', '$email', '$tel_num', '$username', '$reg_as', '$p_word', '$c_p_word', 1);

EOF;

                            $stmt = $db->exec($sql);

                            if (!$stmt)
                            {
                                echo "<script>alert('There was an error some where!.. Please try again')</script>";
                            }
                            else
                            {
                                header("Location: index.php");
                            }
                        }
                    }
                }
            }
        }
        else {
            echo "<p>Your passwords do not match</p>";
        }
    }
    else
    {
        echo "<p>Please fill in all fields</p>";
    }
    $db->close();
}