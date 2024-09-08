<?php
session_start();
session_regenerate_id(true);

include('config.php');
include('functions.php');

$path = "../";
$title = "Login";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize input
    $cleanUsername = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

    $userId = isValidCredentials($cleanUsername, $password);

    if ($userId !== false) {
        $_SESSION['user_id'] = $userId;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}

include('includes/header.php');
?>

<!-- Login form -->
<div class="login-form container">
    <h2>Login</h2>
    <?php if (isset($error)) : ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="login.php" method="post" class="needs-validation" novalidate>
                <div class="my-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                    <div class="invalid-feedback">
                        Please provide username.
                    </div>
                </div>
                <div class=" my-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <div class="invalid-feedback">
                        Please provide password.
                    </div>
                </div>

                <input class="btn btn-dark" type="submit" value="Login">
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
