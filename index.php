<?
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WATERNETIC</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  


  <!-- Favicons -->
  <link href="image/finallogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/styles.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Shuffle
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/bootstrap-3-one-page-template-free-shuffle/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="index.php" class="d-flex align-items-center">
          <img src="assets/img/finallogo.png" alt="" class="img-fluid">
          <h1 class="text-light ml-2"><span>WATERNETIC</span></h1>
        </a>
      </div>
      
   

      
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModals">
  Register As Homeowners
</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Login
</button>

      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- Larger Container -->
<div class="container">
  <!-- RegistrationModal -->
  <div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="registration.php" enctype="multipart/form-data">
      <div class="modal-dialog modal-lg"> <!-- Adding modal-lg class for a larger modal -->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registerModalLabel">Register</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>


        <div class="modal-body">
        <div class="row">
    <div class="mb-3 col-md-4">
        <label for="inputFirstName" class="form-label">First Name</label>
        <div class="input-group">
            <span class="input-group-text" id="inputFirstNameAddon"></span>
            <input type="text" name="firstname" class="form-control" id="inputFirstName" placeholder="First Name" aria-describedby="inputFirstNameAddon">
        </div>
    </div>
    <div class="mb-3 col-md-4">
        <label for="inputMiddleName" class="form-label">Middle Name</label>
        <div class="input-group">
            <span class="input-group-text" id="inputMiddleNameAddon"></span>
            <input type="text" name="middlename" class="form-control" id="inputMiddleName" placeholder="Middle Name" aria-describedby="inputMiddleNameAddon">
        </div>
    </div>
    <div class="mb-3 col-md-4">
        <label for="inputLastName" class="form-label">Last Name</label>
        <div class="input-group">
            <span class="input-group-text" id="inputLastNameAddon"></span>
            <input type="text" name="lastname" class="form-control" id="inputLastName" placeholder="Last Name" aria-describedby="inputLastNameAddon">
        </div>
    </div>
    
            <!-- Second Column -->
            
    <div class="mb-3 col-md-4">
    <label for="inputUsername" class="form-label">Block</label>
                <div class="input-group">
                  <span class="input-group-text" id="inputUsernameAddon"></span>
                  <input type="text" name="block" class="form-control" id="inputUsername" placeholder="Block" aria-describedby="inputUsernameAddon">
                </div>
              </div>
    <div class="mb-3 col-md-4">
    <label for="inputUsername" class="form-label">Lot</label>
                <div class="input-group">
                  <span class="input-group-text" id="inputUsernameAddon"></span>
                  <input type="text" name="lot" class="form-control" id="inputUsername" placeholder="Lot" aria-describedby="inputUsernameAddon">
                </div>
              </div>
    <div class="mb-3 col-md-4">
    <label for="inputUsername" class="form-label">Phase</label>
                <div class="input-group">
                  <span class="input-group-text" id="inputUsernameAddon"></span>
                  <input type="text" name="phase" class="form-control" id="inputUsername" placeholder="Phase" aria-describedby="inputUsernameAddon">
                </div>
              </div>
            </div>
    

            <div class="row">
    <!-- Previous code goes here -->
    <div class="mb-3 col-md-4">
        <label for="inputUsername" class="form-label">Username</label>
        <div class="input-group">
            <span class="input-group-text" id="inputUsernameAddon"></span>
            <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" aria-describedby="inputUsernameAddon">
        </div>
    </div>
    <div class="mb-3 col-md-4">
        <label for="inputPassword" class="form-label">Password</label>
        <div class="input-group">
            <span class="input-group-text" id="inputPasswordAddon"></span>
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" aria-describedby="inputPasswordAddon">
        </div>
    </div>
</div>

<div class="row">
    <!-- Previous code goes here -->
    <div class="mb-3 col-md-4">
        <label for="inputUsername" class="form-label">Email Address</label>
        <div class="input-group">
            <span class="input-group-text" id="inputUsernameAddon"></span>
            <input type="email" name="emailadd" class="form-control" id="inputUsername" placeholder="Email Address" aria-describedby="inputUsernameAddon">
        </div>
    </div>
    <div class="mb-3 col-md-4">
        <label for="inputUsername" class="form-label">Phone Number</label>
        <div class="input-group">
            <span class="input-group-text" id="inputUsernameAddon"></span>
            <input type="text" name="phonenum" class="form-control" id="inputUsername" placeholder="Phone Number" aria-describedby="inputUsernameAddon">
        </div>
    </div>
    <div class="mb-3 col-md-4">
    <label for="inputUsername" class="form-label">Address</label>
                <div class="input-group">
                  <span class="input-group-text" id="inputUsernameAddon"></span>
                  <input type="text" name="address" class="form-control" id="inputUsername" placeholder="Address" aria-describedby="inputUsernameAddon">
                </div>
    </div>
</div>


<div class="row">
    <!-- Previous code goes here -->
    
    <div class="mb-3 col-md-4">
        <label for="inputUsername" class="form-label">Postal Code</label>
        <div class="input-group">
            <span class="input-group-text" id="inputUsernameAddon"></span>
            <input type="text" name="postalcode" class="form-control" id="inputUsername" placeholder="Postal Code" aria-describedby="inputUsernameAddon">
        </div>
    </div>
    <div class="mb-3 col-md-4">
    <label for="inputUserType" class="form-label">User Type</label>
                <div class="input-group">
                  <span class="input-group-text" id="inputUserTypeAddon"></span>
                  <select name="usertype" class="form-control" id="inputUserType" placeholder="Select" aria-describedby="inputUserTypeAddon">
                    <option>User</option>
                  </select>
                </div>
    </div>
    <div class="mb-3 col-md-4">
    <label for="inputFile" class="form-label">File input</label>
                <input type="file" name="file" class="form-control" id="inputFile">
                <p class="help-block">Upload photo here</p>
    </div>
</div>


            
              
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </form>
</div>
  </div>
<!-- LoginModal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="validate_user.php">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Log In</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <div class="card">
    <div class="card-body">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" name="username" id="username" placeholder="Username" aria-describedby="basic-addon1">
        </div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
          <span class="input-group-text" id="basic-addon2"><i class="bi bi-lock"></i></span>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" aria-describedby="basic-addon2">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-in-right"></i> Submit</button>
  </div>
</div>
</form>
  </div>
</div>
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/water.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Waternetic</span></h2>
                <p class="animate__animated animate__fadeInUp">Waternetic is an all-in-one digitalized water system to make transaction easier and faster. 
              This Application aims to provide digital system in a private subdivision for smoother transaction than usual.
              Conserve energy and effort.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/zzz.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Waternetic</span></h2>
                <p class="animate__animated animate__fadeInUp">Waternetic is an all-in-one digitalized water system to make transaction easier and faster. 
              This Application aims to provide digital system in a private subdivision for smoother transaction than usual.
              Conserve energy and effort.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/kkk.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Waternetic</span></h2>
                <p class="animate__animated animate__fadeInUp">Waternetic is an all-in-one digitalized water system to make transaction easier and faster. 
              This Application aims to provide digital system in a private subdivision for smoother transaction than usual.
              Conserve energy and effort.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <!-- Slide 4 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/jjj.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Waternetic</span></h2>
                <p class="animate__animated animate__fadeInUp">Waternetic is an all-in-one digitalized water system to make transaction easier and faster. 
              This Application aims to provide digital system in a private subdivision for smoother transaction than usual.
              Conserve energy and effort.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
              </div>
            </div>
          </div>

          

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-double-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-double-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About Us</h2>
          <p>We are Team Waternetic from Davao Central College, dedicated to creating innovative solutions that address water system problems and ensure access to clean and reliable water for all.</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Materials and <strong>Methods</strong></h3>
            <p class="fst-italic">
              Waternetic is a web and mobile app developed for exploratory and experimental purposes.
            </p>
            <p>
              Waternetic offers benefits for various stakeholders. Homeowners gain access to easy water usage monitoring
              and data-driven insights to reduce water cost. Water meter readers will experienced increased, efficiency 
              through digital data collection.
            </p>

            <div class="skills-content">

              <div class="progress">
                <span class="skill">HTML <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">Bootstrap <i class="val">90%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">Php <i class="val">75%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">JavaScript <i class="val">55%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    

    <!-- ======= Our Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Our Services</h2>
          <p>Experience seamless water transactions with our all-in-one digitalized system designed to make your life easier. Our innovative solution simplifies and accelerates every transaction, ensuring efficiency and convenience at your fingertips. Revolutionize your water services with our comprehensive digital platform, which effortlessly manages all your needs in one place. With our system, you can enjoy fast, easy, and reliable water transactions like never before.</p>
        </div>

        <div class="row">
  <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
    <div class="icon-box">
      <div class="icon"><i class="bx bx-calculator"></i></div>
      <h4 class="title"><a href="">Water Bill Calculator</a></h4>
      <p class="description">Accurately calculate your water usage and bill with our easy-to-use tool, helping you manage your expenses more effectively.</p>
    </div>
  </div>

  <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
    <div class="icon-box">
      <div class="icon"><i class="bx bx-credit-card"></i></div>
      <h4 class="title"><a href="">Online Payment Methods</a></h4>
      <p class="description">Enjoy the convenience of multiple online payment options, making your transactions quick and secure.</p>
    </div>
  </div>

  <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
    <div class="icon-box">
      <div class="icon"><i class="bx bx-history"></i></div>
      <h4 class="title"><a href="">Transaction History</a></h4>
      <p class="description">Keep track of all your past water payments and usage with a detailed transaction history, ensuring complete transparency.</p>
    </div>
  </div>

  <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
    <div class="icon-box">
      <div class="icon"><i class="bx bx-chat"></i></div>
      <h4 class="title"><a href="">Online Consultation</a></h4>
      <p class="description">Get expert advice and assistance through our online consultation service, available to help you with any water-related queries or issues.</p>
    </div>
  </div>
</div>


        </div>

      </div>
    </section><!-- End Our Services Section -->

    

    <!-- ======= Our Team Section ======= -->
<section id="team" class="team">
  <div class="container">

    <div class="section-title">
      <h2>Our Team</h2>
      <p>Our team is a group of dedicated professionals committed to delivering innovative solutions for efficient water management. With expertise in technology and customer service, we strive to provide exceptional support and ensure seamless experiences for all our users. Passionate about sustainability and excellence, we work collaboratively to drive progress and make a positive impact in the water industry.</p>
    </div>

    <div class="row justify-content-center">

      <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.2s">
        <div class="member">
          <img src="assets/img/team/odanra.jpg" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>Jefferson Arnado</h4>
              <span>System Analyst/ Full Stack Programmer</span>
            </div>
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.3s">
        <div class="member">
          <img src="assets/img/team/tabilog.jpg" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>James Jecemeco tabilog</h4>
              <span>Full Stack Programmer</span>
            </div>
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Our Team Section -->


    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact section-bg">

      <div class="container">
        <div class="section-title">
          <h2>Contact Us</h2>
          <p>Reach out to us for any inquiries or assistance. We're here to help and eager to provide you with the information or support you need. Whether you have questions, need further details, or require assistance with our services, our team is ready to respond promptly. We value your feedback and look forward to hearing from you. Contact us today, and let us assist you in any way we can.</p>
        </div>
      </div>

      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-6 d-flex align-items-stretch infos">

            <div class="row">

              <div class="col-lg-6 info d-flex flex-column align-items-stretch">
                <i class="bx bx-map"></i>
                <h4>Address</h4>
                <p>Davao Central College,<br>Philippines, 8000</p>
              </div>
              <div class="col-lg-6 info info-bg d-flex flex-column align-items-stretch">
                <i class="bx bx-phone"></i>
                <h4>Call Us</h4>
                <p>+639 481 470492</p>
              </div>
              <div class="col-lg-6 info info-bg d-flex flex-column align-items-stretch">
                <i class="bx bx-envelope"></i>
                <h4>Email Us</h4>
                <p>waternetic@project.com<br>jeparnado@gmail.com</p>
              </div>
              <div class="col-lg-6 info d-flex flex-column align-items-stretch">
                <i class="bx bx-time-five"></i>
                <h4>Working Hours</h4>
                <p>Mon - Fri: 9AM to 5PM<br>Sunday: 9AM to 1PM</p>
              </div>
            </div>

          </div>

          <div class="col-lg-6 d-flex align-items-stretch contact-form-wrap">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="email">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="message">Message</label>
                <textarea class="form-control" name="message" rows="8" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Shuffle</h3>
            <p>
              Davao Central College <br>
              8000, Philippines<br><br>
              <strong>Phone:</strong> +639 481 470492<br>
              <strong>Email:</strong> waternetic@project.com<br>
            </p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Shuffle</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootstrap-3-one-page-template-free-shuffle/ -->
        Designed by <a href="https://www.facebook.com/profile.php?id=61550105990697">jeparnado</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>