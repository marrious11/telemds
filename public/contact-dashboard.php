<!--// === Contact Doctor Dashboard Page === -->
<!--// File: contact-dashboard.php-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Doctor</title>
    <link rel="stylesheet" href="css/contact-dashboard.css" />
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
          <li><a href="contact-dashboard.php">Contact Doctor</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <div class="dashboard-container">
        <h2>Contact Your Doctor</h2>
        <p>
          If you have concerns or need a follow-up, contact your doctor directly
          below.
        </p>

        <div class="contact-box">
          <h3>Dr. Susan Nkem</h3>
          <p>
            Email:
            <a href="mailto:susan.nkem@example.com">susan.nkem@example.com</a>
          </p>
          <p>
            Phone/WhatsApp: <a href="tel:+237650123456">+237 650 123 456</a>
          </p>
        </div>

        <div class="contact-box">
          <h3>Dr. Francis Ewule</h3>
          <p>
            Email:
            <a href="mailto:francis.ewule@example.com"
              >francis.ewule@example.com</a
            >
          </p>
          <p>
            Phone/WhatsApp: <a href="tel:+237680987654">+237 680 987 654</a>
          </p>
        </div>

        <div class="nav-back">
          <a href="dashboard.php" class="card">← Back to Dashboard</a>
        </div>
      </div>
    </main>
    <footer>
      <p>&copy; 2025 TeleMDS. All rights reserved.</p>
    </footer>
  </body>
</html>