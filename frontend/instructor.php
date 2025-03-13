<?php include 'auth.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Secret Coder : Instructor</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/icon.png" rel="icon">

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

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <p class="m-0 fw-bold" style="font-size: 25px;"><img src="img/icon.png" alt="" height="50px"> ifiii-E-learning<span
                    style="color: #fb873f;"></span></p>
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

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Become An Instructor</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.html">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Become An Instructor</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Instructor Page Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5 bg-white text-center px-3" style="color: #fb873f;">Apply As Instructor</h1>
                
            </div>
            <div class="row g-4">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>Welcome to SecretCoder - Where Knowledge Meets Innovation</h5>
                    <p class="mb-4">Are you passionate about sharing your expertise and making a real impact on learners worldwide? If so, we invite you to become an instructor on our dynamic e-learning platform! Join a community of educators dedicated to fostering a love for learning and empowering individuals to achieve their goals.</p>
                   
                    
                </div>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/instructor-1.jpg" alt=""
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    
                    <h1 class="mb-4" style="color: #fb873f;">Why Choose SecretCoder as Your Teaching Hub?</h1>
                    
                    <div class="row gy-2 gx-4 mb-4">
                        <ul style="list-style: none;">
                            <li><b>Global Reach, Local Impact :</b> Reach a diverse audience from all corners of the globe while making a meaningful difference in individual lives.</li>
                            <li><b>Cutting-Edge Technology : </b>Leverage our state-of-the-art e-learning infrastructure, ensuring a seamless and engaging learning experience for both you and your students.</li>
                            <li><b>Flexible Teaching Opportunities : </b>Create and manage your courses on a schedule that suits your lifestyle, allowing you to balance your professional and personal commitments.</li>
                            <li><b>Competitive Compensation : </b> Benefit from a transparent and rewarding compensation structure that recognizes your expertise and commitment to education.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-2 text-center">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 style="color: #fb873f;">How It Works</h1>
                    <p class="mb-5">Your Journey to Becoming an Instructor</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3 shadow">
                        <div class="p-4">
                            <h5 class="mb-3">Application Process</h5>
                            <p>Submit your application and provide details about your expertise, teaching philosophy, and the courses you want to offer.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3 shadow">
                        <div class="p-4">
                            <h5 class="mb-3">Content Creation</h5>
                            <p>Develop high-quality course content with the support of our instructional design team, ensuring your materials are engaging and effective.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3 shadow">
                        <div class="p-4">
                            <h5 class="mb-3">Go Live</h5>
                            <p>Once approved, your courses go live on our platform, and learners from around the world can enroll and benefit from your knowledge.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3 shadow">
                        <div class="p-4">
                            <h5 class="mb-3">Engage and Grow</h5>
                            <p>Interact with your students through discussion forums, live Q&A sessions, and feedback mechanisms, fostering a supportive learning community.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
               
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    
                    <h1 class="mb-4" style="color: #fb873f;">What We Look for in Our Instructors</h1>
                    
                    <div class="row gy-2 gx-4 mb-4">
                        <ul style="list-style: none;">
                            <li><b>Passion for Teaching :</b>A genuine enthusiasm for sharing knowledge and facilitating the learning journey for others.</li>
                            <li><b>Expertise in Your Field : </b>Demonstrated expertise in your subject matter, backed by relevant qualifications and experience.</li>
                            <li><b>Communication Skills : </b>Clear and effective communication to convey complex concepts and engage learners of various backgrounds.</li>
                            <li><b>Innovation : </b> Willingness to embrace innovative teaching methods and technologies to enhance the learning experience.</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/instructor-2.jpg" alt=""
                            style="object-fit: cover;">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid" src="img/ready.jpg" alt="">
                </div>
               
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    
                    <h1 style="color: #fb873f;">Ready to Join Us?</h1>
                    <p class="mb-4">Here's How to Get Started</p>
                    
                    <div class="row gy-2 gx-4 mb-4">
                        <ul style="list-style: none;">
                            <li><i class="fa fa-check"></i> Familiarize yourself with Secret Coder and the diverse range of courses we offer.</li>
                            <li><i class="fa fa-check"></i> Craft a compelling application that showcases your passion, expertise, and proposed course offerings.</li>
                           
                        </ul>
                    </div>
                    <button type="button" class="btn text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Apply Now</button>
                </div>

                

            </div>
        </div>
    </div>

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apply as Instructor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <h5 class="mb-4">Join SecretCoder's Global Community
                    of Expert Instructors</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="f_name" placeholder="First Name">
                            <label for="name">First Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="l_name" placeholder="Last Name">
                            <label for="name">Last Name</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                            <label for="email">Your Email</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="tel" class="form-control" id="phone" placeholder="Phone Number">
                            <label for="name">Phone Number</label>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-floating">
                            <label for="degree">What is the highest degree ?</label>
                            <select name="degree" id="degree" class="form-control">
                            <option value="..">...</option>
                            <option value="High School">High School</option>
                            <option value="Undergraduate">Undergraduate</option>
                            <option value="Graduate">Graduate</option>
                            <option value="Post-Graduate">Post-Graduate</option>
                        </select>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-floating">
                            <label for="degree">What subject would you like to teach?</label>
                            <select name="degree" id="degree" class="form-control">
                            <option value="..">...</option>
                            <option value="Technology">Technology</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Business">Business</option>
                            <option value="Education">Education</option>
                        </select>
                        </div>
                    </div>
                    
                    
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a message here" id="address"
                                style="height: 150px"></textarea>
                            <label for="message">Address</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="">
                            <input type="checkbox">
                            I acknowledge and warrant the truthfulness of the information I submit, I also acknowledge that I have read, understand, and I agree with all Terms of service, and that I fully agree that all sales are final and that there are no refunds whatsoever.
                        </div>
                    </div>
                 
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn text-white">Apply</button>
        </div>
      </div>
    </div>
  </div>

    
    <!-- About End -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                
                <div class="col-12 wow fadeInUp" data-wow-delay="0.3s">
                    
                    <h5 class="mb-4">Join Us in Transforming Lives Through Education!</h5>
                    
                    <p>At SecretCoder, we believe that education has the power to transform lives. Join us in creating a world where knowledge knows no bounds, and together, let's inspire, innovate, and educate!</p>
                    
                </div>

                

            </div>
        </div>
    </div>


    <!-- Instructor Page End -->


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
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>ifiiikhan826@gmail.com</p>
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
                        &copy; <a class="border-bottom" href="index.php">ifiii Coder</a>, All Right Reserved.

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
