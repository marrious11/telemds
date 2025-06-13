<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include 'php/login.php'; // Connects using PDO

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
                <button type="submit">Login</button>
            </form>

            <div class="link-area">
                <a href="registration.php" class="create-btn">Create an Account</a>
            </div>

            <p id="loginMessage" style="color:red;"><?php echo $loginMessage; ?></p>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 TeleMDS. All rights reserved.</p>
    </footer>
</body>

</html>