<?php
include 'includes/db_connect.php';

if(isset($_GET['deletebkid'])){
    $id = $_GET['deletebkid'];

    $sql = "delete from booked where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        //echo "Deleted successfully";
        header('Location: booked.php');
    }else{
        die("Connection failed: " . $conn->connect_error);
    }
}


?>