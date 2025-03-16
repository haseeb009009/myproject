<?php
 
$servername = "localhost";
$username = "root";  // Change if needed
$password = "";  // Change if needed
$dbname = "lms";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if user is logged in
 include 'auth.php';

$user_id = $_SESSION['user_id'];

// Fetch user details
$sql = "SELECT username, email, created_at FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_result = $stmt->get_result();
$user = $user_result->fetch_assoc();

// Fetch enrolled courses
$sql = "SELECT course_id, course_name FROM enrollments WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$course_result = $stmt->get_result();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['unenroll'])) {
    $course_id = $_POST['course_id'];
    
    // Remove enrollment from the database
    $sql = "DELETE FROM enrollments WHERE user_id = ? AND course_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $course_id);
    $stmt->execute();
    
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        let msgBox = document.createElement('div');
        msgBox.id = 'msgBox';
        msgBox.innerHTML = '&#9888; You have been unenrolled from the course.';
        msgBox.style.position = 'fixed';
        msgBox.style.top = '50%';
        msgBox.style.left = '50%';
        msgBox.style.transform = 'translate(-50%, -50%)';
        msgBox.style.background = '#fb873f';
            msgBox.style.color = 'black';
        msgBox.style.padding = '16px 28px';
        msgBox.style.borderRadius = '10px';
        msgBox.style.fontSize = '18px';
        msgBox.style.fontWeight = 'bold';
        msgBox.style.boxShadow = '0 6px 12px rgba(0, 0, 0, 0.3)';
        msgBox.style.display = 'flex';
        msgBox.style.alignItems = 'center';
        msgBox.style.justifyContent = 'center';
        msgBox.style.gap = '12px';
        msgBox.style.zIndex = '1000';
        msgBox.style.opacity = '0.95';
        msgBox.style.textAlign = 'center';
        msgBox.style.width = 'auto';
        msgBox.style.maxWidth = '80%';
        document.body.appendChild(msgBox);
        setTimeout(function() {
            window.location.href = 'profile.php';
        }, 2000);
    });
</script>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="google-translate-customization" content="9f841e7780177523-3214ceb76f765f38-gc38c6fe6f9d06436-c">
    </meta>

    <title>CourseCraft  : profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/iconn.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <title>User Profile</title>
</head>
<body>


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="img/iconn.png" alt="" height="50px">
            <div class="ms-2">
            <p class="m-0 fw-bold" style="font-size: 25px;">CourseCraft</p>
            <p class="m-0" style="font-size: 12px;">E-learning platform</p>
            </div>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link ">Home</a>
                <a href="courses.php" class="nav-item nav-link">Courses</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.php" class="dropdown-item">Our Team</a>
                        <a href="contact.php" class="dropdown-item">Contact</a>
                        <a href="instructor.php" class="dropdown-item">Our instructors</a>
                        <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link"></a>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="login.html" class="nav-item nav-link"><i class="fa fa-user"></i>login</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="logout.php" class="nav-item nav-link">Logout</a>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="profile.php" class="nav-item nav-link">Profile</a>
                    <?php endif; ?>
                <?php endif; ?>
                <a href="#" class="nav-item nav-link">
                    <div id="google_translate_element">
                    </div>
                </a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="container mt-5">
        <div class="card shadow p-4">
            <h1 class="text-center">MY PROFILE</h1>
            <hr>
            <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p><strong>Joined:</strong> <?php echo $user['created_at']; ?></p>
            
            <hr>
            <h2>Enrolled Courses</h2>
            <?php if ($course_result->num_rows > 0): ?>
                <ul class="list-group">
                    <?php while ($row = $course_result->fetch_assoc()): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong><?php echo $row['course_name']; ?></strong>
                            <div>
                                <a href="watch_course.php?course_id=<?php echo $row['course_id']; ?>" class="btn btn-primary btn-sm">Continue Course</a>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="course_id" value="<?php echo $row['course_id']; ?>">
                                    <button type="submit" name="unenroll" class="btn btn-danger btn-sm">Unenroll</button>
                                </form>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p class="text-muted">You have not enrolled in any courses yet.</p>
            <?php endif; ?>
            
            <hr>
            <h2>Account Settings</h2>
            <a href="forgot_password.php" class="btn btn-danger">Reset Password</a>
            <br>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <p><a class="text-light" href="about.php">About Us</a></p>
                    <p><a class="text-light" href="contact.php">Contact Us</a></p>
                    <p><a class="text-light" href="">Privacy Policy</a></p>
                    <p><a class="text-light" href="">Terms & Condition</a></p>
                    <p><a class="text-light" href="">FAQs & Help</a></p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, karachi</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+923085791717</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>CourseCraft@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Subscribe to our Newsletter</h4>
                    <p>Subscribe now and join our growing community of learners committed to lifelong education! </p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <form action="#">
                            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="email"
                                placeholder="Your email" required>
                            <button type="submit"
                                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2"><a
                                    href="mailto:keertidvcorai@gmail.com">Subscribe</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="index.php">CourseCraft</a>, All Right Reserved.

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


</body>
</html>
