<?php
include 'includes/db_connect.php';

if(isset($_GET['deletepid'])){
    $id = $_GET['deletepid'];

    $sql = "delete from passengers where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        //echo "Deleted successfully";
        header('Location: view_passenger.php');
    }else{
        die("Connection failed: " . $conn->connect_error);
    }
}


?>