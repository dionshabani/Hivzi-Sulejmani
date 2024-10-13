<?php
// admin_contacts.php
session_start();
include "connect.php";

// Assuming you have admin authentication here
$result = $conn->query("SELECT * FROM contacts ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hivzi-Sulejmani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @media (max-width: 768px) {
            td, th {
                font-size: 12px; /* Reduce font size */
                padding: 8px;    /* Reduce padding */
            }

            td:nth-child(4), th:nth-child(4), /* Email */
            td:nth-child(5), th:nth-child(5), /* Phone */
            td:nth-child(6), th:nth-child(6) { /* Message */
                max-width: 100px; /* Smaller max-width for smaller screens */
                word-wrap: break-word; /* Ensure text wraps */
            }
        }

        /* For even smaller devices like phones */
        @media (max-width: 576px) {
            td, th {
                font-size: 10px; /* Further reduce font size */
                padding: 6px;    /* Further reduce padding */
            }

            td:nth-child(4), th:nth-child(4), /* Email */
            td:nth-child(5), th:nth-child(5), /* Phone */
            td:nth-child(6), th:nth-child(6) { /* Message */
                max-width: 80px; /* Even smaller for phones */
                word-wrap: break-word;
            }
        }

        /* Ensure text wraps for all screen sizes */
        td, th {
            white-space: normal;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="oraret.php">Oraret</a>
                </li>
                <?php if (isset($_SESSION['admin_id'])): // Check if the user is an admin ?>
            <li class="nav-item">
                <a class="nav-link active" href="admin_contacts.php">Admin Contacts</a>
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

    <div class="container mt-5">
        <h1 class="mb-4">Contact Messages</h1>

        <!-- Make table responsive on smaller screens -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Received At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['message']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
   
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
</body>
</html>