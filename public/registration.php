<?php
// Include DB connection
include 'php/register2.php'


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - Telemedicine Platform</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <header>include('public/php/db.php');

        <div class="header-flex">
            <img src="images/logo.png" alt="Logo" class="header-logo" />
            <h1>TeleMDS</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="registration.php">Register</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <h2>Register as Patient</h2>
            <form id="registerForm" method="POST" action="">
                <input type="text" name="name" placeholder="Full Name" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="tel" name="phone" placeholder="Phone Number" required />
                <select name="role" required>
                    <option value="patient">Patient</option>
                    <option value="doctor">Doctor</option>
                </select>
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit">Register</button>
            </form>

            <div class="link-area">
                <a href="login.php" class="create-btn">Already have an Account</a>
            </div>

            <p id="registerMessage" style="color:red;"><?php echo $registerMessage; ?></p>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 TeleMDS. All rights reserved.</p>
    </footer>
</body>

</html>