<?php
    include_once("include/db.php");
    global $connection;
    session_start();

    if(!isset($_SESSION['vc_id'])){
        echo '<script>window.location.replace("login.php")</script>';
    }
    
    $vc_id=$_SESSION['vc_id'];
    $id = $_GET['id'];
    $update_query=mysqli_query($connection, "UPDATE vaccine_request SET approve_status='Incomplete' WHERE vr_id='$id;' AND vc_id='$vc_id'");
    if($update_query){
        echo '<script>window.location.replace("vaccineUpdates.php")</script>';
    }else{
        echo "Error.".mysqli_error($connection);
        echo '<script>window.location.replace("vaccineUpdates.php")</script>';
    }
    mysqli_close($connection);
?>