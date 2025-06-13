<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"));

$name = $data->name;
$email = $data->email;
$phone = $data->phone;
$password = password_hash($data->password, PASSWORD_DEFAULT);
$role = $data->role;

$sql = "INSERT INTO users (name, email, phone, password, role) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
try {
  $stmt->execute([$name, $email, $phone, $password, $role]);
  echo json_encode(["message" => "Registration successful"]);
} catch (PDOException $e) {
  echo json_encode(["message" => "Registration failed: " . $e->getMessage()]);
}
?>