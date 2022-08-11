<?php
include 'header.php';
include 'navbar.php';
include 'includes/db_connect.php';

$sql = 'insert into';

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

    <div class="container">

        <div class="form-heading col-md-12">
            <h3>Fill in the details below </h3>
        </div>

        <div class="form-details">

            <form action="book_page.php" method="POST">

                <div class="mb-4 row">
                    <label for="from_location" class="col-sm-2 col-form-label">From:</label>
                    <div class="col-sm-10">
                        <select name="from_location" class="form-select" id="from_location" required>
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
                        <select name="to_location" class="form-select" id="to_location" required>
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
                        <input type="date" name="date" class="form-control" id="date" required>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="appt" class="col-sm-2 col-form-label">Time:</label>
                    <div class="col-sm-10">
                        <input type="time" name="appt" class="form-control" id="appt" required>
                    </div>
                </div>
                <button type="submit" name="find" class="btn btn-primary btn-md">Find</button>
            </form>
        </div>
    </div>

</body>

</html>