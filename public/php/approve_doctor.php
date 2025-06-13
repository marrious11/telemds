<?php
// approve_doctor.php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? null;
    $name = $_POST['name'] ?? '';
    $specialty = $_POST['specialty'] ?? '';
    if ($user_id && $name) {
        try {
            // Insert into doctors table
            $stmt = $conn->prepare("INSERT INTO doctors (name, specialty) VALUES (?, ?)");
            $stmt->execute([$name, $specialty]);
            // Remove from users table
            $del = $conn->prepare("DELETE FROM users WHERE id = ?");
            $del->execute([$user_id]);
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