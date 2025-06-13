<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"));
$patient_id = $data->patient_id;
$doctor_id = $data->doctor_id;
$specialty = $data->specialty;
$time_slot = $data->time_slot;

$sql = "INSERT INTO appointments (patient_id, doctor_id, specialty, time_slot) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$patient_id, $doctor_id, $specialty, $time_slot]);

echo json_encode(["message" => "Appointment booked"]);
?>