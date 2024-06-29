<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    setcookie("username", $username, time() + 86040, "/");
}
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$username])) {
  echo "Cookie named '" . $username . "' is not set!";
} else {
  echo "Cookie '" . $username . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$username];
}
?>

</body>
</html>