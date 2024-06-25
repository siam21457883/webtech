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
  <p><?php echo $_REQUEST['fname'];?></p>
<br>
 <label for="lname">Last name:</label>
  <p><?php echo $_REQUEST['lname'];?></p>
  <br>
<br>

 <label for="gender">Gender:</label>
  <input type="radio" id="male" name="gender" value="male" >
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label><br>
<br>
 
 <label for="faname">Father's name:</label>
  <p><?php echo $_REQUEST['faname'];?></p>

  
 <label for="moname">Mother's name:</label>
  <p><?php echo $_REQUEST['moname'];?></p><br>
 <br>
 <label for="btype">Blood Group:</label>
<p><?php echo $_REQUEST['btype'];?></p><br>
  <br>
  
  
  <label for="religion">Religion:</label>
<p><?php echo $_REQUEST['religion'];?></p><br>
  <br>
  

</table>
</fieldset>
</td>
<td>

<fieldset>
<table>
<legend>Contact Information</legend>


  <label for="email">Email:</label>
<p><?php echo $_REQUEST['email'];?></p>
<br>
 <label for="pnumber">Phone Number:</label>
<p><?php echo $_REQUEST['pnumber'];?></p>
<br>
 <label for="pnumber">Website:</label>
  <p><?php echo $_REQUEST['Website'];?></p><br>
<br>

<label for="paddress">Address:</label>
<td>
<fieldset>
<legend>Present Address</legend>
<table>
<tr>
<p><?php echo $_REQUEST['country'];?></p></tr>
 <tr>
<p><?php echo $_REQUEST['city'];?></p>
 </tr><br><br>
 <tr>
 <p><?php echo $_REQUEST['address'];?></p>
 </tr><br>
  <tr>
 <p><?php echo $_REQUEST['postcode'];?></p>
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
  <p><?php echo $_REQUEST['username'];?></p>
<br>
 <label for="password">Password:</label>
  <p><?php echo $_REQUEST['password'];?></p>
<br>

 <label for="cpassword">Confirm password:</label>
  <p><?php echo $_REQUEST['cpassword'];?></p><br>
<br>
   

</table>
</fieldset>
</td>
</tr>
</table>

 </form>
</body>
</html>