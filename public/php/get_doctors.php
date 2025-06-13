<?php
// Returns a JSON array of doctors for the booking form
include 'db.php';
header('Content-Type: application/json');

try {
    $stmt = $conn->query("SELECT id, name, specialty FROM doctors");
    $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($doctors);
} catch (Exception $e) {
    echo json_encode([]);
}