<?php
include 'db_connect.php' ;
include 'functions.php' ; 
 
 if(isset($_POST['submit'])){ 
    $ref_no=$_POST['ref_no'];
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $bus_id=$_POST['bus_id'];
    $from_location=$_POST['from_location'];
    $to_location=$_POST['to_location'];
    $date=$_POST['date'];
    $appt = $_POST['appt'];
    $the_time = date('h:i A', strtotime($appt));
    $price=$_POST['price'];
    $status=$_POST['status'];

    if(emptyBookings($ref_no,$name,$contact,$bus_id,$from_location,$to_location,$date,$the_time,$price,$status) == !false){
        header("Location: ../add_bookings.php?error=emptyinput");
        exit();
    }
    
    if(invalidStatus($status) == !false){
        header("Location: ../add_bookings.php?error=invalidstatus");
        exit();
    }
    /* if(passengerExists($conn,$ref_no,$name,$contact) == !true){
        header("Location: ../add_passenger.php?error=passengerdoesntexist");
        exit();
    }
     if(scheduleExists($conn,$bus_id,$from_location,$to_location,$date,$the_time,$price) == !true){
        header("Location: ../add_schedule.php?error=scheduledoesntexist");
        exit();
    }*/
     
  // if(passengerExists($conn,$ref_no,$name,$contact) == !false && scheduleExists($conn,$bus_id,$from_location,$to_location,$date,$the_time,$price) == !false){
        
        addBookings($conn,$ref_no,$name,$contact,$bus_id,$from_location,$to_location,$date,$the_time,$price,$status);
        
    //}
 

}else{
    header("Location: ../booked.php");
    exit();
}


?>