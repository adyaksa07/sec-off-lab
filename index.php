
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
<style>
body
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 25%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}	
</style>
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
				<!-- Trigger/Open The Modal -->
				<button id="myBtn">View Profile</button>
				<!-- The Modal -->
				<div id="myModal" class="modal">
				  <!-- Modal content -->
				<div class="modal-content">
				    <span class="close">&times;</span>
				    <p>
				    <?php 
				$username = $_SESSION['username'];
				$sql = "SELECT age, gender, phone, username, email FROM users where username = '$username' ";
				$result = $db->query($sql);

    			while($row = $result->fetch_assoc()) {
        		echo "<p>Username: " . $row["username"]. "<p>Email: " . $row["email"]. " <p>Gender: " . $row["gender"]. "<p>Age: " . $row["age"]."<p>Phone: " . $row["phone"]. "<br>";
				    }
					?>
					</p>
				  </div>
				</div>
			<!-- edit profile -->
		  	<p><a href="edit_profile.php">edit propil</a></p>
		  	<!-- delete profile-->
		  	<p><a href="delete_profile.php">delet propil</a></p>
			<!-- logout -->
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>

			<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"> -->
		
				<?php endif ?>
	</div>
<script>
var modal = document.getElementById("myModal"); // modal
var btn = document.getElementById("myBtn"); // modal button
var span = document.getElementsByClassName("close")[0]; // x button
btn.onclick = function() 
	{ modal.style.display = "block"; 
}// click button open modal
span.onclick = function() 
	{ modal.style.display = "none"; 
} // click x close modal
window.onclick = function(event) 
	{ if (event.target == modal) { modal.style.display = "none";
	}
}// close on click outside modal
</script>
</body>
</html>