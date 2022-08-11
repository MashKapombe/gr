<?php
include "db_connect.php";
include "functions.php";

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];  

    //error handling fxns
    if(emptyInputLogin($username, $password) == !false){
        header("Location: ../admin_login.php?error=emptyinput");
        exit();
    }

    //login user
    loginUser($conn, $username, $password);
}
else {
    header("Location: ../admin_login.php");
    exit();
}


?>