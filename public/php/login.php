<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db.php'; // Connects using PDO

$loginMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    if (empty($email) || empty($password) || empty($role)) {
        $loginMessage = "Please enter email, password, and select a role.";
    } else {
        try {
            // Check if user exists with the selected role
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND role = :role");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':role', $role);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verify password
                if (password_verify($password, $user['password'])) {
                    // Set session variables
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['role'] = $user['role'];

                    // Redirect based on role
                    if ($user['role'] === 'doctor') {
                        header("Location: ddashboard.php");
                    } else {
                        header("Location: pdashboard.php");
                    }
                    exit();
                } else {
                    $loginMessage = "Invalid password.";
                }
            } else {
                $loginMessage = "User not found or role mismatch.";
            }
        } catch (PDOException $e) {
            $loginMessage = "Error: " . $e->getMessage();
        }
    }
}
?>