<?php /* ...existing code... */ 


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

            <form id="appointmentForm">
                <textarea name="symptoms" placeholder="Describe how you feel (e.g. symptoms, concerns, etc.)" required
                    style="width:100%;min-height:70px;margin-bottom:12px;"></textarea>

                <select name="doctorId" id="doctorSelect" required>
                    <option value="">Select a doctor</option>
                </select>

                <input type="datetime-local" name="timeSlot" required />

                <button type="submit">Book Appointment</button>
            </form>

            <p id="appointmentMessage"></p>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 TeleMDS. All rights reserved.</p>
    </footer>

    <script>
    // Dynamically load doctors from PHP endpoint
    document.addEventListener('DOMContentLoaded', function() {
        fetch('php/get_doctors.php')
            .then(response => response.json())
            .then(doctors => {
                const select = document.getElementById('doctorSelect');
                select.innerHTML = '<option value="">Select a doctor</option>';
                doctors.forEach(doc => {
                    const opt = document.createElement('option');
                    opt.value = doc.id;
                    opt.textContent = doc.name + (doc.specialty ? ' (' + doc.specialty + ')' : '');
                    select.appendChild(opt);
                });
            });
    });
    </script>
    <script src="js/book.js"></script>
    <script src="js/doctor.js"></script>
    <script src="js/appointment.js"></script>
</body>

</html>