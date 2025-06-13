<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"));
$email = $data->email;
$password = $data->password;

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
  echo json_encode(["message" => "Login successful", "user" => $user]);
} else {
  echo json_encode(["message" => "Invalid credentials"]);
}
?>