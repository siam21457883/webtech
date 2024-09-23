<?php
include '../models/User.php'; 
session_start();


if (!isset($_SESSION['email'])) {
    header('location:../views/Login.php');
    exit;
}

$email = $_SESSION['email']; 

// Handle logout request
if (isset($_POST['logout'])) {
    session_destroy();
    header('location:../views/Login.php');
    exit;
}


$message = '';
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $image = $_FILES['image'];


    error_log("Title: $title, Description: $description, Status: $status, Email: $email");


    $result = submitLostAndFoundData($title, $description, $status, $image);


}


include '../views/LostandFound.php';
