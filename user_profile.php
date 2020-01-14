<?php 

	$username = "";
	$email    = "";
	$gender = "";
	$age = "";
	$phone = "";
	$errors = array(); 

	$db = mysqli_connect('localhost', 'root', '', 'registration');

	// post profile
	if (isset($_POST['update_profile'])){
		$gender = mysqli_real_escape_string($db, $_POST['gender']);
		$age = mysqli_real_escape_string($db, $_POST['age']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$username = mysqli_real_escape_string($db, $_POST['username']);

		echo 

		$query = "UPDATE users SET `gender` = 'm', `age` = '$age', `phone` = '$phone' 
					where username = '$username'";

			mysqli_query($db, $query);
			header('location: index.php');
		
	}

?>