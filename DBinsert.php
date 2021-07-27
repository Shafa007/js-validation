<?php 
require 'DBconnection.php';
function register($firstname ,$lastname ,$gender ,$dob ,$religion ,$presentadd ,$permanetadd ,$phonenum ,$email, $username, $password){
$conn = connect();
$sql = $conn->prepare("INSERT INTO USERS (firstname, lastname, gender, dob, religion, presentadd, permanetadd, phonenum, email, username, password) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
$sql->bind_param("sssssssssss", $firstname ,$lastname ,$gender ,$dob ,$religion ,$presentadd ,$permanetadd ,$phonenum ,$email, $username, $password);
return $sql->execute();
}
?>
