<?php
// Simple test script to check db.php connection
require_once 'db.php';

if ($conn) {
    $result = $conn->query("SELECT 1");
    if ($result) {
        echo "Database connection successful!";
    } else {
        echo "Connected, but test query failed: " . $conn->error;
    }
} else {
    echo "Database connection failed.";
}
?>