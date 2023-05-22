<?php
// December 2022
session_start();
// Localhost connection to MySQL Database
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// If an error with the connection occurs, stop the script and display the error.
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Check and verify login info submitted in login form
if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}

// Prepare SQL query on users in database
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) 
{
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
  if ($stmt->num_rows > 0) 
  {
    $stmt->bind_result($id, $password);
    $stmt->fetch();
    // Since account exists, verify the password.
    // Note: remember to use password_hash in your registration file to store the hashed passwords.
    if (password_verify($_POST['password'], $password)) 
    {
      // Create session from successful user login. Session is remembered on as data on server.
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['name'] = $_POST['username'];
      $_SESSION['id'] = $id;
      header('Location: home.php'); //goes to home page after logging in
    } 
    else 
    {
      // Incorrect password entered
      echo 'Incorrect username and/or password!';
      header('Location: login.html');
    }
  } 
  else 
  {
    // Incorrect username entered
    echo 'Incorrect username and/or password!';
    header('Location: login.html');
  }

	$stmt->close();
}
?>