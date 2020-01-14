<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$gender = "";
	$age = "";
	$phone = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect db
	$db = mysqli_connect('localhost', 'root', '', 'registration');

// login
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
	// regis
	if (isset($_POST['reg_user'])) {
		// fetch input
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// validasi
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if ($password_1 != $password_2) {array_push($errors, "Passwords do not match");}
		//if ($query = "SELECT * FROM users where 'username' = '$username'"){array_push($errors, "User already exist, OR");}
		//if ($query = "SELECT * FROM users where 'email' = '$email'"){array_push($errors, "Email already registered");}
		// regis if no error
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt pw
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Yu ar now logged in";
			header('location: index.php');
		}

	}
	// update profile
	if (isset($_POST['update_profile'])) {
		$gender = mysqli_real_escape_string($db, $_POST['gender']);
		$age = mysqli_real_escape_string($db, $_POST['age']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$query = '';
		if (!empty($gender) && !empty($age) && !empty($phone)) {
			$query = "UPDATE users SET gender = '$gender', age = '$age', phone = '$phone' 
					where username = '$username'";
		} else if (empty($gender) && !empty($age) && !empty($phone)){
			$query = "UPDATE users SET age = '$age', phone = '$phone' 
					where username = '$username'";
		} else if (!empty($gender) && empty($age) && !empty($phone)){
			$query = "UPDATE users SET gender = '$gender', phone = '$phone' 
					where username = '$username'";
		} else if (!empty($gender) && !empty($age) && empty($phone)){
		 	$query = "UPDATE users SET gender = '$gender', phone = '$phone' 
					where username = '$username'";
		} else if (!empty($gender) && empty($age) && empty($phone)){
			$query = "UPDATE users SET gender = '$gender' 
					where username = '$username'";
		} else if (empty($gender) && !empty($age) && empty($phone)){
			$query = "UPDATE users SET age = '$age' 
					where username = '$username'";
		} else if (empty($gender) && empty($age) && !empty($phone)){
			$query = "UPDATE users SET phone = '$phone' 
					where username = '$username'";
		}
		

		mysqli_query($db, $query);
		header('location: index.php');
	}

?>