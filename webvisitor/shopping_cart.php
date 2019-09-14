<?php
session_start();
include_once '../connect.inc';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (array_key_exists($id, $_SESSION['cart_array'])) {
        $_SESSION['cart_array'][$id]+=1;
    } else if (!array_key_exists($id, $_SESSION['cart_array'])) {
        $_SESSION['cart_array'][$id] = 1;
    }
    
    $getMaxQuant = "select quantity from products where prod_id = $id";
    $maxQuant = mysqli_fetch_row(mysqli_query($link, $getMaxQuant));
    if ($_SESSION['cart_array'][$id] > $maxQuant[0]) {
        $_SESSION['cart_array'][$id] = $maxQuant[0];
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
        <link rel="stylesheet" href="../frameworks/css/bootstrap.min.css">
        <link rel="stylesheet" href="../frameworks/css/styling.css" type="text/css">
        <script src="../frameworks/js/jquery-3.3.1.min.js"></script>
        <script src="../frameworks/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <nav class="navbar navbar-static-top top-nav">
            <div class="container">
                <div class="navbar-header">

                    <a href="Main.php" class="navbar-brand" style="text-shadow: 2px 2px 2px">Haven's Bag Shop</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="Main.php"><span class="glyphicon glyphicon-home"></span><b> Home</b></a>
                    </li>
                    <li><a href="producMain.html"><b>Products</b></a></li>
                    <li><a href="contact.php"><b>Contact</b></a></li>
                    <li><a href="aboutus.php"><b>About us</b></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (isset($_SESSION['username'])) {
                        $name = $_SESSION['username'];
                        echo '<li style = "margin-right:50px;"><a href = "shopping_cart.php"><span class = "fa fa-cart-plus"</a></li>';
                        echo "<li><a href=''><span class='glyphicon glyphicon-user'></span> $name</a></li> ";
                        echo "<li><a href='../webvisitor/user_logout.php'><span class='glyphicon glyphicon-off'></span> Log out</a></li>";
                        
                    } else {
                        echo '<li style = "margin-right:50px;"><a href = "shopping_cart.php"><span class = "fa fa-cart-plus"> <span class="badge" id="cart"> 0</span></span></a></li>';
                        echo '<li><a href="../webvisitor/TestRegister.php"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>';
                        echo '<li><a href="../webvisitor/TestLogin.php"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <div class="cart" style='width: 700px'>
            <table class='table table-sm'>
                <thead>
                <th>Product's Name</th>
                <th>Product's price</th>
                <th>Order Quantity</th>
                <th>Total</th>
                <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $cartitemID = array_keys($_SESSION['cart_array']);
                    foreach ($cartitemID as $id) {
                        $getItemQuery = "select prod_name, prod_price, quantity from products where prod_id = $id ";
                        $row = mysqli_fetch_row(mysqli_query($link, $getItemQuery));
                        $orderQuantity = $_SESSION['cart_array'][$id];
                        echo "<tr>";
                        echo "<td> $row[0]</td>";
                        echo "<td>$ $row[1]</td>";
                        echo "<td><input type='number' id='quant-$id' value='$orderQuantity' onchange='getTotal($id,$row[1]);' max='$row[2]' style='width:50px;'></td>";
                        echo "<td id='total-$id'>" . ($orderQuantity * $row[1]) . "</td>";
                        echo "<td><a href='delete_cartitem.php?id=$id'><span class='fa fa-trash'></span></a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>


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
        function getTotal(id, price) {
            var quantity = document.getElementById("quant-" + id).value;
            document.getElementById("total-" + id).innerHTML = price * quantity;
        }
    </script>

</html>