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
	if(isset($_POST[Constants::$GENDER])){
		if(strcmp($_POST[Constants::$GENDER], "Male") == 0){
			$gender = 0;
		}
		else{
			$gender = 1;
		}	
	}
	else{
		$gender = null;
	}
	
	DatabaseConnect::updateCustomerInfo("update customer set firstname = '".$_POST[Constants::$FIRSTNAME]."',
															 lastname = '".$_POST[Constants::$LASTNAME]."',
															 phone = '".$_POST[Constants::$PHONENUMBER]."',
															 email = '".$_POST[Constants::$EMAIL]."',
															 dob = ".$dob.",
															 gender = ".$gender."
															 where username like '".$_SESSION["username"]."'", $conn);
	if($conn != null){
		$conn = null;
	}
	header("Location: customer_info.php");
	
	
 ?>