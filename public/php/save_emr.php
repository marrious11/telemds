<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $patient_id = $_POST['patient_id'];
  $doctor_id = $_POST['doctor_id'];
  $summary = $_POST['summary'];
  $file_url = null;

  // Handle file upload
  if (!empty($_FILES['record_file']['name'])) {
    $targetDir = "../records/";
    $fileName = basename($_FILES["record_file"]["name"]);
    $targetFile = $targetDir . time() . "_" . $fileName;

    if (move_uploaded_file($_FILES["record_file"]["tmp_name"], $targetFile)) {
      $file_url = "records/" . basename($targetFile);
    } else {
      echo json_encode(["message" => "File upload failed"]);
      exit();
    }
  }

  $sql = "INSERT INTO medical_records (patient_id, doctor_id, summary, record_url) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);

  try {
    $stmt->execute([$patient_id, $doctor_id, $summary, $file_url]);
    echo json_encode(["message" => "Medical record saved"]);
  } catch (PDOException $e) {
    echo json_encode(["message" => "Error: " . $e->getMessage()]);
  }
}
?>