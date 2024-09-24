<?php
session_start();
require "../models/User.php";

$response = [];

// Sanitize input data
$email = $_SESSION['email']; // Get the logged-in user's email from the session
$contact_number = sanitize($_POST['contact_number']);
$gender = sanitize($_POST['gender']);
$password = sanitize($_POST['password']);

// Validate required fields
if (empty($contact_number) || empty($gender) || empty($password)) {
    $response['message'] = "All fields are required.";
    echo json_encode($response);
    exit;
}

// Verify current password
if (!passwordMatches($_SESSION['user_id'], $password)) {
    $response['message'] = "Incorrect password.";
    echo json_encode($response);
    exit;
}

// Update the profile
if (updateUserProfile($_SESSION['user_id'], null, $email, $contact_number, $gender)) {
    $response['message'] = "Profile updated successfully.";
} else {
    $response['message'] = "Profile update failed.";
}

echo json_encode($response);

function sanitize($data) {
    return htmlspecialchars(trim($data));
}
?>
