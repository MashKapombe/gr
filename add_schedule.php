<?php
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

<style>
p {
    color: red;
}
</style>

<body>
    <div class="container my-3">
        <div class="form-heading col-md-12">
            <h3>Fill in the details below </h3>
        </div>
        <div class="form-details">
            <?php
                        if(isset($_GET["error"])) {
                        if($_GET["error"]=="scheduledoesntexist") {
                        echo "<p>Add schedule first!</p>";
                       }
                      }

                      ?>

            <form action="includes/add_schedule_page.php" method="POST">
                <div class="mb-3 row">
                    <label for="bus_id" class="col-sm-2 col-form-label">BusId</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="bus_id" name="bus_id" placeholder="Number plate"
                            required>
                        <span class="error">
                            <?php
                        if(isset($_GET["error"])) {
                        if($_GET["error"]=="emptyinput") {
                        echo "<p>Fill in this field!</p>";
                       }
                      }

                      ?>
                        </span>
                    </div>
                </div>
                <div class="mb-3 row"><label for="from_location" class="col-sm-2 col-form-label">From:</label>
                    <div class="col-sm-10">
                        <select name="from_location" class="form-select" id="from_location" autocomplete="off" required>
                            <option selected>Select from</option>
                            <option value="Nairobi">Nairobi</option>
                            <option value="Nakuru">Nakuru</option>
                            <option value="Naivasha">Naivasha</option>
                            <option value="Kisumu">Kisumu</option>
                            <option value="Kisii">Kisii</option>
                        </select>
                        <span class="error">
                            <?php 
                           if(isset($_GET["error"])) {
                           if($_GET["error"]=="emptyinput") {
                           echo "<p>Fill in this field!</p>";
                             }
                           }

                           ?>
                        </span>
                    </div>
                </div>
                <div class="mb-3 row"><label for="to_location" class="col-sm-2 col-form-label">To:</label>
                    <div class="col-sm-10">
                        <select name="to_location" class="form-select" id="to_location" autocomplete="off" required>
                            <option selected>Select destination</option>
                            <option value="Nakuru">Nakuru</option>
                            <option value="Nairobi">Nairobi</option>
                            <option value="Naivasha">Naivasha</option>
                            <option value="Kisumu">Kisumu</option>
                            <option value="Eldoret">Eldoret</option>
                        </select>
                        <span class="error">
                            <?php if(isset($_GET["error"])) {
                            if($_GET["error"]=="emptyinput") {
                           echo "<p>Fill in this field!</p>";
                              }
                             }

                            ?>
                        </span>
                    </div>
                </div>
                <div class="mb-3 row"><label for="date" class="col-sm-2 col-form-label">Date:</label>
                    <div class="col-sm-10">
                        <input type="date" name="date" class="form-control" id="date" required>
                        <span class="error">
                            <?php if(isset($_GET["error"])) {
                            if($_GET["error"]=="emptyinput") {
                            echo "<p>Fill in this field!</p>";
                              }
                             }

                          ?>
                        </span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="appt" class="col-sm-2 col-form-label">Time:</label>
                    <div class="col-sm-10">
                        <input type="time" name="appt" class="form-control" id="appt" required>
                        <span class="error">
                            <?php if(isset($_GET["error"])) {
                            if($_GET["error"]=="emptyinput") {
                            echo "<p>Fill in this fields!</p>";
                               }
                             } 

                          ?>
                        </span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">Price:</label>
                    <div class="col-sm-10">
                        <input type="number" name="price" class="form-control" id="price" autocomplete="off" required>
                        <span class="error">
                            <?php if(isset($_GET["error"])) {
                            if($_GET["error"]=="emptyinput") {
                            echo "<p>Fill in this field!</p>";
                              }

                            else if($_GET["error"]=="invalidprice") {
                           echo "<p>Invalid price!</p>";
                            }
                            }

                            ?>
                        </span>
                    </div>
                </div><button type="submit" name="add" class="btn btn-primary btn-md">Add</button>
            </form>
            <?php 
            if(isset($_GET["error"])) {
             if($_GET["error"]=="choosedifflocations") {
             echo "<p> Choose different locations!</p>";
               } else if($_GET["error"] == "none"){
                echo "<h5>You have signed up.</h5>";
            }
                 }

                ?>
        </div>
    </div>

</body>

</html>