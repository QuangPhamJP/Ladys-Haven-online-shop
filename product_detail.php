<?php  
    require_once 'database/databaseConnect.php';
    require_once 'Constants/constants.php';
    $conn = DatabaseConnect::connect();
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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-static-top top-nav">
        <div class="container">
            <div class="navbar-header">

                <a href="Home.html" class="navbar-brand" style="text-shadow: 2px 2px 2px">BagBagOnlineShop</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="Home.html"><span class="glyphicon glyphicon-home"></span><b> Home</b></a></li>
                <li class="active"><a href="producMain.html"><b>Products</b></a></li>
                <li><a href="contact.html"><b>Contact</b></a></li>
                <li><a href="aboutus.html"><b>About us</b></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="Register.html"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
                <li><a href="Login.html"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="item-container">
                <div class="row">

                    <div class="product col-md-3 service-image-left">
                        <img src="images/21.jpg" alt="" style="height: 300px;">
                    </div>
                    <div class="container service1-items col-sm-2 col-md-2 pull-left">
                        <a id="item-1" class="service1-item">
                            <img src="images/22jpg" alt="" style="height: 100px;"></img>
                        </a>
                        <a id="item-2" class="service1-item">
                            <img src="images/23.jpg" alt="" style="height: 100px;"></img>
                        </a>
                        <a id="item-3" class="service1-item">
                            <img src="images/24.jpg" alt="" style="height: 100px;"></img>
                        </a>
                    </div>


                    <div class="col-md-7">
                        <div class="product-title">Gucci Oak Leather Bag</div>
                        <div class="product-desc"> Oak Leathers Bags stands for a centuries-old tradition of knowledge,
                            ingenuity and culture. The ‘city of dreaming spires’ is considered to be the prototypical
                            university city.</div>
                        <hr>
                        <div class="product-price">$ 300.00</div>
                        <div class="product-stock">In Stock</div>
                        <hr>
                        <div class="btn-group cart">
                            <button type="button" class="btn btn-success">
                                Add to cart
                            </button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">
                                Add to wishlist
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="col-md-12 product-info">
                    <ul id="myTab" class="nav nav-tabs nav_tabs">
                        <li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="service-one">
                            <section class="container product-info">
                                Oak Leathers Bags stands for a centuries-old tradition of knowledge, ingenuity and
                                culture. The ‘city of dreaming spires’ is considered to be the prototypical university
                                city. But how becomes a bag a similar icon for its category. The Oak Leather Bags
                                combines the cultural ambitions of her spiritual hometown, with the traditional art of
                                leather craft to create the perfect companion for every lifestyle. No matter if you are
                                on a scientific mission, if you want to become the next contemporary poet or if your
                                only wish is to have a well organised bag with a stylish look – with the Oak Leather
                                Bags you’re well-equipped to be up for every adventure.
                            </section>
                        </div>
                    </div>
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

</html>