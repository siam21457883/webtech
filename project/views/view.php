<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../controllers/viewController.php';

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
  <a class="active" href="#">Home</a>
  <a href="LostandFound.php">Lost & Found</a>
  <a href="AboutUs.php">About Us</a>
  <a href="update_profile.php">Update Profile</a>
  <a href="change_password.php">Change Password</a>
  <a href="../controllers/Logout.php">Logout</a>
  <div class="search-container">
    <form action="/action page">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

<div class="homebody">
    <div class="row">
        <?php foreach ($posts as $row): ?>
        <div class="column">
            <div class="card">
                <div class="containerbox">
                    <img src="../views/uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" style="width:100%">
                    <h2 id="cardtitle"><?php echo htmlspecialchars($row['title']); ?></h2>
                    <p class="title"><?php echo htmlspecialchars(ucfirst($row['status'])); ?></p>
                    
                    <?php if (isset($_SESSION['email'])): ?>
                        <p class="desc">Posted by: <?php echo htmlspecialchars($_SESSION['email']); ?></p> 
                    <?php endif; ?>
                    <p><a href="showdetails.php?id=<?php echo $row['id']; ?>" class="button">Show Details</a></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<footer>
    <p>@copyright Ahmed Islam Siam</p>
</footer>
</body>
</html>
