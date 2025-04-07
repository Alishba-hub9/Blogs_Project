<?php
session_start();
$loggedIn = isset($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Start Bootstrap | Blogs Preview</title>
  <link rel="stylesheet" href="dist/css/vendors.min.css" />
  <link rel="stylesheet" href="dist/css/style.css" />
</head>
<body>

<header class="header-navbar">
  <div class="container">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand navbar-logo mx-0" href="index">Start Bootstrap</a>

      <div class="search-with-buttons-wrapper ms-auto py-1">
        <div class="nav-item search-field">
          <input type="text" class="blog-search" placeholder="Search blogs..." />
          <button class="search-btn">
            <i class="fas fa-search"></i>
          </button>
          <div class="suggestions"></div>
        </div>

        <button class="search-text-button d-lg-none">SEARCH</button>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <?php if ($loggedIn) { ?>
            <i class="fas fa-user-circle"></i>
            <p>YOU</p>
          <?php } else { ?>
            <p>MENU</p>
          <?php } ?>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse menu-collapse" id="navbarNav">
        <ul class="navbar-nav navbar-fixed-content ms-auto">
          <?php if ($loggedIn) { ?>
            <li class="nav-item">
              <a class="nav-link" href="home">
                <span class="d-inline d-lg-none"><i class="fas fa-home me-1"></i></span> HOME
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin/dashboard">
                <span class="d-inline d-lg-none"><i class="fa-solid fa-gauge-simple-high me-1"></i></span> DASHBOARD
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="includes/logout">
                <span class="d-inline d-lg-none"><i class="fas fa-sign-out-alt me-1"></i></span> LOGOUT
              </a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="home">
                <span class="d-inline d-lg-none"><i class="fas fa-home me-1"></i></span> HOME
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index">
                <span class="d-inline d-lg-none"><i class="fa-solid fa-right-to-bracket me-1"></i></span> LOGIN
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup">
                <span class="d-inline d-lg-none"><i class="fa-solid fa-user-plus me-1"></i></span> SIGNUP
              </a>
            </li>
          <?php } ?>
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

<section class="single-blogs-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="row">
          <div class="col-12">
            <div class="blogs-header-content text-light" data-aos="fade-down"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="single-blog-content">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-12">
            <div class="single-blog-body-content"></div>
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
