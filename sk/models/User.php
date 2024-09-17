<?php 

// Function to create a database connection
function getDatabaseConnection() {
    $conn = mysqli_connect("localhost", "root", "", "sk");
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    return $conn;
}

// Check if email exists
function emailExists($email) {
    $conn = getDatabaseConnection();
    
    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    
    // Check if email exists
    $exists = mysqli_stmt_num_rows($stmt) > 0;
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    return $exists;
}

// Match credentials for login
function matchCredentials($pEmail, $pPassword) {
    $conn = getDatabaseConnection();
    
    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT id, email, password FROM users WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $pEmail, $pPassword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result); 
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $row; 
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return false;
}

// Register a new user
function registerUser($email, $password) {
    $conn = getDatabaseConnection();
    
    // Check if the email already exists
    if (emailExists($email)) {
        mysqli_close($conn);
        return false; 
    }
    
    // Use a prepared statement to prevent SQL injection
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
    $result = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    return $result;
}

?>
