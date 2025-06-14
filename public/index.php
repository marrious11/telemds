<?php
// index.php - TeleMDS Landing Page
session_start();
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$role = $user['role'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeleMDS - Welcome</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        .container { max-width: 500px; margin: 60px auto; background: #fff; padding: 32px; border-radius: 10px; box-shadow: 0 2px 8px #0001; }
        h1 { text-align: center; color: #2a7ae2; }
        ul { list-style: none; padding: 0; }
        li { margin: 18px 0; }
        a { color: #2a7ae2; text-decoration: none; font-size: 1.1em; }
        a:hover { text-decoration: underline; }
        .welcome { text-align: center; margin-bottom: 24px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to TeleMDS</h1>
        <?php if ($user): ?>
            <div class="welcome">Hello, <b><?= htmlspecialchars($user['name']) ?></b> (<?= htmlspecialchars($role) ?>)</div>
            <ul>
                <?php if ($role === 'patient'): ?>
                    <li><a href="pdashboard.php">Patient Dashboard</a></li>
                    <li><a href="book.php">Book Appointment</a></li>
                    <li><a href="appointments.php">My Appointments</a></li>
                <?php elseif ($role === 'doctor'): ?>
                    <li><a href="ddashboard.php">Doctor Dashboard</a></li>
                    <li><a href="appointments.php">Appointments</a></li>
                <?php elseif ($role === 'superadmin'): ?>
                    <li><a href="superadmin-dashboard.php">Superadmin Dashboard</a></li>
                <?php endif; ?>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        <?php else: ?>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="registration.php">Register</a></li>
                <li><a href="superadmin-dashboard.php">Superadmin Login</a></li>
            </ul>
        <?php endif; ?>
        <hr>
        <div style="text-align:center; font-size:0.95em; color:#888;">&copy; <?= date('Y') ?> TeleMDS</div>
    </div>
    <div class="container" style="margin-top: 24px; background: #eaf4ff; border: 1px solid #b3d8fd; color: #205080;">
        <h3 style="text-align:center; margin-top:0;">About This Project</h3>
        <p style="text-align:center; font-size:1.08em;">
            This is a school project (University of Buea) for <b>CSC404</b>.<br>
            <b>Still in development</b>.<br>
            Project Group: <b>10</b>
        </p>
    </div>
</body>
</html>
