<?php
include 'header.php';
include 'admin_navbar.php';
include 'includes/db_connect.php';

$id = $_GET['editbkid'];
//display
$sql = "select * from booked where id = '$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$schedule_id = $row['schedule_id'];
$name = $row['name'];
$quantity = $row['quantity'];
$status = $row['status'];

//update
if(isset($_POST['submit'])){
$schedule_id = $row['schedule_id'];
$name = $row['name'];
$quantity = $row['quantity'];
$status = $row['status'];

    $sql = "update booked set id = '$id', schedule_id = '$schedule_id', name = '$name', quantity = '$quantity', status = '$status' where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: booked.php');
    }else{
        die("Connection failed: " . $conn->connect_error);
    }
    
}

?>
<!DOCTYPE html>
<html>

<head>

    <title></title>
</head>
<style>
body {
    background-image: url(./assets/images/green_bus.png);
    height: 96vh;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

p {
    text-align: center;
    color: red;
}

h5 {
    text-align: center;
    color: green;
}
</style>

<body>
    <div id='login-body'>


        <div class="card col-md-4 offset-md-4 mt-4">
            <div class="card-header-edge text-white ">
            </div>
            <div class="card-body">

                <form action="" method="POST" id="login-frm">
                    <div class="form-group">
                        <label for="schedule_id">Schedule id</label>
                        <input type="number" name="schedule_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ref_no">Ref no</label>
                        <input type="number" name="ref_no" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="number" name="status" class="form-control" required>
                    </div>

                    <div class=" form-group text-center mt-3">
                        <button type="submit" name="submit" class="btn btn-md btn-primary">Edit</button><br>
                    </div>

                </form>
            </div>
        </div>

    </div>


</body>

</html>