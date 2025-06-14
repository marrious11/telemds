<?php
session_start();
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '[Name]';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard - Telemedicine Platform</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <header>
        <h1>Doctor Dashboard</h1>
        <nav>
            <ul>
                <li><a href="ddashboard.php">Dashboard</a></li>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="emr-dashboard.php">EMR</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="dashboard-container">
            <section class="overview">
                <h2>Welcome, Dr. <?= htmlspecialchars($name) ?></h2>
                <p>Here is a summary of your activities:</p>
                <ul>
                    <li>Upcoming Appointments: <span id="upcoming-appointments">0</span></li>
                    <li>Pending EMRs: <span id="pending-emrs">0</span></li>
                    <li>Messages: <span id="messages">0</span></li>
                </ul>
            </section>
            <section class="grid-menu">
                <a class="card" href="appointments.php">
                    <img src="icons/calendar.png" alt="Appointments">
                    <span>Appointments</span>
                </a>
                <a class="card" href="emr-dashboard.php">
                    <img src="icons/folder.png" alt="EMR">
                    <span>EMR</span>
                </a>
                <a class="card" href="settings.php">
                    <img src="icons/doctor.png" alt="Settings">
                    <span>Settings</span>
                </a>
                <a class="card" href="contact-dashboard.php">
                    <img src="icons/doctor.png" alt="Contact Patient">
                    <span>Contact Patient</span>
                </a>
                <a class="card logout" href="logout.php">
                    <img src="icons/logout.png" alt="Logout">
                    <span>Logout</span>
                </a>
            </section>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Telemedicine Platform</p>
    </footer>
</body>

</html>