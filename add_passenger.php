<?php 
include 'header.php';
include 'admin_navbar.php';
include 'includes/db_connect.php';
include 'includes/functions.php';

if(isset($_POST['submit'])){
    $ref_no = $_POST['ref_no'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];

    $sql = "insert into passengers(ref_no,name,contact) values('$ref_no','$name','$contact')";
    $result = mysqli_query($conn, $sql);
    if($result){
        //echo "succesful";
        header("Location:view_passenger.php");
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
                        <label for="ref_no">Ref number</label>
                        <input type="text" name="ref_no" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="tel" name="contact" class="form-control" required>
                    </div>

                    <div class=" form-group text-center mt-3">
                        <button type="submit" name="submit" class="btn btn-primary">Add</button><br>
                    </div>

                </form>
            </div>
        </div>

    </div>


</body>

</html>