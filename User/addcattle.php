<?php
    include_once("include/db.php");
    global $connection;
    session_start();

    if(!isset($_SESSION['user_id'])){
        echo '<script>window.location.replace("login.php")</script>';
    }

    if(isset($_POST['add_cattle'])){
        $cattleid=$_POST['cattleid'];
        $category=$_POST['category'];
        $breed=$_POST['breed'];
        $age=$_POST['age'];
        $type=$_POST['type'];
        $life_status=$_POST['life_status'];
        $user_id=$_SESSION['user_id'];

        $rs=mysqli_query($connection, "SELECT cattle_id from cattle WHERE cattle_id='$cattleid'");
        if(mysqli_num_rows($rs)>0){
            echo '<script type="text/javascript"> alert("Cattle ID already exists.");
            window.location.replace("addcattle.php")</script>';
        }
        else{
            $insert_query=mysqli_query($connection, "INSERT INTO cattle(cattle_id, category, breed, age, type, life_status, user_id) VALUES('$cattleid', '$category', '$breed', '$age', '$type', '$life_status', '$user_id')");
            if($insert_query){
                echo '<script type="text/javascript"> alert("Cattle Added Successfully.");
                window.location.replace("addcattle.php")</script>';
            }
            else{
                echo '<script type="text/javascript"> alert("Error.");
                window.location.replace("addcattle.php")</script>';
            }
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
			<form class="contact100-form validate-form" action="" method="post">
				<span class="contact100-form-title">
					Cattle Information
				</span>

				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Cattle ID</span>
					<input class="input100" id="cattleid" type="text" name="cattleid" placeholder="Enter Cattle ID">
				</div>
				
				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Cattle Category</span>
					<div>
						<select class="js-select2" id="category" name="category" style="width: 100%; height: 40px;">
							<option>Please choose</option>
							<option>Cow</option>
							<option>Buffalo</option>
							<option>Ox</option>
							<option>Bull</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Cattle Breed</span>
					<input class="input100" id="breed" type="text" name="breed" placeholder="Enter Cattle Breed">
				</div>
				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Cattle Type</span>
					<div>
						<select class="js-select2" id="type" name="type" style="width: 100%; height: 40px">
							<option>Please choose</option>
							<option>Mother</option>
							<option>Calf</option>
							<option>Others</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Cattle Age</span>
					<input class="input100" type="text" name="age" placeholder="Enter Cattle Age">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Life Status</span>
					<div>
						<select class="js-select2" id="life_status" name="life_status" style="width: 100%; height: 40px">
							<option>Please choose</option>
							<option>Alive</option>
							<option>Dead</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" name="add_cattle" type="submit">
						<span>
							Submit
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

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
</body>

</html>
<?php mysqli_close($connection); ?>