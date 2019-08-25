<?php 
    require_once 'database/databaseConnect.php';
    require_once 'Constants/constants.php';
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styling.css">
    <link rel="stylesheet" type="text/css" href="css/style-Quang.css"/>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php 
        if(!isset($_REQUEST['search-key'])){
            header('location: product.php');
        }
     ?>
    <nav class="navbar navbar-static-top top-nav">
        <div class="container">
            <div class="navbar-header">

                <a href="Home.html" class="navbar-brand" style="text-shadow: 2px 2px 2px">BagBagOnlineShop</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="Home.html"><span class="glyphicon glyphicon-home"></span><b> Home</b></a></li>
                <li class="active"><a href="product.php"><b>Products</b></a></li>
                <li><a href="contact.html"><b>Contact</b></a></li>
                <li><a href="aboutus.html"><b>About us</b></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="Register.html"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
                <li><a href="Login.html"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h3 class="text-info">Filter Products</h3>
                <hr>
                <h4 class="text-info">Brand</h4>
                <ul class="list-group checkbox">
                    <?php 
                        $conn = DatabaseConnect::connect();
                        $getBrand = DatabaseConnect::getResult("select name from brand", $conn);  
                        foreach ($getBrand as $value) {
                    ?>
                        <li class="list-group-item">
                            <label class="text-info-label">
                                <input type="checkbox" value="<?=$value['name'] ?>" class="brand"/>
                                <?=$value['name']; ?>
                            </label>
                        </li>    
                    <?php
                        }
                     ?>
                </ul>

                <h4 class="text-info">Category</h4>
                <ul class="list-group checkbox">
                    <?php 
                        $getCategory = DatabaseConnect::getResult("select distinct product_category from products", $conn);
                        foreach ($getCategory as $value) {
                    ?>                            
                        <li class="list-group-item">
                            <label class="text-info-label">
                                <input type="checkbox" value="<?=$value['product_category']?>" class="category">
                                <?=$value['product_category'];?>
                            </label>
                        </li>
                    <?php
                        }
                     ?>
                </ul>
                <h4 class="text-info">Gender</h4>
                <ul class="list-group checkbox">
                    <?php
                        $getGender = DatabaseConnect::getResult("select distinct product_gender from products", $conn);
                        foreach ($getGender as $value) {
                    ?>
                        <li class="list-group-item">
                            <label class="text-info-label">
                                <input type="checkbox" value="<?=$value['product_gender']?>" class="gender">
                                <?=$value['product_gender'];?>
                            </label>
                        </li>
                    <?php
                        }
                     ?>
                </ul>
            </div>
            <div class="col-md-9 col-lg-9">
                <h3 class="text-info">Products</h3>
                <hr>    
                <h4 class="text-info">Results</h4>
                <div class="row filter_product">
                    <?php  
                        $getResult = DatabaseConnect::getResult("select * from products product, brand brand where product.brand_id = brand.id 
                                                                and product.prod_name like '%".$_REQUEST['search-key']."%' ",$conn);
                        foreach ($getResult as $row) {
                    ?>
                        <div class = "col-lg-4 col-md-4">
                            <div style="border:1px solid #ccc; border-radius:5px;padding:16px; margin-bottom:16px; height:300px;">
                                <img style="width: 200px; height: 140px;" src="images/<?php echo explode('-',$row['images'])[0]?>.jpg" alt="" class="img-responsive"/>
                                <p align="center"><strong><a href="#"><?=$row['prod_name']?><a/></strong></p>
                                <h4 style="text-align:center;" class="text-danger" ><?=$row['prod_price']?></h4>
                                Brand : <?=$row['name']?><br/>
                                <a class="btn btn-success" style="width: 100%;" href="product_detail.php">View</a>
                            </div>
                        </div>
                    <?php
                        }
                        if(!isset($getResult) || count($getResult) == 0){
                            echo    '<div class = "col-lg-4 col-md-4" style = "font-size: 20px;">
                                           <p>No result found</p>
                                    </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php DatabaseConnect::closeConnect($conn) ?>
    <input type="hidden" value="<?=$_REQUEST['search-key']?>">
    <footer class="footer-bottom footer-style">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <p>We are a respectable and reputable resellers, where most of the backpacks and bags will be
                        available. We also pride ourselves in our ability to deliver the best customer experience.</p>
                    <p><span class="glyphicon glyphicon-copyright-mark"></span> 2018 Team. All Rights Reserved</p>

                </div>

                <div class="col-md-4">
                    <h4>Contacts</h4>
                    <dl>
                        <dt>Address:</dt>
                        <dd>590 CMT, HCM</dd>
                    </dl>
                    <dl>
                        <dt>Email:</dt>
                        <dd>jasoncowboy2@gmail.com</dd>
                    </dl>
                    <dl>
                        <dt>Telephone:</dt>
                        <dd>8798793124</dd>
                    </dl>
                </div>
                <div class="col-md-3">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="Home.html">Home</a></li>
                        <li><a href="producMain.html">Products</a></li>
                        <li><a href="aboutus.html">About us</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="Register.html">Sign up</a></li>
                        <li><a href="Login.html">Sign in</a></li>
                    </ul>

                </div>
            </div>


        </div>

    </footer>


</body>

<style>
    #loading{
        text-align: center;
        background: url('images/loading.gif') no-repeat center;
        height: 150px;
        margin-top: 220px;
    }    
</style>

<script>
    function get_filter(classname){
        var value_checked = [];
        $("."+classname+":checked").each(function(){
            value_checked.push($(this).val());

        });
        return value_checked;
    }
    
    function filter(){
        $(".filter_product").html("<div id='loading'></div>");
        var brand = get_filter('brand');
        var category = get_filter('category');
        var gender = get_filter('gender');
        var search = $("input[type='hidden']").val();
        $.ajax({
            url: "fetch_data_product.php",
            method: "post",
            data: {brand:brand, category:category, gender:gender, search:search},
            dataType:"text",
            success:function(data){
                $(".filter_product").html(data);
            }
        });

    }



    $(document).ready(function(){
        $("input[type='checkbox'").click(function(){
            filter();
        });
    });
</script>

</html>