<?php
include 'includes/db_connect.php';

if(isset($_GET['deletesid'])){
    $id = $_GET['deletesid'];

    $sql = "delete from schedule where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        //echo "Deleted successfully";
        header('Location:view_schedule.php');
    }else{
        die("Connection failed: " . $conn->connect_error);
    }
}


?>