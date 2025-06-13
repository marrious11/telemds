// backend/server.js
const express = require('express');
const mysql = require('mysql2');
const cors = require('cors');
const app = express();

app.use(cors());
app.use(express.json());

// MySQL connection
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '', // default for XAMPP
  database: 'telemeds_db'
});

// Example route
  // handle registration logic

  app.post("/registration", async (req, res) => {
    try {
      const { username, password, email } = req.body;
      // Check if user already exists
      const existingUser = await User.findOne({ email });
      if (existingUser) {
        return res.status(400).json({ message: "User already exists" });
      }
      // Create new user
      const newUser = new User({ username, password, email });
      await newUser.save();
      res.status(201).json({ message: "Registration successful" });
    } catch (error) {
      res.status(500).json({ message: "Server error", error });
    }
  });
  // ...existing code...

app.listen(3306, () => console.log('Server running on port 3000'));