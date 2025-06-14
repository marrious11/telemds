<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$patient_id = $_SESSION['user_id'];
$success = false;
$message = '';

require 'php/db.php';

// Check if the user still exists in the database
$userCheck = $conn->prepare('SELECT id FROM users WHERE id = ?');
$userCheck->execute([$patient_id]);
if ($userCheck->rowCount() === 0) {
    // User does not exist, force logout and redirect
    session_destroy();
    header('Location: login.php?error=account_missing');
    exit;
}

// Debug: Show current session user ID
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo '<div style="background:#ffe0e0;color:#a00;padding:8px;margin-bottom:10px;">Debug: Session user_id = ' . htmlspecialchars($patient_id) . '</div>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $symptoms = trim($_POST['symptoms'] ?? '');
    $urgency = trim($_POST['urgency'] ?? '');
    $time_slot = trim($_POST['timeSlot'] ?? '');
    $attachment_path = null;

    // Handle file upload if present
    if (!empty($_FILES['attachment']['name'])) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $filename = basename($_FILES['attachment']['name']);
        $target_file = $upload_dir . time() . '_' . $filename;
        if (move_uploaded_file($_FILES['attachment']['tmp_name'], $target_file)) {
            $attachment_path = $target_file;
        }
    }

    if ($patient_id && $symptoms && $urgency && $time_slot) {
        try {
            $stmt = $conn->prepare("INSERT INTO appointments (patient_id, specialty, urgency, attachment, time_slot, status) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$patient_id, $symptoms, $urgency, $attachment_path, $time_slot, 'pending']);
            $success = true;
            $message = 'Appointment booked!';
        } catch (PDOException $e) {
            $message = 'Database error: ' . $e->getMessage();
        }
    } else {
        $message = 'All fields except attachment are required.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Appointment - Telemedicine Platform</title>

    <!-- Link to external CSS -->
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
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="book.php">Book Appointment</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <h2>Book an Appointment</h2>

            <form id="appointmentForm" method="POST" action="" enctype="multipart/form-data">
                <label for="symptoms">Describe your problem or symptoms:</label>
                <textarea name="symptoms" id="symptoms" placeholder="Describe how you feel (e.g. symptoms, concerns, etc.)" required style="width:100%;min-height:70px;margin-bottom:12px;"></textarea>

                <label for="urgency">How urgent is your problem?</label>
                <select name="urgency" id="urgency" required>
                    <option value="">Select urgency</option>
                    <option value="routine">Routine</option>
                    <option value="soon">Soon</option>
                    <option value="urgent">Urgent</option>
                </select>

                <label for="timeSlot">Preferred Date & Time:</label>
                <input type="datetime-local" name="timeSlot" id="timeSlot" required />

                <label for="attachment">Attach a file (optional):</label>
                <input type="file" name="attachment" id="attachment" accept="image/*,application/pdf" />
                <small style="display:block;margin-bottom:12px;color:#555;">You may upload a photo, scan, or PDF of your symptoms, previous reports, or any relevant document to help the doctor understand your case. This is optional.</small>

                <button type="submit">Book Appointment</button>
            </form>
            <p id="appointmentMessage" style="color:<?= $success ? 'green' : 'red' ?>;">
                <?= htmlspecialchars($message) ?>
            </p>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 TeleMDS. All rights reserved.</p>
    </footer>
</body>

</html>