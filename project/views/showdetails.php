<?php
session_start();

include '../controllers/ShowDetailsController.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../views/styles.css">
</head>
<body>

<div class="topnav">
    <a class="active" href="view.php">Home</a>
    <a href="LostandFound.php">Lost & Found</a>
    <a href="AboutUs.php">About Us</a>
    <a href="update_profile.php">Update Profile</a>
    <a href="../controllers/Logout.php">Logout</a>
</div>

<div class="homebody">
    <div class="card">
        <div class="containerbox">
            <img src="../views/uploads/<?php echo htmlspecialchars($postDetails['image']); ?>" alt="<?php echo htmlspecialchars($postDetails['title']); ?>" style="width:100%">
            <h2 id="cardtitle"><?php echo htmlspecialchars($postDetails['title']); ?></h2>
            <p class="title"><?php echo htmlspecialchars(ucfirst($postDetails['status'])); ?></p>
            <p class="desc"><?php echo htmlspecialchars($postDetails['description']); ?></p>
            <p class="created_time"><?php echo htmlspecialchars($postDetails['created_time']); ?></p>
        </div>
    </div>
</div>

<footer>
    <p>@copyright Ahmed Islam Siam</p>
</footer>
</body>
</html>
