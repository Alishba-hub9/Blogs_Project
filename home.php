<?php
session_start();
$loggedIn = isset($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Start Bootstrap | HOME</title>
  <link rel="stylesheet" href="dist/css/vendors.min.css" />
  <link rel="stylesheet" href="dist/css/style.css" />
</head>
<body>

<header class="header-navbar">
  <div class="container">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand navbar-logo mx-0" href="index">Start Bootstrap</a>
      <div class="search-with-buttons-wrapper ms-auto py-1">
        <form class="nav-item search-field" method="get">
          <input type="text" name="query" class="blog-search" placeholder="Search blogs..." autocomplete="off" />
          <button type="submit" class="search-btn">
            <i class="fas fa-search"></i>
          </button>
          <div class="suggestions"></div>
        </form>

        <button class="search-text-button d-lg-none">SEARCH</button>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <?php if ($loggedIn): ?>
            <i class="fas fa-user-circle"></i>
            <p>YOU</p>
          <?php else: ?>
            <p>MENU</p>
          <?php endif; ?>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse menu-collapse" id="navbarNav">
        <ul class="navbar-nav navbar-fixed-content ms-auto">
          <?php if ($loggedIn): ?>
            <li class="nav-item d-lg-flex"> 
              <a class="nav-link" href="admin/dashboard">
                <i class="fa-solid fa-gauge-simple-high d-lg-none me-1"></i>DASHBOARD
              </a>
              <a class="nav-link" href="includes/logout">
                <i class="fas fa-sign-out-alt d-lg-none me-1"></i>LOGOUT
              </a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="index">
                <i class="fa-solid fa-right-to-bracket d-lg-none me-1"></i>LOGIN
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup">
                <i class="fa-solid fa-user-plus d-lg-none me-1"></i>SIGNUP
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>

    <div class="suggestion-template d-none">
      <div class="search-result" data-id="">
        <span class="result-title"></span>
      </div>
    </div>
  </div>
</header>

<section class="hero-section text-center">
  <div class="container">
    <div class="hero-content text-light" data-aos="fade-down">
      <h1>Clean Blog</h1>
      <p class="sub-heading">A Blog Theme by Start Bootstrap</p>
    </div>
  </div>
</section>



<section class="blog-posts">
<button class="floating-btn"><i class="fas fa-arrow-down"></i> See Blogs</button>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-12">
            <div class="blog-posts-content" data-aos = "fade-up">
              <div class="d-flex justify-content-center py-4 pt-0">
                <div class="spinner-grow" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="border-top">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        <ul class="footer-list text-center mb-3">
          <li class="footer-list-item">
            <a href="javascript:void(0)">
              <span class="fa-stack fa-lg footer-icon-stack">
                <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="footer-list-item">
            <a href="javascript:void(0)">
              <span class="fa-stack fa-lg footer-icon-stack">
                <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="footer-list-item">
            <a href="javascript:void(0)">
              <span class="fa-stack fa-lg footer-icon-stack">
                <i class="fab fa-github fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
        </ul>
        <p class="copyright-text text-muted">
          Copyright &copy; Your Website 2023
        </p>
      </div>
    </div>
  </div>
</footer>

<script src="dist/js/vendors.min.js"></script>
<script src="dist/js/script.min.js"></script>

</body>
</html>
