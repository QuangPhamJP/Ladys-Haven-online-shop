<?php 
 	require_once 'database/databaseConnect.php';
    require_once 'Constants/constants.php';

    $query = "select * from products product, brand brand where product.prod_name like '%".$_POST['search']."%' and product.brand_id = brand.id ";
    $brand_list = null;
    $category_list = null;
    $gender_list = null;
    if(isset($_POST['brand'])){
    	$brand_list = implode("','",$_POST['brand']);	
    }
    if(isset($_POST['category'])){
		$category_list = implode("','", $_POST['category']);	
    }
    if(isset($_POST['gender'])){
    	$gender_list = implode("','", $_POST['gender']);
    }

    if($brand_list != null){
    	$query .= "and name IN ("."'".$brand_list."'".") ";
    }
    if($category_list != null){
    	$query .= "and product_category IN ("."'".$category_list."'".") ";	
    }
    if($gender_list != null){
    	$query .= "and product_gender IN ("."'".$gender_list."'".") ";	
    }
    if($brand_list == null && $category_list == null && $gender_list == null){

    }

    $conn = DatabaseConnect::connect();
    $getProduct = DatabaseConnect::getResult($query,$conn);
    DatabaseConnect::closeConnect($conn);
    $output = "";
	if(count($getProduct) > 0){
		foreach ($getProduct as $row) {
			$output .= '
				<div class = "col-lg-4 col-md-4">
					<div style="border:1px solid #ccc; border-radius:5px;padding:16px; margin-bottom:16px; height:300px;">
						<img style="width: 200px; height: 140px;" src="images/'.explode("-",$row['images'])[0].'.jpg" "alt="" class="img-responsive"/>
						<p align="center"><strong><a href="#">'.$row['prod_name'].'<a/></strong></p>
						<h4 style="text-align:center;" class="text-danger" >'.$row['prod_price'].'</h4>
						Brand : '.$row['name'].'<br/>
						<button type="button" class="btn btn-success">Add to cart</button>
					</div>
				</div>
			';
		}
	}
	else{
		$output = '<h3>No Filter Product Found</h3>';
	}
	echo $output;
 ?>