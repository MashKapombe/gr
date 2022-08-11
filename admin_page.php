<?php 
session_start();

include 'header.php';
include 'admin_navbar.php';
?>

<!DOCTYPE html>
<html>

<head>


</head>
<style>
body {
    background-image: url(./assets/images/green_bus.png);
    height: 96vh;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

#button {
    background-color: #e7e7e7;
    color: black;
    font-size: 20px;
    width: 180px;
    border-radius: 8px;
    text-align: center;
    position: relative;
    justify-content: center;
    display: inline-block;
    margin: 5px;
}

#button:hover {
    background-color: #4CAF50;
}

/*.welcome {
    margin-bottom: 80px;
    margin-top: 2px;
    margin-left: 0px;
}*/
</style>

<body>
    <div class="welcome text-white text-start">
        <?php 
        if(isset($_SESSION["username"])){
            echo "<p>Welcome " . $_SESSION["username"] . "</p>";     
        }
        ?>
    </div>
    <div class="container">
        <div class="row mt-4 text-center ">
            <div class="col-md-12 text-center">
                <a href="http://localhost/green/add_bus.php"><button id="button" class=" btn btn-md center-block">Add
                        bus</button></a>
                <a href="http://localhost/green/view_bus.php"><button id="button" class="btn btn-md center-block">View
                        buses</button></a>
                <a href="http://localhost/green/add_schedule.php"><button id="button"
                        class="btn btn-md center-block">Add
                        schedule</button></a>
                <a href="http://localhost/green/view_schedule.php"><button id="button"
                        class="btn btn-md center-block">View
                        schedule</button></a>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <a href="http://localhost/green/add_passenger.php"><button id="button"
                        class="btn btn-md center-block">Add
                        passengers</button></a>
                <a href="http://localhost/green/view_passenger.php"> <button id="button"
                        class="btn btn-md center-block">View
                        passengers</button></a>
                <a href="http://localhost/green/add_bookings.php"><button id="button"
                        class="btn btn-md center-block">Add Bookings</button></a>
                <a href="http://localhost/green/booked.php"><button id="button" class="btn btn-md center-block">View
                        Bookings </button></a>
                < </div>
            </div>
        </div>
</body>

</html>