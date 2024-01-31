<?php
include_once("../db/conn.php");
require_once("../db/admin_sequre.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <!-- GLOBAL MAINLY STYLES-->
    <link href="dashboard-source/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="dashboard-source/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="dashboard-source/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="dashboard-source/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="dashboard-source/assets/css/main.min.css" rel="stylesheet" />
    <link href="dashboard-source/assets/css/dashboard.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">

<!-- Nav header side =========================================-->
            <?php include 'dashboard_header.php'; ?>
<!-- Nav header side =========================================-->


<!--=====================================-->
        <div class="content-wrapper">
<!--=====================================-->






<!--=========== Start Indigator Bar===============================-->
            <div class="row pt-2 text-center" style="background-color:#629dad; color:#fff; font-width:700;">
                <div class="col-lg-12">
                   <h4> DASHBOARD </h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== START PAGE CONTENT======================================================================-->

<div class="page-content fade-in-up">

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <a href="javacript:;">
            <div class="ibox color-white widget-stat" style="background-color:#286f85;">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">
                        250
                    </h2>
                    <div class="m-b-5">Present Members</div><i class="widget-stat-icon"><img src="dashboard-source/assets/img/member.svg" width="50%" alt=""style="position: relative;top: -20px;"></i> 
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox color-white widget-stat" style="background-color:#286f85;">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">
                        45
                    </h2>
                    <div class="m-b-5">New Joinee last 24 Hours</div><i class="widget-stat-icon"><img src="dashboard-source/assets/img/signup.svg" width="50%" alt=""style="position: relative;top: -20px;"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <a href="javacript:;">
            <div class="ibox color-white widget-stat" style="background-color:#286f85;">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">
                        570
                    </h2>
                    <div class="m-b-5">Members in Promotion</div><i class="widget-stat-icon"><img src="dashboard-source/assets/img/promotion.svg" width="50%" alt=""style="position: relative;top: -20px;"></i> 
                    
                </div>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6">
            <a href="javacript:;">
            <div class="ibox color-white widget-stat" style="background-color:#286f85;">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">
                        50
                    </h2>
                    <div class="m-b-5">Today's Login</div><i class="widget-stat-icon"><img src="dashboard-source/assets/img/login_user.svg" width="50%" alt=""style="position: relative;top: -20px;"></i> 
                    
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="payment_proof_verification.php">
                <div class="ibox color-white widget-stat" style="background-color:#286f85;">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">
                        <?php 
                        //`pay_proof_id`, `user_id`, `eop_site_id`, `amount_received`, `received_currency`, `received_on`, `payment_file`, `upload_date`, 
                        //`status`, `remarks` SELECT * FROM `user_payment_proof_master` WHERE 1
                        $payment_proof_sql = "SELECT * FROM user_payment_proof_master where status='0'";
                        $payment_proof_result = mysqli_query($conn, $payment_proof_sql); 
                        // Return the number of rows in result set
                        $payment_proof_rowcount = mysqli_num_rows( $payment_proof_result );
                        //	Display result
                        printf("%d\n", $payment_proof_rowcount);
                        ?>
                        </h2>
                        <div class="m-b-5">Payment Proof Verification</div><i class="widget-stat-icon"><img src="dashboard-source/assets/img/ctr.svg" width="50%" alt=""style="position: relative;top: -20px;"></i>
                    </div>
                </div>                
            </a>

        </div>

        <div class="col-lg-3 col-md-6">
            <div class="ibox color-white widget-stat" style="background-color:#286f85;">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">
                        45
                    </h2>
                    <div class="m-b-5"> C.R In Last 24 Hours</div><i class="widget-stat-icon"><img src="dashboard-source/assets/img/cr.svg" width="50%" alt=""style="position: relative;top: -20px;"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="ibox color-white widget-stat" style="background-color:#286f85;">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">
                        45
                    </h2>
                    <div class="m-b-5"> Aff.Requirement Rate Last 24 Hours</div><i class="widget-stat-icon"><img src="dashboard-source/assets/img/rate.svg" width="50%" alt="" style="position: relative;top: -20px;"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="ibox color-white widget-stat" style="background-color:#286f85;">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">
                        45
                    </h2>
                    <div class="m-b-5">Verification Pending</div><i class="widget-stat-icon"><img src="dashboard-source/assets/img/rate.svg" width="50%" alt="" style="position: relative;top: -20px;"></i>
                </div>
            </div>
        </div>


    </div>
</div>







<!--=========== End PAGE CONTENT======================================================================-->








<!-- Nav header side =========================================-->
        <?php include 'dashboard_footer.php'; ?>
<!-- Nav header side =========================================-->
<!--=====================================-->
        </div>
    </div>
<!--=====================================-->

    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="dashboard-source/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="dashboard-source/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="dashboard-source/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="dashboard-source/assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="dashboard-source/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="dashboard-source/assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
    <script src="dashboard-source/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
    <script src="dashboard-source/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="dashboard-source/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="dashboard-source/assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="dashboard-source/assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
</body>










</html>