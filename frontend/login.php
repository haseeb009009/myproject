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
            
    
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                document.body.innerHTML += '<div id=\"msgBox\" style=\"position:fixed; top:20px; left:50%; transform:translateX(-50%); background:#28a745; color:#fff; padding:10px 20px; border-radius:5px; font-size:16px; z-index:1000;\">Login successful! Redirecting to Home...</div>';
                setTimeout(function() {
                    window.location.href = 'index.html';
                }, 1000);
            });
        </script>";
            exit;
        } else {
            echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.innerHTML += '<div id=\"msgBox\" style=\"position:fixed; top:20px; left:50%; transform:translateX(-50%); background:#dc3545; color:#fff; padding:10px 20px; border-radius:5px; font-size:16px; z-index:1000;\">Invalid password! Redirecting to login...</div>';
            setTimeout(function() {
                window.location.href = 'login.html';
            }, 1000);
        });
    </script>";
            exit;
        }
    } else {
        echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.body.innerHTML += '<div id=\"msgBox\" style=\"position:fixed; top:20px; left:50%; transform:translateX(-50%); background:#dc3545; color:#fff; padding:10px 20px; border-radius:5px; font-size:16px; z-index:1000;\">No user found with this email! Redirecting to login...</div>';
        setTimeout(function() {
            window.location.href = 'login.html';
        }, 1000);
    });
</script>";;
        exit;
    }

    $stmt->close();
}
$conn->close();
?>
