<?php
require 'db.php';

header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
    exit;
}

if (!isset($conn) || $conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed."]);
    exit;
}

$username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$password = trim($_POST['password']);

if (empty($username) || empty($email) || empty($password)) {
    echo json_encode(["success" => false, "message" => "All fields are required."]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["success" => false, "message" => "Invalid email format."]);
    exit;
}

$stmt = $conn->prepare("SELECT id FROM user_registered WHERE email = ? OR username = ?");
if (!$stmt) {
    echo json_encode(["success" => false, "message" => "SQL error: " . $conn->error]);
    exit;
}
$stmt->bind_param("ss", $email, $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id);
    $stmt->fetch(); 
    $stmt->close();

    $stmt2 = $conn->prepare("SELECT id FROM user_registered WHERE email = ?");
    $stmt2->bind_param("s", $email);
    $stmt2->execute();
    $stmt2->store_result();

    if($stmt2->num_rows > 0){
        echo json_encode(["success" => false, "message" => "Email already exists."]);
        exit;
    }
    $stmt2->close();

    $stmt3 = $conn->prepare("SELECT id FROM user_registered WHERE username = ?");
    $stmt3->bind_param("s", $username);
    $stmt3->execute();
    $stmt3->store_result();

    if($stmt3->num_rows > 0){
        echo json_encode(["success" => false, "message" => "Username already exists."]);
        exit;
    }
    $stmt3->close();

}
$stmt->close();
// Password hashing
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO user_registered (username, email, password) VALUES (?, ?, ?)");
if (!$stmt) {
    echo json_encode(["success" => false, "message" => "SQL error: " . $conn->error]);
    exit;
}
$stmt->bind_param("sss", $username, $email, $hashedPassword);

if (!$stmt->execute()) {
    echo json_encode(["success" => false, "message" => "Database error: " . $stmt->error]);
} else {
    echo json_encode(["success" => true, "message" => "Registration successful!"]);
}

$stmt->close();
$conn->close();
exit;
?>