// backend/server.js
const express = require("express");
const mysql = require("mysql2");
const cors = require("cors");
const app = express();

app.use(cors());
app.use(express.json());

// MySQL connection
const db = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "", // default for XAMPP
  database: "telemeds",
});

// Example route
app.post("/api/register", (req, res) => {
  const { name, email, phone, role, password } = req.body;
  if (!name || !email || !phone || !role) {
    return res.status(400).json({ message: "All fields are required." });
  }
  // Optional: hash password here if you collect it
  const sql =
    "INSERT INTO users (name, email, phone, role, password) VALUES (?, ?, ?, ?, ?)";
  db.query(sql, [name, email, phone, role, password || null], (err, result) => {
    if (err) {
      if (err.code === "ER_DUP_ENTRY") {
        return res.status(409).json({ message: "Email already registered." });
      }
      return res.status(500).json({ message: "Database error", error: err });
    }
    res.status(201).json({ message: "Registration successful!" });
  });
});

// Book appointment route
app.post("/api/appointments", (req, res) => {
  const { specialty, doctorId, timeSlot, userId } = req.body;
  if (!specialty || !doctorId || !timeSlot) {
    return res.status(400).json({ message: "All fields are required." });
  }
  // You may want to validate doctorId and userId exist in their respective tables
  const sql =
    "INSERT INTO appointments (specialty, doctor_id, user_id, time_slot) VALUES (?, ?, ?, ?)";
  db.query(
    sql,
    [specialty, doctorId, userId || null, timeSlot],
    (err, result) => {
      if (err) {
        return res.status(500).json({ message: "Database error", error: err });
      }
      res.status(201).json({ message: "Appointment booked successfully!" });
    }
  );
});

app.listen(3000, () => console.log("Server running on port 3000"));
