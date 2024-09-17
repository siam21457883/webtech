<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
    <link rel="stylesheet" type="text/css" href="../views/styles.css">
</head>
<body>
  <a href="../views/login.php">Login</a>
<div class="container">

	<form method="post" action="../controllers/RegistrationController.php" novalidate>
		
		<label>Registration Form</label>

		<input type="email" class="field" id="email" name="email" value="<?php echo empty($_SESSION['email']) ? "" :  $_SESSION['email'] ?>" placeholder="Enter Your Email">
		<span><?php echo empty($_SESSION['err1']) ? "" :  $_SESSION['err1'] ?></span>
		
		<input type="password" class="field" id="password" name="password" value="<?php echo empty($_SESSION['password']) ? "" :  $_SESSION['password'] ?>" placeholder="Enter Your Password">
		<span><?php echo empty($_SESSION['err2']) ? "" :  $_SESSION['err2'] ?></span>
		
		<input type="password" class="field" id="confirm_password" name="confirm_password" value="<?php echo empty($_SESSION['confirm_password']) ? "" :  $_SESSION['confirm_password'] ?>" placeholder="Re-write Your Password">
		<span><?php echo empty($_SESSION['err3']) ? "" :  $_SESSION['err3'] ?></span>
		<br>

        <input type="text" class="field" id="contact_number" name="contact_number" value="<?php echo empty($_SESSION['contact_number']) ? "" : $_SESSION['contact_number'] ?>" placeholder="Enter Your Contact Number">
        <span><?php echo empty($_SESSION['err5']) ? "" : $_SESSION['err5'] ?></span>
        <br>

        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="male" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'male') ? 'checked' : '' ; ?>>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'female') ? 'checked' : '' ; ?>>
        <label for="female">Female</label>
        <span><?php echo empty($_SESSION['err6']) ? "" : $_SESSION['err6'] ?></span>
        <br>

		<input type="submit" id="submit" value="Register">
	</form>

	<?php echo empty($_SESSION['err4']) ? "" :  $_SESSION['err4'] ?>

</div>

</body>
</html>
