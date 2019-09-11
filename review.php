<?php 
	require_once 'database/databaseConnect.php';
	require_once 'Constants/constants.php';

	session_start();
 	$conn = DatabaseConnect::connect();
 	$showProduct = "";
    if($conn != null){
        $sql_review = "INSERT INTO review (content, product_ID, customer_id, review_status) VALUES ('".$_REQUEST['content']."', '".$_REQUEST['product_id']."', '".$_SESSION['username']."', 2)";
        $sql_rating = "INSERT INTO product_rating (product_id, customer_id, rating) VALUES ('".$_REQUEST['product_id']."', '".$_SESSION['username']."', ".$_REQUEST['num_star'].")";
        $conn->exec($sql_review);
        $conn->exec($sql_rating);
        DatabaseConnect::closeConnect($conn);
    }
?>