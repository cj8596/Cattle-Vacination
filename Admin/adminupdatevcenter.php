<?php
    include_once("include/db.php");
    global $connection;
    session_start();

    if(!isset($_SESSION['username'])){
        echo '<script>window.location.replace("login.php")</script>';
    }

    if(isset($_POST['update'])){
        $vc_id=$_POST['vc_id'];
        $vc_name=$_POST['vc_name'];
        $vc_mobile=$_POST['vc_mobile'];
        $vc_address=$_POST['vc_address'];
        $vc_pincode=$_POST['vc_pincode'];
        $vc_password=$_POST['vc_password'];
        $con_password=$_POST['con_password'];

        if($vc_password==$con_password)
        {
            $insert_query=mysqli_query($connection, "UPDATE v_center SET vc_name='$vc_name', vc_mobile='$vc_mobile', vc_address='$vc_address', vc_pincode='$vc_pincode', vc_password='vc_password' WHERE vc_id='$vc_id'");
            if($insert_query){
                echo '<script type="text/javascript"> alert("Vaccine Center Updated Successfully.");
                    window.location.replace("adminviewvcenter.php")</script>';
            }
            else{
                echo "Error".mysqli_error($connection);
                echo '<script>window.location.replace("adminviewvcenter.php")</script>';
            }   
        }else{
            echo '<script type="text/javascript"> alert("Password and Confirm Password does not match.")</script>';
        }
    };
?>


<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cattle Vaccination</title>
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
    
    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form" method="post" action="" id="validate-form">
                <span class="contact100-form-title">
                    Update Vaccination Center Information
                </span>
                <?php
                    $id=$_GET['id'];
                    $rs=mysqli_query($connection, "SELECT * FROM v_center WHERE vc_id='$id'");
                    while($row=mysqli_fetch_array($rs)){
                ?>

                <div class="wrap-input100 validate-input bg1">
                    <span class="label-input100">Center ID</span>
                    <input class="input100" id="vc_id" type="text" name="vc_id" placeholder="Enter Center ID" value="<?php echo $id; ?>" readonly>
                </div>
                <div class="wrap-input100 validate-input bg1">
                    <span class="label-input100">Center Name</span>
                    <input class="input100" id="vc_name" type="text" name="vc_name" placeholder="Enter Center Name" value="<?php echo $row['vc_name']; ?>" required>
                </div>
                <div class="wrap-input100 validate-input bg1">
                    <span class="label-input100">Center Address</span>
                    <input class="input100" id="vc_address" type="text" name="vc_address" placeholder="Enter Center Address" value="<?php echo $row['vc_address']; ?>" required>
                </div>
                
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                    <span class="label-input100">Center Pincode</span>
                    <input class="input100" type="number" id="vc_pincode" name="vc_pincode" placeholder="Enter Pincode" value="<?php echo $row['vc_pincode']; ?>" required>
                </div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                    <span class="label-input100">Center Phone Number</span>
                    <input class="input100" type="number" id="vc_mobile" name="vc_mobile" placeholder="Enter Phone Number" value="<?php echo $row['vc_mobile']; ?>" required>
                </div>
            <?php } ?>
                <div class="wrap-input100 validate-input bg1">
                    <span class="label-input100">Password</span>
                    <input class="input100" id="vc_password" type="password" name="vc_password" placeholder="Enter Password" required>
                </div>
                <div class="wrap-input100 validate-input bg1">
                    <span class="label-input100">Confirm Password</span>
                    <input class="input100" id="password" type="password" name="con_password" placeholder="Enter Password Again" required>
                </div>
                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" type="submit" name="update">
                        <span>
                            Update
                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <?php include("include/footer.php"); ?>
   
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
    
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="vendor/noui/nouislider.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#validate-form").validate({
                rules:{
                    "vc_id" : "required",
                    "vc_name" : "required",
                    "vc_address" : "required",
                    "vc_mobile" : {required:true,number:true,minlength:10,maxlength:10},
                    "vc_pincode" : {required:true,number:true,minlength:6,maxlength:6}, 
                    "vc_password" : {required:true,minlength:6,maxlength:14,alphanumeric:true}
                }, messages:{
                    "vc_id" : "Please enter Vaccine Center ID",
                    "vc_name" : "Please enter Vaccine Center Name",
                    "vc_address" : "Please enter Vaccine Center's Address",
                    "vc_mobile" : "Please enter Vaccine Center's 10 digit Mobile Number",
                    "vc_pincode" : "Please enter Vaccine Center's 6 digit valid Pincode",
                    "vc_password" : "Please enter a 6-14 characters long password"
                }
            });
        });

    </script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
</body>

</html>
<?php mysqli_close($connection); ?>