<?php
include 'includes/db_connect.php';

if(isset($_GET['deletebid'])){
    $id = $_GET['deletebid'];

    $sql = "delete from buses where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        //echo "Deleted successfully";
        header('Location: view_bus.php');
    }else{
        die("Connection failed: " . $conn->connect_error);
    }
}


?>