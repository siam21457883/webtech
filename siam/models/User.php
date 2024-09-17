<?php 

function matchCredentials($pEmail, $pPassword) {

	$conn = mysqli_connect("localhost", "root", "", "sk");

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT id, email, password FROM users WHERE email = '$pEmail' AND password = '$pPassword'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result); 
		return $row; 
	}
	
	return false;
}

function registerUser($email, $password) {
	$conn = mysqli_connect("localhost", "root", "", "sk");

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT id FROM users WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		return false; 
	}

	$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
	$result = mysqli_query($conn, $sql);

	if ($result) {
		return true;
	} 
	
	return false;
}

?>
