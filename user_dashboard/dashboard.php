<?php
include_once("../db/conn.php");
require_once("../db/user_sequre.php");
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
    <link href="../admin/dashboard-source/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../admin/dashboard-source/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../admin/dashboard-source/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="../admin/dashboard-source/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="../admin/dashboard-source/assets/css/main.min.css" rel="stylesheet" />
    <link href="../admin/dashboard-source/assets/css/dashboard.css" rel="stylesheet" />

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
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Promotional Brief</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="h6"><b>Promotion Name :</b> Jan. 2024</div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="h6"><b>Started On :</b>  1st January 2024</div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="h6"><b>Will End On :</b> 30th January 2024</div>   
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="h6"><b>Affiliates Alloted :</b> 500</div>
                                    </div>
                                </div>
                                
                                
                                                                                         
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Last Seven days Promotional Statistics</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="">Date</th>
                                            <th class="">Total Clicks Received</th>
                                            <th>Invalid Clicks</th>
                                            <th>Total Valid Clicks</th>
                                            <th>Click Thresold / Aff.</th>
                                            <th>Qualified For No.of Affiliates</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                            <tr>
                                                <td><b>24.11.2023</b></td>
                                                <td><b>25698</b></td>
                                                <td><b>24712</b></td>
                                                <td><b>22010</b></td>
                                                <td><b>8000</b></td>
                                                <td><b>600</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>24.11.2023</b></td>
                                                <td><b>25698</b></td>
                                                <td><b>24712</b></td>
                                                <td><b>22010</b></td>
                                                <td><b>8000</b></td>
                                                <td><b>600</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>24.11.2023</b></td>
                                                <td><b>25698</b></td>
                                                <td><b>24712</b></td>
                                                <td><b>22010</b></td>
                                                <td><b>8000</b></td>
                                                <td><b>600</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>24.11.2023</b></td>
                                                <td><b>25698</b></td>
                                                <td><b>24712</b></td>
                                                <td><b>22010</b></td>
                                                <td><b>8000</b></td>
                                                <td><b>600</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>24.11.2023</b></td>
                                                <td><b>25698</b></td>
                                                <td><b>24712</b></td>
                                                <td><b>22010</b></td>
                                                <td><b>8000</b></td>
                                                <td><b>600</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>24.11.2023</b></td>
                                                <td><b>25698</b></td>
                                                <td><b>24712</b></td>
                                                <td><b>22010</b></td>
                                                <td><b>8000</b></td>
                                                <td><b>600</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>24.11.2023</b></td>
                                                <td><b>25698</b></td>
                                                <td><b>24712</b></td>
                                                <td><b>22010</b></td>
                                                <td><b>8000</b></td>
                                                <td><b>600</b></td>
                                            </tr>
 

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <style>
                    table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                    }
                </style>

            </div>





            <div class="page-content fade-in-up">
                <div class="row">

              
                    <div class="col-lg-6">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Your Statistics</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <ul class="list-group list-group-divider list-group-full">
                                    <li class="list-group-item">Last Affiliate In :
                                        <span class="float-right">xynjnfd.com</span>
                                    </li>
                                    <li class="list-group-item">Achived on
                                        <span class="float-right">24.05.2024</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                               
                    <div class="col-lg-6">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Your Sites</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Site Name</th>
                                            <th width="50px">Affiliates Achived</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>xyz.com</td>
                                            <td>25</td>
                                        </tr>
                                        <tr>
                                            <td>xyz.com</td>
                                            <td>25</td>
                                        </tr>
                                        <tr>
                                            <td>xyz.com</td>
                                            <td>25</td>
                                        </tr>
                                        <tr>
                                            <td>xyz.com</td>
                                            <td>25</td>
                                        </tr>
                                        <tr>
                                            <td>xyz.com</td>
                                            <td>25</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">



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
    <script src="../admin/dashboard-source/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="../admin/dashboard-source/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="../admin/dashboard-source/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../admin/dashboard-source/assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="../admin/dashboard-source/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="../admin/dashboard-source/assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
    <script src="../admin/dashboard-source/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
    <script src="../admin/dashboard-source/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="../admin/dashboard-source/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="../admin/dashboard-source/assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="../admin/dashboard-source/assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
</body>

</html>