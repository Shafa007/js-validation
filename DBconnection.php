<?php 

  function connect(){
    $conn = new mysqli("localhost", "rzzzr", "123", "wtg");
    if($conn->connect_error){
    	die("Database connection failed..." . $conn->connect_error);
    }

    return $conn;
}

?>