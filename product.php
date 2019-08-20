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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
        <?php 
            session_start();
            $_SESSION["username"] = "doraemon";
            require_once 'database/databaseConnect.php';
            require_once 'Constants/constants.php';
            $conn = DatabaseConnect::connect();
            if($conn != null){
                $getProduct = DatabaseConnect::getResult("select * from products", $conn); 
                DatabaseConnect::closeConnect($conn);
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
            <div class="well well-sm col-md-3">
                <div id="search-bar">
                    <form action="" class="form-group">
                        <label for="input-id">Product Search</label>

                        <input type="text" name="" id="searchBox" class="form-control" style="width:200px;">
                        <br>
                        <input type="button" value="Search" class="btn btn-success" id="searchBtn">
                    </form>
                </div>
                <label for=""> <span class="glyphicon glyphicon-arrow-right"></span> <b
                        style="font-size: 150%;">Category:</b></label>
                <ul>
                    <li class="list-active"><a href="producMain.html">All</a></li>
                    <li><a href="productman.html">Men</a></li>
                    <li><a href="productwomen.html">Women</a></li>
                    <li><a href="productbackpack.html">Backpack</a></li>
                    <li><a href="productbag.html">Bag</a></li>
                </ul>
            </div>

            <div class="col-md-9">
                <div class="row list-group" id="Products">
                    <?php 
                        $productList = null;
                        foreach ($getProduct as $key => $value) {
                            $productList = explode("-", $getProduct[$key]["images"]);
                    ?>
                    <div class="item col-lg-6 col-xs-4">
                        <div class="thumbnail">
                            <img src="images/<?=$productList[0]?>.jpg" class="img-responsive" alt="Image">
                        </div>
                        <div class="caption">
                            <h4 class="list-group-item-heading"><a href="product1.html"><?=$value["prod_name"]?></a>
                            </h4>
                            <h5 class="list-group-item-text"><?php $summary = explode(".",$value["prod_description"]); echo $summary[0]."..."?></h5>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <h2 class="price-tag">$300.00</h2>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <button type="button" class="btn btn-success">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

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
<script>
    $("#searchBtn").click(function () {
        var value1 = $("#searchBox").val().toLowerCase();
        $("#Products .item").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value1) > -1)
        });
    });
</script>

</html>