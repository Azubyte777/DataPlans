<?php
// December 2022
// Start user session
session_start();
// If the user is not logged in then redirect to the login
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<script src="https://kit.fontawesome.com/c7d1c16969.js" crossorigin="anonymous"></script>
	</head>

	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>TRU-Network</h1>
				<a href="profile.php"><i class="fa-solid fa-circle-user"></i>Profile</a>
        		<a href="plans.php"><i class="fa-solid fa-mobile-screen"></i>Plans</a>
				<a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
			</div>
		</nav>

		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
	</body>
</html>