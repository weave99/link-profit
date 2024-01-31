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
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">User Activity Log</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body" style="overflow-x: scroll;">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="">Member Id</th>
                                            <th class="">Date</th>
                                            <th>User Type</th>
                                            <th>Login Time</th>
                                            <th>User IP Address</th>
                                            <th>Geo Location</th>
                                            <th>IP Address Type</th>
                                            <th>Network Connection Used</th>
                                            <th>Activities Done</th>
                                            <th>File Uploaded</th>
                                            <th>Terminate Session</th>
                                            <th>Logout Time</th>
                                            <th>Lock User</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                            <tr>
                                                <td><b>ER25465222</b></td>
                                                <td><b>24.11.2023</b></td>
                                                <td><b>Free Member</b></td>
                                                <td><b>12.10.24 AM</b></td>
                                                <td><b>10.10.510.20</b></td>
                                                <td><b>maplocation</b></td>
                                                <td><b>Public</b></td>
                                                <td><b>Cable</b></td>
                                                <td><b>Communicated with Affiliate</b></td>
                                                <td><b>maplocation</b></td>
                                                <td><Button class="btn btn-danger">Terminate</Button></td>
                                                <td><b>24.11.2023</b></td>
                                                <td><Button class="btn btn-danger">Lock</Button></td>
                                            </tr>
                                            <tr>
                                                <td><b>ER25465222</b></td>
                                                <td><b>24.11.2023</b></td>
                                                <td><b>Free Member</b></td>
                                                <td><b>12.10.24 AM</b></td>
                                                <td><b>10.10.510.20</b></td>
                                                <td><b>maplocation</b></td>
                                                <td><b>Public</b></td>
                                                <td><b>Cable</b></td>
                                                <td><b>Communicated with Affiliate</b></td>
                                                <td><b>maplocation</b></td>
                                                <td><Button class="btn btn-danger">Terminate</Button></td>
                                                <td><b>24.11.2023</b></td>
                                                <td><Button class="btn btn-danger">Lock</Button></td>
                                            </tr>
                                            <tr>
                                                <td><b>ER25465222</b></td>
                                                <td><b>24.11.2023</b></td>
                                                <td><b>Free Member</b></td>
                                                <td><b>12.10.24 AM</b></td>
                                                <td><b>10.10.510.20</b></td>
                                                <td><b>maplocation</b></td>
                                                <td><b>Public</b></td>
                                                <td><b>Cable</b></td>
                                                <td><b>Communicated with Affiliate</b></td>
                                                <td><b>maplocation</b></td>
                                                <td><Button class="btn btn-danger">Terminate</Button></td>
                                                <td><b>24.11.2023</b></td>
                                                <td><Button class="btn btn-danger">Lock</Button></td>
                                            </tr>
                                            <tr>
                                                <td><b>ER25465222</b></td>
                                                <td><b>24.11.2023</b></td>
                                                <td><b>Free Member</b></td>
                                                <td><b>12.10.24 AM</b></td>
                                                <td><b>10.10.510.20</b></td>
                                                <td><b>maplocation</b></td>
                                                <td><b>Public</b></td>
                                                <td><b>Cable</b></td>
                                                <td><b>Communicated with Affiliate</b></td>
                                                <td><b>maplocation</b></td>
                                                <td><Button class="btn btn-danger">Terminate</Button></td>
                                                <td><b>24.11.2023</b></td>
                                                <td><Button class="btn btn-danger">Lock</Button></td>
                                            </tr>
                                            <tr>
                                                <td><b>ER25465222</b></td>
                                                <td><b>24.11.2023</b></td>
                                                <td><b>Free Member</b></td>
                                                <td><b>12.10.24 AM</b></td>
                                                <td><b>10.10.510.20</b></td>
                                                <td><b>maplocation</b></td>
                                                <td><b>Public</b></td>
                                                <td><b>Cable</b></td>
                                                <td><b>Communicated with Affiliate</b></td>
                                                <td><b>maplocation</b></td>
                                                <td><Button class="btn btn-danger">Terminate</Button></td>
                                                <td><b>24.11.2023</b></td>
                                                <td><Button class="btn btn-danger">Lock</Button></td>
                                            </tr>
                                            <tr>
                                                <td><b>ER25465222</b></td>
                                                <td><b>24.11.2023</b></td>
                                                <td><b>Free Member</b></td>
                                                <td><b>12.10.24 AM</b></td>
                                                <td><b>10.10.510.20</b></td>
                                                <td><b>maplocation</b></td>
                                                <td><b>Public</b></td>
                                                <td><b>Cable</b></td>
                                                <td><b>Communicated with Affiliate</b></td>
                                                <td><b>maplocation</b></td>
                                                <td><Button class="btn btn-danger">Terminate</Button></td>
                                                <td><b>24.11.2023</b></td>
                                                <td><Button class="btn btn-danger">Lock</Button></td>
                                            </tr>
                                            <tr>
                                                <td><b>ER25465222</b></td>
                                                <td><b>24.11.2023</b></td>
                                                <td><b>Free Member</b></td>
                                                <td><b>12.10.24 AM</b></td>
                                                <td><b>10.10.510.20</b></td>
                                                <td><b>maplocation</b></td>
                                                <td><b>Public</b></td>
                                                <td><b>Cable</b></td>
                                                <td><b>Communicated with Affiliate</b></td>
                                                <td><b>maplocation</b></td>
                                                <td><Button class="btn btn-danger">Terminate</Button></td>
                                                <td><b>24.11.2023</b></td>
                                                <td><Button class="btn btn-danger">Lock</Button></td>
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