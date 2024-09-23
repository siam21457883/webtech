<?php
include '../models/User.php';  // Adjust path as needed
session_start();

if (!isset($_SESSION['name'])) {
    header('location:Login.php');
    exit;
}

$id = $_SESSION['name'];

if (isset($_POST['logout'])) {
    session_destroy();
    header('location:Login.php');
    exit;
}

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploads/' . $image;  // Corrected 'uplaods'

    $select_title = mysqli_query($conn, "SELECT title FROM `posts` WHERE title = '$title'") or die('query failed');
    if (mysqli_num_rows($select_title) > 0) {
        $message[] = 'Same post already exists!';
    } else {
        $insert_title = mysqli_query($conn, "INSERT INTO `posts` (`title`, `description`, `status`, `image`) VALUES ('$title', '$description', '$status', '$image')") or die('query failed');
        if ($insert_title) {
            if ($image_size > 2000000) {
                $message[] = 'Image size is too large';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Image added successfully';
            }
        }
    }
}
?>
