<?php
session_start();
include "connect.php";



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hivzi-Sulejmani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="oraret.php">Oraret</a>
                </li>
                <?php if (isset($_SESSION['admin_id'])): // Check if the user is an admin ?>
            <li class="nav-item">
                <a class="nav-link " href="admin_contacts.php">Admin Contacts</a>
            </li>
            <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
        <?php endif; ?>
                <!-- Other nav items can go here -->
            </ul>

            <!-- Right side of the navbar -->
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['name']) && isset($_SESSION['surname'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php"> <?php echo $_SESSION['name'] . ' ' . $_SESSION['surname']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</body>
</html>
