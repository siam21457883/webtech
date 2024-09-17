<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];
$conn = mysqli_connect("localhost", "root", "", "sk");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT image_name, image_path FROM gallery WHERE user_id = '$userId'";
$result = mysqli_query($conn, $sql);

$images = [];
while ($row = mysqli_fetch_assoc($result)) {
    $images[] = $row;
}

mysqli_close($conn);

if (isset($_SESSION['upload_error']) && !empty($_SESSION['upload_error'])) {
    echo "<p style='color:red;'>" . $_SESSION['upload_error'] . "</p>";
    unset($_SESSION['upload_error']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
    <link rel="stylesheet" type="text/css" href="../views/styles.css">
    <style>
       
        a {
            text-decoration: none; 
            color: blue; 
            padding: 10px 20px; 
            border: 2px solid blue; 
            display: inline-block;
        }

        

        footer {
            position: fixed;
            bottom: 0;
            right: 0;
            background-color: skyblue;
            color: black;
            border: 5px solid skyblue;
            padding: 10px;
            text-align: right;
            width: calc(100% - 20px);
            box-sizing: border-box; 
        }
       
    </style>
</head>
<body>

    <a href="../controllers/Logout.php">Logout</a>
    <a href="../views/index.php">Upload Image</a>
<header>
  <h1 align="center" >Upload Your Photos Here!</h1>
</header>
    <div class="container">
        <h1>Image Gallery</h1>
        <div class="gallery">
            <?php if (!empty($images)): ?>
                <?php foreach ($images as $image): ?>
                    <div class="gallery-item">
                        <img src="<?php echo htmlspecialchars($image['image_path']); ?>">
                        <p><?php echo htmlspecialchars($image['image_name']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No images found.</p>
            <?php endif; ?>
        </div>
    </div>
    <footer>
    <p>@copyright 2024</p>
    </footer>
</body>
</html>
