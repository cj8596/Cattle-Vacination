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


</head>

<body>
    <?php include("include/header.php"); ?>
    <!-- Start Blog  -->
    <div class="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Cattle Information</h1>
                    </div>
                </div>
            </div>
            <div class="l-part">
                    <form action="" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input type="text" id="cattleid" class="form-control" placeholder="Cattle ID" name="cattleid" 
                            required="required">
                        </div><br>
                       
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input id="category" type="text" class="form-control" placeholder="Cattle Category" name="category" 
                            required="required">
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input id="breed" type="text" class="form-control" placeholder="Cattle Breed" name="breed" 
                            required="required">
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input id="age" type="text" class="form-control" placeholder="Cattle Age" name="age" 
                            required="required">
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input id="type" type="text" class="form-control" placeholder="Cattle Type" name="type" 
                            required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
                            <select class="form-control input-md" name="life_status" required="required" style="height: 35px;">
                                <option disabled>Cattle life Status</option>
                                <option value="alive">Live</option>
                                <option value="dead">Dead</option>
                                
                            </select>
                        </div><br>              
                        
                        <center><button id="signup" class="btn-primary btn-lg" name="add_cattle">ADD CATTLE</button></center>
                    </form>
                </div>
        </div>
    </div>
    <!-- End Blog  -->
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
</body>

</html>
<?php mysqli_close($connection); ?>