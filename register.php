<?php
require_once("db.php");
$db = new MyDB();

$fname = strip_tags(@$_POST['fname']);
$username = strip_tags(@$_POST['uname']);
$email = strip_tags(@$_POST['email']);
$password = strip_tags(@$_POST['password']);
$cfpassword = strip_tags(@$_POST['cfpassword']);
$type = strip_tags(@$_POST['reg_as']);
$day_stamp = date('d/m/Y');
$uemail_check = "";
$reg = strip_tags(@$_POST['submitreg']);

if ($reg) {
    //check if all fields are filled
    if ($fname && $password && $cfpassword && $username && $email && $type) {
        //check if both passwords inputted are the same
        if ($password == $cfpassword) {
            //ensures string lenght of username and full name are not > 25
            if (strlen($username) > 25 || strlen($fname) > 25) {
                echo "Maximum limit for username/first name/last name is 25 characters";
            }
            else {
                if (strlen($password) > 30 || strlen($password) < 5) {
                    echo "Your password must be between 5 and 30 characters long";
                }
                else {
                    //encrypt user's password before upload to database

                    $sql = <<<EOF
INSERT INTO User (email, password, fname, username, access, image, date, type)
VALUES ('$email', '$password', '$fname', '$username', '1', 'ok', '$day_stamp', '$type');
EOF;
                    $ret = $db->exec($sql);

                    if (!$ret) {
                        echo "Registration Error...Please try again!";
                    } else {
                        header("Location: index.php");
                    }
                }
            }
        }
        else {
            echo "Your passwords do not match";
        }
    }
    else {
        echo "Please fill in all fields";
    }
    $db->close();
}












