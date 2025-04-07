<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Bootstrap | Create Blog</title>
    <link rel="stylesheet" href="../dist/css/vendors.min.css">
    <link rel="stylesheet" href="../dist/css/style.css">
</head>
<body>
<div class="dashboard-container">
    <div class="container">
        <nav class="navbar fixed-top text-light navbar-dashboard">
            <a class="navbar-brand navbar-logo-dashboard" href="#">Start Bootstrap</a>
            <div class="menu-with-profile-dashboard">
                <div class="user-info">
                    <i class="fas fa-user-circle"></i>
                    <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </div>

    <aside class="collapse sidebar-collapse-dashboard" id="sidebarCollapse">
        <nav class="sidebar-nav">
            <a href="../home" class="nav-item"><i class="fas fa-home"></i> Home</a>
            <a href="../admin/dashboard" class="nav-item"><i class="fas fa-plus"></i> Dashboard</a>
            <a href="../admin/create-blog" class="nav-item"><i class="fas fa-plus"></i> Create New Blog</a>
            <a href="../includes/logout" class="nav-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </aside>

    <main class="main-content">
        <div class="content-area">
            <h3>Create a New Blog</h3>
            <form id="blog-form" class="blog-data-form" method="POST">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="subtitle">Subtitle:</label>
                <input type="text" id="subtitle" name="subtitle">

                <label for="author">Author:</label>
                <input type="text" id="author" name="author">

                <label for="content">Content:</label>
                <textarea id="content" name="content" rows="6"></textarea>

                <input type="hidden" name="id" id="blog-id">
                <button type="submit" class="upload-btn">Publish Your Blog</button>
            </form>
        </div>
    </main>
</div>


    <script src="../dist/tinymce-text-editor/tinymce.min.js"></script>
    <script src="../dist/js/editor.js"></script>
    <script src="../dist/js/vendors.min.js"></script>
    <script src="../dist/js/script.min.js"></script>
</body>
</html>