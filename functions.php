<?php
function isValidCredentials($username, $password) {
    global $conn;

    $stmt = $conn->prepare("SELECT id, hashed_password FROM admin_users WHERE username = ?");
    if (!$stmt) {
        die("Error in SQL query: " . $conn->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($userId, $hashedPassword);
    $stmt->fetch();
    $stmt->close();

        // Debugging statements
        echo "Username: $username, Entered Password: $password, Hashed Password: $hashedPassword";

        if ($hashedPassword !== null && password_verify($password, $hashedPassword)) {
            return $userId;
        }
    
        return false;
        
    // return password_verify($password, $hashedPassword) ? $userId : false;
}

function createUser($username, $password) {
    global $conn;

    // Hash the password using bcrypt
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    if (!$hashedPassword) {
        die("Error hashing password");
    }

    // Insert the new user into the database
    $stmt = $conn->prepare("INSERT INTO admin_users (username, hashed_password) VALUES (?, ?)");
    if (!$stmt) {
        die("Error in SQL query: " . $conn->error);
    }
    $stmt->bind_param("ss", $username, $hashedPassword);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}
?>
