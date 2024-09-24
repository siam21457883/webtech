<?php 

function getDatabaseConnection() {
    $conn = mysqli_connect("localhost", "root", "", "sk");
    
    if (!$conn) {
        error_log("Connection failed: " . mysqli_connect_error());
        die("Connection failed: " . mysqli_connect_error());
    }
    
    return $conn;
}

// User related functions
function emailExists($email) {
    $conn = getDatabaseConnection();
    
//statement to prevent SQL injection
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

function matchCredentials($pEmail, $pPassword) {
    $conn = getDatabaseConnection();
    
//statement to prevent SQL injection
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

function registerUser($email, $password) {
    $conn = getDatabaseConnection();
    
// Check if the email already exists
    if (emailExists($email)) {
        mysqli_close($conn);
        return false; 
    }
    
//statement to prevent SQL injection
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
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
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
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

// Post related functions
function submitLostAndFoundData($title, $description, $status, $image) {
    $conn = getDatabaseConnection();

    // Handle image upload
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../views/uploads/' . $image;

// Check if the image size is appropriate
    if ($image_size > 2000000) {
        $message[] = 'Image size is too large';
    } else {
        if (move_uploaded_file($image_tmp_name, $image_folder)) {
            $message[] = 'Image added successfully';
        } else {
            $message[] = 'Failed to upload image';
        }
    }

// Get the current timestamp
    $createdTime = date('Y-m-d H:i:s');

// Insert post data into the database with the created time
    $sql = "INSERT INTO posts (title, description, status, image, created_time) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        error_log('SQL preparation failed: ' . mysqli_error($conn)); 
        return ['success' => false, 'message' => 'SQL preparation failed'];
    }

    mysqli_stmt_bind_param($stmt, 'sssss', $title, $description, $status, $image, $createdTime);

    $result = mysqli_stmt_execute($stmt);

    if ($result === false) {
        error_log('SQL execution failed: ' . mysqli_error($conn)); 
        return ['success' => false, 'message' => 'SQL execution failed'];
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return ['success' => true];
}

function getPostDetails($id) {
    $conn = getDatabaseConnection();
    $sql = "SELECT title, status, description, image, created_time FROM posts WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $post = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $post;
}

?>
