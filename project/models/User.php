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
    $sql = "SELECT id, email, password FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $pEmail);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        // Verify the hashed password
        if (password_verify($pPassword, $row['password'])) {
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            return $row; 
        }
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
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hashing password
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $email, $hashedPassword);
    $result = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    return $result;
}

function emailMatches($userId, $email) {
    $conn = getDatabaseConnection();
    $sql = "SELECT email FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    // Check if the email matches the one in the database
    return $user && $user['email'] === $email;
}

function passwordMatches($userId, $oldPassword) {
    $conn = getDatabaseConnection();
    $sql = "SELECT password FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    

    return password_verify($oldPassword, $user['password']);
}

function changePassword($userId, $newPassword) {
    $conn = getDatabaseConnection();
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); // Hashing new password
    $sql = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $hashedPassword, $userId);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $result;
}

function updateUserProfile($userId, $name, $email, $contact_number, $gender) {
    $conn = getDatabaseConnection();
    $sql = "UPDATE users SET name = ?, email = ?, contact_number = ?, gender = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sssii', $name, $email, $contact_number, $gender, $userId);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $result;
}




/*           ?????????????                          */

function submitdata($email, $password) {
    $conn = getDatabaseConnection();
     

    $sql = "INSERT INTO posts (title, description) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $title, $description);
    $result = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    return $result;
}



?>
