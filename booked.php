<?php
include 'includes/db_connect.php';
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
                    <th scope="col">Schedule id</th>
                    <th scope="col">Ref Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
$sql="select * from booked";
$result=mysqli_query($conn, $sql);

if($result) {
    while($row=mysqli_fetch_assoc($result)) {
        $id=$row['id'];
        $schedule_id =$row['schedule_id'];
        $ref_no=$row['ref_no'];
        $name=$row['name'];
        $quantity=$row['quantity'];
        $status=$row['status'];
        echo ' <tr>
<th scope="row">'.$id.'</th>
<td>'.$schedule_id.'</td>
<td>'.$ref_no.'</td>
<td>'.$name.'</td>
<td>'.$quantity.'</td>
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