<?php
session_start();
session_regenerate_id(true);

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
include('includes/header.php');
?>

<!-- Index content -->
<div class="index-content">
    <h2>Welcome to the Admin Panel</h2>
    <p>This is the landing page for the admin panel. Please log in or register to access the dashboard.</p>
    <p>If you already have an account, you can <a href="login.php">log in here</a>.</p>
    <p>If you don't have an account, you can <a href="register.php">register here</a>.</p>
</div>

<?php include('includes/footer.php'); ?>
