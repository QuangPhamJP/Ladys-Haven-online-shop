<?php

session_start();
$productid = $_SESSION['prodlist'];
include_once '../connect.inc';
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
$newFileNamePath = $target_dir . "product $productid (1)." . "jpg";
$newFileName = "product $productid (1)." . "jpg";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$fileName = pathinfo($_FILES["fileUpload"]["name"],PATHINFO_BASENAME);

// Check if image file is a actual image or fake image
if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert(\"file is not an image\");</script>";
        $uploadOk = 0;
    }
}
// Check if file already exists. If it does, delete the file then later add the new file while renaming it to be appropriate.
if (file_exists($target_file)) {
    unlink($target_file);
    $uploadOk = 1;
}
// Check file size
if ($_FILES["fileUpload"]["size"] > 500000) {
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $_SESSION['imgerror'] = "error uploading image";
    header("admin_product_dashboard.php");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $newFileNamePath)) {
        unset($_SESSION['prodlist']);
        header("location: admin_edit.php?prodlist=$productid");
    } else {
        $_SESSION['imgerror'] = "error uploading image";
        header("location: admin_product_dashboard.php");
    }
}
?>