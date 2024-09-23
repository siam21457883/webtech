 <?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];
$conn = mysqli_connect("localhost", "root", "", "sk");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../views/styles.css">
<style>
footer {
            position: fixed;
            bottom: 0;
            right: 0;
            background-color: skyblue;
            color: black;
            border: 5px solid skyblue;
            padding: 10px;
            text-align: center;
            width: calc(100% - 0px);
            box-sizing: border-box; 
        }

</style>
</head>

<body>

<div class="topnav">
  <a class="active" href="#">Home</a>
  <a href="LostandFound.php">Lost & Found</a>
  <a href="AboutUs.php">About Us</a>
  <a href="../controllers/Logout.php">Logout</a>
  <div class="search-container">
    <form action="/action page">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

<div class="homebody">

</div>


<footer>
<p>@copyright Ahmed Islam Siam</p>
</footer>
</body>
</html>