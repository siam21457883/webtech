<?php

	include 'connection.php';
	session_start();

	$admin_id= $_SESSION['admin_name'];

	if(!isset($admin_id)){
		header('lcoation:login.php');
	}
	if(isset($_POST['logout'])){
		session_destroy();
		header('lcoation:login.php')
	}
?>