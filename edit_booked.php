<?php
include 'header.php';
include 'admin_navbar.php';
include 'includes/db_connect.php';

$id = $_GET['editbkid'];
//display
$sql = "select * from booked where id = '$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$ref_no=$row['ref_no'];
$name=$row['name'];
$contact=$row['contact'];
$bus_id=$row['bus_id'];
$from_location=$row['from_location'];
$to_location=$row['to_location'];
$date=$row['date'];
$time = $row['time'];
$price=$row['price'];
$status=$row['status'];

//update
if(isset($_POST['submit'])){
    $ref_no=$_POST['ref_no'];
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $bus_id=$_POST['bus_id'];
    $from_location=$_POST['from_location'];
    $to_location=$_POST['to_location'];
    $date=$_POST['date'];
    $appt = $_POST['appt'];
    $the_time = date('h:i A', strtotime($appt));
    $price=$_POST['price'];
    $status=$_POST['status'];

    $sql = "update booked set id = '$id', ref_no = '$ref_no', name = '$name', contact = '$contact', bus_id = '$bus_id', from_location = '$from_location', to_location = '$to_location', date = '$date', time = '$the_time', price = '$price', status = '$status' where id = '$id'";
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

                <form method="POST" id="login-frm">

                    <div class="form-group">
                        <label for="ref_no">Ref no</label>
                        <input type="number" name="ref_no" class="form-control" value=<?php echo $ref_no;?> required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value=<?php echo $name;?> required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="tel" name="contact" class="form-control" value=<?php echo $contact;?> required>
                    </div>
                    <div class="form-group">
                        <label for="bus_id">Bus id</label>
                        <input type="text" name="bus_id" class="form-control" value=<?php echo $bus_id;?> required>
                    </div>
                    <div class="form-group">
                        <label for="from_location">From</label>
                        <input type="text" name="from_location" class="form-control" value=<?php echo $from_location;?>
                            required>
                    </div>
                    <div class="form-group">
                        <label for="to_location">To</label>
                        <input type="text" name="to_location" class="form-control" value=<?php echo $to_location;?>
                            required>
                    </div>

                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" value=<?php echo $date;?> required>
                    </div>
                    <div class="form-group">
                        <label for="appt">Time</label>
                        <input type="time" name="appt" class="form-control" value=<?php echo $time;?> required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" value=<?php echo $price;?> required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control" value=<?php echo $status;?> required>
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