<?php 
require("script.php");

session_start();
if(!ISSET($_SESSION['username'])){
    header('location:login.php');
}

// 
?>
<?php if(isset($_POST['submit'])){
     if (empty($_POST['email']) ||empty($_POST['mobile'])||empty($_POST['size'])||empty($_POST['address'])||empty($_POST['proj_name'])||empty($_POST['proj_loc'])||empty($_POST['proj_dura']) ){
      $response = "ALL fields are required";
}else{ 
    $_SESSION['rec_mail'] = $_POST['email'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['mobile'] = $_POST['mobile'];
    $_SESSION['proj_name'] = $_POST['proj_name'];
    $_SESSION['proj_loc'] = $_POST['proj_loc'];
    $_SESSION['proj_dura'] = $_POST['proj_dura'];
    $_SESSION['size'] = $_POST['size'];

    header("location:quotation_display.php");

} }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>NCC Builders</title>
        

        
        <link href="img/favicon.ico" rel="icon">

        
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet"> 
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <link href="css/style.css" rel="stylesheet">
        <style>
       
        .fcontainer {
            background-color: #fff;
            padding: 20px;
            margin: auto;
            width: 80%;
            max-width: 800px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"], input[type="email"],input[type="number"], input[type="date"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        textarea {
            resize: vertical;
        }
        .fcontainer button {
            padding: 10px 20px;
            background-color: #333;
            width: 200px;
            margin-left:35%;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .fcontainer button:hover {
            background-color: #555;
        }
    </style>
    </head>

    <body>
        <div class="wrapper">
            
           <div class="top-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="index.html">
                                <h1>NCC Builders</h1>
                                
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 d-none d-lg-block">
                        <div class="row">
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="flaticon-calendar"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Opening Hour</h3>
                                        <p>Mon - Fri, 8:00 - 9:00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="flaticon-call"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Call Us</h3>
                                        <p>+94 75 3548 795</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="flaticon-send-mail"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Email Us</h3>
                                        <p>nccbuilderslanka@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="nav-bar">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link ">Home</a>
                            <a href="about.html" class="nav-item nav-link">About</a>
                            <a href="service.html" class="nav-item nav-link">Service</a>
                            <a href="project.html" class="nav-item nav-link">Project</a>
                            
                            <a href="blog.html" class="nav-item nav-link">Blog Page</a>
                           
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>
                       
                    </div>
                </nav>
            </div>
        </div>
        

            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Request a quotation </h2>
                        </div>
                        <div class="col-12">
                            <a href="">Home</a>
                            <a href="">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>


        




</div>



    <div class="fcontainer">
        <h1>Construction Quotation Requirement Form</h1>
        <form action="" method="post" enctype="multipart/form-data"  id="backgroundForm">
        
        <label for="email">Enter your email</label>
        <input type="email" id="email" name="email" value="">

        <label for="mobile">Enter your mobile</label>
        <input type="number" id="mobile" name="mobile" value="">

        <label for="address">Enter your address</label>
        <input type="text" id="address" name="address" value="">
        
        <label for="proj_name">Enter a Project Name</label>
        <input type="text" id="proj_name" name="proj_name" value="">
        
        <label for="proj_loc">Enter your Project Location</label>
        <input type="text" id="proj_loc" name="proj_loc" value="">
        
        <label for="proj_dura">Enter your Project Duration</label>
        <input type="text" id="proj_dura" name="proj_dura" value="">

        <label for="size">Enter your Project Size in sqt</label>
        <input type="number" id="size" name="size" value=""><br><br>
        
        
        
        <button type="submit" name="submit" id="runButton">Submit</button>
        
   
    </form>
    </div>

    <!-- <button id="runButton">Run Background Page</button> -->

    


            <div class="footer wow fadeIn" data-wow-delay="0.3s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-contact">
                                <h2>Office Contact</h2>
                                <p><i class="fa fa-map-marker-alt"></i> Colombo, Sri Lanka</p>
                                <p><i class="fa fa-phone-alt"></i>+094 753 48795</p>
                                <p><i class="fa fa-envelope"></i>nccbuilderslanka@gmail.com</p>
                                <div class="footer-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link">
                                <h2>Services Areas</h2>
                                <a href="">Building Construction</a>
                                <a href="">House Renovation</a>
                                <a href="">Architecture Design</a>
                                <a href="">Interior Design</a>
                                <a href="">Painting</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link">
                                <h2>Useful Pages</h2>
                                <a href="">About Us</a>
                                <a href="">Contact Us</a>
                                <a href="">Our Team</a>
                                <a href="">Projects</a>
                                <a href="">Testimonial</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="newsletter">
                                <h2>Newsletter</h2>
                                <p>
                                 Subscribe for instant notification about our offers  </p>
                                <div class="form">
                                    <input class="form-control" placeholder="Email here">
                                    <button class="btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container footer-menu">
                    <div class="f-menu">
                        <a href="">Terms of use</a>
                        <a href="">Privacy policy</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
                <div class="container copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <p>&copy; <a href="">NCC Builders</a>, All Right Reserved.</p>
                        </div>
						
						
                        <div class="col-md-6">
                            <p>Designed By <a href="">Code Strikers</a></p>
                        </div>
                    </div>
                </div>
            </div>
            

            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
   
        
    </body>
</html>


<!-- ........................................... -->



