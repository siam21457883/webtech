<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../views/styles.css">
    <script src="../scripts/validate.js" defer></script>
</head>
<body>

<a href="../views/registration.php">Register</a>
<div class="container">
    <form method="post" action="../controllers/LoginController.php" novalidate>
        <label>Login Form</label>

        <input type="email" class="field" id="login_email" name="email" placeholder="Enter Your Email">
        <span class="error" data-error="login_email"></span>

        <input type="password" class="field" id="login_password" name="password" placeholder="Enter Your Password">
        <span class="error" data-error="login_password"></span>

        <input type="submit" id="login_submit" value="Login">
    </form>
</div>

</body>
</html>
