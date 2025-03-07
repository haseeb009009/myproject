<?php
session_start();  // Adjust path if needed

// Enable error reporting (REMOVE in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$dbname = "lms";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        echo "<script>alert('All fields are required!'); window.location.href='login.html';</script>";
        exit;
    }

    // Query to find the user
    $sql = "SELECT id, username, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Database error: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $db_password);
        $stmt->fetch();

        if ($password === $db_password) { 
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $username;
            
            // ✅ Redirect to index.html
            header("Location: http://localhost/myproject/frontend/index.html");
            exit;
        } else {
            echo "<script>alert('Invalid password!'); window.location.href='login.html';</script>";
            exit;
        }
    } else {
        echo "<script>alert('No user found with this email!'); window.location.href='login.html';</script>";
        exit;
    }

    $stmt->close();
}
$conn->close();
?>
