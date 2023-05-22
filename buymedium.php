<?php
// December 2022
// Start user session
session_start();
// If the user is not logged in then redirect to the login
if (!isset($_SESSION['loggedin'])) 
{
	header('Location: login.html');
	exit;
}

// Localhost connection to MySQL Database
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.

$id = $_SESSION['id'];

$stmt = "UPDATE `accounts` SET `pid` = '2' WHERE ID = '$id'";
if(mysqli_query($con, $stmt)){
    //echo "Record was updated successfully.";
} else {
    //echo "ERROR: Could not able to execute $stmt. " 
    //. mysqli_error($con);
} 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<script src="https://kit.fontawesome.com/c7d1c16969.js" crossorigin="anonymous"></script>
	</head>

	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>TRU-Network</h1>
				<a href="home.php"><i class="fa-solid fa-house"></i>Home</a>
        		<a href="plans.php"><i class="fa-solid fa-mobile-screen"></i>Plans</a>
				<a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
			</div>
		</nav>
		
		<div class="content">
			<h2>Medium Plan acquired</h2>
			<div>
				<p>Congrats!</p>
			</div>
		</div>
	</body>
</html>
