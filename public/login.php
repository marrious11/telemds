<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include 'php/login.php'; // Connects using PDO

// Show a custom error message if redirected due to missing account
if (isset($_GET['error']) && $_GET['error'] === 'account_missing') {
    $error_message = 'Your account no longer exists. Please register or contact support.';
}

$superadminPassword = 'superadmin2025'; // Set your super admin password here
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Telemedicine Platform</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <header>
        <div class="header-flex">
            <img src="images/logo.png" alt="Logo" class="header-logo" />
            <h1>TeleMDS</h1>
        </div>
        <nav>
            <ul>
                <li><a href="dashboard.html">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="registration.php">Register</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            <h2>Login</h2>
            <form method="POST" action="">
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <select name="role" required>
                    <option value="patient">Patient</option>
                    <option value="doctor">Doctor</option>
                </select>
                <button type="submit">Login</button>
            </form>

            <div class="link-area">
                <a href="registration.php" class="create-btn">Create an Account</a>
            </div>
            <div style="margin-top:20px;color:#333;background:#f8f8f8;padding:10px;border-radius:6px;">
                <strong>Super Admin Login:</strong><br>
                Username: <code>superadmin</code><br>
                Password: <code><?= htmlspecialchars($superadminPassword) ?></code>
            </div>
            <p id="loginMessage" style="color:red;"><?php echo $loginMessage; ?></p>
            <?php if (isset($error_message)): ?>
                <div style="background:#ffe0e0;color:#a00;padding:8px;margin-bottom:10px;"><?php echo $error_message; ?></div>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 TeleMDS. All rights reserved.</p>
    </footer>
</body>

</html>