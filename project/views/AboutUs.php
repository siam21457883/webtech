<?php
session_start();
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../views/styles.css">
    <title>About Us</title>
</head>
<body>
 
<div class="topnav">
    <a href="Home.php">Home</a>
    <a href="LostandFound.php">Lost & Found</a>
    <a class="active" href="#">About Us</a>
    <a href="../controllers/Logout.php">Logout</a>
    <div class="search-container">
        <form action="/action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
 
<div class="aboutbody">
    <div class="container">
        <h1>About Us</h1>
        <p>Welcome to our website! We are dedicated to providing the best services to our users.Lost Pet Reunite is an innovative online platform dedicated to helping pet owners find their lost animals and facilitating the return of found pets. Our website allows users to easily register their lost pets by uploading photos and essential details, creating a community-driven resource for reuniting pets with their families.</p>
        <p>Key Features:</p>
        <p><b>User-Friendly Registration:</b> Pet owners can quickly create an account to manage their listings. The simple login process ensures a secure and personalized experience.</p>
        <p><b>Lost Pet Registration:</b> Users can upload a photo of their lost pet along with important information such as the pet's name, breed, color, age, and last known location. This visual aspect enhances recognition and increases the chances of a successful reunion.</p>
        <p><b>Found Pet Submission:</b> Individuals who find a pet can easily register them on the platform by uploading a photo and providing details. This feature encourages the community to participate actively in helping lost pets return home.</p>
        <p>Thank you for visiting us, and we hope you find everything you’re looking for!</p>

<footer>
<p>&copy; 2024 Amatul Wahid Prottasha</p>
</footer>
    </div>
</div>
 

 
</body>
</html>