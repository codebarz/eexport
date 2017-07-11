<?php
require_once ("db.php");
$db = new MyDb();

if (isset($_POST['up_vid']))
{
 $title = $_POST['videodes'];
 $name=$_FILES['dvideo']['name'];
 $type=$_FILES['dvideo']['type'];
//$size=$_FILES['uploadvideo']['size'];

$cname = str_replace(" ","_",$name);

$tmp_name = $_FILES['dvideo']['tmp_name'];

$target_path = './videos/';
$target_path = $target_path.basename($cname);

if(move_uploaded_file($_FILES['dvideo']['tmp_name'],$target_path))
{
    $sql = $db->prepare("INSERT INTO videos(title,name,type) VALUES(:title, :cname, :type)");
    $sql->bindValue(':title', $title, SQLITE3_TEXT);
    $sql->bindValue(':cname', $cname, SQLITE3_TEXT);
    $sql->bindValue(':type', $type, SQLITE3_TEXT); 
    $result = $sql->execute();
    if ($result)
    {
    echo "Your video ".$cname." has been successfully uploaded";
    }
    else
    {
        echo "Something went wrong while uploading your video!... Please try again.";
    }
}
}
?>