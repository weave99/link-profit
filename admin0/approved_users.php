<?php
include_once("../db/conn.php");
require_once("../db/admin_sequre.php");


if(isset($_POST['request_reject']))	
{
    $user_id=$_POST['user_id'];
    $membership_status="0";
    $under_review="1";
    $approved="0";
    $rejected="1";
       //`no_of_installment`, `installment_amount_month`, `reg_after_downpayment_yn`, `reg_original_deed_yn`, `third_party_gurantor_yn`, 
       //`others_terms_conditions`, `hot_offer`, `under_construction_yn`, `sold_out_yn`, `submit_status`
      $update ="UPDATE users SET under_review='$under_review'  where user_id='$user_id'";
      if ($conn->query($update) === TRUE) {

            $reject ="UPDATE users SET approved='$approved', membership_status='$membership_status', rejected='$rejected' where user_id='$user_id'";
            if ($conn->query($reject) === TRUE) {
                $err="Rejected";
                header("location:dashboard.php?msg=".$err);
            }
      }
      else
      {
          $err=mysql_error();
      }
}
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
                   <h4> Approved Users  </h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== START PAGE CONTENT======================================================================-->

<div class="page-content fade-in-up">



    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">User List</div>
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
                        //`post_property_id`, `user_id`, `post_date`, `property_list`, `property_type`, `property_state`, `property_district`, 
                        //`property_city`, `property_locality`, `property_sub_locality`, `apartment_socity`, `plot_no`, `plot_area`, `plot_area_unit`, 
                        //`plot_lenght`, `plot_lenght_unity`, `plot_breadth`, `plot_breadth_unit`, `boundry_yn`, `no_open_side`, `any_construction_yn`, 
                        //`prossession_by`, `layout_sketch_map`, `property_image_1`, `property_image_2`, `property_video`, `property_location_link`,
                        //`property_current_location`, `property_ownership`, `property_approved_by`, `expected_price`, `price_per_unit`, 
                        //`all_inclusive_price_yn`, `tax_govt_charges_yn`, `price_negotiable_yn`, `about_property`, `maintenance_staff_yn`, 
                        //`water_storage_yn`, `running_water_facility_yn`, `rain_water_harvesting_yn`, `feng_shui_vaastu_complaint_yn`, 
                        //`proper_drainage_system_yn`, `solar_power_plant_yn`, `solar_street_light_yn`, `overlooking_pool_yn`, `overlooking_club_yn`, 
                        //`overlooking_park_garden_yn`, `overlooking_main_road_yn`, `property_gated_society_yn`, `property_gated_society_name`, 
                        //`property_facing`, `corner_property_yn`, `suggest_property_feature`, `best_deal`, `down_payment_percentage`, `rate_interest`, 
                        //`no_of_installment`, `installment_amount_month`, `reg_after_downpayment_yn`, `reg_original_deed_yn`, `third_party_gurantor_yn`, 
                        //`others_terms_conditions`, `hot_offer`, `under_construction_yn`, `sold_out_yn`, `submit_status`, `under_review` 
                        //SELECT * FROM `users_post_property_details` WHERE 1
                        $approved_sql="SELECT * FROM users where approved='1' order by date_of_joining desc";
                        $approved_query=mysqli_query($conn,$approved_sql);
                        while($approved_details=mysqli_fetch_array($approved_query)) 
                        { 

                        ?>


                            <tr>
                            <td><?php echo $approved_details['membership_id'];?></td>
                                <td><?php echo $approved_details['date_of_joining'];?></td>
                                <td><?php echo $approved_details['name'];?></td>
                                <td><?php echo $approved_details['contact_no'];?></td>
                                <td><?php echo $approved_details['email'];?></td>
                                <td><?php echo $approved_details['country'];?></td>
                                <td>
                                <?php
                                    if($approved_details['approved']==1){
                                    ?>
                                    <span class="badge badge-success">Approved</span>
                                    <?php
                                    }
                                ?>
                                </td>
                                <td>
                                    <a href="user_details.php?user_id=<?php echo $approved_details['user_id'];?>">
                                        <button type="button" class="btn text-white bg-warning">Check User</button>
                                    </a>

                                </td>
                                <td>
                               
                                    <form action="" method="post">
                                        <input type="hidden" name="user_id" value="<?php echo $approved_details['user_id'];?>">
                                        <button class="btn btn-danger" name="request_reject">Reject </button>
                                                  
                                    </form>

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