<?php
//if (isset($_POST['delete'])) {
//
//    $catid = (int)$_GET['catID'];
//    $sql = <<<EOF
//DELETE FROM addcategory WHERE catID = {$catid};
//EOF;
//    $ret = $db->exec($sql);
//    if (!$ret) {
//        echo " Error deleting category";
//    } else {
//        echo $db->changes(), "Category deleted successfully";
//        header("Location: dashboard.php");
//    }
//
//
//}