<?php
session_start();
include 'connect.php'; // Corrected: added a semicolon

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_BCRYPT); // Hashing the password
    
    
    $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmailQuery);
    if ($result->num_rows > 0) {
      // Email already exists
      echo "Email already registered. Please use a different email.";
  } else {
    $sql = "INSERT INTO users (name, surname, class, email, password)
            VALUES ('$name', '$surname', '$class', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hivzi-Sulejmani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <nav class="navbar navbar-expand bg-dark navbar-dark">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="oraret.php">Oraret</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="login.php">Login</a>
            </li>
          </ul>
        </div>
    </nav>
     
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Register</h2>
                <div class="text-center mb-5 text-dark">Hivzi Sulejmani</div>
                <div class="card my-5">
                    <form class="card-body cardbody-color p-lg-5" method="POST">
                        <div class="text-center">
                            <img src="logo.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                            width="200px" alt="profile">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" required>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" id="class" name="class" required>
                                <option selected disabled>Select your class</option>
                                <option value="X/1">X/1</option>
                                <option value="X/2">X/2</option>
                                <option value="X/3">X/3</option>
                                <option value="X/4">X/4</option>
                                <option value="X/5">X/5</option>
                                <option value="X/6">X/6</option>
                                <option value="XI/1">XI/1</option>
                                <option value="XI/2">XI/2</option>
                                <option value="XI/3">XI/3</option>
                                <option value="XI/4">XI/4</option>
                                <option value="XI/5">XI/5</option>
                                <option value="XI/6">XI/6</option>
                                <option value="XII/1">XII/1</option>
                                <option value="XII/2">XII/2</option>
                                <option value="XII/3">XII/3</option>
                                <option value="XII/4">XII/4</option>
                                <option value="XII/5">XII/5</option>
                                <option value="XII/6">XII/6</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-color px-5 mb-5 w-100">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
