<?php
include 'includes/db_connect.php';
include 'includes/functions';
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
                    <th scope="col">Id</th>
                    <th scope="col">Ref Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
$sql="select * from passengers";
$result=mysqli_query($conn, $sql);

if($result) {
    while($row=mysqli_fetch_assoc($result)) {
        $id=$row['id'];
        $ref_no=$row['ref_no'];
        $name=$row['name'];
        $contact=$row['contact'];
        echo ' <tr>
<th scope="row">'.$id.'</th>
<td>'.$ref_no.'</td>
<td>'.$name.'</td>
<td>'.$contact.'</td>
<td>
<a href="edit_passenger.php?editpid='.$id.'"><button type="button" class="btn btn-primary">Edit</button></a>
<a href="delete_passenger.php?deletepid='.$id.'"><button type="button" class="btn btn-danger">Delete</button></a>
</td></tr>';

    }
}

?>
            </tbody>
        </table>
    </div>
</body>

</html>