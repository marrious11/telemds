<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Patient Dashboard</title>

    <!-- Link to CSS -->
    <link rel="stylesheet" href="css/dashboard.css" />
</head>

<body>
    <header>
        <div class="header-flex">
            <img src="images/logo.png" alt="Logo" class="header-logo" />
            <h1>TeleMDS</h1>
        </div>
        <nav>
            <ul>
                <li><a href="pdashboard.php">Home</a></li>
                <li><a href="book.php">Book Appointment</a></li>
                <li><a href="emr-dashboard.php">Medical Records</a></li>
                <li><a href="contact-dashboard.php">Contact Doctor</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="dashboard-container">
            <h2>Welcome, [Patient Name]</h2>

            <div class="grid-menu">
                <a href="book.php" class="card">
                    <img src="icons/calendar.png" alt="Book" />
                    <span>Book Appointment</span>
                </a>

                <a href="emr-dashboard.php" class="card">
                    <img src="icons/folder.png" alt="EMR" />
                    <span>View Medical Records</span>
                </a>

                <a href="contact-dashboard.php" class="card">
                    <img src="icons/doctor.png" alt="Doctor" />
                    <span>Contact Doctor</span>
                </a>

                <a href="logout.php" class="card logout">
                    <img src="icons/logout.png" alt="Logout" />
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 TeleMDS. All rights reserved.</p>
    </footer>
</body>

</html>