<?php
    include_once("include/db.php");
    global $connection;
    session_start();

    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $query=mysqli_query($connection, "SELECT username, password from admin WHERE username='$username' AND password='$password'");
        $row=mysqli_fetch_array($query);
        if(mysqli_num_rows($query)>0){
            $_SESSION['username'] = $row['username'];
            $_SESSION['logged_in'] = true;
            echo '<script type="text/javascript"> alert("Login Successful.");
            window.location.replace("index.php")</script>';
        }
        else
        {
            echo '<script type="text/javascript"> alert("Username or Password Incorrect.");
            window.location.replace("login.php")</script>';
        }
    };
?>


<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <!--<link rel="shortcut icon" type="image/x-icon" href="images/logos.jpg">-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/style1.css">


</head>

<body>
    <?php include("include/header.php"); ?>
    
    <!-- Start Slider -->
    
	
    <!-- Start Blog  -->
    <div class="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Login</h1>
                    </div>
                </div>
            </div>
            <div class="l-part">
                    <form action="" method="post">
                        <div class="input-group" data-validate = "Enter Username">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input type="text" id="username" class="form-control" placeholder="Username" name="username" required="required">
                        </div><br>
                       
                        <div class="input-group" data-validate = "Enter Password">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input type="password" id="password" class="form-control" placeholder="Password" name="password" required="required">
                        </div><br>                                                     
                        
                        <center><button id="login" class="btn btn-primary btn-lg " name="login">Login</button></center>
                    </form>
                </div>
        </div>
    </div>
    <!-- End Blog  -->

    <?php include("include/footer.php") ?>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
<?php mysqli_close($connection); ?>