
<?php
	session_start(); 

	$username = "";
	$email    = "";
	$gender = "";
	$age = "";
	$phone = "";
	$errors = array(); 

	$db = mysqli_connect('localhost', 'root', '', 'registration');

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>`
</head>
<body>
	<div class="header">
		<h2>Hompej Lab</h2>
	</div>
	<div class="content">
		<!-- login notif -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- user info -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welkam <strong><?php echo $_SESSION['username']; ?></strong></p>
			<?php 
				
				$username = $_SESSION['username'];
				$sql = "SELECT age, gender, phone FROM users where username = '$username' ";
				$result = $db->query($sql);

    			while($row = $result->fetch_assoc()) {
        		echo " <p>Gender: " . $row["gender"]. "<p>Age: " . $row["age"]."<p>Phone: " . $row["phone"]. "<br>";
				    }
			?>
			<!-- edit profile -->
		  	<p><a href="edit_profile.php">edit profile</a></p>
			<!-- logout -->
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		
				<?php endif ?>
	</div>
		
</body>
</html>