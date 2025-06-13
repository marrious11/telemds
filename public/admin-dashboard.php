<?php /* ...existing code... */ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin-dashboard.css" />
  </head>
  <body>
    <header>
      <div class="header-flex">
        <a href="admin-dashboard.php"
          ><img src="images/logo.png" alt="Logo" class="header-logo"
        /></a>
        <h1>TeleMDS</h1>
      </div>
      <nav>
        <ul>
          <li><a href="admin-dashboard.php">Dashboard</a></li>
          <li><a href="users.php">Users</a></li>
          <li><a href="appointments.php">Appointments</a></li>
          <li><a href="settings.php">Settings</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <section id="users">
        <h2>Manage Users</h2>
        <div class="admin-section">
          <!-- User management table or controls go here -->
          <p>View, add, or remove users (patients, doctors, admins).</p>
          <a href="users.php" class="admin-link-btn">Go to Users Page</a>
        </div>
      </section>
      <section id="appointments">
        <h2>Manage Appointments</h2>
        <div class="admin-section">
          <!-- Appointment management table or controls go here -->
          <p>View and manage all appointments.</p>
          <a href="appointments.php" class="admin-link-btn"
            >Go to Appointments Page</a>
          >
        </div>
      </section>
      <section id="settings">
        <h2>System Settings</h2>
        <div class="admin-section">
          <!-- System settings controls go here -->
          <p>Configure system-wide settings.</p>
          <a href="settings.php" class="admin-link-btn">Go to Settings Page</a>
        </div>
      </section>
    </main>
    <footer>
      <p>&copy; 2025 TeleMDS. All rights reserved.</p>
    </footer>
  </body>
</html>