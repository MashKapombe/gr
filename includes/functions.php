<?php 
function emptyInputSignup($name, $username, $password, $cpassword){
    $result;
    if(empty($name) || empty($username) || empty($password) || empty($cpassword)){
        
        $result = true;
    }
    else{
        $result = false;
    }
    return $result; 
}

function invalidName($name){
    $result;
    if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
        
        $result = true;
    }
    else{
        $result = false;
    }
    return $result; 
}
function invalidUname($username){
    $result;
    if(!preg_match("/^[a-zA-Z-' ]*$/", $username)){
        
        $result = true;
    }
    else{
        $result = false;
    }
    return $result; 
}




function pwdMatch($password, $cpassword){
    $result;
    if($password !== $cpassword){
        
        $result = true;
    }
    else{
        $result = false;
    }
    return $result; 
}


function unameExists($conn, $username){
  $sql = "select * from users where username = ?;";
  //prepared stmt without user input/prvente any code being injected in db
  $stmt = mysqli_stmt_init($conn);
  //check if prepared stmt will fail/succeed
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../admin_signup.php?error=stmtfailed");
        exit();
  }
  //if succeeded pass user data to db
  mysqli_stmt_bind_param($stmt, "s", $username);
  //execute stmt
  mysqli_stmt_execute($stmt);

  //grab data from db/
  $resultData = mysqli_stmt_get_result($stmt);
  //check if there is a result from the stmt
  //if there is data from db result = true send to login form
  if($row = mysqli_fetch_assoc($resultData)){
    //return all the data if user exists in db
    return $row;   
  }else{
    $result = false;
    return $result;
  }
  //close the prepared stmt
  mysqli_stmt_close($stmt);
}


function createUser($conn, $name, $username, $password){
    $sql = "insert into users (name,username,password)
    values (?,?,?);";
    //prepared stmt without user input/prvente any code being injected in db
    $stmt = mysqli_stmt_init($conn);
    //check if prepared stmt will fail/succeed
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../admin_signup.php?error=stmtfailed");
          exit();
    }

    $hashedpass = password_hash($password, PASSWORD_DEFAULT);
    //if succeeded pass user data to db
    mysqli_stmt_bind_param($stmt, "sss", $name, $username, $hashedpass);
    //execute stmt
    mysqli_stmt_execute($stmt);
    //close the prepared stmt
    mysqli_stmt_close($stmt);
    
    header("Location: ../admin_login.php?error=none");
          exit();
    
}


//login functions
function emptyInputLogin($username, $password){
    $result;
    if(empty($username) || empty($password)){
        
        $result = true;
    }
    else{
        $result = false;
    }
    return $result; 
}

function loginUser($conn, $username, $password){
    $unameExists = unameExists($conn, $username);
    
    if($unameExists === false){
        header("Location: ../admin_login.php?error=wrongusername");
          exit();
        
    }
    //check if db password and user password match check pass column of db,
    $passHashed = $unameExists[$password];
    $checkpass = password_verify($password, $passHashed);
    
//if passwords dont match
    if($checkpass === false){
        header("Location: ../admin_login.php?error=wrongpassword");
          exit();  
    }

    //if they match, login the user
    else if($checkpass === true){
        session_start();
        $_SESSION["id"] = $unameExists["id"];
        $_SESSION["username"] = $unameExists["username"];
        
        header("Location: ../admin_page.php");
          exit();
        
    }  
}
//buses
function emptyInputBus($bus_id, $bus_name, $seats){
    $result;
    if(empty($bus_id) || empty($bus_name) || empty($seats)){
        
        $result = true;
    }
    else{
        $result = false;
    }
    return $result; 
    
}

function invalidSeats($seats){
    $result;
    if($seats !== "40"){
        
        $result = true;
    }
    else{
        $result = false;
    }
    return $result; 
    
}

function busExists($conn, $bus_id){
    $sql = "select * from buses where bus_id = ?;";
    //prepared stmt without user input/prevent any code being injected in db
    $stmt = mysqli_stmt_init($conn);
    //check if prepared stmt will fail/succeed
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../add_bus.php?error=stmtfailed");
          exit();
    }
    //if succeeded pass bus data to db
    mysqli_stmt_bind_param($stmt, "s", $bus_id);
    //execute stmt
    mysqli_stmt_execute($stmt);
    
    //grab data from db
    $resultData = mysqli_stmt_get_result($stmt);
    //check if there is a result from the stmt
    //if there is data from db result = true send to view bus
    if($row = mysqli_fetch_assoc($resultData)){
      //return all the data if bus exists in db
      return $row;   
    }else{
      $result = false;
      return $result;
    }
    //close the prepared stmt
    mysqli_stmt_close($stmt);
  }
    

 function addBus($conn, $bus_id, $bus_name, $seats){
    $sql = "insert into buses (bus_id,bus_name,seats)
    values (?,?,?);";
    //prepared stmt without user input/prvente any code being injected in db
    $stmt = mysqli_stmt_init($conn);
    //check if prepared stmt will fail/succeed
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../add_bus.php?error=stmtfailed");
          exit();
    }

    mysqli_stmt_bind_param($stmt, "ssi", $bus_id, $bus_name, $seats);
    //execute stmt
    mysqli_stmt_execute($stmt);
    //close the prepared stmt
    mysqli_stmt_close($stmt);
    
    header("Location: ../view_bus.php?error=none");
          exit();    
    
 }
 

 //book
 function emptyInputBook($from_location, $to_location, $date, $time){
    $result;
    if(empty($from_location) || empty($to_location) || empty($date) || empty($time)){
        
        $result = true;
    }
    else{
        $result = false;
    }
    return $result; 
    
 }
 
 function createBook($conn, $from_location, $to_location, $date, $time){
    $sql = "insert into book(from_location,to_location,date,time)
    values (?,?,?,?);";
    //prepared stmt without user input/prvente any code being injected in db
    $stmt = mysqli_stmt_init($conn);
    //check if prepared stmt will fail/succeed
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../book.php?error=stmtfailed");
          exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $from_location, $to_location, $date, $time);
    //execute stmt
    mysqli_stmt_execute($stmt);
    //close the prepared stmt
    mysqli_stmt_close($stmt);
    
    header("Location: ../ticket.php?error=none");
          exit();
    
 }


 //schedule functions
 function emptyInputSchedule($bus_id, $from_location, $to_location, $date, $the_time, $price){
    $result;
    if(empty($bus_id) || empty($from_location) || empty($to_location)|| empty($date)|| empty($the_time)|| empty($price)){
        
        $result = true;
    }
    else{
        $result = false;
    }
    return $result; 
    
 }
 
 function invalidPrice($price){
    $result;
    if (is_numeric($price) === false) {  
       $result = true;
    }
    else{
        $result = false;
    }
    return $result; 
}

function fromToMatch($from_location,$to_location){
    $result;
    if($from_location === $to_location){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result; 
} 

function addSchedule($conn,$bus_id, $from_location, $to_location, $date, $the_time, $price){
    $sql = "insert into schedule(bus_id,from_location,to_location,date,time,price)
    values('$bus_id','$from_location','$to_location','$date','$the_time','$price')";
   $result = mysqli_query($conn, $sql);
   if($result){
       header('Location: ../view_schedule.php?error=none');
       //echo 'data inserted successfully';
   }else{
       die("Connection failed: " . $conn->connect_error);
   }
}
//passenger
function emptyInputPass($ref_no,$name,$contact){
    $result;
    if(empty($ref_no) || empty($name) || empty($contact)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function invalidRef($ref_no){
    $result;
    if (is_numeric($ref_no) === false) {  
       $result = true;
    }
    else{
        $result = false;
    }
    return $result;
    
}
function invalidpName($name){
    $result;
    if(!preg_match("/^[a-zA-Z-' ]*$/", $name) && is_numeric($status)){
        
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidContact($contact){
    $result;
    if(!preg_match('/^[0-9]{10}+$/', $contact)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function refnoExists($conn,$ref_no){
    $sql = "select * from passengers where ref_no = ?;";
    //prepared stmt without user input/prevent any code being injected in db
    $stmt = mysqli_stmt_init($conn);
    //check if prepared stmt will fail/succeed
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../add_passenger.php?error=stmtfailed");
          exit();
    }
    //if succeeded pass passenger data to db
    mysqli_stmt_bind_param($stmt, "i", $ref_no);
    //execute stmt
    mysqli_stmt_execute($stmt);
    
    //grab data from db
    $resultData = mysqli_stmt_get_result($stmt);
    //check if there is a result from the stmt
    //if there is data from db result = true send to view bus
   if($row = mysqli_fetch_assoc($resultData)){
      //return all the data if pass exists in db
      return $row;   
    }else{
      $result = false;
      return $result;  
    }
    //close the prepared stmt
    mysqli_stmt_close($stmt);
    
}

function createPassenger($conn, $ref_no, $name, $contact){
$sql = "insert into passengers(ref_no,name,contact) values('$ref_no','$name','$contact')";
$result = mysqli_query($conn, $sql);
if($result){
//echo "succesful";
header("Location: ../view_passenger.php");
}else{
die("Connection failed: " . $conn->connect_error);
}
}

//bookings
function emptyBookings($ref_no,$name,$contact,$bus_id,$from_location,$to_location,$date,$the_time,$price,$status){
    $result;
    if(empty($ref_no) || empty($name) || empty($contact) || empty($bus_id) || empty($from_location) || empty($to_location) || empty($date) || empty($the_time) || empty($price) || empty($status)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;   
}

function invalidStatus($status){
      $result;
    if (!preg_match("/^[a-zA-Z-' ]*$/", $status)){  
       $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

 /*function passengerExists($conn,$ref_no,$name,$contact){
    $sql = "select * from passenger where ref_no = ?, name = ?, contact = ?;";
    //prepared stmt without user input/prevent any code being injected in db
    $stmt = mysqli_stmt_init($conn);
    //check if prepared stmt will fail/succeed
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../add_bookings.php?error=stmtfailed");
          exit();
    }
    //if succeeded pass  data to db
    mysqli_stmt_bind_param($stmt, "iss", $ref_no,$name,$contact);
    //execute stmt
    mysqli_stmt_execute($stmt);
    
    //grab data from db
    $resultData = mysqli_stmt_get_result($stmt);
    //check if there is a result from the stmt
    //if there is data from db result = true send to view bus
    if($row = mysqli_fetch_assoc($resultData)){
      //return all the data if bus exists in db
      return $row;   
    }else{
      $result = false;
      return $result;
    }
    //close the prepared stmt
    mysqli_stmt_close($stmt);
    
}*/

/*function scheduleExists($conn,$bus_id,$from_location,$to_location,$date,$the_time,$price){
    $sql = "select * from schedule where bus_id = ?,from_location = ?,to_location = ?, date = ?, the_time= ?, price = ? ;";
    //prepared stmt without user input/prevent any code being injected in db
    $stmt = mysqli_stmt_init($conn);
    //check if prepared stmt will fail/succeed
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../add_bookings.php?error=stmtfailed");
          exit();
    }
    //if succeeded pass bus data to db
    mysqli_stmt_bind_param($stmt, "sssssi", $bus_id,$from_location,$to_location,$date,$the_time,$price);
    //execute stmt
    mysqli_stmt_execute($stmt);
    
    //grab data from db
    $resultData = mysqli_stmt_get_result($stmt);
    //check if there is a result from the stmt
    //if there is data from db result = true send to view bus
    if($row = mysqli_fetch_assoc($resultData)){
      //return all the data if bus exists in db
      return $row;   
    }else{
      $result = false;
      return $result;
    }
    //close the prepared stmt
    mysqli_stmt_close($stmt);
    
}*/

function addBookings($conn,$ref_no,$name,$contact,$bus_id,$from_location,$to_location,$date,$the_time,$price,$status){
    $sql = "insert into booked(ref_no,name,contact,bus_id,from_location,to_location,date,time,price,status) values('$ref_no','$name','$contact','$bus_id','$from_location','$to_location','$date','$the_time','$price','$status')";
    $result = mysqli_query($conn, $sql);
    if($result){
        //echo "succesful";
        header("Location: ../booked.php");
        }
        else{
        die("Connection failed: " . $conn->connect_error);
        }
}

?>