<?php
	include'connection.php';

	if(isset($_POST['submit-btn'])){
		$filter_name= filter_var($_POST['name'],FILTER_SANITIZE_STRING);
		$name=mysqli_real_escape_string($conn, $filter_name);

		$filter_email= filter_var($_POST['email'],FILTER_SANITIZE_STRING);
		$email=mysqli_real_escape_string($conn, $filter_email);

		$filter_password= filter_var($_POST['password'],FILTER_SANITIZE_STRING);
		$password=mysqli_real_escape_string($conn, $filter_password);

		$filter_cpassword= filter_var($_POST['cpassword'],FILTER_SANITIZE_STRING);
		$cpassword=mysqli_real_escape_string($conn, $filter_cpassword);

		$select_user= mysql_query($conn, "SELECT * FROM 'suer' WHERE email ='$email'") or die('query failed');

		if (mysqli_num_rows($select_user)>0){
			$message = 'suer already exist';
		}
		else{
			if($password!=$cpassword){
				$mesage = 'wrong password';
			}
			else{
				mysqli_query($conn, "INSERT INTO 'users'('name','email','password') VALUES('$name','$email','$password')") or die('query failed');
				$message[]='registered successfully';
				header('location: login.php');
			}
		}
	}
?>