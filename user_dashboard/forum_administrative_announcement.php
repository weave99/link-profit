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
    <title>Earnify</title>
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
                   <h5><b>Administrative Announcement</b></h5>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->










<!--=========== START PAGE CONTENT======================================================================-->


            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">

                        <div class="ibox">
                            <div class="ibox-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">

                                        <div class="col-sm-7">

                                            <h5>Administrative Announcement </h5>


                                        </div>

                                        <div class="col-sm-4 from-group">
                                            <div>
                                            <form >
                                                <div class="row">
                                                    <div class="col-sm-11 from-group">
                                                        <input class="form-control mb-2 "  type="date" placeholder="Type your queries">
                                                    </div>
                                                    <div class="col-sm-1 from-group">
                                                        <button class="btn btn-success" type="submit">Search</button>
                                                    </div>
                                                </div>
                                            </form>                                                    
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="">Topic</th>
                                                        <th class="">Posted by</th>
                                                        <th>Posting Date</th>
                                                        <th>Comments</th>
                                                        <th>Views</th>
                                                        <th>Likes</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                        <tr>
                                                           <td> <a href="forum_administrative_announcement_topic.php?topic=1"><b>Renual Promo</b></a></td>
                                                            <td><b>Admin</b></td>
                                                            <td><b>24.11.2023</b></td>
                                                            <td><b>10</b></td>
                                                            <td><b>800</b></td>
                                                            <td><b>600</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td> <a href="forum_administrative_announcement_topic.php?topic=2"><b>Renual Promo</b></a></td>
                                                            <td><b>Admin</b></td>
                                                            <td><b>24.11.2023</b></td>
                                                            <td><b>10</b></td>
                                                            <td><b>800</b></td>
                                                            <td><b>600</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td> <a href="forum_administrative_announcement_topic.php?topic=3"><b>Renual Promo</b></a></td>
                                                            <td><b>Admin</b></td>
                                                            <td><b>24.11.2023</b></td>
                                                            <td><b>10</b></td>
                                                            <td><b>800</b></td>
                                                            <td><b>600</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td> <a href=""><b>Renual Promo</b></a></td>
                                                            <td><b>Admin</b></td>
                                                            <td><b>24.11.2023</b></td>
                                                            <td><b>10</b></td>
                                                            <td><b>800</b></td>
                                                            <td><b>600</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td> <a href=""><b>Renual Promo</b></a></td>
                                                            <td><b>Admin</b></td>
                                                            <td><b>24.11.2023</b></td>
                                                            <td><b>10</b></td>
                                                            <td><b>800</b></td>
                                                            <td><b>600</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td> <a href=""><b>Renual Promo</b></a></td>
                                                            <td><b>Admin</b></td>
                                                            <td><b>24.11.2023</b></td>
                                                            <td><b>10</b></td>
                                                            <td><b>800</b></td>
                                                            <td><b>600</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td> <a href=""><b>Renual Promo</b></a></td>
                                                            <td><b>Admin</b></td>
                                                            <td><b>24.11.2023</b></td>
                                                            <td><b>10</b></td>
                                                            <td><b>800</b></td>
                                                            <td><b>600</b></td>
                                                        </tr>
            

                                                </tbody>
                                            </table>
                                            <style>
                                                table, th, td {
                                                border: 1px solid black;
                                                border-collapse: collapse;
                                                }
                                            </style>
                                        </div>
                                        
                                    </div>
                                </div>


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