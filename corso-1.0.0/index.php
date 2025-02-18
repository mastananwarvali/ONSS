

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Landing page template built with HTML and Bootstrap 4 for presenting training courses, classes, workshops and for convincing visitors to register using the form.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>ONLINE NOTES SHARING SYSTEM</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,700,700i&display=swap" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
    <style>
        .marquee-container {
            width: 100%;
            padding: 18px;
            background-color: #f0f0f0;
            border: 2px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Marquee styling */
        .marquee {
            white-space: nowrap;
            font-size: 28px;
            color: black;
            font-family: "Times New Roman", Times, serif;
        }

        
        </style>
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">

        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Corso</a> -->

        <!-- Image Logo -->
        <!-- <a class="navbar-brand logo-image" href="index.html"><img src="images/logo.svg" alt="alternative"></a>  -->
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="about.html">About us <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="login.php">Login</a>
                </li>
 
                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="signup.php" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">SignUp</a>
             

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="dashboard/">Upload Notes</a>
                </li>
            </ul>
            
            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <div class="countdown">
                            <!-- <span id="clock"><h3 style="color: aliceblue; font-family: Verdana, Geneva, Tahoma, sans-serif;">Welcome to our vibrant community, where learning knows no bounds.</h3</span> -->
                        </div>  
                        <div class="marquee-container" onmouseover="stopMarquee()" onmouseout="startMarquee()">
    <marquee class="marquee" scrollamount="20">
        Welcome to our vibrant community, where learning knows no bounds. Let's embark on an exciting journey of discovery together!
    </marquee>
                 
                     
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
        
        <!-- Image Slider -->
        <div class="outer-container">
            <div class="slider-container">
                <div class="swiper-container image-slider-1">
                    <div class="swiper-wrapper">
                        
                        <!-- Slide -->
                        <div class="swiper-slide" >
                            <img class="img-fluid" src="images/details-slide-1.jpg" alt="alternative">
                        </div>
                        <!-- end of slide -->

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <img class="img-fluid" src="images/details-slide-2.jpg" alt="alternative">
                        </div>
                        <!-- end of slide -->

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <img class="img-fluid" src="images/details-slide-3.jpg" alt="alternative">
                        </div>
                        <!-- end of slide -->

                    </div> <!-- end of swiper-wrapper -->
                    
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- end of add arrows -->
                    
                </div> <!-- end of swiper-container -->
            </div> <!-- end of slider-container -->
        </div> <!-- end of outer-container -->
        <!-- end of image slider -->

    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Registration -->
    <div id="register" class="form-1">
    </div>
                     



    <!-- Instructor -->
    <div id="instructor" class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img class="img-fluid" src="images/group1.png" alt="alternative">
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2 style="color:#87CEEB;">Meet Our Team</h2>
                        <ul style="font-size: 20px;">
    <li style="margin-bottom: 10px; color:black;"><b>Ankam Srinivas - 21MIS7009</b></li>
    <li style="margin-bottom: 10px; color:black;"><b>Tippireddypalli Thanusma - 21MIS7092</b></li>
    <li style="margin-bottom: 10px; color:black;"><b>Murari Jayasurya - 21MIS7085</b></li>
    <li style="margin-bottom: 10px; color:black;"><b>Shaik Mastan Vali - 21MIS7091</b></li>
</ul>

                        <p style="font-size: 18px;">We're proud to work under this project , contributing our skills and expertise to our project.</p>
                    </div> <!-- end of text-container -->
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->  
    </div> <!-- end of basic-1 -->
    <!-- end of instructor -->


    <!-- Description -->
    <div id="description" class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>What will you learn in our Online Notes Sharing System </h2>
                </div> <!-- end of col --> 
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled li-space-lg first">
                        <li class="media">
                            <i class="bullet">1</i>
                            <div class="media-body">
                                <h4>Resource Management</h4>
                                <p>Users learn to manage their resources efficiently by organizing and maintaining their notes in a structured manner.</p>
                            </div>
                        </li>
                        <li class="media">
                            <i class="bullet">2</i>
                            <div class="media-body">
                                <h4>Information Retrieval</h4>
                                <p>When downloading notes, users learn to navigate and search for specific information effectively. </p>
                            </div>
                        </li>
                        <li class="media">
                            <i class="bullet">3</i>
                            <div class="media-body">
                                <h4>Collaboration Skills</h4>
                                <p>Users learn how to collaborate effectively with peers by sharing their own notes and accessing notes shared by others.</p>
                            </div>
                        </li>
                    </ul>
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <ul class="list-unstyled li-space-lg second">
                        <li class="media">
                            <i class="bullet">4</i>
                            <div class="media-body">
                                <h4>Critical Thinking:</h4>
                                <p>Engaging with notes shared by others encourages critical thinking as users evaluate the quality, relevance, and credibility of the content. </p>
                            </div>
                        </li>
                        <li class="media">
                            <i class="bullet">5</i>
                            <div class="media-body">
                                <h4>Digital Literacy</h4>
                                <p>Utilizing an online notes sharing system familiarizes users with digital tools and platforms, improving their digital literacy. </p>
                            </div>
                        </li>
                        <li class="media">
                            <i class="bullet">6</i>
                            <div class="media-body">
                                <h4>Respect for Intellectual Property:</h4>
                                <p>Users develop an understanding of intellectual property rights and the importance of respecting copyright laws.</p>
                            </div>
                        </li>
                    </ul>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of description -->


    <!-- Students -->
    <div class="basic-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Who all can use the Online Notes Sharing System </h2>
                        <p>Online notes sharing system can be utilized by various individuals and groups across different contexts.It offers a platform where users can access and share valuable insights, strategies, and resources related to web development, digital marketing.  </p>
                        <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox">LIGHTBOX</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <img class="img-fluid" src="images/group2.jpg" alt="alternative">
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container --> 
    </div> <!-- end of basic-3 --> 
    <!-- end of students -->

  
    <!-- Details Lightbox -->
	<div id="details-lightbox" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img class="img-fluid" src="images/pp.jpg" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Online Notes Sharing Platform</h3>
                    <hr>
                    <h5>For everybody</h5>
                    <p>Different educational levels, including high school, college, and university, can use online notes sharing system.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Students</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Educators</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Remote Workers and Teams</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Researchers</div>
                        </li> <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Community Groups and Organizations</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Professionals</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Hobbyists and Enthusiasts</div>
                        </li>
                       
                    </ul>
                    <a class="btn-solid-reg mfp-close page-scroll" href="signup.php">SIGN UP</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox -->


    <!-- Video -->
    <div class="basic-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Course Video Presentation</h2>

<!-- Video Preview -->
<div class="image-container">
    <div class="video-wrapper">
        <video controls autoplay loop class="img-fluid" style="width:100%; height:650px;">
            <source src="presentation.mp4" type="video/mp4">
            <!-- Add more <source> elements for other video formats if needed -->
            Your browser does not support the video tag.
            <!-- Display an image as a fallback in case the video cannot be played -->
            <img src="images/group2.jpg" alt="alternative" style="width:100%; height:650px;">
        </video>
       
            <span></span>
        </span>
    </div> <!-- end of video-wrapper -->
</div> <!-- end of image-container -->
<!-- end of video preview -->



                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-4 -->
    <!-- end of video -->


    <!-- Takeaways -->
    <div class="cards">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Key Takeaways</h2>
                    <p class="p-heading">Here are the main topics that will be covered in the SEO training course. They cover all the basics of SEO and even some advanced techniques that will help you along the way</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <i class="fas fa-atom"></i>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Accessibility</h4>
                            <p> Online notes sharing systems provide easy access to study materials anytime, anywhere, as long as there is an internet connection.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <i class="fas fa-key"></i>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Time-Saving</h4>
                            <p> With access to shared notes and resources, students can save time on note-taking and focus more on understanding the material.</p>
                        </div>
                    </div>
                    <!-- end of card -->


                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Organization</h4>
                            <p>Notes sharing systems often offer tools for organizing and categorizing notes, making it easier for students to keep track of their materials. </p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <i class="fas fa-link"></i>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Feedback and Peer Review/h4>
                            <p>Students can receive feedback on their notes from peers and instructors, helping them improve their understanding of the material and refine their study techniques.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <i class="far fa-handshake"></i>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Collaboration</h4>
                            <p>This platform facilitate collaboration among students by allowing them to share their notes with peers, discuss topics, and work together on assignments or study groups. </p>
                        </div>
                    </div>
                    <!-- end of card -->


                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Feedback Loop for Educators</h4>
                            <p>Educators can gain insights into student comprehension and study habits through the notes shared on these platforms.</p>
                        </div>
                    </div>
                    <!-- end of card -->
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards -->
    <!-- end of takeaways -->




    <!-- Date -->
    <div id="date" class="basic-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <h2>🌟 Unlock Your Academic Potential with Our Online Notes Sharing System! 📚</h2>
                        <p>🎓 Access Anytime, Anywhere: Say goodbye to bulky notebooks and stacks of paper. With our platform, your study materials are just a click away, whether you're at home, in the library, or on the go.</p>
                        <a class="btn-solid-lg page-scroll" href="signup.php">REGISTER</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-5 -->
    <!-- end of date -->
    <br>



  


    <!-- Footer -->
    <div class="footer">
        <div class="">
            <div class="">
                <div class="">
                    <div class="footer-col first">
                        <div  onmouseover="stopMarquee()" onmouseout="startMarquee()">
                        <marquee direction="right" style="white-space: nowrap;">
                            <h3 style="font-size: 40px; width: 100%; color: aliceblue;">Thank you for exploring our platform, where knowledge meets community.</h3>
                        </marquee>
                    </div>
                                            </div>
                </div> <!-- end of col -->
            
            
                <div class="col-md-3">
                    <div class="footer-col fourth">
                   
                    </div> 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->   
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © 2024 <a href="">Online Notes Sharing Platform</a> - All rights reserved</p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
    	
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/jquery.countdown.min.js"></script> <!-- The Final Countdown plugin for jQuery -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scriptss.js"></script> <!-- Custom scripts -->
</body>
</html>


<script>
    var marquee = document.querySelector('marquee');

    function stopMarquee() {
        marquee.stop();
    }

    function startMarquee() {
        marquee.start();
    }
</script>