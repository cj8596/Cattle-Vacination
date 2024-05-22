<?php
    include_once("include/db.php");
    global $connection;
    session_start();

    if(!isset($_SESSION['vc_id'])){
        echo '<script>window.location.replace("login.php")</script>';
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
	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<table class="table" style="border-bottom: 1 solid;">
						<tbody>
						  	<?php
						    		$vc_id=$_SESSION['vc_id'];
						    		$query=mysqli_query($connection, "SELECT * FROM vaccine_request WHERE vc_id='$vc_id' AND request_status=''");
						    		while($row=mysqli_fetch_array($query)){
						    			$vaccine_date=$row['vaccine_date'];
						    			$date = str_replace('/', '-', $vaccine_date );
										$newDate = date("d-m-Y", strtotime($date));
						    			$vr_id=$row['vr_id'];
						    			$cattle_id=$row['cattle_id'];
						    			$rs=mysqli_query($connection, "SELECT user_id FROM  cattle WHERE cattle_id='$cattle_id'");
						    			while($rows=mysqli_fetch_array($rs)){
						    				$user_id=$rows['user_id'];
						    				$select=mysqli_query($connection, "SELECT name FROM user WHERE user_id='$user_id'");
						    				while($data=mysqli_fetch_array($select)){

						    	?>
						    <tr>
						      	<td style="width: 100%; font-family: Times New Roman; font-size: 20px;">
						      		<strong><?php echo $data['name']; ?></strong> has applied vaccine request for Cattle ID = <?php echo $cattle_id; ?> on <?php echo $newDate;  ?>
						      	</td>
						      	<td><input type="hidden" name="vr_id" value="<?php echo $vr_id; ?>"></td>
						      	<td><a href="accept.php?id=<?php echo $vr_id; ?>" role="button" class="btn btn-outline-success btn-lg" aria-pressed="true">Accept</a></td>
						      	<td><a href="deny.php?id=<?php echo $vr_id; ?>" role="button" class="btn btn-outline-danger btn-lg" aria-pressed="true">Deny</a></td>
						    </tr>
						    <?php

						    				}
						    			}
						    		}
						      	?>
						  </tbody>
					</table>
					
				</div>
			</div>
		</div>
	</section><br><br><br>

	<?php include("include/footer.php"); ?>
	</body>
</html>

<?php mysqli_close($connection); ?>
