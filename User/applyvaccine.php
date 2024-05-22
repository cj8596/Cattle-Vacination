<?php
    include_once("include/db.php");
    global $connection;
    session_start();

    if(!isset($_SESSION['user_id'])){
        echo '<script>window.location.replace("login.php")</script>';
    }

    if(isset($_POST['apply'])){
        $cattleid=$_POST['cattleid'];
        $vcenter=$_POST['vcenter'];
        $reason=$_POST['reason'];
        $vaccinedate=$_POST['vaccinedate'];
        $user_id=$_SESSION['user_id'];
        $requested_date=date('Y-m-d');

        $rs=mysqli_query($connection, "SELECT cattle_id from cattle WHERE cattle_id='$cattleid' AND user_id='$user_id'");
        if(mysqli_num_rows($rs)>0){
           $insert_query=mysqli_query($connection, "INSERT INTO vaccine_request(cattle_id, vaccine_date, requested_date, vc_id, vaccine_reason) VALUES('$cattleid', '$vaccinedate', '$requested_date', '$vcenter', '$reason')"); 
           if($insert_query){
                echo '<script type="text/javascript"> alert("Applied for Vaccination Successfully.");
                window.location.replace("applyvaccine.php")</script>';
           }else{
                echo 'Error'. mysqli_error($connection);
                echo '<script>window.location.replace("applyvaccine.php")</script>';
           }
        }
        else{
            echo '<script type="text/javascript"> alert("Cattle ID does not exists.")</script>';
            //window.location.replace("applyvaccine.php")</script>';
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
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo2.jpg" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
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
			<form class="contact100-form validate-form" method="post" action="">
				<span class="contact100-form-title">
					Apply for Vaccination
				</span>

				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Cattle ID</span>
					<input class="input100" id="cattleid" type="text" name="cattleid" placeholder="Enter Cattle ID">
				</div>
				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Select Vaccination Center</span>
					<div>
						<select class="form-control" name="vcenter" required="required" style="height: 35px;">
                                <option>--Select Vaccination Center--</option>
                                <?php
                                    $records=mysqli_query($connection, "SELECT vc_id, vc_name FROM v_center");
                                    while($data=mysqli_fetch_array($records)){
                                        echo "<option value='".$data['vc_id']."'>".$data['vc_name']."</option>";
                                    }
                                ?>
                             </select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Vaccine Reason</span> 
					<div>
						<select class="js-select2" id="reason" name="reason">
							<option>Select the Reason for Vaccine</option>
							<option value="Rabis">Rabis</option>
                                <option value="Theileriosis">Theileriosis</option>
                                <option value="Brucellosis">Brucellosis</option>
                                <option value="Back Quarter">(BQ)Back Quarter</option>
                                <option value="Haemorrhagic Septicaemia">(HS)Haemorrhagic Septicaemia</option>
                                <option value="Foot and Mouth Disease">(FMD)Foot and Mouth Disease</option>
								<option value="Necessary Vaccines">Necessary Vaccines</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Date</span>
					<input class="input100" type="date" name="vaccinedate" id="vaccinedate" placeholder="Date" min="<?php echo date('Y-m-d', strtotime("+1days")); ?>" required>
				</div>
				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit" name="apply">
						<span>
							Apply For Vaccination
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