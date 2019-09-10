<?php  
    require_once 'database/databaseConnect.php';
    require_once 'Constants/constants.php';
    $conn = DatabaseConnect::connect();
    if(isset($_REQUEST["product_id"])){
        $getProduct =DatabaseConnect::getResult("select * from products p, brand b where p.prod_id like '".$_REQUEST["product_id"]."' and p.brand_id = b.id", $conn);
    }
    else{
        header('location: product.php');
    }
    function getStar($getProduct_, $icon, $flag){
        if(count($getProduct_) > 0){
            if(!is_null($getProduct_[0]['Rating'])){
                $star = explode(".", $getProduct_[0]['Rating']);
                for($i = 0; $i < $star[0]; $i++){
                        echo "<script>
                            $('.".$icon." i').eq(".$i.").removeClass('fa-star-o');
                            $('.".$icon." i').eq(".$i.").addClass('fa-star color-star');
                        </script>";  
                }
                if($star[1] == 0){
                    if($flag == 1){
                        echo "<span class='review-relate-product'>".(int)$getProduct_[0]['Rating']."</span>";                              
                    }
                }
                else{
                    $number = 1;
                    for($i = 0; $i < strlen(strval($star[1])); $i++){
                        $number = $number*10;
                    }
                    if($flag == 1){
                        echo "<span class='review-relate-product'>".number_format($getProduct_[0]['Rating'], 1)."</span>" ;
                    }
                    if($star[1]/$number>= 0.5){
                        echo "<script>
                            $('.".$icon." i').eq(".$star[0].").addClass('fa-star-half-o color-star');
                        </script>";       
                    }
                }
            }
            else{
                if($flag == 1){
                    echo "0";
                }
            }
            echo "<script>$('.".$icon."').addClass('color-star')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Detail</title>
    <script src="main.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styling.css">
    <link rel="stylesheet" href="css/style-Quang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/custombox.min.css" rel="stylesheet">
    <script src="js/custombox.min.js"></script>
    <script src="js/custombox.legacy.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style>
        .nav-li{
            display: inline-block;
        }
        .nav-li a{
            padding: 10px 10px; 
            border: 0.1px solid #696969;
            padding: 15px 50px;
            display: block;
        }
        .color-star, .icon i, .icon_relate i{
            color:gold;
        }
        .price-detail{
            font-size: 24px;
        }
        .price{
            line-height: 30px;
            font-size: 21px;
        }
        .quality{
            display: flex;
        }
        .quality button{
            display: inline-block;
            width: 12%;
            height: 33px;
        }
        .quality div{
            width: 12%;
            height: 33px;
        }
        .quality input{
            width: 100%;
            height: 100%;
        }
        .product-anchor{
            margin-top: 40px;
        }
        .product-anchor div{
            text-align: center;
            border-bottom: 1px solid black;
        }
        .review-relate-product{

        }
        body{
            background-color: #fafafa;
        }


    </style>

</head>

<body>
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
        <div class="container">
            <div class="row"> <!-- Detail product-->
                <div class="col-xs-5 col-md-4 col-lg-4" class="img-product-detail-container">
                    <div class="detail-image-child-container">
                        <img src="images/<?=$getProduct[0]['image']?>.jpg">
                    </div>

                    <div class="row list-image">
                        <ul class="list-group container-list-item">
                            <li class="list-group-item container-list-item">
                                <img src="images/<?=$getProduct[0]['image']?>.jpg">
                            </li><!--
                            --><li class="list-group-item container-list-item">
                                <img src="images/<?=$getProduct[0]['image_2']?>.jpg">
                            </li><!--
                            --><li class="list-group-item container-list-item
                            ">
                                <img src="images/<?=$getProduct[0]['image_3']?>.jpg">
                            </li><!--
                            --><li class="list-group-item container-list-item
                            ">
                                <img src="images/<?=$getProduct[0]['image_4']?>.jpg">
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-7 col-md-8 col-lg-8">
                    <div class="product-detail">
                        <h3><?=$getProduct[0]["prod_name"]?></h3>
                        <div class="icon">
                            <div>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                        </div>

                        <div class="icon icon-margin">
                            <span>
                                <?php
                                    $getProduct_ = DatabaseConnect::getResult("select sum(rating)/(select count(*) from product_rating where product_id like '".$_REQUEST["product_id"]."') as Rating from product_rating where product_id like '".$_REQUEST["product_id"]."'", $conn);
                                        echo getStar($getProduct_,"icon",1)."/5";
                                ?>
                            </span>
                        </div>

                        <div class="icon" style="margin-left:20px;"><span>Review</span></div>
                    </div>

                    <div class="product-detail" style="margin-top: 20px;">
                        <div class="row">
                            <div class="col-xs-2 col-md-2 col-lg-2 price">
                                <span>Price</span>
                            </div>
                            <div class="col-xs-6 col-md-6 col-lg-6 price-detail"><?=$getProduct[0]['prod_price']?>$</div>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="product-detail">
                        <div class="row">
                            <div class="col-xs-2 col-md-2 col-lg-2">
                                <span>Quantity</span>
                            </div>

                            <div class="col-xs-6 col-md-6 col-lg-6 price-detail">
                                <div class="quality">
                                    <div>
                                        <input type="number" name="" id="quality_input" value="1" min="1" max="99">
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                    <hr>

                    <div class="product-detail">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <button type="button" class="btn btn-danger">Buy Now</button>
                                <button type="button" class="btn btn-danger">Add to Cart</button>
                                <button type="button" class="btn btn-danger">Add to Wishlist </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-12 col-lg-12 product-anchor">
                    <div class="col-xs-4 col-md-4 col-lg-4">Product Detail</div>
                    <div class="col-xs-4 col-md-4 col-lg-4">Brand</div>
                    <div class="col-xs-4 col-md-4 col-lg-4">Review</div>
                </div>
            </div>            
        </div>


        <div class="row" style="margin-top: 10%; text-align: center; font-size: 26px;">
            <div class="col-xs-3 col-md-3 col-lg-3">
                Relate Product
            </div>
        </div>
        <div class="row" style="overflow: hidden; position: relative; height: 320px;">
            <?php  
                $getProductCategory = DatabaseConnect::getResult("select * from products p, brand b where p.brand_id = b.id and p.product_category like '".$getProduct[0]['product_category']."'",$conn);
                $count = 0;
                $className = 0;
                foreach ($getProductCategory as $value) {
                    $className++;
                    $count++;
            ?>        
                    <a style="height: 100%; width: 22%; display: inline-block; margin-left: 2%; text-decoration: none;" href="product_detail.php?product_id=<?=$value['prod_id'] ?>" class="relate-container">
                        <img src="images/<?=$value['image']?>.jpg" style="width: 100%; height: 50%;">
                        <h3><?=$value['prod_name']?></h3>
                        <p><?=$value['prod_price']?>$</p>
                        <div class="list-product-relate-star icon_relate_<?=$className?>">
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
            <?php 
                        $getProduct_ = DatabaseConnect::getResult("select sum(rating)/(select count(*) from product_rating where product_id like '".$value['prod_id']."') as Rating from product_rating where product_id like '".$value['prod_id']."'", $conn);
                        $countReview = DatabaseConnect::getResult("select count(*) as Rating from product_rating where product_id like '".$value['prod_id']."'", $conn);
                        getStar($getProduct_,"icon_relate_".$className,0);
                        if(!is_null($countReview[0]['Rating'])){
                            echo $countReview[0]['Rating']." Review";
                        }
                        else{
                            echo "0 Review";
                        }
            ?>
                    </a>
            <?php    
                    if($count <= 4){
                        echo "<script>$('.relate-container').eq(".($count-1).").addClass('relate-show')</script>";
                    }
                    else{
                        echo "<script>$('.relate-container').eq(".($count-1).").addClass('relate-right-hide')</script>";
                    }
                }
            ?>
            <div style="width: 20px; height: 40px; position: absolute; top:40%;" class="relate-left-nav">
                <i class="glyphicon glyphicon-menu-left" style="width: 100%; height: 100%; line-height: 40px; color: #a52a2a; background-color: #efefef;"></i>
            </div>
            <div style="width: 20px; height: 40px; position: absolute; top:40%; right: 0.7%;" class="relate-right-nav">
                <i class="glyphicon glyphicon-menu-right" style="width: 100%; height: 100%; line-height: 40px; color: #a52a2a; background-color: #efefef;"></i>
            </div>
        </div>

        <div class="row"></div>
    </div>

    <footer class="footer-bottom footer-style">
        <div class="container">

            <div class="row">
                <div class="col-md-5 col-xs-5 col-lg-5">
                    <p>We are a respectable and reputable resellers, where most of the backpacks and bags will be
                        available. We also pride ourselves in our ability to deliver the best customer experience.</p>
                    <p><span class="glyphicon glyphicon-copyright-mark"></span> 2018 Team. All Rights Reserved</p>

                </div>

                <div class="col-md-4 col-xs-4 col-lg-4">
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
                <div class="col-md-3 col-xs-3 col-lg-3">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="Home.html">Home</a></li>
                        <li><a href="producMain.html">Products</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="aboutus.html">About us</a></li>
                        <li><a href="Register.html">Sign up</a></li>
                        <li><a href="Login.html">Sign in</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </footer>
</body>
<script>
    $("#quality_input").keydown(function(event){
        if(event.which == 8){
            if($(this).val().length <= 1){
                if($(this).val() !== "1"){
                    $(this).val("1");
                }
                event.preventDefault();
            }
        }
        else{
            if($(this).val().length == 0){
                $(this).val("1");
            }
        }
    });
    $(".list-group-item img").hover(function(){
        var src = $(this).attr("src");
        $(".detail-image-child-container img").attr('src', src);

    });

    $(".list-group-item img").click(function(){
        if($(".list-group-item img").hasClass("selected-item-img")){
            $(".list-group-item img").removeClass("selected-item-img");
        }
        $(this).addClass("selected-item-img");
        // Instantiate new modal
        var modal = new Custombox.modal({
          content: {
            effect: 'fadein',
            target: '.selected-item-img'
          }
        });
        modal.open();
    });

    $(".detail-image-child-container img").click(function(){
        $(this).addClass("selected-detail-image-child-container");
        // Instantiate new modal
        var modal_ = new Custombox.modal({
          content: {
            effect: 'fadein',
            target: '.selected-detail-image-child-container'
          }
        });
        modal_.open();
    });


    $(".relate-left-nav").click(function(){
        if($(".relate-left-hide").length >= 4){
            $length = $(".relate-left-hide").length;
            for($i = $length-1, $indexofend= $(".relate-show").length-1; $i >= $length-4; $i--){
                $relate_left_hide = $(".relate-left-hide").length-1;
                $(".relate-show").eq($indexofend).addClass("relate-right-hide");
                $(".relate-show").eq($indexofend).removeClass("relate-show");
                $(".relate-left-hide").eq($relate_left_hide).addClass("relate-show");
                $(".relate-left-hide").eq($relate_left_hide).removeClass("relate-left-hide");
            }

            for($i =  $(".relate-right-hide").length - 1; $i >= 0; $i--){
                $(".relate-right-hide").eq($i).css({"position":"absolute", "top":"0","left":"-100%"});
            }

            for($i =3, $count = 1; $i >= 0; $i--, $count++){
                $(".relate-right-hide").eq($i).css({"position":"absolute", "left":""+($i*25)+"%", "top":"0"});
                $(".relate-show").eq($i).css({"position":"absolute", "left":""+($count*(-25))+"%"});
            }

            for($i = 3; $i >= 0; $i--){
                $(".relate-right-hide").eq($i).animate({
                    left:""+(100+($i*25))+"%",
                }, {duration:200, queue: false});
            }

            for($i = 3; $i >= 0; $i--){
                $(".relate-show").eq($i).animate({
                    left: ""+($i*24.4)+"%"
                }, {duration:200, queue: false});
            }
        }   
        else{
            if($(".relate-left-hide").length != 0){
                $length = $(".relate-left-hide").length;
                for($i = $length-1, $indexofend= $(".relate-show").length-1; $i >= 0; $i--){
                    $relate_left_hide = $(".relate-left-hide").length-1;
                    $(".relate-show").eq($indexofend).addClass("relate-right-hide");
                    $(".relate-show").eq($indexofend).removeClass("relate-show");
                    $(".relate-left-hide").eq($relate_left_hide).addClass("relate-show");
                    $(".relate-left-hide").eq($relate_left_hide).removeClass("relate-left-hide");
                }

                for($i = $length-1, $index = 4-$length, $count = 1; $i >= 0; $i--, $index--, $count--){
                    $(".relate-right-hide").eq($i).css({"position":"absolute", "left":""+($index*25)+"%", "top":"0"});
                    $(".relate-right-hide").eq($i).animate({
                        left:"100%",
                    }, {duration:200, queue: false});                    
                }

                //Sap xep relate-show
                for($i = 3, $index = 4-$length; $i >= 0; $i--,$index--){
                    $(".relate-show").eq($i).css({"position":"absolute", "left":""+(($index-1)*25)+"%"});
                    $(".relate-show").eq($i).animate({
                        left: ""+($index*24.4)+"%"
                    }, {duration:200, queue: false});
                }
            }
        }
    });

    $(".relate-right-nav").click(function(){
        if($(".relate-right-hide").length >= 4){
            for($i = 0; $i < 4; $i++){
                $(".relate-show").eq(0).addClass("relate-left-hide");
                $(".relate-show").eq(0).removeClass("relate-show");
                $(".relate-right-hide").eq(0).addClass("relate-show");
                $(".relate-right-hide").eq(0).removeClass("relate-right-hide");
            }

            for($i = 0; $i < $(".relate-right-hide").length; $i++){
                $(".relate-right-hide").css({"position":"absolute", "right":"100%", "top":"0"});
            }

            for($i = $(".relate-left-hide").length - 4, $index = 0, $count = 4; $i < $(".relate-left-hide").length; $i++, $index++, $count--){
                $(".relate-left-hide").eq($i).css({"position":"absolute", "top":"0", "left":""+($index*25)+"%"});
                $(".relate-left-hide").eq($i).animate({
                    left: "-100%"
                }, {duration:200, queue: false});   
            }

            for($i = 0; $i < 4; $i++){
                $(".relate-show").eq($i).css({"position":"absolute", "top":"0", "left":""+(($i+4)*25)+"%"});
                $(".relate-show").eq($i).animate({
                    left: ""+($i*24.4)+"%"
                }, {duration:200, queue: false});
            }
        }   
        else{
            if($(".relate-right-hide").length != 0){
                $length = $(".relate-right-hide").length;
                $position = 0;
                $new_relate_show = 0;
                //$new_relate_show = 3 (co 3 phan tu ben phai can dich chuyen)
                //thay the 3 phan tu ben phai doi ten thanh show 
                //3 phan tu hien tai tinh tu phan tu xuat hien 0->2 thanh left 0 1 2 
                for($i = 0; $i < $length; $i++){
                    $(".relate-show").eq(0).addClass("relate-left-hide");
                    $(".relate-show").eq(0).removeClass("relate-show");
                    $(".relate-right-hide").eq(0).addClass("relate-show");
                    $(".relate-right-hide").eq(0).removeClass("relate-right-hide");
                    $new_relate_show++;
                }
                
                /* 
                    $length = 3 (phan tu ben phai)
                    Lap lai 3 lan duyet 3 phan tu cuoi trong list relate-left-hide va dat giu vi tri' ban dau (chua di chuyen sang ben trai)
                    relate-show la nhung phan tu ben phai (chua dich chuyen sang trai de hien thi)                   

                */
                for($i = $(".relate-left-hide").length - $length; $i < $(".relate-left-hide").length; $i++){
                    $(".relate-left-hide").eq($i).css({"position":"absolute", "top":"0", "left":""+$position+"%"});
                    $position += 25;
                }

                //Dat vi tri nhung phan tu show dang hien thi tai man hinh va nhung phan tu chua hien thi o man hinh (phan tu chua hien thi nam ben phai)
                //$count de tinh vi tri cac phan tu show va $length la so phan tu ben phai ban dau
                for($i = 0, $count = $length; $i < 4; $i++, $count++){
                    $(".relate-show").eq($i).css({"position":"absolute", "top":"0", "left":""+($count*25)+"%"});
                    $(".relate-show").eq($i).animate({
                        left: ""+(($count-$length)*24.4)+"%"
                    }, {duration:200, queue: false});
                }

                $(".relate-left-hide").animate({
                    left: "-100%"
                }, {duration:300, queue: false});

            }
        }
    });

</script>

</html>