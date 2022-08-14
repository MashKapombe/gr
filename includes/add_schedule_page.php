<?php
include 'db_connect.php';
include 'functions.php';

if(isset($_POST["add"])){
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

?>