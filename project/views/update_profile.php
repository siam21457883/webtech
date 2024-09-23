<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" type="text/css" href="../views/styles.css">
    <script src="../scripts/validate.js" defer></script>
</head>
<body>
<div class="container">
    <form id="updateProfileForm" method="post" action="../controllers/UpdateProfileController.php" novalidate>
        <label>Update Profile</label>

        <input type="text" class="field" id="profile_name" name="name" value="<?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : ''; ?>" placeholder="Enter Your Name">
        <span class="error" data-error="name"></span>

        <input type="email" class="field" id="profile_email" name="email" value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" placeholder="Enter Your Email">
        <span class="error" data-error="email"></span>

        <input type="text" class="field" id="profile_contact" name="contact_number" value="<?php echo isset($_SESSION['contact_number']) ? htmlspecialchars($_SESSION['contact_number']) : ''; ?>" placeholder="Enter Your Contact Number">
        <span class="error" data-error="contact_number"></span>

        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="male" <?php echo isset($_SESSION['gender']) && $_SESSION['gender'] == 'male' ? 'checked' : '' ; ?>>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" <?php echo isset($_SESSION['gender']) && $_SESSION['gender'] == 'female' ? 'checked' : '' ; ?>>
        <label for="female">Female</label>
        <span class="error" data-error="gender"></span>

        <input type="submit" id="submit" value="Update Profile">
        <div id="message"></div>
    </form>
</div>
</body>
</html>
