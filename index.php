<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: admin/dashboard");
    exit;
}
require 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="dist/css/vendors.min.css">
    <link rel="stylesheet" href="dist/css/style.css">
</head>
<body>
    <div class="wrapper-login-page">
    <div class="container">
      <div class="login-content">
        <h1>Welcome! Login To Continue</h1>
        <p>"Enhance your blog experience. Login to save articles, receive recommendations, and manage your subscriptions."</p>
        <form method="POST" class="login-form">
               <input type="text" name="login_identifier" placeholder="Enter Username or Email" required>
               <input type="password" name="password" placeholder="Enter Your Password" required>
                <button type="submit"><a href="/admin/dashboard">Login</a></button>
        </form>
        <p class="mt-4 mb-3">Don't have an account? <a href="signup">Click here to SignUp</a></p>
        </div>

<script src="dist/js/vendors.min.js"></script>
<script src="dist/js/script.min.js"></script>

</body>
</html>
