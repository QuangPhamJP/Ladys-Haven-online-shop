<?php
	require_once 'database/databaseConnect.php';
    require_once 'Constants/constants.php';
    session_start();
    $conn = DatabaseConnect::connect();
	if(strcmp($_POST[Constants::$BIRTHDAY], "") == 0){
		$dob = null;
	}
	else{
		$dob = "'".$_POST[Constants::$BIRTHDAY]."'";
	}
	DatabaseConnect::updateCustomerInfo("update customer set firstname = '".$_POST[Constants::$FIRSTNAME]."',
															 lastname = '".$_POST[Constants::$LASTNAME]."',
															 phone = '".$_POST[Constants::$PHONENUMBER]."',
															 email = '".$_POST[Constants::$EMAIL]."',
															 dob = ".$dob.",
															 gender = ".(isset($_POST[Constants::$GENDER])?$_POST[Constants::$GENDER]:'NULL')."
															 where username like '".$_SESSION["username"]."'", $conn);
	if($conn != null){
		$conn = null;
	}
	header("Location: customer_info.php");
	
	
 ?>