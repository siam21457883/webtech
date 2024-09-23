<?php
// controllers/ShowDetailsController.php
session_start();
include '../models/PostModel.php';

function showDetails() {
    if (!isset($_GET['id'])) {
        header("Location: view.php");
        exit();
    }

    $postId = intval($_GET['id']); // Sanitize the input
    $post = getPostById($postId); // Fetch post details

    if (!$post) {
        header("Location: view.php"); // Redirect if post not found
        exit();
    }

    return $post;
}

// Call the function and store the result
$postDetails = showDetails();
?>
