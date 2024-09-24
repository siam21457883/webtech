<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="../views/styles.css">
    <script src="../scripts/validate.js" defer></script>
    <script src="../scripts/ajaxValidation.js" defer></script> <!-- Include AJAX validation script -->
</head>
<body>

<div class="chngbg-img">
<div class="container">
    <form id="changePasswordForm" method="post" action="../controllers/changePasswordController.php" novalidate>
        <h1>Change Password</h1>

        <input type="email" class="field" id="email" name="email" placeholder="Enter Your Email" required>
        <span class="error" data-error="email"></span>

        <input type="password" class="field" id="old_password" name="old_password" placeholder="Enter Your Old Password" required>
        <span class="error" data-error="old_password"></span>

        <input type="password" class="field" id="new_password" name="new_password" placeholder="Enter Your New Password" required>
        <span class="error" data-error="new_password"></span>

        <input type="password" class="field" id="confirm_new_password" name="confirm_new_password" placeholder="Re-enter Your New Password" required>
        <span class="error" data-error="confirm_new_password"></span><br>

        <input type="submit" id="submit" value="Change Password"  onclick="pc()">
        <script>
        function pc() {
        alert("password changed!");
        }
        </script>
        <p align="center"><a href="../views/view.php">cancel</a></p>
    </form>
</div>
</div>

<?php if (isset($_SESSION['success'])): ?>
    <script>alert("<?php echo $_SESSION['success']; ?>");</script>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

</body>
</html>
