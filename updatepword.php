<?php
session_start();
require_once ("db.php");
$db = new MyDB();

$id = $_SESSION['log_id'];

if (isset($_POST['editSub']))
{
    $pwordEdit = $_POST['pwordEdit'];
    $newPword = $_POST['newPword'];
    $cnewPword = $_POST['cnewPword'];

    $sql =<<<EOF
    SELECT pword FROM users WHERE userid = '$id';
EOF;

    $ret = $db->query($sql);

    while ($row = $ret->fetchArray(SQLITE3_ASSOC))
    {
        $pword = $row['pword'];

        if ($pwordEdit != $pword)
        {
            echo "The password you entered is not correct";
        }
        else
        {
            if ($newPword != $cnewPword)
            {
                echo "The new password you entered are not the same";
            }
            else
            {
                $update =<<<EOF
                UPDATE users SET pword = '$newPword' WHERE userid = {$id};
EOF;

                $result = $db->exec($update);

                if (!$result)
                {
                    echo "There was an error updating password!. Please try again";
                }
                else
                {
                    echo "Password successfully updated";
                }
            }
        }
    }
}
?>
