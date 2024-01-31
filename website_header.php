<!-- Top header start -->
<header class="top-header top-header-bg" id="top-header-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-7">
                <div class="list-inline">
                    <a href="tel:info@themevessel.com"><i class="fa fa-envelope"></i>helpdesk@linkprofit.com</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-5">
                <ul class="top-social-media pull-right">
                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Top header end -->

<!-- main header start -->

<header class="main-header do-sticky" id="main-header-2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light rounded">
                    <a class="navbar-brand logo-2" href="index.php">
                        <img src="assets/img/logos/logo.png" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" id="drawer">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="navbar-collapse collapse w-100" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">
                                    About
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" href="how_it_works.php">
                                    How it works
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" href="payment_proofs.php">
                                    Payment Proofs
                                </a>
                            </li> 
                           
                            <li class="nav-item dropdown ls-bgn">
                                <?php if(!isset($_SESSION['email'])){?>
                                    <a class="btn btn-sm signup-link" href="user_login.php">Login</a>
                                    <a class="btn btn-sm btn-theme signup-link bg-active" href="user_signup.php">Signup</a>
                                <?php } else { ?>
                                    <a class="btn btn-sm btn-theme signup-link bg-active" href="user_dashboard/dashboard.php">Dashboard</a>
                                <?php  } ?>
                            </li>
                            <li class="nav-item dropdown ls-bgn">
                                <a href=""><div id="google_translate_element"style="padding-top:35px;padding-left:15px;" ></div></a>
                            </li>
                            

                            <!--
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Properties
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">List Layout</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="properties-list-rightside.php">Right Sidebar</a></li>
                                            <li><a class="dropdown-item" href="properties-list-leftside.php">Left Sidebar</a></li>
                                            <li><a class="dropdown-item" href="properties-list-fullwidth.php">Fullwidth</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Grid Layout</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="properties-grid-rightside.php">Right Sidebar</a></li>
                                            <li><a class="dropdown-item" href="properties-grid-leftside.php">Left Sidebar</a></li>
                                            <li><a class="dropdown-item" href="properties-grid-fullwidth.php">Fullwidth</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Map View</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="properties-map-rightside-list.php">Map List Right Sidebar</a></li>
                                            <li><a class="dropdown-item" href="properties-map-leftside-list.php">Map List Left Sidebar</a></li>
                                            <li><a class="dropdown-item" href="properties-map-rightside-grid.php">Map Grid Right Sidebar</a></li>
                                            <li><a class="dropdown-item" href="properties-map-leftside-grid.php">Map Grid Left Sidebar</a></li>
                                            <li><a class="dropdown-item" href="properties-map-full.php">Map FullWidth</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Property Detail</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="properties-details.php">Property Detail 1</a></li>
                                            <li><a class="dropdown-item" href="properties-details-2.php">Property Detail 2</a></li>
                                            <li><a class="dropdown-item" href="properties-details-3.php">Property Detail 3</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            -->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- main header end -->

<!-- Mobile View  Start -->
<nav id="sidebar" class="nav-sidebar">
    <!-- Close btn-->
    <div id="dismiss">
        <i class="fa fa-close"></i>
    </div>
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <img src="assets/img/logos/logo.png" alt="sidebarlogo">
        </div>
        <div class="sidebar-navigation">
            <h3 class="heading">Pages</h3>
            <ul class="menu-list">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="how_it_works.php">How it Works</a></li>
                <li><a href="payment_proofs.php">Payment Proofs</a></li>
                <li><a href="forum.php">Forum</a></li>
                <li><a href="forum.php">Login</a></li>
                <li><a href="forum.php">Signup</a></li>
                <li class="nav-item dropdown ls-bgn">
                    <a class="btn btn-sm btn-theme signup-link bg-active" href="">Language</a>
                </li>

            </ul>
        </div>
        <div class="get-in-touch">
            <div class="media">
                <i class="fa fa-envelope"></i>
                <div class="media-body">
                    <a href="#">info@themevessel.com</a>
                </div>
            </div>
        </div>
        <div class="get-social">
            <h3 class="heading">Get Social</h3>
            <a href="#" class="facebook-bg">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="#" class="twitter-bg">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="#" class="google-bg">
                <i class="fa fa-google"></i>
            </a>
            <a href="#" class="linkedin-bg">
                <i class="fa fa-linkedin"></i>
            </a>
        </div>
    </div>
</nav>
<!-- Mobile View end -->
