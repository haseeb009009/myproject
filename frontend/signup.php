<?php
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

    // Check if user already exists
    $check_sql = "SELECT id FROM users WHERE email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        // User already exists
        echo "<script>alert('User already registered! Redirecting to login...'); window.location.href='login.html';</script>";
        exit;
    }

    // Close the check statement
    $check_stmt->close();

    // Store password as plain text (Not recommended for security reasons)
    $plain_password = $pass;

    // Insert new user into the database
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $user, $email, $plain_password);

    if ($stmt->execute()) {
        echo "<script>alert('Signup successful! Redirecting to login...'); window.location.href='login.html';</script>";
    } else {
        echo "<script>alert('Error in registration! Please try again.'); window.history.back();</script>";
    }

    // Close statements and connection
    $stmt->close();
    $conn->close();
}
?>
