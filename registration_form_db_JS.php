<?php
    require 'DBinsert.php';
	$firstname =$lastname =$gender = $dob = $religion = $presentadd = $permanetadd = $phonenum = $email = $username = $password = "";
	$isValid = true;

	$firstnameErr = $lastnameErr = $genderErr = $dobErr = $religionErr = $presentaddErr = $permanetaddErr = $phonenumErr = $emailErr = $usernameErr = $passwordErr = "";

	$successfulMessage = $errorMessage = "";

	if($_SERVER['REQUEST_METHOD'] === "POST") {
        
        $firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$dob = $_POST['dob'];
		$religion = $_POST['religion'];
		$presentadd = $_POST['presentadd'];
        $permanetadd = $_POST['permanetadd'];
        $phonenum = $_POST['phonenum'];
        $email = $_POST['email'];

		$username = $_POST['username'];
		$password = $_POST['password'];

		if(empty($firstname)) {
			$firstnameErr = "First name can not be empty!";
			$isValid = false;
		}
		if(empty($lastname)) {
			$lastnameErr = "Last name can not be empty!";
			$isValid = false;
		}
		if(empty($_POST['gender'])) {
			$genderErr = "Gender can not be empty!";
			$isValid = false;
		}
		if(empty($dob)) {
			$dobErr = "Date of Birth can not be empty!";
			$isValid = false;
		}
		if(empty($religion)) {
			$religionErr = "Religion can not be empty!";
			$isValid = false;
		}
		if(empty($presentadd )) {
			$presentaddErr = "Present Address can not be empty!";
			$isValid = false;
		}
		if(empty($permanetadd )) {
			$permanetaddErr = "Permanet Address can not be empty!";
			$isValid = false;
		}
		if(empty($phonenum)) {
			$phonenumErr = "Phone Number can not be empty!";
			$isValid = false;
		}
		if(empty($email)) {
			$emailErr = "E-mail can not be empty!";
			$isValid = false;
		}
		
		if(empty($username)) {
			$usernameErr = "Username can not be empty!";
			$isValid = false;
		}
		if(empty($password)) {
			$passwordErr = "Password can not be empty!";
			$isValid = false;
		}

		if($isValid) {

			if(strlen($username) > 15){
				$usernameErr = "Username can not be upper than 10 characters!";
			$isValid = false;
		}
			if(strlen($password) > 8){
				$passwordErr = "Password max size 8 characters!";
			$isValid = false;
		}
		if($isValid){

			$firstname = test_input($firstname);
            $lastname  = test_input($lastname);
            $gender = test_input($_POST['gender']);
            $dob      = test_input($dob);
            $religion = test_input($_POST['religion']);
            $presentadd= test_input($presentadd);
            $permanetadd = test_input($permanetadd);
            $phonenum  = test_input($phonenum);
            $email = test_input($email);

			$username = test_input($username);
			$password = test_input($password);

			$response = register($firstname, $lastname, $gender, $dob, $religion, $presentadd, $permanetadd, $phonenum, $email, $username, $password);
			if($response) {
				$successfulMessage = "Successfully saved.";
			}
			else {
				$errorMessage = "Error while saving.";
			}
		}
	}
}
	function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>
</head>
<body style="background-color: #ABEBC6 ">

	<h1>Registration Form</h1>

	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" onsubmit="return isValid()" name="mForm" id="nForm">
		<fieldset>
			<legend>Registration Form:</legend>

			<label for="firstname">First Name:</label>
			<input type="text" name="firstname" id="firstname">
			<span style="color:red"><?php echo $firstnameErr; ?></span>

			<br><br>

			<label for="lastname">Last Name:</label>
			<input type="text" name="lastname" id="lastname">
			<span style="color:red"><?php echo $lastnameErr; ?></span>

			<br><br>
			<label for="gender">Gender<span style="color: red;">*</span>:</label>
			
			<br>
			<input type="radio" id="gender" name="gender" value="male">
			<label for="male">Male</label>
			<br>
			<input type="radio" id="gender" name="gender" value="female">
			<label for="female">Female</label>
			<br>
			<input type="radio" id="gender" name="gender" value="other">
			<label for="other"> other</label>
			<span style="color: red"><?php echo $genderErr; ?></span>

		<br><br>

			<label style="color:black" for="dob">Date of birth:</label>
 	        <input type="date" id="dob"name="dob">
 	        <span style="color:red"><?php echo $dobErr; ?></span>	

 	        <br><br>

 	        <label for="religion">Religion<span style="color: red;">*</span></label>
			<select id="religion" name="religion"> 
			
			<option value="" selected disabled>--Select--</option>
			<option value="muslim">Muslim</option>
			<option value="hindu">Hindu</option>
			<option value="christian">Christian</option>
		</select>
		<span style="color: red"><?php echo $religionErr; ?></span>

 	        <br><br>
		</fieldset>
		
		<fieldset>
			<legend>Contact Infromation:</legend>

 	        <label for="presentadd">Present Address:</label>
			<input type="text" name="presentadd" id="presentadd">
			<span style="color:red"><?php echo $presentaddErr; ?></span>

			<br><br>

			<label for="permanetadd">Permanent Address:</label>
			<input type="text" name="permanetadd" id="permanetadd">
			<span style="color:red"><?php echo $permanetaddErr; ?></span>

			<br><br>

			<label for="phonenum">Phone:</label>
			<input type="tel" name="phonenum" id="phonenum">
			<span style="color:red"><?php echo $phonenumErr; ?></span>
			<br><br>
             <label for="email">Email:</label>
 	         <input type="email" id="email"name="email">
 	         <span style="color:red"><?php echo $emailErr; 

 	         ?>
			<br><br>
			
 	 </fieldset>
 	 <fieldset>
 	 	<legend>Account Information:</legend>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username" value="<?php echo $username; ?>">
			<span style="color:red"><?php echo $usernameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"><?php echo $passwordErr; ?></span>

			
</fieldset>
<br><br>
			<input type="submit" name="submit" value="Register">
		
	</form>

	<p style="color:green;"><?php echo $successfulMessage; ?></p>
	<p style="color:red;"><?php echo $errorMessage; ?></p>


	<p>Back to <a href="login.php">Login</a></p>

	<script>
		function isValid()
		{
			var username=document.forms["mform"]["username"].value;
			if(username==="")
			{
				document.getElementById("usernameErr").innerHTML="Invalid...!!!";
				return false;
			}
		}
	</script>

</body>
</html>