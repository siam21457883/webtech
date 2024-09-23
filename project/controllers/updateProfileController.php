<?php
session_start();
require "../models/User.php";

$name = sanitize($_POST['name']);
$email = sanitize($_POST['email']);
$contact_number = sanitize($_POST['contact_number']);
$gender = sanitize($_POST['gender']);
$isValid = true;

$response = [];

if (empty($name) || empty($email) || empty($contact_number) || empty($gender)) {
    $response['message'] = "All fields are required.";
    echo json_encode($response);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['message'] = "Invalid email format.";
    echo json_encode($response);
    exit;
}

// Update the profile
if (updateUserProfile($_SESSION['user_id'], $name, $email, $contact_number, $gender)) {
    $response['message'] = "Profile updated successfully.";
} else {
    $response['message'] = "Profile update failed.";
}

echo json_encode($response);

function sanitize($data) {
    return htmlspecialchars(trim($data));
}
?>
