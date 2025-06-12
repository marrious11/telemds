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
  database: 'telemeds'
});

// Example route
app.post('/api/register', (req, res) => {
  // handle registration logic
});

app.listen(3000, () => console.log('Server running on port 3000'));