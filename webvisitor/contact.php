<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Contact</title>
        <link rel="stylesheet" href="../frameworks/css/bootstrap.min.css">
        <link rel="stylesheet" href="../frameworks/css/styling.css">
        <script src="../frameworks/js/jquery-3.3.1.min.js"></script>
        <script src="../frameworks/js/bootstrap.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-static-top top-nav">
            <div class="container">
                <div class="navbar-header">

                    <a href="Home.html" class="navbar-brand" style="text-shadow: 2px 2px 2px">Haven's Bag Shop</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="Main.php"><span class="glyphicon glyphicon-home"></span><b> Home</b></a></li>
                    <li><a href=""><b>Products</b></a></li>
                    <li class="active"><a href="contact.php"><b>Contact</b></a></li>
                    <li><a href="aboutus.php"><b>About us</b></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (isset($_SESSION['registered_user'])) {
                        $name = $_SESSION['registered_user'];
                        echo "<li><a href=''><span class='glyphicon glyphicon-user'></span> $name</a></li> ";
                        echo "<li><a href='../webvisitor/user_logout.php'><span class='glyphicon glyphicon-off'></span> Log out</a></li>";
                    } else {
                        echo '<li><a href="../TestRegister.php"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>';
                        echo '<li><a href="../TestLogin.php"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Home.html">Home</a></li>
                    <li class="breadcrumb-item" style="font-weight: bold" aria-current="page">Contact</li>

                </ol>

            </nav>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="panel panel-info">
                        <div class="panel panel-heading">
                            <span class="glyph glyphicon-envelope" style="font-size: 150%;">Contact Us</span>
                        </div>
                        <div class="panel panel-body">
                            <form action="">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input type="email" name="" class="form-control" id="" placeholder="Enter E-mail">
                                    <small class="text-muted">We'll never share you email with anyone</small>
                                </div>
                                <div class="form-group">
                                    <label for="">Feedback Message</label>
                                    <textarea name="" id="" cols="15" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary">Submit</button>


                                </div>

                            </form>


                        </div>

                    </div>

                </div>
                <div class="col-sm-12 col-md-4">

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Address</h3>
                        </div>
                        <div class="panel-body">
                            <p>
                            <h4>Address:
                                590 CMT, HCM</h4>
                            </p>
                            <p>
                            <h4>Email:
                                jasoncowboy2@gmail.com</h4>

                            </p>
                            <p>
                            <h4>
                                Telephone:
                                8798793124
                            </h4>

                            </p>


                        </div>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.325247592166!2d106.66410831412774!3d10.786382261960956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed23c80767d%3A0x5a981a5efee9fd7d!2zNTkwIEPDoWNoIE3huqFuZyBUaMOhbmcgOCwgUGjGsOG7nW5nIDExLCBRdeG6rW4gMywgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1549886125872"
                            width="360" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>



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

</html>