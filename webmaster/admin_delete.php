<?php
session_start();
include_once '../connect.inc';
    $id = $_GET['prodlist'];
    $delQuery = "delete from products where prod_id = '$id'";
    if (mysqli_query($link, $delQuery)) {
        $_SESSION['del_success'];
        header("location: admin_product_dashboard.php");
    }
    else {
        $_SESSION['del_unsuccess'];
        header("location: admin_product_dashboard.php");
    }