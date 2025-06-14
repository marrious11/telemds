<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'doctor') {
    echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Access Denied</title><link rel="stylesheet" href="css/style.css"></head><body style="text-align:center;padding:40px;"><h1 style="color:#a00;">Access Denied</h1><p>You do not have permission to view this page. Only doctors can access the appointments management area.</p><a href="login.php" class="admin-link-btn">Return to Login</a></body></html>';
    exit;
}

include 'php/db.php';

// Fetch all appointments with patient and doctor info
$stmt = $conn->query("SELECT a.id, a.specialty, a.urgency, a.attachment, a.time_slot, a.status, 
    p.name AS patient_name, p.email AS patient_email, p.phone AS patient_phone, d.name AS doctor_name
    FROM appointments a
    LEFT JOIN users p ON a.patient_id = p.id
    LEFT JOIN doctors d ON a.doctor_id = d.id
    ORDER BY a.time_slot DESC");
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Appointments</title>
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
      <section>
        <h2>Manage Appointments</h2>
        <div class="admin-section">
          <?php if (count($appointments) === 0): ?>
            <p>No appointments found.</p>
          <?php else: ?>
          <table class="admin-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Patient Email</th>
                <th>Patient Phone</th>
                <th>Doctor</th>
                <th>Specialty</th>
                <th>Urgency</th>
                <th>Attachment</th>
                <th>Time Slot</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($appointments as $appt): ?>
              <tr>
                <td><?= htmlspecialchars($appt['id']) ?></td>
                <td><?= htmlspecialchars($appt['patient_name'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($appt['patient_email'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($appt['patient_phone'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($appt['doctor_name'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($appt['specialty'] ?? '') ?></td>
                <td><?= htmlspecialchars($appt['urgency'] ?? '') ?></td>
                <td>
                  <?php if (!empty($appt['attachment'])): ?>
                    <a href="<?= htmlspecialchars($appt['attachment']) ?>" target="_blank">View</a>
                  <?php else: ?>
                    —
                  <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($appt['time_slot']) ?></td>
                <td><?= htmlspecialchars($appt['status']) ?></td>
                <td>
                  <a href="mailto:<?= htmlspecialchars($appt['patient_email']) ?>" class="admin-link-btn">Contact Patient</a>
                  <!-- Placeholder for future edit/delete -->
                  <button disabled>Edit</button>
                  <button disabled>Delete</button>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?php endif; ?>
        </div>
      </section>
    </main>
    <footer>
      <p>&copy; 2025 TeleMDS. All rights reserved.</p>
    </footer>
  </body>
</html>