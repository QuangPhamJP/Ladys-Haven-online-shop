<?php 
 	require_once 'database/databaseConnect.php';
    require_once 'Constants/constants.php';

    $query = "";
    if(isset($_POST['brand']) && isset($_POST['category']) && isset($_POST['gender'])){
    	$brand_list = implode("','",$_POST['brand']);
    	$category_list = implode("','", $_POST['category']);
    	$gender_list = implode("','", $_POST['gender']);
    	$query = "select * from products product, brand brand where product.prod_name like '%".$_POST['search']."%' 
    				and product.brand_id = brand.id 
    				and name IN ("."'".$brand_list."'".")
    				and product_category IN ("."'".$category_list."'".")
    				and product_gender IN ("."'".$gender_list."'".")";

    }
    else{

    }

    $conn = DatabaseConnect::connect();
    $getProduct = DatabaseConnect::getResult($query,$conn);
    DatabaseConnect::closeConnect($conn);
    $output = "";
	if(count($getProduct) > 0){
		foreach ($getProduct as $row) {
			$output .= '
				<div class = "col-lg-3 col-md-3">
					<div style="border:1px solid #ccc; border-radius:5px;padding:16px; margin-bottom:16px; height:300px;">
						<img style="width: 200px; height: 140px;" src="images/'.explode("-",$row['images'])[0].'.jpg" "alt="" class="img-responsive"/>
						<p align="center"><strong><a href="#">'.$row['prod_name'].'<a/></strong></p>
						<h4 style="text-align:center;" class="text-danger" >'.$row['prod_price'].'</h4>
						Brand : '.$row['name'].'<br/>
					</div>
				</div>
			';
		}
	}
	else{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
 ?>