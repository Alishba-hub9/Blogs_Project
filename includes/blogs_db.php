<?php
session_start();
require 'db.php';

header("Content-Type: application/json; charset=UTF-8");

$method = $_SERVER['REQUEST_METHOD'];
$sanitize = fn($data) => htmlspecialchars(strip_tags(trim($data)));

if ($method === "GET") {
    if (isset($_GET['method'])) {
        $method_name = $_GET['method'];

        if ($method_name === "get_single_blog" && isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $stmt = $conn->prepare("SELECT * FROM blogs_posts WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            echo json_encode(["status" => $result ? "success" : "error", "get_single_blog" => $result ?: null]);
            $stmt->close();
        } elseif ($method_name === "get_all") {
            $scope = $_GET['scope'] ?? 'all';

            if ($scope === 'user') {
                if (!isset($_SESSION['username'])) {
                    echo json_encode(["status" => "error", "message" => "User not authenticated."]);
                    exit();
                }
                $created_by = $_SESSION['username'];
                $stmt = $conn->prepare("SELECT * FROM blogs_posts WHERE created_by = ? ORDER BY posted_at DESC");
                $stmt->bind_param("s", $created_by);
                $stmt->execute();
                $result = $stmt->get_result();
            } else {
                $stmt = $conn->prepare("SELECT * FROM blogs_posts ORDER BY posted_at DESC");
                $stmt->execute();
                $result = $stmt->get_result();
            }

            $blogs = [];
            while ($row = $result->fetch_assoc()) {
                $blogs[] = $row;
            }

            if (!empty($blogs)) {
                echo json_encode(["status" => "success", "blogs" => $blogs, "message" => "Blogs loaded successfully"]);
            } else {
                echo json_encode(["status" => "empty", "message" => "No blogs available at the moment."]);
            }

            $stmt->close();
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid method."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Method not specified."]);
    }
    exit;
}

if ($method === "POST") {
    $postData = $_POST;
    $data = array_map($sanitize, $postData);
    $content = $_POST['content'];
    $posted_at = date('Y-m-d');
    $created_by = $_SESSION['username'] ?? null;

    if (empty($data['title']) || empty($content)) {
        echo json_encode(["status" => "error", "message" => "Title and content are required"]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO blogs_posts (title, subtitle, author, content, posted_at, created_by) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $data['title'], $data['subtitle'], $data['author'], $content, $posted_at, $created_by);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Blog inserted successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to insert blog: " . $stmt->error]);
    }
    exit;
}

if ($method === "PATCH" || $method === "DELETE") {
    $input = json_decode(file_get_contents("php://input"), true);
    if (!isset($input['id'])) {
        echo json_encode(["status" => "error", "message" => "ID is required"]);
        exit;
    }
}

if ($method === "PATCH") {
    $data = array_map($sanitize, $input);
    $id = intval($input['id']);
    $content = $input['content'];

    $stmt = $conn->prepare("UPDATE blogs_posts SET title=?, subtitle=?, author=?, content=? WHERE id=?");
    $stmt->bind_param("ssssi", $data['title'], $data['subtitle'], $data['author'], $content, $id);
    
    echo json_encode(["status" => $stmt->execute() ? "success" : "error", "message" => $stmt->error ?: "Blog updated successfully!"]);
    exit;
}

if ($method === "DELETE") {
    $id = intval($input['id']);
    $stmt = $conn->prepare("DELETE FROM blogs_posts WHERE id=?");
    $stmt->bind_param("i", $id);
    echo json_encode(["status" => $stmt->execute() ? "success" : "error", "message" => $stmt->error ?: "Blog deleted successfully!"]);
    exit;
}
?>
