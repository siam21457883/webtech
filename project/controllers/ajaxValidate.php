<?php
session_start();
require "../models/User.php";

// Fetch user input
$email = sanitize($_POST['email']);
$old_password = sanitize($_POST['old_password']);
$user_id = $_SESSION['user_id']; // Assuming user_id is stored in session

$response = [
    'valid' => true,
    'emailError' => '',
    'oldPasswordError' => ''
];

// Check if email matches the user
if (!emailMatches($user_id, $email)) {
    $response['valid'] = false;
    $response['emailError'] = "Email does not match.";
}

// Check if old password is correct
if (!passwordMatches($user_id, $old_password)) {
    $response['valid'] = false;
    $response['oldPasswordError'] = "Old password is incorrect.";
}

// Send response back to the AJAX call
header('Content-Type: application/json');
echo json_encode($response);

// Sanitize function to avoid XSS or bad input
function sanitize($data) {
    return htmlspecialchars(trim($data));
}
?>
