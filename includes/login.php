<?php
session_start();
require "db.php";

header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
    exit;
}

$loginIdentifier = trim(htmlspecialchars($_POST['login_identifier'], ENT_QUOTES, 'UTF-8'));
$password = trim($_POST['password']);

if (empty($loginIdentifier) || empty($password)) {
    echo json_encode(["success" => false, "message" => "Username/email and password are required"]);
    exit;
}

if (filter_var($loginIdentifier, FILTER_VALIDATE_EMAIL)) {
    $stmt = $conn->prepare("SELECT id, password, username FROM user_registered WHERE email = ?");
} else {
    $stmt = $conn->prepare("SELECT id, password, username FROM user_registered WHERE username = ?");
}

$stmt->bind_param("s", $loginIdentifier);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $hashed_password, $username);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        $_SESSION['user'] = $id;
        $_SESSION['username'] = $username;

        $logStmt = $conn->prepare("INSERT INTO user_logins (identifier, password) VALUES (?, ?)");
        $logStmt->bind_param("ss", $loginIdentifier, $hashed_password);
        $logStmt->execute();
        $logStmt->close();

        echo json_encode(["success" => true]);
        exit;
    }
}

echo json_encode(["success" => false, "message" => "Invalid credentials."]);
exit;
?>