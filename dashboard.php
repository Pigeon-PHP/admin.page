<?php
session_start();
session_regenerate_id(true);

$path = "../";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include('includes/header.php');
?>

<!-- Dashboard content -->
<div class="dashboard-content">
    <h2>Welcome to the Dashboard</h2>
    <p>Hello, <?php echo $_SESSION['user_id']; ?>! This is your admin dashboard.</p>

    <p><a href="logout.php">Logout</a></p>
</div>

<?php include('includes/footer.php'); ?>
