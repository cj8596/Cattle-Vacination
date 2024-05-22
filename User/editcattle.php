<?php
    include_once("include/db.php");
    global $connection;
    session_start();

    if(!isset($_SESSION['user_id'])){
        echo '<script>window.location.replace("login.php")</script>';
    }

    if(isset($_POST['edit_cattle'])){
        $cattleid=$_POST['cattleid'];
        $age=$_POST['age'];
        $life_status=$_POST['life_status'];
        $update_query=mysqli_query($connection, "UPDATE cattle SET age='$age', life_status='$life_status' WHERE cattle_id='$cattleid'");
        if($update_query){
            echo '<script type="text/javascript"> alert("Cattle Updated Successfully.");
                window.location.replace("viewcattle.php")</script>';
        }else{
            echo '<script type="text/javascript"> alert("Error.");
                window.location.replace("editcattle.php?id=$cattle_id;")</script>';
        }
        
    };
?>


<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Cattle Vaccination</title>
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
    <!-- Start Blog  -->
    <div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="post" action="">
				<span class="contact100-form-title">
					Edit Cattle Information
				</span>
                    <?php
                        $cattle_id = $_GET['id'];
                        $rs=mysqli_query($connection, "SELECT * FROM cattle where cattle_id='$cattle_id'");
                        while($row=mysqli_fetch_array($rs)){
                        ?>
 
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Cattle ID</span>
					<input class="input100" id="cattleid" type="text" name="cattleid" placeholder="Cattle ID" required="required" value="<?php echo $cattle_id; ?>" readonly>
				</div>
				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Cattle Category</span>
					<input id="category" type="text" class="form-control" placeholder="Cattle Category" name="category" value="<?php echo $row['category']; ?>" required="required" readonly>
				</div>
                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">Cattle Breed</span>
                    <input id="breed" type="text" class="form-control" placeholder="Cattle Breed" name="breed" value="<?php echo $row['breed']; ?>" required="required" readonly>
                </div>
				<div class="wrap-input100 input100-select bg1">
				<span class="label-input100">Cattle Type</span>
				<input id="breed" type="text" class="form-control" placeholder="Cattle Breed" name="breed" required="required" value="<?php echo $row['breed']; ?>" readonly>	
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Cattle Age</span>
					<input class="input100" type="text" name="age" placeholder="Cattle Age" value="<?php echo $row['age']; ?>" required="required" >
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Life Status</span>
					<div>
						<select class="js-select2" id="life_status" name="life_status" style="width: 300px; height: 45px;" required>
							<option disabled>Please choose</option>
							<option value="Alive">Alive</option>
							<option value="Dead">Dead</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
            <?php } ?>
				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" name="edit_cattle" type="submit">
						<span>
							Edit Cattle
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