<?php
$conn = mysqli_connect("localhost", "root", "", "sk");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch lost and found data
$sql = "SELECT title, description, status, image, created_time FROM posts ORDER BY created_time DESC";
$result = mysqli_query($conn, $sql);

$posts = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }
}

mysqli_close($conn);


?>
