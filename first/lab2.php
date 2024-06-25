<!DOCTYPE html>
<html>
<body>

<h1> Registration </h1>
 <form>
<table>
<tr>
<td>

<fieldset>
<table>
<legend>General Information</legend>

<tr>  <label for="fname">First name:</label>
  <p><?php echo $_POST['fname'];?></p>
<br>
 <label for="lname">Last name:</label>
  <p><?php echo $_POST['lname'];?></p>
  <br>
<br>

 <label for="gender">Gender:</label>
<p><?php echo $_POST['gender'];?></p><br>
<br>
 
 <label for="faname">Father's name:</label>
  <p><?php echo $_POST['faname'];?></p>

  
 <label for="moname">Mother's name:</label>
  <p><?php echo $_POST['moname'];?></p><br>
 <br>
 <label for="btype">Blood Group:</label>
<p><?php echo $_POST['Btype'];?></p><br>
  <br>
  
  
  <label for="religion">Religion:</label>
<p><?php echo $_POST['religion'];?></p><br>
  <br>
  

</table>
</fieldset>
</td>
<td>

<fieldset>
<table>
<legend>Contact Information</legend>


  <label for="email">Email:</label>
<p><?php echo $_POST['email'];?></p>
<br>
 <label for="pnumber">Phone Number:</label>
<p><?php echo $_POST['pnumber'];?></p>
<br>
 <label for="pnumber">Website:</label>
  <p><?php echo $_POST['Website'];?></p><br>
<br>

<label for="paddress">Address:</label>
<td>
<fieldset>
<legend>Present Address</legend>
<table>
<tr>
<p><?php echo $_POST['country'];?></p></tr>
 <tr>
<p><?php echo $_POST['city'];?></p>
 </tr><br><br>
 <tr>
 <p><?php echo $_POST['address'];?></p>
 </tr><br>
  <tr>
 <p><?php echo $_POST['postcode'];?></p>
 </tr><br>
</table>
</fieldset>
</td>

</table>
</fieldset>
</td>

<td>

<fieldset>
<table>
<legend>account information</legend>


  <label for="username">Username:</label>
  <p><?php echo $_POST['username'];?></p>
<br>
 <label for="password">Password:</label>
  <p><?php echo $_POST['password'];?></p>
<br>

 <label for="cpassword">Confirm password:</label>
  <p><?php echo $_POST['cpassword'];?></p><br>
<br>
   

</table>
</fieldset>
</td>
</tr>
</table>

 </form>
</body>
</html>