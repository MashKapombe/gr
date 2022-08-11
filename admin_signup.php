<?php 

include 'header.php';
include 'admin_navbar.php';

?>
<!DOCTYPE html>
<html>

<head>

    <title>Admin signup</title>
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

                <?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
        }
        else if($_GET["error"] == "invalidname"){
            echo "<p>Enter a valid name!</p>";
        }
        else if($_GET["error"] == "invalidusername"){
            echo "<p>Enter a valid username!</p>";
        }
        else if($_GET["error"] == "passwordsdontmatch"){
            echo "<p>passwords don't match!</p>";
        }
        else if($_GET["error"] == "usernameexists"){
            echo "<p>Username already taken!</p>";
        }
        else if($_GET["error"] == "none"){
            echo "<h5>You have signed up.</h5>";
        }
    }
     
    ?>
                <form action="includes/admin_signup_page.php" method="POST" id="login-frm">
                    <div class="form-group">
                        <label> Full Name</label>
                        <input type="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Username </label>
                        <input type="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" name="cpassword" class="form-control" required>
                    </div><br>
                    <div class="form-group text-right">
                        <button type="submit" name="signup" class="btn btn-success">Signup</button><br>

                        <a href="admin_login.php">Click to login</a>
                    </div>

                </form>
            </div>
        </div>

    </div>


</body>

</html>