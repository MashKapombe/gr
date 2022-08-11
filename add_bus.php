<?php
include 'header.php';
include 'admin_navbar.php';

?>
<html>
<style>
body {
    background-image: url(./assets/images/green_bus.png);
    height: 96vh;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

p {
    color: red;

}
</style>

<body>
    <div class="container">

        <div class="form-details">
            <?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
        }
        else if($_GET["error"] == "invalidseats"){
            echo "<p>Seats are not greater than 40!</p>";
        }
        else if($_GET["error"] == "busexists"){
            echo "<p> The Bus Number Plate exists!</p>";
        }
        else if($_GET["error"] == "none"){
            echo "<h5>Bus added.</h5>";
        }
    }
     
    ?>

            <form action="includes/add_bus_page.php" method="POST">
                <div class="form-group row">
                    <label for="bus_id" class="col-sm-2 col-form-label">BusId:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="bus_id" name="bus_id" placeholder="Number plate">
                    </div>
                </div>

                <div class="form-group mt-4 row">
                    <label for="bus_name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="bus_name" name="bus_name">
                            <option selected>Select name</option>
                            <option value="First class">First class</option>
                            <option value="Second class">Second class</option>
                            <option value="Third class">Third class</option>
                            <option value="Fourth class">Fourth class</option>
                            <option value="Fifth class">Fifth class</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mt-4 row">
                    <label for="seats" class="col-sm-2 col-form-label">Seats:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="seats" name="seats" placeholder="Number of seats"
                            value="40">
                    </div>
                </div>

                <div class=" form-group mt-3 row">
                    <div class="col-sm-10">
                        <button type="submit" name="addbus" class="btn btn-primary">Add Bus</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</body>

</html>