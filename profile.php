<?php
// Start user session
session_start();
// If the user is not logged in redirect to the login
if (!isset($_SESSION['loggedin'])) {
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
$stmt = $con->prepare('SELECT password, email, phone, first_name, last_name, pid FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $phone, $first_name, $last_name, $pid);
$stmt->fetch();
$stmt->close();

$sql = "SELECT plan_name FROM plans WHERE pid='$pid'";
$stmt = $con->query($sql); 
if($stmt)
{
  $arr = mysqli_fetch_assoc($stmt);
}
//Uses PHP's Null Coalescing Operator to account for the possibly non-existing array key.
$plan_name = $arr['plan_name'] ?? ' ';

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
			<h2>Profile</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
          <tr>
						<td>First Name:</td>
						<td><?=$first_name?></td>
					</tr>
          <tr>
						<td>Last Name:</td>
						<td><?=$last_name?></td>
					</tr>
          <tr>
						<td>Phone Number:</td>
						<td><?=$phone?></td>
					</tr>
				</table>
			</div>
		</div>
    <div class="content">
			<h2>Plan</h2>
			<div>
      <table>
					<tr>
						<td>Current Plan:</td>
						<td><?=$plan_name?></td>
					</tr>
			</div>
		</div>
	</body>
</html>