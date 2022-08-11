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
                    <th scope="col">Number Plate</th>
                    <th scope="col">Bus name</th>
                    <th scope="col">seats</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
$sql="select * from buses";
$result=mysqli_query($conn, $sql);

if($result) {
    while($row=mysqli_fetch_assoc($result)) {
        $id=$row['id'];
        $bus_id=$row['bus_id'];
        $bus_name=$row['bus_name'];
        $seats=$row['seats'];
        echo ' <tr>
<th scope="row">'.$id.'</th>
<td>'.$bus_id.'</td>
<td>'.$bus_name.'</td>
<td>'.$seats.'</td>
<td>
<a href="edit_bus.php?editbid='.$id.'"><button type="button" class="btn btn-primary">Edit</button></a>
<a href="delete_bus.php?deletebid='.$id.'"><button type="button" class="btn btn-danger">Delete</button></a>
</td></tr>';

    }
}

?>
            </tbody>
        </table>
    </div>
</body>

</html>