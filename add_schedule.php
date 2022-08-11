<?php
include 'header.php';
include 'admin_navbar.php';
include 'includes/db_connect.php';

if(isset($_POST['add'])){
    $id = $_POST['id'];
    $bus_id = $_POST['bus_id'];
    $from_location = $_POST['from_location'];
    $to_location = $_POST['to_location'];
    $date = $_POST['date'];
    $appt = $_POST['appt'];
    $the_time = date('h:i A', strtotime($appt));
    $price = $_POST['price']; 
   // $time = $_POST['time'];
   
    
    $sql = "insert into schedule(bus_id,from_location,to_location,date,time,price)
     values('$bus_id','$from_location','$to_location','$date','$the_time','$price')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: view_schedule.php');
        //echo 'data inserted successfully';
    }else{
        die("Connection failed: " . $conn->connect_error);
    }
}
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container my-3">

        <div class="form-heading col-md-12">
            <h3>Fill in the details below </h3>
        </div>

        <div class="form-details">

            <form method="POST">

                <div class="mb-4 row">
                    <label for="bus_id" class="col-sm-2 col-form-label">Bus Id</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="bus_id" name="bus_id" placeholder="Number plate"
                            required>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="from_location" class="col-sm-2 col-form-label">From:</label>
                    <div class="col-sm-10">

                        <select name="from_location" class="form-select" id="from_location" autocomplete="off" required>
                            <option selected>Select from</option>
                            <option value="Nairobi">Nairobi</option>
                            <option value="Nakuru">Nakuru</option>
                            <option value="Naivasha">Naivasha</option>
                            <option value="Kisumu">Kisumu</option>
                            <option value="Kisii">Kisii</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="to_location" class="col-sm-2 col-form-label">To:</label>
                    <div class="col-sm-10">
                        <select name="to_location" class="form-select" id="to_location" autocomplete="off" required>
                            <option selected>Select destination</option>
                            <option value="Nakuru">Nakuru</option>
                            <option value="Nairobi">Nairobi</option>
                            <option value="Naivasha">Naivasha</option>
                            <option value="Kisumu">Kisumu</option>
                            <option value="Eldoret">Eldoret</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="date" class="col-sm-2 col-form-label">Date:</label>
                    <div class="col-sm-10">
                        <input type="date" name="date" class="form-control" id="date" required>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="appt" class="col-sm-2 col-form-label">Time:</label>
                    <div class="col-sm-10">
                        <input type="time" name="appt" class="form-control" id="appt" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">Price:</label>
                    <div class="col-sm-10">
                        <input type="number" name="price" class="form-control" id="price" required>
                    </div>
                </div>
                <button type="submit" name="add" class="btn btn-primary btn-md">Add</button>
            </form>
        </div>
    </div>

</body>

</html>