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
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Phone Plans</title>
		<script src="https://kit.fontawesome.com/c7d1c16969.js" crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<body style="background-color: #f3f4f7;">
    <nav class="navtop">
			<div>
				<h1>TRU-Network</h1>
        <a href="home.php"><i class="fa-solid fa-house"></i>Home</a>
				<a href="profile.php"><i class="fa-solid fa-circle-user"></i>Profile</a>
				<a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
			</div>
		</nav>

    <div class="content">
      <h2>Plans</h2>
    </div>
		<div class="row">
      <div class ="col">
          <div class="box">
            <h2><a href="buysmall.php">BASIC PLAN</a></h2>
            <ul>
              <li>$4.99/month</li>
              <li>3 GB of Data</li>
              <li>100 minutes</li>
              <li>100 texts</li>
            </ul>
          </div>
      </div>
      
      <div class ="col">
          <div class="box">
          <h2><a href="buymedium.php">MEDIUM PLAN</a></h2>
            <ul>
              <li>$14.99/month</li>
              <li>10 GB of Data</li>
              <li>500 minutes</li>
              <li>500 texts</li>
            </ul>
          </div>
      </div>

      <div class ="col">
          <div class="box">
          <h2><a href="buybig.php">BIG PLAN</a></h2>
            <ul>
              <li>$24.99/month</li>
              <li>30 GB of Data</li>
              <li>1500 minutes</li>
              <li>1500 texts</li>
            </ul>
          </div>
      </div>
  </div>
	</body>
</html>