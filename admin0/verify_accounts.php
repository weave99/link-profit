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
            <a href="approved_users.php">
            <div class="ibox bg-success color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">
                        <?php 
                        //`user_id`, `membership_status`, `membership_category`, `membership_id`, `user_track_url`, `name`, `age`, `contact_no`, 
                        //`profile_picture`, `city`, `state`, `country`, `zip_code`, `address`, `qualification`, `have_skill_in`, `expert_in_skill`, 
                        //`mother_language`, `fluent_language`, `ethinity`, `gender`, `maretial_status`, `family_members_no`, 
                        //`monthly_gross_family_income`, `occupation`, `id_proof_documents_name`, `id_proof_documents_image`, 
                        //`documents_upload_status`, `profile_completion`, `email`, `password`, `dob`, `date_of_joining`, `account_status`, 
                        //`verify_otp`, `login_date`, `login_time`, `logout_time` SELECT * FROM `users` WHERE 1
                        

                        $live_property_sql = "SELECT * FROM users where approved='1'";
                        $live_property_result = mysqli_query($conn, $live_property_sql); 
                        // Return the number of rows in result set
                        $live_property_rowcount = mysqli_num_rows( $live_property_result );
                        //	Display result
                        printf("%d\n", $live_property_rowcount);
                        
                        ?>
                    </h2>
                    <div class="m-b-5">Approved Users Documents</div><i class="widget-stat-icon"><img src="dashboard-source/assets/img/world-upload.svg" width="50%" alt=""></i> 
                </div>
            </div>
            </a>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <a href="rejected_users.php">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">
                        <?php 
                        //`user_id`, `membership_status`, `membership_category`, `membership_id`, `user_track_url`, `name`, `age`, `contact_no`, 
                        //`profile_picture`, `city`, `state`, `country`, `zip_code`, `address`, `qualification`, `have_skill_in`, `expert_in_skill`, 
                        //`mother_language`, `fluent_language`, `ethinity`, `gender`, `maretial_status`, `family_members_no`, 
                        //`monthly_gross_family_income`, `occupation`, `id_proof_documents_name`, `id_proof_documents_image`, 
                        //`documents_upload_status`, `profile_completion`, `email`, `password`, `dob`, `date_of_joining`, `account_status`, 
                        //`verify_otp`, `login_date`, `login_time`, `logout_time` SELECT * FROM `users` WHERE 1
                        
                        $reject_status_sql = "SELECT * FROM users where rejected='1'";
                        $reject_status_result = mysqli_query($conn, $reject_status_sql); 
                        // Return the number of rows in result set
                        $reject_status_rowcount = mysqli_num_rows( $reject_status_result );
                        //	Display result
                        printf("%d\n", $reject_status_rowcount);
                        
                        ?>
                    </h2>
                    <div class="m-b-5">Rejected Users Documents</div><i class="widget-stat-icon"><img src="dashboard-source/assets/img/download.svg" width="50%" alt=""></i> 
                    
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="under_review_users.php">
            <div class="ibox bg-warning color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">
                        <?php 
                        //`user_id`, `membership_status`, `membership_category`, `membership_id`, `user_track_url`, `name`, `age`, `contact_no`, 
                        //`profile_picture`, `city`, `state`, `country`, `zip_code`, `address`, `qualification`, `have_skill_in`, `expert_in_skill`, 
                        //`mother_language`, `fluent_language`, `ethinity`, `gender`, `maretial_status`, `family_members_no`, 
                        //`monthly_gross_family_income`, `occupation`, `id_proof_documents_name`, `id_proof_documents_image`, 
                        //`documents_upload_status`, `profile_completion`, `email`, `password`, `dob`, `date_of_joining`, `account_status`, 
                        //`verify_otp`, `login_date`, `login_time`, `logout_time` SELECT * FROM `users` WHERE 1
                        
                        $under_review_sql = "SELECT * FROM users where id_proof_documents_image!='' and  under_review='0'";
                        $under_review_result = mysqli_query($conn, $under_review_sql); 
                        // Return the number of rows in result set
                        $under_review_rowcount = mysqli_num_rows( $under_review_result );
                        //	Display result
                        printf("%d\n", $under_review_rowcount);
                        
                        ?>
                    </h2>
                    <div class="m-b-5">Under Review Documents</div><i class="widget-stat-icon"><img src="dashboard-source/assets/img/download.svg" width="50%" alt=""></i> 
                    
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">
                        <?php 
                         //`user_id`, `membership_status`, `membership_category`, `membership_id`, `user_track_url`, `name`, `age`, `contact_no`, 
                        //`profile_picture`, `city`, `state`, `country`, `zip_code`, `address`, `qualification`, `have_skill_in`, `expert_in_skill`, 
                        //`mother_language`, `fluent_language`, `ethinity`, `gender`, `maretial_status`, `family_members_no`, 
                        //`monthly_gross_family_income`, `occupation`, `id_proof_documents_name`, `id_proof_documents_image`, 
                        //`documents_upload_status`, `profile_completion`, `email`, `password`, `dob`, `date_of_joining`, `account_status`, 
                        //`verify_otp`, `login_date`, `login_time`, `logout_time` SELECT * FROM `users` WHERE 1
                        
                        $sql = "SELECT * FROM users";
                        $result = mysqli_query($conn, $sql); 
                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows( $result );
                        //	Display result
                        printf("%d\n", $rowcount);
                       
                        ?>
                    </h2>

                    <div class="m-b-5">Total Users</div><i class="ti-user widget-stat-icon"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Member Under Review </div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Member ID</th>
                                <th>Joining Date</th>
                                <th>Name</th>
                                <th>Contact No.</th>
                                <th>Email ID</th>
                                <th>Country</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        //`user_id`, `membership_status`, `membership_category`, `membership_id`, `user_track_url`, `name`, `age`, `contact_no`, 
                        //`profile_picture`, `city`, `state`, `country`, `zip_code`, `address`, `qualification`, `have_skill_in`, `expert_in_skill`, 
                        //`mother_language`, `fluent_language`, `ethinity`, `gender`, `maretial_status`, `family_members_no`, 
                        //`monthly_gross_family_income`, `occupation`, `id_proof_documents_name`, `id_proof_documents_image`, 
                        //`documents_upload_status`, `profile_completion`, `email`, `password`, `dob`, `date_of_joining`, `account_status`, 
                        //`verify_otp`, `login_date`, `login_time`, `logout_time` SELECT * FROM `users` WHERE 1

                        $review_sql="SELECT * FROM users where id_proof_documents_image!='' and  under_review='0' order by date_of_joining desc";
                        $review_query=mysqli_query($conn,$review_sql);
                        while($review_details=mysqli_fetch_array($review_query)) 
                        { 
                        ?>


                            <tr>
                                <td><?php echo $review_details['membership_id'];?></td>
                                <td><?php echo $review_details['date_of_joining'];?></td>
                                <td><?php echo $review_details['name'];?></td>
                                <td><?php echo $review_details['contact_no'];?></td>
                                <td><?php echo $review_details['email'];?></td>
                                <td><?php echo $review_details['country'];?></td>
                                <td>
                                <?php
                                    if($review_details['membership_status']==""){?>
                                        Under Review
                                    <?php
                                    }
                                ?>
                                </td>
                                <td>
                                    <a href="user_details.php?user_id=<?php echo $review_details['user_id'];?>">
                                        <button type="button" class="btn text-white bg-warning">Check Documents</button>
                                    </a>

                                </td>
                                
                            </tr>

                        <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <style>
        .visitors-table tbody tr td:last-child {
            display: flex;
            align-items: center;
        }

        .visitors-table .progress {
            flex: 1;
        }

        .visitors-table .progress-parcent {
            text-align: right;
            margin-left: 10px;
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