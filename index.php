<?php
session_start();
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Prepare and execute the SQL query to insert the data
    $stmt = $conn->prepare("INSERT INTO contacts (first_name, last_name, email, phone, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $first_name, $last_name, $email, $phone, $message);
    
    if ($stmt->execute()) {
        // Message stored successfully
        echo "<script>alert('Your message has been sent successfully!');</script>";
    } else {
        // Error handling
        echo "<script>alert('There was an error sending your message. Please try again.');</script>";
    }

    $stmt->close();
    $conn->close();
}

// Set inactivity timeout to 15 minutes
$timeout_duration = 900; // 900 seconds = 15 minutes

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    // If the last activity was more than the timeout duration, log the user out
    session_unset();     // Unset session variables
    session_destroy();   // Destroy the session
    header("Location: login.php"); // Redirect to the login page
    exit();
}

$_SESSION['LAST_ACTIVITY'] = time(); // Update last activity timestamp

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hivzi-Sulejmani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <nav class="navbar navbar-expand bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="oraret.php">Oraret</a>
                </li>
                <?php if (isset($_SESSION['admin_id'])): // Check if the user is an admin ?>
            <li class="nav-item">
                <a class="nav-link" href="admin_contacts.php">Admin Contacts</a>
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
    <header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">Gjimnazi Hivzi Sulejmani Fushë Kosovë</h1>
                                <p class="lead fw-normal text-white-50 mb-4">Gjimnaz për shkencat natyrore dhe shoqërore</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="logo.png" alt="..." /></div>
                    </div>
                </div>
            </header>
    <!-- Page content can go here -->


    <main class="flex-shrink-0">
            <!-- Navigation-->
            
            <!-- Page Content-->
            <section class="py-5">
                <div class="container px-5">
                    <h1 class="fw-bolder fs-5 mb-4">Gjimnazi Hivzi Sulejmani</h1>
                    <div class="card border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row gx-0">
                                <div class="col-lg-6 col-xl-5 py-lg-5">
                                    <div class="p-4 p-md-5">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                        <div class="h2 fw-bolder">Gjimnazi Hivzi Sulejmani  </div>
                                        <p>Të nderuar mysafirë, të dashur prindër, dhe të dashur nxënës,<br>

Sot, ne jemi mbledhur këtu në Gjimnazin Hivzi Sulejmani, një simbol i edukatës dhe shkëlqimit në komunitetin tonë. Shkolla jonë është e përkushtuar për të promovuar jo vetëm arritjet akademike, por gjithashtu rritjen dhe zhvillimin personal të çdo nxënësi....</p>
                                        <a class="stretched-link text-decoration-none" href="gjimnazi.php">
                                            Read more
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-7"><div class="bg-featured-blog" style="background-image: url('GIMNAZI.jpg');)"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Blog preview section-->
           
        </main>
        <!-- Contacti -->
<hr>

        <h1>Contact Us</h1>
<form id="contact_form" name="contact_form" method="post">
    <div class="mb-5 row">
        <div class="col">
            <label>First Name</label>
            <input type="text" required maxlength="50" class="form-control" id="first_name" name="first_name">
        </div>
        <div class="col">
            <label>Last Name</label>
            <input type="text" required maxlength="50" class="form-control" id="last_name" name="last_name">
        </div>
    </div>
    <div class="mb-5 row">
        <div class="col">
            <label for="email_addr">Email address</label>
            <input type="email" required maxlength="50" class="form-control" id="email_addr" name="email" placeholder="name@example.com">
        </div>
        <div class="col">
            <label for="phone_input">Phone</label>
            <input type="tel" required maxlength="50" class="form-control" id="phone_input" name="phone" placeholder="Phone">
        </div>
    </div>
    <div class="mb-5">
        <label for="message">Message</label>
        <textarea class="form-control" id="message" name="message" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-primary px-4 btn-lg">Post</button>
</form>
<hr>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Gjimnazi Hivzi Sulejmani 2024</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>


            
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
</body>
</html>
