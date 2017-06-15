<?php
require_once("db.php");

$db = new MyDB();

if (isset($_POST['btnsave'])) {
    $catname = $_POST['catname']; //category name
    $catdes = $_POST['catdes']; //category description

    $catimage = $_FILES['catimage']['name'];
    $tmp_dir = $_FILES['catimage']['tmp_name'];
    $imgSize = $_FILES['catimage']['size'];

    $upload_dir = './catimages/';

    if (empty($catname))
    {
        $errMsg = "Please enter a category name";
    }
    elseif (empty($catimage))
    {
        $errMsg = "Please upload an image";
    }

    else
    {
        $imgpath = $upload_dir . $catimage;

        $result = move_uploaded_file($tmp_dir, $imgpath);

        if (!$result)
        {
            echo "Error uploading Category Icon";
        }
        if (!get_magic_quotes_gpc())
        {
            $catimage = addslashes($catimage);
            $imgpath = addslashes($imgpath);
        }

        $usql =<<<EOF
INSERT INTO addcategory (catname, catpic) VALUES ('$catname', '$imgpath');
EOF;
        $uret = $db->exec($usql);

        if (!$uret)
        {
            $message = "Not Successfully Uploaded";
        }
        else
        {
            $message = "Successfully Added";
        }


    }

}