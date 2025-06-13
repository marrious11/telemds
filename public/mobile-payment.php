<?php /* ...existing code... */ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mobile Payment</title>
    <link rel="stylesheet" href="css/mobile-payment.css" />
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
          <li><a href="mobile-payment.php">Mobile Payment</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <form class="payment-form">
        <label for="amount">Amount</label>
        <input type="number" id="amount" name="amount" required />

        <label for="method">Payment Method</label>
        <select id="method" name="method" required>
          <option value="">Select Method</option>
          <option value="uba">UBA Bank</option>
          <option value="mtn">MTN MoMo</option>
          <option value="orange">Orange Money</option>
        </select>

        <label for="transaction">Transaction ID</label>
        <input type="text" id="transaction" name="transaction" required />

        <button type="submit">Submit Payment</button>
      </form>
    </main>
    <footer>
      <p>&copy; 2025 TeleMDS. All rights reserved.</p>
    </footer>
  </body>
</html>