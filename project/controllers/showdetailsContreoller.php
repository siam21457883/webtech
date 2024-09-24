<?php
include 'user.php';

function getPostDetails(&id){
    $conn = getDatabaseConnection();
    $sql = "SELECT title, status, description, image,, created_time FROM posts WHERE id= ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $post = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $post;
}
?>
