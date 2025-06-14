<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"));
$patient_id = $data->patient_id ?? null;
$doctor_id = $data->doctor_id ?? null;
$specialty = $data->specialty ?? null;
$time_slot = $data->time_slot ?? null;
$symptoms = $data->symptoms ?? null;

if (!$patient_id || !$doctor_id || !$specialty || !$time_slot) {
    echo json_encode(["message" => "All fields are required."]);
    http_response_code(400);
    exit;
}

$sql = "INSERT INTO appointments (patient_id, doctor_id, specialty, time_slot) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$patient_id, $doctor_id, $specialty, $time_slot]);

// Optionally, you can store symptoms in a separate table or add a column if needed.

echo json_encode(["message" => "Appointment booked"]);
?>