<?php

session_start();
include_once '../connect.inc';
$getLastRowID = "SELECT prod_id FROM products WHERE `prod_id` = (select max(prod_id) from products)";
$lastRow = mysqli_fetch_row(mysqli_query($link, $getLastRowID));
$addRowID = $lastRow[0] + 1;
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$newFileNamePath1 = $target_dir . "product $addRowID (1)." . "jpg";
$newFileName2 = NULL;
$newFileName3 = null;
$newFileName4 = null;
if ($_FILES["img2"]["error"] == 0) {
    $target_file2 = $target_dir . basename($_FILES["img2"]["name"]);
    $newFileNamePath2 = $target_dir . "product $addRowID (2)" . "jpg";
    $newFileName2 = "product $addRowID (2).jpg";
}
if ($_FILES["img3"]["error"] == 0) {
    $target_file3 = $target_dir . basename($_FILES["img3"]["name"]);
    $newFileNamePath3 = $target_dir . "product $addRowID (3)" . "jpg";
    $newFileName3 = "product $addRowID (3).jpg";
}
if ($_FILES["img4"]["error"] == 0) {
    $target_file4 = $target_dir . basename($_FILES["img4"]["name"]);
    $newFileNamePath4 = $target_dir . "product $addRowID (4)" . "jpg";
    $newFileName4 = "product $addRowID (4).jpg";
}
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$prodname = $_POST['addName'];
$prodprice = $_POST['addPrice'];
$prodstock = $_POST['addStock'];
$prodgender = $_POST['addGender'];
$prodcat = $_POST['addCat'];
$prodbrand = $_POST['brand'];
$prodDes = $_POST['addDes'];
$prodMat = $_POST['addMat'];
$prodDet = $_POST['addDet'];
$prodDetSize = $_POST['addDetSize'];
$prodStrapMat = $_POST['addStrapMat'];
$prodStrapLength = $_POST['addStrapLength'];
$prodZipType= $_POST['addZipType'];
$prodSlotNum = $_POST['addSlotNum'];
$prodSimpleSize = $_POST['addSimpleSize'];
$prodStyle = $_POST['addStyle'];
$addProduct = "insert into products values(NULL,'$prodname',$prodprice,'$prodDes','product $addRowID (1).jpg','$newFileName2','$newFileName3','$newFileName4',$prodstock,'$prodgender','$prodcat',$prodbrand,'$prodMat','$prodDet','$prodDetSize','$prodStrapMat','$prodStrapLength','$prodZipType','$prodSlotNum','$prodSimpleSize','$prodStyle')";


// Check if image file is a actual image or fake image
// Check if file already exists
if (file_exists($target_file)) {
    unlink($target_file);
    $uploadOk = 1;
}
// Check file size
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $_SESSION['imgerror'] = "error uploading image";
    header("admin_product_dashboard.php");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $newFileNamePath1)) {
        if ($_FILES["img2"]["error"] == 0) {
            move_uploaded_file($_FILES["img2"]["tmp_name"], $newFileNamePath2);
        }
        if ($_FILES["img3"]["error"] == 0) {
            move_uploaded_file($_FILES["img3"]["tmp_name"], $newFileNamePath3);
        }
        if ($_FILES["img4"]["error"] == 0) {
            move_uploaded_file($_FILES["img4"]["tmp_name"], $newFileNamePath4);
        }
        if (!mysqli_query($link, $addProduct)) {
            echo "<script> alert (\"upload query unsuccessful\");</script>";
        } else {
            header("location: admin_product_dashboard.php");
        }
    } else {
        $_SESSION['imgerror'] = "error uploading image";
        header("location: admin_product_dashboard.php");
    }
}
?>