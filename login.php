<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Lab</title>
</head>
<body>

	<div class="header">
		<h2>Lojin Lab</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Pass</label>
			<input type="password" name="password">
		</div>
		<p><div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Sign Up <a href="register.php">Disini</a>
		</p>
	</form>


</body>
</html>