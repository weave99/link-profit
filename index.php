<?php
include_once("db/conn.php");
session_start();

include_once("db/system_ip_tracking.php");




?>
<!DOCTYPE html>
<html lang="eng">

<head>
    <title>Link Profit </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/magnific-popup.css">
    <link type="text/css" rel="stylesheet" href="assets/css/jquery.selectBox.css">
    <link type="text/css" rel="stylesheet" href="assets/css/dropzone.css">
    <link type="text/css" rel="stylesheet" href="assets/css/rangeslider.css">
    <link type="text/css" rel="stylesheet" href="assets/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/leaflet.css">
    <link type="text/css" rel="stylesheet" href="assets/css/slick.css">
    <link type="text/css" rel="stylesheet" href="assets/css/slick-theme.css">
    <link type="text/css" rel="stylesheet" href="assets/css/slick-theme.css">
    <link type="text/css" rel="stylesheet" href="assets/css/map.css">
    <link type="text/css" rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">


    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="assets/css/skins/default.css">

</head>
<body>


<!-- ==== Header === -->
<?php include("website_header.php");?>
<!-- ==== Header === -->



<!-- Banner start -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="assets/img/banner/banner-1.jpg" width="100%" alt="banner" >   
        <div class="banner_title">
            <div class="heading">
                Simplyfing your online earning path
            </div>
            <div class="sub_heading">
                Get aboard to unlock your online Income Potential with  Diverse Earning Opportunities existing on internet.
                Achieve your dreams by the bond of affiliates. Sucess here is no more a story. Opportunities and affiliates will pave your way to success.
              
            </div>
            <div class="sub_heading_2">
                Join Our Empowering Community.
                <div>
                    <a class="btn btn-sm btn-theme signup-link bg-active" href="user_signup.php">Signup</a>                    
                </div>
            </div>
          </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
    
<!-- banner end -->



<!-- About us start -->
<div class="about-us content-area-7 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="about-carousel">
                    <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/img/property/img-1.jpg" alt="property" class="img-fluid">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/property/img-2.jpg" alt="property" class="img-fluid">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/property/img-3.jpg" alt="property" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-info">
                    <h3>About Our Company</h3>
                    <h5>Who are behind this website , what is there vision,</h5>
                    <p>Our team is composed of a diverse group of experts, each with their unique experiences and insights into the world of passive
                        income generation. 

                    </p>
                    <P class="mb-20"><b> Our Vision:</b> At earnify, our vision is clear: to empower individuals to take control of their financial situation. </P>
                    <!-- Counters start -->
                    <div class="row mb-2">
                        <div class="col-lg-12">
                        <a class="btn btn-sm btn-theme signup-link bg-active" href="about.php">learn More</a>  
                        </div>       
                    </div>  
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="counters cts ">
                                <div class="counter-box">
                                    <h1 class="counter">850</h1>
                                    <h5>Present Members</h5>
                                </div>
                            </div>                          
                        </div>       
                    </div>  






                    
                    <!-- Counters end -->
                  
                </div>

            </div>

        </div>
    </div>
</div>
<!-- About us end -->


<!-- services 5 start -->
<div class="services-5 content-area-22 bg-white">
    <div class="container">
        <div class="main-title">
            <h1>Lets know more about this website.</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 wow fadeInLeft delay-04s">
                <div class="services-info-5 si-6 clearfix">
                    <div class="detail">
                        <h5>Explore Categories</h5>
                        <p>Navigate through a wide range of income-generating categories, each carefully vetted for quality and potential. From freelance gigs to passive income streams, we've got you covered.</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-layer-group"></i>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 wow fadeInRight delay-04s">
                <div class="services-info-5 clearfix">
                    <div class="icon">
                        <i class="fa-solid fa-hand-holding-heart"></i>
                    </div>
                    <div class="detail">
                        <h5>Member Benefits</h5>
                        <p> As a valued member, you gain access to a unique perk – Free Affiliates. Boost your own online ventures by connecting with complementary businesses at no extra cost. It's our way of helping you grow your income network.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 wow fadeInLeft delay-04s">
                <div class="services-info-5 si-6 clearfix">
                    <div class="detail">
                        <h5>Interactive User Reviews</h5>
                        <p>Share your experiences and insights with our vibrant community. Your reviews and feedback help fellow members make informed decisions and build trust within our community.</p>
                    </div>
                    <div class="icon">
                        <i class="flaticon-call-center-agent"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 wow fadeInRight delay-04s">
                <div class="services-info-5 clearfix">
                    <div class="icon">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <div class="detail">
                        <h5>Members to Members Communication Tools</h5>
                        <p>Communicate with  your fellow member, incourage them to be active, share your thoughts with them</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- services 4 end -->


<!-- ==== Footer === -->
<?php include("website_footer.php");?>
<!-- ==== Footer === -->


<!-- External JS libraries -->
<script src="assets/js/jquery-2.2.0.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.selectBox.js"></script>
<script src="assets/js/rangeslider.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.filterizr.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/backstretch.js"></script>
<script src="assets/js/jquery.countdown.js"></script>
<script src="assets/js/jquery.scrollUp.js"></script>
<script src="assets/js/particles.min.js"></script>
<script src="assets/js/typed.min.js"></script>
<script src="assets/js/dropzone.js"></script>
<script src="assets/js/jquery.mb.YTPlayer.js"></script>
<script src="assets/js/leaflet.js"></script>
<script src="assets/js/leaflet-providers.js"></script>
<script src="assets/js/leaflet.markercluster.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/maps.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4omYJlOaP814WDcCG8eubXcbhB-44Uac"></script>
<script src="assets/js/ie-emulation-modes-warning.js"></script>
<!-- Custom JS Script -->
<script  src="assets/js/app.js"></script>





</body>

</html>