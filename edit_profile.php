<?php 
	include('server.php')
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Propil</title>
</head>
<body>
	<div class="header">
		<h2>Edit propil Lab</h2>
	</div>
	
	<form method="post" action="edit_profile.php">
	<!-- post user info-->
		
			<div class="input-group">
				<label>Gender (M/F)</label>
				<input type="text" name="gender" value="<?php echo $gender; ?>">
			</div>
			<div class="input-group">
				<label>Age</label>
				<input type="text" name="age" value="<?php echo $age; ?>">
			</div>
			<div class="input-group">
				<label>Phone</label>
				<input type="text" name="phone" value="<?php echo $phone; ?>">
				<input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>"
			</div>
			
			<p><div class="input-group">
				<button type="submit" class="btn" name="update_profile">Submit</button>
			</div>
			
		</form>
		<p>
		<a href="index.php">back to index</a>
			
		
		
</body>
</html>