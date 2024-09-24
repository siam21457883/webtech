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
<div class="bg-img">

<div class="container">
    <form method="post" action="../controllers/LoginController.php" novalidate>
        <h1 align="center">Login</h1>

        <input type="email" class="field" id="login_email" name="email" placeholder="Enter Your Email">
        <span class="error" data-error="login_email"></span>

        <input type="password" class="field" id="login_password" name="password" placeholder="Enter Your Password">
        <span class="error" data-error="login_password"></span><br>

        <input type="checkbox" onclick="showpw()">Show Password

        <script>
        function showpw() {
        var x = document.getElementById("login_password");
        if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        </script>

        <p align="center">
        <input  type="submit" id="submit" value="Login" align="center"></p>
        <p align="center">Do not have an account?<a href="../views/registration.php">Register</a></p>
    </form>
</div>
</div>

</body>
</html>
