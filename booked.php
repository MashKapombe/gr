<?php
include 'includes/db_connect.php';
include 'includes/functions.php';
include 'header.php';
include 'admin_navbar.php'; 
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
    <div class="container my-auto">
        <table class="table table-sm table-light table-striped table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ref Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Bus id</th>
                    <th scope="col">from</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
$sql="select * from booked";
//$sql = "select * from passengers where ref_no = ? cross join schedule where bus_id = ?";
$result=mysqli_query($conn, $sql);

if($result) {
    while($row=mysqli_fetch_assoc($result)) {
        $id=$row['id'];
        $ref_no=$row['ref_no'];
        $name=$row['name'];
        $contact=$row['contact'];
        $bus_id=$row['bus_id'];
        $from_location=$row['from_location'];
        $to_location=$row['to_location'];
        $date=$row['date'];
        $time=$row['time'];
        $price=$row['price'];
        $status=$row['status'];
        echo ' <tr>
<th scope="row">'.$id.'</th>
<td>'.$ref_no.'</td>
<td>'.$name.'</td>
<td>'.$contact.'</td>
<td>'.$bus_id.'</td>
<td>'.$from_location.'</td>
<td>'.$to_location.'</td>
<td>'.$date.'</td>
<td>'.$time.'</td>
<td>'.$price.'</td>
<td>'.$status.'</td>
<td>
<a href="edit_booked.php?editbkid='.$id.'"><button type="button" class="btn btn-primary">Edit</button></a>
<a href="delete_booked.php?deletebkid='.$id.'"><button type="button" class="btn btn-danger">Delete</button></a>
</td></tr>';

    }
}

?>
            </tbody>
        </table>
    </div>
</body>

</html>