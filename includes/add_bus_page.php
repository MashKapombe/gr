<?php
include 'db_connect.php';
include 'functions.php';

if(isset($_POST["addbus"])){
    $bus_id = $_POST['bus_id'];
    $bus_name = $_POST['bus_name'];
    $seats = $_POST['seats'];

    if(emptyInputBus($bus_id, $bus_name, $seats) == !false){
        header("Location: ../add_bus.php?error=emptyinput");
        exit();
    }

    if(invalidSeats($seats) == !false){
        header("Location: ../add_bus.php?error=invalidseats");
        exit();    
    }
    if(busExists($conn, $bus_id) == !false){
        header("Location: ../add_bus.php?error=busexists");
        exit();
    }

    //add bus
    addBus($conn, $bus_id, $bus_name, $seats);

}
else {
    header("Location: ../add_bus.php");
    exit();
}

?>