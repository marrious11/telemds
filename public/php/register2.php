<?php
include 'db.php'; // Includes your PDO connection as $conn

$registerMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect and sanitize form inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $role = trim($_POST['role']);
    $password = trim($_POST['password']);

    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($role) || empty($password)) {
        $registerMessage = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $registerMessage = "Invalid email format.";
    } else {
        try {
            // Check if email already exists
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $registerMessage = "Email is already registered.";
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert new user
                $insertStmt = $conn->prepare("INSERT INTO users (name, email, phone, role, password) 
                                              VALUES (:name, :email, :phone, :role, :password)");
                $insertStmt->bindParam(':name', $name);
                $insertStmt->bindParam(':email', $email);
                $insertStmt->bindParam(':phone', $phone);
                $insertStmt->bindParam(':role', $role);
                $insertStmt->bindParam(':password', $hashedPassword);

                if ($insertStmt->execute()) {
                    $registerMessage = "Registration successful! <a href='login.php'>Click here to login</a>.";
                } else {
                    $registerMessage = "Registration failed. Please try again.";
                }
            }
        } catch (PDOException $e) {
            $registerMessage = "Error: " . $e->getMessage();
        }
    }
}
?>