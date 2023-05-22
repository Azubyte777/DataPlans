<?php
// Localhost connection to MySQL Database
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// If an error with the connection occurs, stop the script and display the error.
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Check if registration data was submitted
if (!isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone'], $_POST['first_name'], $_POST['last_name'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['first_name']) || empty($_POST['last_name'])) {
	// One or more values are empty.
	exit('Please complete the registration form');
}

// Ensure valid registration data is entered
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid!');
}
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
  exit('Username is not valid!');
}
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	exit('Password must be between 5 and 20 characters long!');
}
if (strlen($_POST['phone']) != 10) {
	exit('Phone number must be 10 characters long!');
}
if (preg_match('/^[a-zA-Z]+$/', $_POST['first_name']) == 0) {
  exit('First name is not valid!');
}
if (preg_match('/^[a-zA-Z]+$/', $_POST['last_name']) == 0) {
  exit('Last name is not valid!');
}
// Check if an account with the submitted username exists.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
	} else {
		// Username doesnt exists, insert new account
  if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email, phone, first_name, last_name) VALUES (?, ?, ?, ?, ?, ?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	  $stmt->bind_param('ssssss', $_POST['username'], $password, $_POST['email'], $_POST['phone'], $_POST['first_name'], $_POST['last_name']);
	  $stmt->execute();
    session_regenerate_id();
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['name'] = $_POST['username'];
    $_SESSION['id'] = $id;
    header('Location: home.php'); //goes home after logging in
  } else {
	  // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	  echo 'Could not prepare statement!';
  }
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();
?>