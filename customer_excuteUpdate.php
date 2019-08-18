<?php
	require_once 'database/databaseConnect.php';
    require_once 'Constants/constants.php';
    session_start();
    $conn = DatabaseConnect::connect();

    if(!isset($_POST[Constants::$PASSWORD])){
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
			DatabaseConnect::closeConnect($conn);
		}
		header("Location: customer_info.php");	
	}
	else{
		$result = DatabaseConnect::getResult("select * from customer where username like '".$_SESSION['username']."'", $conn);
		$password = $result[0]["password"];
		$oldpassword = $_POST[Constants::$OPASSWORD];
		$newpassword = $_POST[Constants::$PASSWORD];
		$renewpassword = $_POST[Constants::$CPASSWORD];

		if(strcmp($password,$oldpassword) == 0){
			if(strcmp($newpassword,$renewpassword) == 0){
				DatabaseConnect::updateCustomerInfo("update customer set password = '".$newpassword."'", $conn);
				header("Location: customer_info.php");
			}
		}
		else{
			$_SESSION[Constants::$STATUS_ERROR_CHANGEPASSWORD] = Constants::$STATUS_ERROR_CHANGEPASSWORD;
			header("Location: customer_changepass.php");
		}
		if($conn != null){
			DatabaseConnect::closeConnect($conn);
		}
	}	
 ?>	
