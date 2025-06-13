<?php
$host = 'localhost';
$db = 'telemeds_db';
$user = 'root';
$pass = ''; // your MySQL password

try {
  $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
?>