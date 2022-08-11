<?php
include 'includes/db_connect.php';
include 'header.php';
include 'navbar.php'; 
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
    <div class="container mt-auto">
        <table class="table table-sm table-light table-striped table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Number Plate</th>
                    <th scope="col">From Location</th>
                    <th scope="col">To Location</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
    if(isset($_GET['find'])){
$filterValues = $_GET['find'];
$sql="select * from schedule where concat(bus_id,from_location,to_location,date,time,price) like '%filterValues%' ";
$result=mysqli_query($conn, $sql);

if($result) {
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $bus_id = $row['bus_id'];
        $from_location = $row['from_location'];
        $to_location = $row['to_location'];
        $date = $row['date'];
        $time = $row['time'];
        $price = $row['price'];
        echo ' <tr>
<th scope="row">'.$id.'</th>
<td>'.$bus_id.'</td>
<td>'.$from_location.'</td>
<td>'.$to_location.'</td>
<td>'.$date.'</td>
<td>'.$time.'</td>
<td>'.$price.'</td>
<td>
<a href="ticket.php><button type="button" class="btn btn-primary">Book</button></a>

</td></tr>';

    }
 }
}

   ?>
            </tbody>
        </table>
    </div>
</body>

</html>