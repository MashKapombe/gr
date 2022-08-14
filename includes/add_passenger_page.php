<?php
include 'db_connect.php';
include 'functions.php';

if(isset($_POST['submit'])){
$ref_no = $_POST['ref_no'];
$name = $_POST['name'];
$contact = $_POST['contact'];

if(emptyInputPass($ref_no,$name,$contact) == !false){
    header("Location: ../add_passenger.php?error=emptyinput");
    exit();
}
if(invalidRef($ref_no) == !false){
    header("Location: ../add_passenger.php?error=invalidref");
    exit();
}
if(refnoExists($conn,$ref_no) == !false){
    header("Location: ../add_passenger.php?error=refexists");
    exit();
}

if(invalidpName($name) == !false){
    header("Location: ../add_passenger.php?error=invalidname");
    exit();
}

if(invalidContact($contact) == !false){
    header("Location: ../add_passenger.php?error=invalidcontact");
    exit();
}
 
createPassenger($conn, $ref_no, $name, $contact);

}
else{
    header("Location: ../view_passenger.php");
    exit();
}


?>