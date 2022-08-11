<?php 
include 'header.php';
include 'admin_navbar.php';
include 'includes/db_connect.php';
include 'includes/functions.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $schedule_id = $_POST['schedule_id'];
    $ref_no= $_POST['ref_no'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];
    

    $sql = "insert into booked(id,schedule_id,ref_no,name,quantity,status) values('$id','$schedule_id','$ref_no','$name','$quantity','$status')";
    $result = mysqli_query($conn, $sql);
    if($result){
        //echo "succesful";
        header("Location: booked.php");
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
                        <button type="submit" name="submit" class="btn btn-md btn-primary">Add</button><br>
                    </div>

                </form>
            </div>
        </div>

    </div>


</body>

</html>