<?php
session_start();
require "../models/User.php";

$title = sanitize($_POST['title']);
$description = sanitize($_POST['description']);
$gender = isset($_POST['status']) ? sanitize($_POST['status']) : "";


$_SESSION['err1'] = "";
$_SESSION['err2'] = "";
$_SESSION['err3'] = "";

$_SESSION['title'] = "";
$_SESSION['description'] = "";
$_SESSION['status'] = "";
$_isValid = true;

if (empty($title)) {
    $_SESSION['err1'] = "Please write a title.";
    $isValid = false;
} else {
    $_SESSION['title'] = $title;
    }

if (empty($description)) {
    $_SESSION['err2'] = "Please write a description";
    $isValid = false;
}


if (empty($status)) {
    $_SESSION['err6'] = "Please select status";
    $isValid = false;
} else {
    $_SESSION['status'] = $status;
}

if ($isValid) {
    $isSubmitted = submitdata($title, $description, $status);
    if ($isSubmitted) {
        header("Location: ../views/view.php");
        exit();
    } else {
        
        $_SESSION['err4'] = "Registration Failed! Email already exists.";
        header("Location: ../views/Registration.php");
        exit();
    }
} else {
    header("Location: ../views/Registration.php");
    exit();
}


function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
