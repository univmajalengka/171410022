<?php
	session_start();
	if(isset($_SESSION["status"])){
		header("location:home.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Portal | Admin</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="shortcut icon" href="icon/status.png">
	<script defer src="../fontaw/js/all.js"></script>
</head>
<body>
	<h1>Admin Panel</h1>
	<div class="isi">
		<form name="login" action="logpros.php" method="POST">
			<table align="center" style="margin-top: 20px">
				<tr><td><img src="icon/login.png" height="120" width="120" style="margin-bottom: 10px"></td></tr>
				<tr><td style="text-align: left;">Username : </td></tr>
				<tr><td><i class="fas fa-user"></i><input type="text" name="username" placeholder="Enter username" autocomplete required></td></tr>
				<tr><td style="text-align: left;">Password : </td></tr>
				<tr><td><i class="fas fa-lock"></i><input type="password" name="password" placeholder="Enter password" autocomplete required></td></tr>
				<tr><td><input type="submit" value="LOGIN"></td></tr>
			</table>
		</form>
	</div>
</body>
</html>