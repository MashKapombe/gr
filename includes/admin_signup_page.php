<?php
include 'db_connect.php';
include 'functions.php';

if(isset($_POST["signup"])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    //error handling
    if(emptyInputSignup($name, $username, $password, $cpassword) == !false){
        header("Location: ../admin_signup.php?error=emptyinput");
        exit();
    }
    if(invalidName($name) == !false){
        header("Location: ../admin_signup.php?error=invalidname");
        exit();
    }
    if(invalidUname($username) == !false){
        header("Location: ../admin_signup.php?error=invalidusername");
        exit();
    }
    if(pwdMatch($password, $cpassword) == !false){
        header("Location: ../admin_signup.php?error=passwordsdontmatch");
        exit();
    }
    if(unameExists($conn, $username) == !false){
        header("Location: ../admin_signup.php?error=usernameexists");
        exit();
    }

    createUser($conn, $name, $username, $password);
    

}else{
    header("Location: ../admin_login.php");
    exit();
}

?>