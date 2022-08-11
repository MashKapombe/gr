<?php
include 'header.php';
include 'admin_navbar.php';
include 'includes/db_connect.php';
include 'includes/functions.php';

$id = $_GET['editbid'];
//display all data
$sql = "select * from buses where id = '$id'";
$result = mysqli_query($conn,$sql);
//to display only once thats why not while loop
$row = mysqli_fetch_assoc($result);
$bus_id = $row['bus_id'];
$bus_name = $row['bus_name'];
$seats = $row['seats'];

//update
if(isset($_POST['submit'])){
    $bus_id = $_POST['bus_id'];
    $bus_name = $_POST['bus_name'];
    $seats = $_POST['seats']; 
    
    /*if(busExists($conn, $bus_id) == !false){
        header("Location: edit_bus.php?error=busexists");
        exit();
    }*/
    
    $sql = "update buses set id = '$id', bus_id = '$bus_id', bus_name = '$bus_name', seats = '$seats' where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: view_bus.php');
    }else{
        die("Connection failed: " . $conn->connect_error);
    }
}

?>

<html>
<style>
body {
    background-image: url(./assets/images/green_bus.png);
    height: 96vh;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>

<body>
    <div class="container">
        <div class="form-details">

            <form method="POST">
                <div class="form-group row">
                    <label for="bus_id" class="col-sm-2 col-form-label">BusId:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="bus_id" name="bus_id" autocomplete="off"
                            placeholder="Number plate" value=<?php echo $bus_id;?>>
                    </div>
                </div>

                <div class="form-group mt-4 row">
                    <label for="bus_name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">

                        <select class="form-select" id="bus_name" name="bus_name" autocomplete="off">
                            <option selected><?php echo $bus_name?></option>
                            <option value="First class">First class</option>
                            <option value="Second class">Second class</option>
                            <option value="Third class">Third class</option>
                            <option value="Fourth class">Fourth class</option>
                            <option value="Fifth class">Fifth class</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mt-4 row">
                    <label for="seats" class="col-sm-2 col-form-label">Seats:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="seats" name="seats" placeholder="Number of seats"
                            value=<?php echo $seats;?>>
                    </div>
                </div>

                <div class=" form-group mt-3 row">
                    <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</body>

</html>