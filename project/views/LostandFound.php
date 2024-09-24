<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found</title>
    <link rel="stylesheet" href="../views/styles.css">
</head>
<body>    


<div class="topnav">
  <a  href="view.php">Home</a>
  <a class="active" href="#">Lost & Found</a>
  <a href="AboutUs.php">About Us</a>
  <a href="update_profile.php">Update Profile</a>
  <a href="../controllers/Logout.php">Logout</a>
  <div class="search-container">
    <form action="/action page">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

<div class="lostandfoundbody">


<div class="container">

    <form action="../controllers/LostandFoundController.php" method="post" enctype="multipart/form-data">
        <h1>Lost and Found</h1><br><br>

        
        <input type="text" name="title" class="field" id="title" placeholder="Enter Your Title" required><br>

        
        <textarea name="description" class="field" id="description"rows="4" cols="20" placeholder="Enter Your Description" required></textarea><br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="lost">Lost</option>
            <option value="found">Found</option>
        </select><br><br>

        <label for="image">Upload Image:</label>
        <input type="file" name="image" id="image" required><br><br>

        <button type="submit" id="submit" name="submit">Submit</button>


        
        </div>
    
    </div>

</form>
<footer>
<p>@copyright Ahmed Islam Siam</p>
</footer>
</body>
</html>
