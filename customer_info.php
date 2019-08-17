<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer_Info</title>
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

    </style>

    <script>
      $( function() {
        $( "#birthDate" ).datepicker();
      } );
     </script>
    <?php 
        session_start();
        require_once 'database/databaseConnect.php';
        require_once 'Constants/constants.php';
        $conn = DatabaseConnect::connect();
        if($conn != null){
            $getCustomer_Result = DatabaseConnect::getResult(Constants::$SELECT_ALL_CUSTOMER."where username like ", $conn);
            echo $getCustomer_Result[0]['password'];
            DatabaseConnect::closeConnect($conn);
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
    <div class="container">
        <form class="form-horizontal" role="form" id="form-register">
            <h2 class="form-heading" style="margin-bottom:15px;">Customer_Info</h2>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-9">
                    <input type="text" id="firstName" placeholder="First Name" class="form-control" name="firstName" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-9">
                    <input type="text" id="lastName" placeholder="Last Name" class="form-control" autofocus name="lastName">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email </label>
                <div class="col-sm-9">
                    <input type="text" id="email" placeholder="Email" class="form-control" name= "email">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Old Password</label>
                <div class="col-sm-9">
                    <input type="text" id="oldpassword" placeholder="oldpassword" class="form-control" name= "oldpassword">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" id="password" placeholder="Password" class="form-control" name="password">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Confirm Password</label>
                <div class="col-sm-9">
                    <input type="password" id="cpassword" placeholder="Password" class="form-control" name="cpassword">
                </div>
            </div>
            <div class="form-group">
                <label for="birthDate" class="col-sm-3 control-label">Date of Birth</label>
                <div class="col-sm-9">
                    <input type="text" id="birthDate" class="form-control" placeholder="mm/dd/yyyy" name="birthDate" readonly style="background: white;">
                </div>
            </div>
            <div class="form-group">
                <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label>
                <div class="col-sm-9">
                    <input type="phoneNumber" id="phoneNumber" placeholder="Phone number" class="form-control" name="phoneNumber">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Gender</label>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" id="femaleRadio" value="Female" name="gender">Female
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" id="maleRadio" value="Male" name="gender">Male
                            </label>
                        </div>
                    </div>
                </div>
            </div> 
            <button type="submit" class="btn btn-primary btn-block btnUpdate">Update</button>
        </form> 
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
