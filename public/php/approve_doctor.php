<?php
// approve_doctor.php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? null;
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? null;
    $specialty = $_POST['specialty'] ?? '';
    if ($user_id && $name && $email) {
        try {
            // 1. Ensure doctor is in users table with role 'doctor'
            $checkUser = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $checkUser->execute([$email]);
            if ($checkUser->rowCount() == 0) {
                // Insert new doctor user with default password '12345'
                $hashedPassword = password_hash('12345', PASSWORD_DEFAULT);
                $insertUser = $conn->prepare("INSERT INTO users (name, email, phone, password, role) VALUES (?, ?, ?, ?, 'doctor')");
                $insertUser->execute([$name, $email, $phone, $hashedPassword]);
            } else {
                // Update role to doctor if not already
                $updateUser = $conn->prepare("UPDATE users SET role = 'doctor' WHERE email = ?");
                $updateUser->execute([$email]);
            }

            // 2. Insert into doctors table if not already present
            $checkDoctor = $conn->prepare("SELECT id FROM doctors WHERE name = ? AND specialty = ?");
            $checkDoctor->execute([$name, $specialty]);
            if ($checkDoctor->rowCount() == 0) {
                $stmt = $conn->prepare("INSERT INTO doctors (name, specialty) VALUES (?, ?)");
                $stmt->execute([$name, $specialty]);
            }

            // Do NOT delete from users table
            header('Location: ../superadmin-dashboard.php?success=1');
            exit;
        } catch (Exception $e) {
            header('Location: ../superadmin-dashboard.php?error=1');
            exit;
        }
    }
}
header('Location: ../superadmin-dashboard.php?error=1');
exit;