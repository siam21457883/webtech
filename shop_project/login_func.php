<?php
	include'connection.php';

	if(isset($_POST['submit-btn'])){
		session_start();

		$filter_email= filter_var($_POST['email'],FILTER_SANITIZE_STRING);
		$email=mysqli_real_escape_string($conn, $filter_email);

		$filter_password= filter_var($_POST['password'],FILTER_SANITIZE_STRING);
		$password=mysqli_real_escape_string($conn, $filter_password);

		

		$select_user= mysql_query($conn, "SELECT * FROM 'suer' WHERE email ='$email'") or die('query failed');

		if (mysqli_num_rows($select_user)>0){
			$row= mysqli_fetch_assoc($select_user);
			if($row['user_type']=='admin'){
				$_SESSION['admin_name']=$row['name'];
				$_SESSION['admin_email']=$row['email'];
				$_SESSION['admin_id']=$row['id'];
				header('location:admin_pannel.php');
			}
			else if($row['user_type']=='user'){
				$_SESSION['user_name']=$row['name'];
				$_SESSION['user_email']=$row['email'];
				$_SESSION['user_id']=$row['id'];
				header('location:user_pannel.php');
			}
			else{
				$message[]='incorrect email or password';
			}
		}
	}
?>