<?php 
	require_once 'database/databaseConnect.php';
	require_once 'Constants/constants.php';

 	$conn = DatabaseConnect::connect();
 	$showProduct = "";
    if($conn != null){
        $getProduct = DatabaseConnect::getResult("select prod_name, images from products where prod_name like '%".$_POST["search"]."%' order by prod_price limit 5", $conn); 
        DatabaseConnect::closeConnect($conn);
    }

    if(count($getProduct) > 0){
    	$showProduct .= "<ul class = 'list-group showSearch' style='list-style-type:none;'>";
		foreach ($getProduct as $key => $value) {
			$showProduct .= "<li style='border-bottom: 1px solid whitesmoke; width: 300px; height: 60px' class = 'showProductSearch'>";
			$showProduct .= "<img src='images/".explode('-',$value["images"])[0].".jpg' style='width:50px;' class='col-md-4 col-lg-4 col-sm-4'/>";
			$showProduct .= "<a href='product_detail.php' style='text-decoration: none;' class='col-md-8 col-lg-8 col-sm-4'>".$value['prod_name']."</a>";
			$showProduct .= "</li>";
		}	
		$showProduct .= "</ul>";				
		echo $showProduct;
    }
    else{
    	$_REQUEST['fail'] = true;
    }
?>	