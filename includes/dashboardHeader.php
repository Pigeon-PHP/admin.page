<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/page.css" />
	<link href="plugins/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="plugins/css/icons.min.css" rel="stylesheet" type="text/css" />
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<!-- <link rel="stylesheet" href="plugins/css/bootstarp-icons.css"> -->
	<script src="js/axios.min.js"></script>
    <link rel="stylesheet" href="./css/styles.css">
    
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href= "<?php echo $path; ?>index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $path; ?>dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo $path; ?>register-roles/register-user.php">Regiter User</a></li>
            <li><a class="dropdown-item" href="<?php echo $path; ?>register-roles/register-supplier.php">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <!-- <a class="nav-link" href="logout.php">Logout</a> -->
          <?php
            // Check if the user is logged in
            if(isset($_SESSION['user_id']) && $_SESSION['user_id']) {
                // If logged in, display the "Logout" link
                echo '<a class="nav-link" href="logout.php">Logout</a>';
            }
            ?>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="mx-3 my-3">
