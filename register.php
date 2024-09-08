<?php
session_start();

include('config.php');
include('functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize input
    $cleanUsername = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

    // Check if the username is already taken
    $checkUsernameStmt = $conn->prepare("SELECT id FROM admin_users WHERE username = ?");
    $checkUsernameStmt->bind_param("s", $cleanUsername);
    $checkUsernameStmt->execute();
    $checkUsernameStmt->store_result();

    if ($checkUsernameStmt->num_rows > 0) {
        $error = "Username already taken. Choose a different one.";
    } else {
        // Create the new user
        if (createUser($cleanUsername, $password)) {
            header("Location: login.php");
            exit();
        } else {
            $error = "Error creating user. Please try again.";
        }
    }

    $checkUsernameStmt->close();
}

include('includes/header.php');
?>

<!-- Registration form -->
<div class="registration-form container">
    <h2>Register</h2>
    <?php if (isset($error)) : ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="register.php" method="post" class="needs-validation" novalidate>
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

                <input class="btn btn-dark" type="submit" value="Register">
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
