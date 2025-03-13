<?php
session_start();

$host = "localhost";
$dbname = "lms";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);
// Check if course_id is provided
if (!isset($_GET['course_id'])) {
    echo "<script>alert('No course selected!'); window.location.href='courses.php';</script>";
    exit;
}

$course_id = $_GET['course_id'];

// Fetch course details from database
$sql = "SELECT * FROM courses WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $course_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $course = $result->fetch_assoc();
} else {
    echo "<script>alert('Course not found!'); window.location.href='courses.php';</script>";
    exit;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $course['title']; ?> - Course Details</title>
</head>
<body>
    <div class="container">
        <h1><?php echo $course['title']; ?></h1>
        <p><?php echo $course['description']; ?></p>
        <p><strong>Instructor:</strong> <?php echo $course['instructor']; ?></p>
        <p><strong>Duration:</strong> <?php echo $course['duration']; ?></p>
        
        <a href="enroll.php?course_id=<?php echo $course_id; ?>" class="btn btn-primary">Enroll Now</a>
    </div>
</body>
</html>
