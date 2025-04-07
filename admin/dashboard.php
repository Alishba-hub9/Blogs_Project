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
    <title>Start Bootstrap | Dashboard</title>
    <link rel="stylesheet" href="../dist/css/vendors.min.css">
    <link rel="stylesheet" href="../dist/css/style.css">
</head>
<body>
<div class="dashboard-container">
  <div class="container">
    <nav class="navbar fixed-top text-light navbar-dashboard">
      <a class="navbar-brand navbar-logo-dashboard mx-0" href="#">Start Bootstrap</a>
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
      <a href="../admin/dashboard" class="nav-item"><i class="fa-solid fa-gauge-simple-high"></i> Dashboard</a>
      <a href="../admin/create-blog" class="nav-item"><i class="fas fa-plus"></i> Create New Blog</a>
      <a href="../includes/logout" class="nav-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </nav>
  </aside>

  <main class="main-content">
    <div class="content-area">
      <div class="heading-with-button">
        <h1>Your Blogs</h1>
        <a href="../admin/create-blog">
          <button class="create-blog-btn">
            <i class="fas fa-plus"></i> Create New Blog
          </button>
        </a>
      </div>
      <div class="dashboard-blogs">
      <div class="d-flex justify-content-center">
  <div class="spinner-grow" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>
      </div>
    </div>
  </main>
</div>

    <script src="../dist/js/vendors.min.js"></script>
    <script src="../dist/js/script.min.js"></script>
    <script src="../dist/tinymce-text-editor/tinymce.min.js"></script>
    <script src="../dist/js/editor.js"></script>
</body>
</html>