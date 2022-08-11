<?php
include 'header.php';
include 'admin_navbar.php';
include 'includes/db_connect.php';

$id = $_GET['editsid'];
//display
$sql = "select * from schedule where id = '$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$bus_id = $row['bus_id'];
$from_location = $row['from_location'];
$to_location = $row['to_location'];
$date = $row['date'];
$time = $row['time'];
$price = $row['price'];
//$the_time = date('h:i A', strtotime($appt)); 

//update
if(isset($_POST['submit'])){
    $bus_id = $_POST['bus_id'];
    $from_location = $_POST['from_location'];
    $to_location = $_POST['to_location'];
    $date = $_POST['date'];
    $appt = $_POST['appt'];
    $the_time = date('h:i A', strtotime($appt)); 
    $price = $_POST['price'];

    $sql = "update schedule set id = '$id', bus_id = '$bus_id', from_location = '$from_location', to_location = '$to_location', date = '$date', time = '$the_time', price = '$price' where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: view_schedule.php');
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

        <div class="form-heading  col-md-12">
            <h3>Fill in the details below </h3>
        </div>

        <div class="form-details">

            <form method="POST">

                <div class="mb-4 row">
                    <label for="bus_id" class="col-sm-2 col-form-label">Bus Id</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="bus_id" name="bus_id" placeholder="Number plate"
                            autocomplete="off" value=<?php echo $bus_id;?> required>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="from_location" class="col-sm-2 col-form-label">From:</label>
                    <div class="col-sm-10">
                        <select name="from_location" class="form-select" id="from_location" required>
                            <option selected><?php echo $from_location;?></option>
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
                        <select name="to_location" class="form-select" id="to_location" required>
                            <option selected><?php echo $to_location;?></option>
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
                        <input type="date" name="date" class="form-control" id="date" value=<?php echo $date;?>
                            required>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="time" class="col-sm-2 col-form-label">Time:</label>
                    <div class="col-sm-10">
                        <input type="time" name="appt" class="form-control" id="appt" value=<?php echo $time;?>
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">Time:</label>
                    <div class="col-sm-10">
                        <input type="number" name="price" class="form-control" id="price" value=<?php echo $price;?>
                            required>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-md">Update</button>
            </form>
        </div>
    </div>

</body>

</html>