<?php 
include 'header.php';
include 'admin_navbar.php';
    
?>
<!DOCTYPE html>
<html>

<head>

    <title>Admin Login</title>
</head>
<style>
body {
    background-image: url(./assets/images/green_bus.png);
    height: 96vh;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
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
        else if($_GET["error"] == "wrongusername"){
            echo "<p>Username already taken!</p>";
        }
        else if($_GET["error"] == "wrongpassword"){
            echo "<p>You've entered a wrong password!</p>";
        }

    }
     
    ?>
                <form action="admin_page.php" method="POST" id="login-frm">
                    <div class="form-group">
                        <label>Username </label>
                        <input type="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div><br>
                    <div class="form-group text-right">
                        <button type="submit" name="login" class="btn btn-success">Login</button><br>
                        <a href="admin_signup.php">Click to signup</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>