<?php
session_start();

$path = "../";
$title = "Register User";
// Check if the user is logged in
// if (!isset($_SESSION["username"]) || !isset($_SESSION["id"])) {
//     header("Location: login.php");
//     exit();
// }

// include __DIR__ . '/dbconnect.php';

// Fetch order history for the user based on their ID, including supplier information



// Fetch user details
// $user_id = $_SESSION["id"];
// $query = "SELECT * FROM UserDetails WHERE user_id = $user_id";
// $result = mysqli_query($conn, $query);
// $userDetails = mysqli_fetch_assoc($result);

// // Handle form submission
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Get data from the form
//     $telephone_number = $_POST['telephone_number'];
//     $address = $_POST['address'];
//     $vat = $_POST['vat'];
//     $company_name = $_POST['company_name'];

//     // Update user details in the database
//     $query = "INSERT INTO UserDetails (user_id, telephone_number, address, vat, company_name) 
//               VALUES ($user_id, '$telephone_number', '$address', '$vat', '$company_name') 
//               ON DUPLICATE KEY UPDATE 
//               telephone_number = VALUES(telephone_number), 
//               address = VALUES(address), 
//               vat = VALUES(vat), 
//               company_name = VALUES(company_name)";

//     $result = mysqli_query($conn, $query);

//     if ($result) {
//         // Successful update
//         $success_message = "Details updated successfully!";
//         // Fetch user details again to display updated information
//         $query = "SELECT * FROM UserDetails WHERE user_id = $user_id";
//         $result = mysqli_query($conn, $query);
//         $userDetails = mysqli_fetch_assoc($result);
//     } else {
//         // Handle errors
//         $error_message = "Error updating details: " . mysqli_error($conn);
//     }
// }

// mysqli_close($conn);

include($path."includes/header.php");
?>

<!-- HTML form for user account details -->
<div class="container">
    <form class="needs-validation" novalidate action="" method="post">
        <!-- Display success or error messages if set -->
        <?php if (isset($success_message)) : ?>
            <div class="alert alert-success"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <?php if (isset($error_message)) : ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <div class="form-group">
            <label for="username" class="form-label">Username:</label>
            <input class="form-control" type="text" name="username" required>
            <div class="invalid-feedback">Please provide a username.</div>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password:</label>
            <input class="form-control" type="password" name="password" required>
            <div class="invalid-feedback">Please provide a password.</div>
        </div>

        <div class="form-group">
            <label for="telephone_number" class="form-label">Telephone Number:</label>
            <input class="form-control" type="text" name="telephone_number" value="<?php echo isset($userDetails['telephone_number']) ? $userDetails['telephone_number'] : ''; ?>" required>
            <div class="invalid-feedback">Please provide a telephone number.</div>
        </div>

        <div class="form-group">
            <label for="address" class="form-label">Address:</label>
            <input class="form-control" type="text" name="address" value="<?php echo isset($userDetails['address']) ? $userDetails['address'] : ''; ?>" required>
            <div class="invalid-feedback">Please provide an address.</div>
        </div>

        <div class="form-group">
            <label for="vat" class="form-label">VAT:</label>
            <input class="form-control" type="text" name="vat" value="<?php echo isset($userDetails['vat']) ? $userDetails['vat'] : ''; ?>" required>
            <div class="invalid-feedback">Please provide a VAT number.</div>
        </div>

        <div class="form-group">
            <label for="company_name" class="form-label">Company Name:</label>
            <input class="form-control" type="text" name="company_name" value="<?php echo isset($userDetails['company_name']) ? $userDetails['company_name'] : ''; ?>" required>
            <div class="invalid-feedback">Please provide a company name.</div>
        </div>

        <!-- Add more fields as needed -->

        <!-- Submit button -->
        <button class="btn btn-primary" type="submit">Save Changes</button>
    </form>
</div>

<?php
include('../includes/footer.php'); 
?>