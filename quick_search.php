<?php 
	require_once 'database/databaseConnect.php';
	require_once 'Constants/constants.php';

 	$conn = DatabaseConnect::connect();
 	$showProduct = "";
    if($conn != null){
        $getProduct = DatabaseConnect::getResult("select prod_name, image, prod_id from products where prod_name like '%".$_POST["search"]."%' order by prod_price limit 5", $conn); 
        DatabaseConnect::closeConnect($conn);
    }

    if(count($getProduct) > 0){
    	$showProduct .= "<ul class = 'list-group showSearch' style='list-style-type:none; position: absolute; z-index: 1; margin-top: -12px;'>";
		foreach ($getProduct as $key => $value) {
			$showProduct .= "<li style='border-bottom: 1px solid whitesmoke; width: 100%; height: 60px; margin-bottom: -5px;' class = 'showProductSearch'>";
			$showProduct .= "<img src='images/".$value["image"]."' style='width:50px;' class='col-md-4 col-lg-4 col-sm-4'/>";
			$showProduct .= "<a href='product_detail.php?product_id=".$value['prod_id']."' style='text-decoration: none;' class='col-md-8 col-lg-8 col-sm-4'>".$value['prod_name']."</a>";
			$showProduct .= "</li>";
		}	
		$showProduct .= "</ul>";				
		echo $showProduct;
    }
    else{
    	$_REQUEST['fail'] = true;
    }
?>	