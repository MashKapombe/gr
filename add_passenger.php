<?php 
include 'header.php';
include 'admin_navbar.php';
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

.error {}
</style>

<body>
    <div id='login-body'>


        <div class="card col-md-4 offset-md-4 mt-4">
            <div class="card-header-edge text-white ">
            </div>
            <div class="card-body">
                <?php
                            if(isset($_GET["error"])){
                            if($_GET["error"] == "passengerdoesntexist"){
                                echo "<p>Add ref no first!</p>"; 
                            }
                            }
                            ?>

                <form action="includes/add_passenger_page.php" method="POST" id="login-frm">
                    <div class="form-group">
                        <label for="ref_no">Ref number</label>
                        <input type="text" name="ref_no" class="form-control" required>
                        <span class="error">
                            <?php
                            if(isset($_GET["error"])){
                            if($_GET["error"] == "emptyinput"){
                            echo "<p>Fill in the field!</p>";
                            }else if($_GET["error"] == "invalidref"){
                                echo "<p>Only digits required!</p>"; 
                            }else if($_GET["error"] == "refexists"){
                                echo "<p>ref no exists!</p>"; 
                            }
                            }
                            ?>

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                        <span class="error mb-2">
                            <?php
                            if(isset($_GET["error"])){
                            if($_GET["error"] == "emptyinput"){
                            echo "<p>Fill in the field!</p>";
                            }else if($_GET["error"] == "invalidname"){
                                echo "<p>Please put a valid name</p>"; 
                            }
                            }
                            ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="tel" name="contact" class="form-control" required>
                        <span class="error"> <?php
                            if(isset($_GET["error"])){
                            if($_GET["error"] == "emptyinput"){
                            echo "<p>Fill in the field!</p>";
                            }else if($_GET["error"] == "invalidcontact"){
                                echo "<p>Please put a valid phone number.</p>"; 
                            }
                            }
                            ?>
                        </span>
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