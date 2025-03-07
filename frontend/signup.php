<?php
//die("signup.php is executing!"); 


// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$host = "localhost";
$dbname = "lms";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $pass = trim($_POST["password"]);

    // Validate inputs
    if (empty($user) || empty($email) || empty($pass)) {
        die("All fields are required!");
    }

    // Store password as plain text (Not recommended)
    $plain_password = $pass;

    // Insert user into the database
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $user, $email, $plain_password);

    if ($stmt->execute()) {
        echo "<script>alert('Signup successful! Redirecting to login...'); window.location.href='login.html';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
