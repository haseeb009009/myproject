<?php
session_start();
$host = "localhost";
$dbname = "lms";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('You need to log in first!'); window.location.href='login.html';</script>";
    exit;
}

// Check if course_id is provided
if (!isset($_GET['course_id'])) {
    echo "<script>alert('Invalid course selection!'); window.location.href='courses.php';</script>";
    exit;
}

$course_id = $_GET['course_id'];
$user_id = $_SESSION['user_id'];

// Fetch course details
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
    <title><?php echo $course['title']; ?> - Course</title>
</head>
<body>
    <div class="container">
        <h1><?php echo $course['title']; ?></h1>
        <p><?php echo $course['description']; ?></p>
        
        <!-- Course Video -->
        <video width="100%" height="auto" controls>
            <source src="<?php echo $course['video_url']; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        
        <!-- Notepad Feature -->
        <h3>Take Notes</h3>
        <textarea id="notes" rows="6" cols="50" placeholder="Write your notes here..."></textarea>
        <br>
        <button onclick="downloadNotes()">Save Notes</button>
    </div>

    <script>
        function downloadNotes() {
            let notes = document.getElementById("notes").value;
            let blob = new Blob([notes], { type: "text/plain" });
            let link = document.createElement("a");
            link.href = URL.createObjectURL(blob);
            link.download = "Course_Notes.txt";
            link.click();
        }
    </script>
</body>
</html>
