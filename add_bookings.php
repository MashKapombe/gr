<?php 
include 'header.php';
include 'admin_navbar.php';
?>

<!DOCTYPE html>
<html>

<head>

    <title></title>
</head>
<style>
body {
    background-image: url(./assets/images/green_bus.png);
    height: 96vh;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.card {
    width: 40%;
}

p {
    text-align: center;
    color: red;
}

.heading {
    text-align: center;
}
</style>

<body>
    <div id='login-body'>


        <div class="card col-md-4 offset-md-4 mt-4">
            <div class="card-header-edge text-white ">
            </div>
            <div class="card-body">
                <div class="heading">
                    <h4>
                        Add bookings
                    </h4>
                </div>
                <form action="includes/add_bookings_page.php" method="POST" id="login-frm">
                    <div class="form-group">
                        <div class="mb-4 row">
                            <label for="ref_no" class="col-sm-2 col-form-label">RefNo</label>
                            <div class="col-sm-10">
                                <input type="number" name="ref_no" class="form-control" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="contact" class="col-sm-2 col-form-label">Contact </label>
                            <div class="col-sm-10">
                                <input type="tel" name="contact" class="form-control" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="bus_id" class="col-sm-2 col-form-label">BusId</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="bus_id" name="bus_id"
                                    placeholder="Number plate" required>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="from_location" class="col-sm-2 col-form-label">From:</label>
                            <div class="col-sm-10">
                                <select name="from_location" class="form-select" id="from_location" autocomplete="off"
                                    required>
                                    <option selected>Select from</option>
                                    <option value="Nairobi">Nairobi</option>
                                    <option value="Nakuru">Nakuru</option>
                                    <option value="Naivasha">Naivasha</option>
                                    <option value="Kisumu">Kisumu</option>
                                    <option value="Kisii">Kisii</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="to_location" class="col-sm-2 col-form-label">To:</label>
                            <div class="col-sm-10">
                                <select name="to_location" class="form-select" id="to_location" autocomplete="off"
                                    required>
                                    <option selected>Select destination</option>
                                    <option value="Nakuru">Nakuru</option>
                                    <option value="Nairobi">Nairobi</option>
                                    <option value="Naivasha">Naivasha</option>
                                    <option value="Kisumu">Kisumu</option>
                                    <option value="Eldoret">Eldoret</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="date" class="col-sm-2 col-form-label">Date:</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control" id="date" autocomplete="off"
                                    required>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="appt" class="col-sm-2 col-form-label">Time:</label>
                            <div class="col-sm-10">
                                <input type="time" name="appt" class="form-control" id="appt" autocomplete="off"
                                    required>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="price" class="col-sm-2 col-form-label">Price:</label>
                            <div class="col-sm-10">
                                <input type="number" name="price" class="form-control" id="price" autocomplete="off"
                                    required>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="status" class="col-sm-2 col-form-label">Status:</label>
                            <div class="col-sm-10">
                                <input type="text" name="status" class="form-control" id="status" autocomplete="off"
                                    required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary btn-md">Add</button>
                        </div>

                </form>
            </div>
        </div>

    </div>


</body>

</html>