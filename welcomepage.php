<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
</head>
<body style="background-color: #CCD1D1 ">

	<h1>Welcome, <?php if(isset($_SESSION['username'])){ 
		echo $_SESSION['username'];
}
else{
	header("Location: logout.php");
}
?>
	</h1>

	<br><br>
	<h2>
	<p align="right";>
    <a href="logout.php">Logout</a></h2></p><br>
    

    
</body>
</html>