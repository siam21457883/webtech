<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<title>Log in page</title>
</head>
<body>
<section class="form container">
	<form method="post">
		<h1>Log in</h1>
		<div class="input-field">
			<label>your email<</label>
			<input type="email" name="email" placeholder="enter your email" required>
		</div>
		<div class="input-field">
			<label>your password</label>
			<input type="password" name="password" placeholder="enter your password" required>
		</div>
	
		<input type="submit" name="submit-btn" value="Register" class="btn">
		<p>do not have an account? <a href="register.php">Register</a></p>
		<p>forgot password?<a href="forgotpass.php">Forgot Password</a></p>
	</form>
</section>

</body>
</html>
