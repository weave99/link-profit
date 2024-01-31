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
                   <h5><b>FORUM</b></h5>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->










<!--=========== START PAGE CONTENT======================================================================-->


            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">

                        <div class="ibox">
                            <div class="ibox-body">
<!--
                                <div class="row border">
                                    <div class="col-lg-12">
                                        <h5><b>Forum Rules</b></h5>
                                        <p>1. YOU MUST NOT POST ANYTHING ILLICIT, ABUSIVE AND VULGAR IN NATURE.</p>
                                        <p>2. DO NOT POST ANYTHING WHICH ARE AGAINST COMMUNAL HARMONY.</p>
                                        <p>3. YOU CAN POST YOUR COMMENT.. YOU CAN ALSO DISCUSS WITH RELATED TOPICS WITH OTHER MEMBERS.IT IS A REQUEST TO HAVE RESPECT ON OTHER MEMBERS VIEWS.</p>
                                        <p>4. This forum is only for discussion, any type of promotional activity of any other website i.e. posting links for promotional purpose will not be allowed.</p>
                                        <p>5. YOUR MEMBERSHIP MAY BE TERMINATED OR SUSPENDED IF VIOLATED ANY TERMS ABOVE.</p>
                                        <form action="" class="form-inline">
                                        <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                                            <label class="ui-checkbox ui-checkbox-inline">
                                                <input type="checkbox">
                                                <span class="input-span"></span>I Agree to abide by</label>
                                        </div>
                                        <button class="btn btn-success" type="submit">Submit</button>
                                        
                                        </form>
                                        <div class="text-danger">User submit Onece time . after submit this rule dont display</div>
                                    </div>
                                </div>

-->

                                <div class="row">
                                    <div class="col-lg-12 mb-5">
                                            <a  href="traning_module_1.php"><div class="col-lg-3 btn" style="background-color:#629dad; color:#fff;">Administrative Announcement</div></a>
                                           
                                    </div>
                                    <div class="col-lg-12">
                                           
                                            <a  href="traning_module_2.php"><div class="col-lg-3  btn" style="background-color:#629dad; color:#fff;">Promosonal Announcement</div></a>
                                    </div>
                                </div>

                                <form >
                                    <div class="row">
                                        <div class="col-sm-11 from-group">
                                            <input class="form-control mb-2 " id="ex-email" type="text" placeholder="Type your queries">
                                        </div>
                                        <div class="col-sm-1 from-group">
                                            <button class="btn btn-success" type="submit">Search</button>
                                        </div>

                                    </div>
                                </form>
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