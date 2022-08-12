<?php
include 'db_connect.php';
include 'functions.php';

if(isset($_POST["add"])){
   // $id = $_POST['id'];
    $bus_id = $_POST['bus_id'];
    $from_location = $_POST['from_location'];
    $to_location = $_POST['to_location'];
    $date = $_POST['date'];
    $appt = $_POST['appt'];
    $the_time = date('h:i A', strtotime($appt));
    $price = $_POST['price']; 
    
    
   if(emptyInputSchedule($bus_id, $from_location, $to_location, $date, $the_time, $price) == !false){
      header("Location: ../add_schedule.php?error=emptyinput");
      exit();
    }

    if(invalidPrice($price) == !false){
        header("Location: ../add_schedule.php?error=invalidprice");
        exit();    
    }
    if(fromToMatch($from_location,$to_location) == !false){
        header("Location: ../add_schedule.php?error=choosedifflocations");
        exit();       
    }
   
     //add schedule
     if(busExists($conn,$bus_id) == !false){
     addSchedule($conn,$bus_id, $from_location, $to_location, $date, $the_time, $price);
     
     } else{
        header("Location: ../add_bus.php?error=addbusfirst");
        exit();
    }
    
  }
  else{
    header("Location: ../view_schedule.php");
    exit();
}




//error handling
/*$busErr = $fromErr = $toErr = $timeErr = $dateErr = $priceErr = "";
$bus_id = $from_location = $to_location = $date = $the_time = $price = "";

if(isset($_POST['add'])){

if (empty($_POST["bus_id"])) {
$busErr = "bus_id is required";
} else {
$bus_id = $_POST["bus_id"];
}

if (empty($_POST["from_location"])) {
$fromErr = "from is required";
} else {
$from_location = $_POST["from_location"];

}

if (empty($_POST["to_location"])) {
$toErr = "to required";
} else {
$to_location = $_POST["to_location"];
}


if (empty($_POST["date"])) {
$dateErr = "date required";
} else {
$date = $_POST["date"];
}
if (empty($_POST["the_time"])) {
$timeErr = "timerequired";
} else {
$the_time = $_POST["the_time"];
}

if (empty($_POST["price"])) {
$priceErr = "Price required";
} else {
$price = $_POST["price"];
if (!filter_var($price, FILTER_VALIDATE_INT) === false) {
$priceErr = "Invalid price";
}

}
}*/



/*$sql = "insert into schedule(bus_id,from_location,to_location,date,time,price)
values('$bus_id','$from_location','$to_location','$date','$the_time','$price')";
$result = mysqli_query($conn, $sql);
if($result){
header('Location: view_schedule.php');
//echo 'data inserted successfully';
}else{
die("Connection failed: " . $conn->connect_error);
}*/


/*if(emptyInputSchedule($bus_id, $from_location, $to_location, $date, $the_time, $price) == !false){
header("Location: ../add_schedule.php?error=emptyinput");
exit();
}

if(invalidUid($bus_id) == !false){
header("Location: ../add_schedule.php?error=invalidseats");
exit();
}
if(invalidPrice($price) == !false){
header("Location: ../add_schedule.php?error=invalidseats");
exit();
}
if(fromToMatch($from_location,$to_location ) == !false){
header("Location: ../add_schedule.php?error=choosedifflocations");
exit();

//add schedule
add_schedule($conn,$bus_id, $from_location, $to_location, $date, $the_time, $price);

}
}else{
header("Location: ../admin_login.php");
exit();
}*/
?>