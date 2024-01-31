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
                   <h5><b>Blank</b></h5>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->










<!--=========== START PAGE CONTENT======================================================================-->


            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Upload Your Document</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">

                                        <form action="" method="post" enctype="multipart/form-data" >    
                                                   
                                        <input class="form-control" type="hidden" name="user_id" id="user_id" value="<?php echo $fetch['user_id']; ?>" required>                         

                                            <div class="row">
                                                                                               
                                                <div class="col-sm-5 form-group">
                                                    <label>Id Proof Documents Name</label>
                                                    <select class="form-control" name="id_proof_documents_name" required <?php if($fetch['membership_status']==1){ echo "disabled";} ?>>
                                                        <option value="">Select your documents name</option>
                                                        <option value="Aadhar Card">Aadhar Card</option>
                                                        <option value="Voter ID Card">Voter ID Card</option>
                                                        <option value="Passport">Passport</option>
                                                        <option value="Birth Certificated">Birth Certificated</option>
                                                    </select>
                                                
                                                </div>
                                                <div class="col-sm-7 form-group">
                                                    <label>Id Proof Documents Image<span class="text-danger"> (Only upload PNG / JPG / JPEG Format & File Size under 2MB)</span></label>
                                                    <input class="form-control" type="file" name="id_proof_documents_image" id="id_proof_documents_image" required <?php if($fetch['membership_status']==1){ echo "disabled";} ?>> 
                                                </div>
                                                <!--
                                                //`user_id`, `name`, `street`, `city`, `state`, `country`, `zip_code`, `contact_no`, `profile_picture`, // disabled
                                                //`membership_category`, `membership_id`, `ethinity`, `maretial_status`, `family_members_no`, 
                                                //`monthly_gross_family_income`, `id_proof_documents_name`, `id_proof_documents_image`, `documents_upload_status`, 
                                                //`membership_status`, `profile_completion`, `email`, `password`, `dob`, `date_of_joining`, `account_status`, `verify_otp`, 
                                                //`login_time` SELECT * FROM `users` WHERE 1
                                                -->

                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success" type="submit" name="update">Submit</button>
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