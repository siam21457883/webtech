<?php
session_start();
require "../models/User.php";

// Fetch user input
$email = sanitize($_POST['email']);
$old_password = sanitize($_POST['old_password']);
$new_password = sanitize($_POST['new_password']);
$confirm_new_password = sanitize($_POST['confirm_new_password']);
$user_id = $_SESSION['user_id']; // Assuming user_id is stored in session

$isValid = true;

// Error messages initialization
$_SESSION['err1'] = "";
$_SESSION['err2'] = "";
$_SESSION['err3'] = "";

// Check if email matches the user
if (!emailMatches($user_id, $email)) {
    $_SESSION['err1'] = "Email does not match.";
    $isValid = false;
}

// Check if old password is correct
if (!passwordMatches($user_id, $old_password)) {
    $_SESSION['err2'] = "Old password is incorrect.";
    $isValid = false;
}

// Check if the new password fields are valid
if (empty($new_password)) {
    $_SESSION['err3'] = "Please fill up the new password.";
    $isValid = false;
}

// Ensure new password and confirm password match
if ($new_password !== $confirm_new_password) {
    $_SESSION['err4'] = "Passwords do not match.";
    $isValid = false;
}

// Proceed if everything is valid
if ($isValid) {
    if (changePassword($user_id, $new_password)) {
        $_SESSION['success'] = "Password changed successfully!";
        header("Location: ../views/Profile.php");
        exit(); // To stop further execution after redirection
    } else {
        $_SESSION['err5'] = "Password change failed.";
        header("Location: ../views/change_password.php");
        exit();
    }
} else {
    header("Location: ../views/change_password.php");
    exit();
}

// Sanitize function to avoid XSS or bad input
function sanitize($data) {
    return htmlspecialchars(trim($data));
}
?>
