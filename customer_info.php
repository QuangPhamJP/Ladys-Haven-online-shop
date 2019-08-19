<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styling.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--
        #
        # Thu vien de add datepicker cho IE (type = date khong dung duoc trong IE)
        #
    -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
    <script src="js/register-validate.js"></script>

    <style>
        .error{
            color:red;
        }
        .form-group{
            margin-bottom: 30px;
        }
        #firstName-error, #lastName-error, #username-error, #email-error, #password-error, #cpassword-error, #gender-error{
            position: absolute;
        }
        .label-customer{
            font-weight: bold;
        }
        .customer_info{
            margin-top: 50px;
        }

    </style>

    <script>
      $( function() {
        $( "#birthDate" ).datepicker();
      } );
     </script>
    <?php 
        session_start();
        $_SESSION["username"] = "doraemon";
        require_once 'database/databaseConnect.php';
        require_once 'Constants/constants.php';
        $conn = DatabaseConnect::connect();
        if($conn != null){
            $getCustomer_Result = DatabaseConnect::getResult(Constants::$SELECT_ALL_CUSTOMER." where customer_username like '".$_SESSION["username"]."'", $conn); 
        }
    ?>
</head>

<body>
    <nav class="navbar navbar-static-top top-nav">
        <div class="container">
            <div class="navbar-header">

                <a href="Home.html" class="navbar-brand" style="text-shadow: 2px 2px 2px">BagBagOnlineShop</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span><b> Home</b></a></li>
                <li><a href="producMain.html"><b>Products</b></a></li>
                <li><a href="contact.html"><b>Contact</b></a></li>
                <li><a href="aboutus.html"><b></b></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="Register.html"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
                <li><a href="Login.html"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
            </ul>
        </div>
    </nav>
    <div class="container customer_info">
        <div class="row">
            <div class="col-sm-4">
                <div class="list-group">
                    <a href="customer_info.php" class="list-group-item list-group-item-action active">My Profile</a>
                    <a href="#" class="list-group-item list-group-item-action">My Orders</a>
                    <a href="#" class="list-group-item list-group-item-action">My Reviews</a>
                    <a href="#" class="list-group-item list-group-item-action">My Wishlist</a>
                </div>
            </div>
            <div class="col-sm-8">
                <form role="form" id="form-register" style="margin: 0; width: auto;">
                <h2 class="form-heading" style="margin-bottom:15px;">My Profile</h2>
                <div class="form-group">
                    <div class="col-sm-3 label-customer">FullName</div>
                    <div class="col-sm-9">
                        <?=$getCustomer_Result[0]["customer_name"]?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 label-customer">Email</div>
                    <div class="col-sm-9">
                        <?=$getCustomer_Result[0]["customer_email"]?>
                    </div>
                </div>
              
                <div class="form-group">
                    <div class="col-sm-3 label-customer">Date of Birth</div>
                    <div class="col-sm-9" style="height: 20px">
                        <?=$getCustomer_Result[0]["customer_dob"]?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 label-customer">Phone Number</div>
                    <div class="col-sm-9">
                        <?=$getCustomer_Result[0]["customer_mobile"]?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 label-customer">Gender</div>
                    <div class="col-sm-9">
                        <?php 
                            if( is_null($getCustomer_Result[0]["customer_gender"]) == true) {
                                echo "";
                            }
                            else if($getCustomer_Result[0]["customer_gender"] == 0){
                                echo "Male";
                            }
                            else if($getCustomer_Result[0]["customer_gender"] == 1){
                                echo "Female";
                            }
                        ?>
                    </div>
                </div> 
                <input type="button" onclick="location.href='customer_edit.php';" value="Edit Profile" class="btn btn-primary btn-block " />
                <input type="button" onclick="location.href='customer_changepass.php';" value="Change Password" class="btn btn-primary btn-block " />
            </form> 
            <?php 
                if(isset($_SESSION[Constants::$STATUS_ERROR_CHANGEPASSWORD])){
                    echo "<script>alert('Change password success!')</script>";
                    unset($_SESSION[Constants::$STATUS_ERROR_CHANGEPASSWORD]);
                }
             ?>
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
