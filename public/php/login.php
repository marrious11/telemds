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

    if (empty($email) || empty($password)) {
        $loginMessage = "Please enter both email and password.";
    } else {
        try {
            // Check if user exists
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
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
                $loginMessage = "User not found.";
            }
        } catch (PDOException $e) {
            $loginMessage = "Error: " . $e->getMessage();
        }
    }
}
?>