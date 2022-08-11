<?php 
include 'header.php';
include 'admin_navbar.php';
include 'includes/db_connect.php';
include 'includes/functions.php';

$id = $_GET['editpid'];
//display all data
$sql = "select * from passengers where id = '$id'";
$result = mysqli_query($conn,$sql);
//to display only once thats why not while loop
$row = mysqli_fetch_assoc($result);
$ref_no = $row['ref_no'];
$name = $row['name'];
$contact = $row['contact'];

//update
if(isset($_POST['submit'])){
    $ref_no = $_POST['ref_no'];
    $name = $_POST['name'];
    $contact = $_POST['contact']; 
    
    /*if(busExists($conn, $bus_id) == !false){
        header("Location: edit_bus.php?error=busexists");
        exit();
    }*/
    
    $sql = "update passengers set id = '$id', ref_no = '$ref_no', name = '$name', contact = '$contact' where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: view_passenger.php');
    }else{
        die("Connection failed: " . $conn->connect_error);
    }
}

?>
<!DOCTYPE html>
<html>

<head>

    <title>Passengers</title>
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
                        <label for="ref_number">Ref number</label>
                        <input type="text" name="ref_number" class="form-control" autocomplete="off"
                            value=<?php echo $ref_number;?> required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" autocomplete="off" value=<?php echo $name;?>
                            required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="tel" name="contact" class="form-control" autocomplete="off"
                            value=<?php echo $contact;?> required>
                    </div>

                    <div class=" form-group text-right">
                        <button type="submit" name="submit" class="btn btn-success">Update</button><br>
                    </div>

                </form>
            </div>
        </div>

    </div>


</body>

</html>