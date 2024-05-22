<?php
    include_once("include/db.php");
    global $connection;
    session_start();

    if(!isset($_SESSION['vc_id'])){
        echo '<script>window.location.replace("login.php")</script>';
    }

    if(isset($_POST['update'])){
    	$id = $_GET['id'];
    	$vc_id=$_SESSION['vc_id'];
    	$vaccine_name=$_POST['vaccine_name'];
    	$vaccine_status=$_POST['vaccine_status'];
    	$vaccine_description=$_POST['vaccine_description'];
    	$vaccine_type=$_POST['vaccine_type'];

    	$update_query=mysqli_query($connection, "UPDATE vaccine SET vaccine_description='$vaccine_description', vaccine_type='$vaccine_type', vaccine_status='$vaccine_status' WHERE id='$id'");
    	if($update_query){
            echo '<script type="text/javascript"> alert("Vaccine Status Updated Successfully.");
                window.location.replace("viewvaccineinfo.php")</script>';
        }else{
            echo '<script type="text/javascript"> alert("Error.");
                window.location.replace("editvaccineinfo.php?id=$id;")</script>';
        }
    }
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cattle Vaccination</title>
  
    <!-- Site Metas -->
    <title>Cattle Vaccination</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
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
					Edit Vaccine Details
				</span>	
				<?php
					$id = $_GET['id'];
					$vc_id=$_SESSION['vc_id'];
					$rs=mysqli_query($connection, "SELECT * FROM vaccine where id='$id' AND vc_id='$vc_id'");
                    while($row=mysqli_fetch_array($rs)){
				?>			
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Vaccine Name</span>
					<input class="input100" id="vaccine_name" type="text" name="vaccine_name" placeholder="Enter Vaccine Name" value="<?php echo $row['vaccine_name']; ?>" readonly>
				</div>
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Vaccine Type</span>
					<input class="input100" id="vaccine_type" type="text" name="vaccine_type" placeholder="Enter Vaccine Type" value="<?php echo $row['vaccine_type']; ?>" required>
				</div>
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Vaccine Description</span>
					<input class="input100" id="vaccine_description" type="text" name="vaccine_description" placeholder="Enter Description of Vaccine" value="<?php echo $row['vaccine_description']; ?>" required>
				</div>
				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Vaccine Availability</span>
					<div class="dropDownSelect2">
						<select class="js-select2" id="vaccine_status" name="vaccine_status" style="width: 100%; height: 40px;" required>
							<option disabled>Please choose</option>
							<option value="Available">Available</option>
							<option value="Not Available">Not Available</option>
						</select>
					</div>
				</div>
			<?php } ?>
				
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
	</body>
</html>

<?php mysqli_close($connection); ?>
