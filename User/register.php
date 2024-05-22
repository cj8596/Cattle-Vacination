 <?php
    include_once("include/db.php");
    global $connection;

    if(isset($_POST['register'])){
    	$name=$_POST['name'];
    	$address=$_POST['address'];
    	$pincode=$_POST['pincode'];
    	$mobileno=$_POST['mobileno'];
    	$email=$_POST['email'];
    	$password=$_POST['password'];
    	$con_password=$_POST['con_password'];

    	if($password==$con_password)
		{
			$rs=mysqli_query($connection, "SELECT * FROM user WHERE email='$email'");
			if(mysqli_num_rows($rs)>0)
			{
				echo '<script type="text/javascript"> alert("Email already exists.")</script>';
			}
			else
			{
				$insert_query=mysqli_query($connection, "INSERT INTO user(name, email, mobileno, address, pincode, password) VALUES('$name', '$email', '$mobileno','$address', '$pincode','$password')");
				if($insert_query)
				{
					echo '<script type="text/javascript"> alert("Register Successful.");
					window.location.replace("login.php")</script>';
				}
				else
				{
					echo '<script type="text/javascript"> alert("Error while Sign Up. Please Sign Up again.")</script>';
				}
			}
		}
		else
		{
			echo '<script type="text/javascript"> alert("Password and Confirm Password does not match.")</script>';
		}
	};
	mysqli_close($connection);
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CaVac</title>
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
   <main>
        <!--? slider Area Start-->
        <section class="slider-area ">
           <div class="latest-blog">
        <div class="container">      
		<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="" method="post" id="validate-form">
				<span class="contact100-form-title">
					Register here!
				</span>
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">FULL NAME</span>
					<input class="input100" type="text" name="name" placeholder="Enter Your Name" required>
				</div>
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Address</span>
					<input class="input100" type="text" name="address" placeholder="Enter Your Address" required>
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Pincode</span>
					<input class="input100" type="number" name="pincode" placeholder="Enter Your Pincode" minlength="6" maxlength="6" required>
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Mobile Number</span>
					<input class="input100" type="number" name="mobileno" placeholder="Enter Phone Number" minlength="10" maxlength="10" required>
				</div>
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Email ID</span>
					<input class="input100" type="email" name="email" placeholder="Enter Your Email ID" required>
				</div>
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Password</span>
					<input class="input100" type="password" name="password" placeholder="Enter Password" required>
				</div>
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Confirm Password</span>
					<input class="input100" type="password" name="con_password" placeholder="Enter Password Again" required>
				</div>
			
				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit" name="register">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>
	 </section>	
        <?php include("include/footer.php") ?>
        <!-- slider Area End-->

<!-- JS here -->
<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- Date Picker -->
<script src="./assets/js/gijgo.min.js"></script>
<!-- Nice-select, sticky -->
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>
<!-- Progress -->
<script src="./assets/js/jquery.barfiller.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="./assets/js/jquery.counterup.min.js"></script>
<script src="./assets/js/waypoints.min.js"></script>
<script src="./assets/js/jquery.countdown.min.js"></script>
<script src="./assets/js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#validate-form").validate({
			rules:{
				"name" : "required",
				"address" : "required",
				"mobileno" : {required:true,number:true,minlength:10,maxlength:10},
				"pincode" : {required:true,number:true,minlength:6,maxlength:6}, 
				"password" : {required:true,minlength:8,maxlength:16,alphanumeric:true}
			}, messages:{
				"name" : "Please enter your Name",
				"address" : "Please enter your Address",
				"mobileno" : "Please enter your 10 digit Mobile Number",
				"pincode" : "Please enter your 6 digit valid Pincode",
				"password" : "Please enter a 8-16 characters long password"
			}
		});
	});

</script>

</body>
</html>

<?php mysqli_close($connection); ?>