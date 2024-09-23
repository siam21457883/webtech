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
    <script src="../scripts/validate.js" defer></script>
</head>
<body>
<div class="regbg-img">
<div class="container">

    <form method="post" action="../controllers/RegistrationController.php" novalidate>
        
        <h1 align="center">Registration</h1>

        <input type="email" class="field" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : '' ?>" placeholder="Enter Your Email">
        <span class="error"><?php echo isset($_SESSION['err1']) ? htmlspecialchars($_SESSION['err1']) : '' ?></span>
        <span class="error"><?php echo isset($_SESSION['err4']) ? htmlspecialchars($_SESSION['err4']) : '' ?></span>
        
        <input type="password" class="field" id="password" name="password" value="<?php echo isset($_SESSION['password']) ? htmlspecialchars($_SESSION['password']) : '' ?>" placeholder="Enter Your Password">
        <span class="error"><?php echo isset($_SESSION['err2']) ? htmlspecialchars($_SESSION['err2']) : '' ?></span>
        

        <input type="password" class="field" id="confirm_password" name="confirm_password" value="<?php echo isset($_SESSION['confirm_password']) ? htmlspecialchars($_SESSION['confirm_password']) : '' ?>" placeholder="Re-write Your Password">
        <span class="error"><?php echo isset($_SESSION['err3']) ? htmlspecialchars($_SESSION['err3']) : '' ?></span>
        <br>
        

        <input type="text" class="field" id="contact_number" name="contact_number" value="<?php echo isset($_SESSION['contact_number']) ? htmlspecialchars($_SESSION['contact_number']) : '' ?>" placeholder="Enter Your Contact Number">
        <span class="error"><?php echo isset($_SESSION['err5']) ? htmlspecialchars($_SESSION['err5']) : '' ?></span>
       
<p align="center">
        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="male" <?php echo isset($_SESSION['gender']) && $_SESSION['gender'] == 'male' ? 'checked' : '' ; ?>>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" <?php echo isset($_SESSION['gender']) && $_SESSION['gender'] == 'female' ? 'checked' : '' ; ?>>
        <label for="female">Female</label>
        <span class="error"><?php echo isset($_SESSION['err6']) ? htmlspecialchars($_SESSION['err6']) : '' ?></span>
        <br><br>
        
        <input type="submit" id="submit" value="Register" align="center"></p>
        <p align="center">already have account?<a href="../views/login.php">Login</a></p>
    </form>

    
</div>
</div>

</body>
</html>
