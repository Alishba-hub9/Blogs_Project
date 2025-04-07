<?php
include "db.php";

if (isset($_GET["query"])) {
    $query = $_GET["query"];
    $stmt = $conn->prepare("SELECT id, title FROM blogs_posts WHERE title LIKE ?");
    $searchQuery = "%" . $query . "%";
    $stmt->bind_param("s", $searchQuery);
    $stmt->execute();
    $result = $stmt->get_result();

    $blogs = [];
    while ($row = $result->fetch_assoc()) {
        $blogs[] = $row;
    }

    echo json_encode($blogs);
}
?>
