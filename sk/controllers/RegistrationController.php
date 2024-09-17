<?php
session_start();
require "../models/User.php";

$email = sanitize($_POST['email']);
$password = sanitize($_POST['password']);
$confirm_password = sanitize($_POST['confirm_password']);
$contact_number = sanitize($_POST['contact_number']);
$gender = isset($_POST['gender']) ? sanitize($_POST['gender']) : "";
$isValid = true;

$_SESSION['err1'] = "";
$_SESSION['err2'] = "";
$_SESSION['err3'] = "";
$_SESSION['err4'] = "";
$_SESSION['err5'] = "";
$_SESSION['err6'] = "";
$_SESSION['email'] = "";
$_SESSION['password'] = "";
$_SESSION['contact_number'] = "";
$_SESSION['gender'] = "";

if (empty($email)) {
    $_SESSION['err1'] = "Please fill up the email properly.";
    $isValid = false;
} else {
    $_SESSION['email'] = $email;

    if (emailExists($email)) {
        $_SESSION['err1'] = "This email has already been used.";
        $isValid = false;
    }
}

if (empty($password)) {
    $_SESSION['err2'] = "Please fill up the password properly.";
    $isValid = false;
}

if ($password !== $confirm_password) {
    $_SESSION['err3'] = "Passwords do not match.";
    $isValid = false;
} else {
    $_SESSION['password'] = $password;
}

if (empty($contact_number)) {
    $_SESSION['err5'] = "Please fill up the contact number properly.";
    $isValid = false;
} else {
    $_SESSION['contact_number'] = $contact_number;
}

if (empty($gender)) {
    $_SESSION['err6'] = "Please select your gender.";
    $isValid = false;
} else {
    $_SESSION['gender'] = $gender;
}

if ($isValid) {
    $isRegistered = registerUser($email, $password, $contact_number, $gender);
    if ($isRegistered) {
        header("Location: ../views/Login.php");
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
