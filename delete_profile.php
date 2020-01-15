<?php 
	include('server.php')
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delet Propil</title>
</head>
<body>
	<div class="header">
		<h2>Delet propil Lab</h2>
	</div>
	
	<form method="post" action="delete_profile.php">
	<!-- delete user info-->
		
			Press button below to proceed
			<p>
				<div class="input-group">
				<input type="hidden" name="gender" value="<?php echo $gender; ?>">
				<input type="hidden" name="age" value="<?php echo $age; ?>">
				<input type="hidden" name="phone" value="<?php echo $phone; ?>">
				<input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
				<button type="submit" class="btn" name="delete_profile">delete</button>
				</div>
	</div>
	</form>
		<p>
		<a href="index.php">back to index</a>	
</body>
</html>