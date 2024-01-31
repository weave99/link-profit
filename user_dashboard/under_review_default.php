<?php
include_once("../db/conn.php");
require_once("../db/user_sequre.php");


if(isset($_POST['submit_comment']))
{
    //`comment_id`, `period_details_id`, `user_id`, `comment_msg`, `comment_date` SELECT * FROM `under_review_comment` WHERE 1
    $period_details_id=$_POST['period_details_id'];
    $user_id=$_POST['user_id'];
    $comment_msg=$_POST['comment_msg'];
    $comment_date=$_POST['comment_date'];

    $sql="INSERT INTO under_review_comment (period_details_id, user_id, comment_msg, comment_date)
    VALUES ('$period_details_id', '$user_id', '$comment_msg', '$comment_date')";
    $query=mysqli_query($conn,$sql);

   
    if($query)
    {
        header("Location:under_review_default.php?period_details_id=". $period_details_id."&msg=Successfully Submitted");
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }

}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- PAGE LEVEL STYLES-->

        <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
    <script>
        function set_period_details_id(){
            var period_details_id=document.getElementById("period_details_id").value;
            if(period_details_id!=""){
                window.location.href="under_review_default.php?period_details_id="+period_details_id;
            }
        }
    </script>
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
                   <h5><b>Under Review</b></h5>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->










<!--=========== START PAGE CONTENT======================================================================-->


            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-body">
                                <?php
                                // <!--`review_period_id`, `review_form`, `review_end`, `review_archive_date`, `review_site_status` SELECT * FROM `under_review_period` WHERE 1-->
                                //<!--`period_details_id`, `review_period_id`, `review_site_name`, `review_site_category`, `review_site_owner`, `review_site_online` SELECT * FROM `under_review_period_details` WHERE 1-->
                                $sql1="SELECT * FROM under_review_period WHERE review_site_status=0";
                                $query1=mysqli_query($conn,$sql1);
                                if($prd=mysqli_fetch_array($query1)) 
                                {

                                    $review_period_id=$prd['review_period_id'];

                                ?>
                                <div class="row"  style="border:1px solid #487380;">
                                    <div class="col-lg-6">
                                        <p class="pt-3"><b>Reviewing From: <?php echo $prd['review_form'];?></b></p>
                                    </div>
                                    <div class="col-lg-3 ">
                                        <p class="pt-3"><b>Review will End on : <?php echo $prd['review_end'];?></b></p>
                                    </div>
                                    <div class="col-lg-3 ">
                                       <a href=""><p class="btn btn-success mt-2" style="float:right">Archive</p></a> 
                                    </div>
                                </div>
                                
                                <?php
                                }
                                ?>

                                <?php
                                // <!--`review_period_id`, `review_form`, `review_end`, `review_archive_date`, `review_site_status` SELECT * FROM `under_review_period` WHERE 1-->
                                //<!--`period_details_id`, `review_period_id`, `review_site_name`, `review_site_category`, `review_site_owner`, `review_site_online` 
                                //SELECT * FROM `under_review_period_details` WHERE 1-->
                                $sql2="SELECT * FROM under_review_period_details WHERE review_period_id=$review_period_id";
                                $query2=mysqli_query($conn,$sql2);

                                $qty_sites = mysqli_num_rows( $query2 );
                                ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-12">
                                            <h5 class="pt-3 pb-3"><b>Currently Reviewing : <?php  printf("%d\n", $qty_sites);?> Sites</b></h5>
                                        </div>
                                    </div>
                                        <div class="d-flex" style="overflow-x:scroll;">
                                            <table>
                                                <tr>
                                                    
                                                    <?php
                                                    while($prd2=mysqli_fetch_array($query2)) 
                                                    {?>

                                                    <td>
                                                        <div class="card mr-2" style="width:280px;">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Site Name : <?php echo $prd2['review_site_name'];?></h4>
                                                                <h4 class="card-title">Site Category : <?php echo $prd2['review_site_category'];?></h4>
                                                                <h4 class="card-title">Site Owned : <?php echo $prd2['review_site_owner'];?></h4>
                                                                <h4 class="card-title">Online Since : <?php echo $prd2['review_site_online'];?></h4>
                                                            </div>
                                                        </div>                                                    
                                                    </td>

                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                            </table>
                                        </div>


                                        
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-lg-12">
                                        <h5>Review Report</h5>

                                        <form action="">
                                        <div class="row">
                                            <div class="col-sm-4 from-group">
                                                <label for="">Site name</label>
                                                    <select class="form-control" name="period_details_id" id="period_details_id" required onchange="set_period_details_id();">
                                                        <option value="" selected disabled="none">Choose site</option>
                                                        <?php
                                                        //`period_details_id`, `review_period_id`, `review_site_name`, `review_site_category`, `review_site_owner`, `review_site_online` SELECT * FROM `under_review_period_details` WHERE 1
                                                        $sql_ctgy="SELECT * FROM `under_review_period_details` WHERE 1";
                                                        $query_ctgy=mysqli_query($conn,$sql_ctgy);
                                                        while($ctgy=mysqli_fetch_array($query_ctgy)) 
                                                        {?>
                                                            <option value="<?php echo $ctgy['period_details_id'];?>" <?php if(isset($_REQUEST['period_details_id'])){if($ctgy['period_details_id']==$_REQUEST['period_details_id']) echo 'selected'; }?>><?php echo $ctgy['review_site_name'];?></option>
                                                        <?php
                                                        }
                                                        ?> 
                                                    </select>
                                            </div>
                                        </div>                                            
                                        </form>
                                    </div>
                                </div>

                                <?php

                                //<!--`report_id`, `period_details_id`, `availability`, `restricted`, `currency`, `daily_earnings`, `method_earning`, `min_amount_cashout`, 
                                //`cashout_interval`, `cashout_method`, `direct_ref_availability`, `rented_ref_availability`, `max_direct_referral`, `min_rented_referral`, 
                                //`upgradation_facilities`, `max_dr_upgraded_members`, `max_rr_upgraded_members`, `com__dr_earnings_levels`, `com__pd_affiliate_earnings`, 
                                //`com_pd_rented_referrals`, `commission_clicks`, `commission_tasks`, `commission_purchase`, `payment_proof_1`, `payment_proof_2`, 
                                //`payment_proof_3`, `payment_proof_4`, `payment_proof_5`, `payment_proof_6`, `payment_proof_7`, `payment_proof_8`, `payment_proof_9`, 
                                //`payment_proof_10` SELECT * FROM `under_review_report` WHERE 1-->


                                if(isset($_REQUEST['period_details_id'])){
                                    $period_details_id=$_REQUEST['period_details_id'];
                                    $sql_ctgy2="SELECT * FROM under_review_report WHERE period_details_id='$period_details_id'";
                                    $query_ctgy2=mysqli_query($conn,$sql_ctgy2);
                                    if($ctgy2=mysqli_fetch_array($query_ctgy2)) 
                                ?>

                                <div class="row pt-3">

                                    <div class="col-lg-12">
                                        <table>
                                            <tr >
                                                <td>Availability : </td>
                                                <td><?php echo $ctgy2['availability']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Restricted To : </td>
                                                 <td><?php echo $ctgy2['restricted']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Currency : </td>
                                                 <td><?php echo $ctgy2['currency']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Daily Earnings (approx) : </td>
                                                 <td><?php echo $ctgy2['daily_earnings']; ?></td>
                                            </tr>
                                            <tr>
                                                <td> Method of Earnings : </td>
                                                 <td><?php echo $ctgy2['method_earning']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Minimum Amount to Cashout : </td>
                                                 <td><?php echo $ctgy2['min_amount_cashout']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Cashout Interval : </td>
                                                 <td><?php echo $ctgy2['cashout_interval']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Cashout Method : </td>
                                                 <td><?php echo $ctgy2['cashout_method']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Direct Referrals Availability  : </td>
                                                 <td><?php echo $ctgy2['direct_ref_availability']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Rented Referrals Availability : </td>
                                                 <td><?php echo $ctgy2['rented_ref_availability']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Maximum Direct Referral for Free Members : </td>
                                                 <td><?php echo $ctgy2['max_direct_referral']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Maximum Direct Referral for Free Members : </td>
                                                 <td><?php echo $ctgy2['min_rented_referral']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Upgradation Facilities : </td>
                                                 <td><?php echo $ctgy2['upgradation_facilities']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Maximum Direct Referral for Upgraded Members : </td>
                                                 <td><?php echo $ctgy2['max_dr_upgraded_members']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Maximum Rented Referral for Upgraded Members : </td>
                                                 <td><?php echo $ctgy2['max_rr_upgraded_members']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Commission from Direct Referrals Earnings Levels : </td>
                                                 <td><?php echo $ctgy2['com__dr_earnings_levels']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Commission percentage on Direct Affiliate Earnings  : </td>
                                                 <td><?php echo $ctgy2['com__pd_affiliate_earnings']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Commission percentate from Rented Referrals : </td>
                                                 <td><?php echo $ctgy2['com_pd_rented_referrals']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Commission from Clicks : </td>
                                                 <td><?php echo $ctgy2['commission_clicks']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Commission from Tasks  : </td>
                                                 <td><?php echo $ctgy2['commission_tasks']; ?></td>
                                            </tr>
                                            <tr>
                                                <td> Commission from Purchase : </td>
                                                 <td><?php echo $ctgy2['commission_purchase']; ?></td>
                                            </tr>
                                            
                                        </table>
                                   
                                      
                                    </div>
                                            <!--`report_id`, `period_details_id`, `availability`, `restricted`, `currency`, `daily_earnings`, `method_earning`, `min_amount_cashout`, 
                                //`cashout_interval`, `cashout_method`, `direct_ref_availability`, `rented_ref_availability`, `max_direct_referral`, `min_rented_referral`, 
                                //`upgradation_facilities`, `max_dr_upgraded_members`, `max_rr_upgraded_members`, `com__dr_earnings_levels`, `com__pd_affiliate_earnings`, 
                                //`com_pd_rented_referrals`, `commission_clicks`, `commission_tasks`, `commission_purchase`, `payment_proof_1`, `payment_proof_2`, 
                                //`payment_proof_3`, `payment_proof_4`, `payment_proof_5`, `payment_proof_6`, `payment_proof_7`, `payment_proof_8`, `payment_proof_9`, 
                                //`payment_proof_10` SELECT * FROM `under_review_report` WHERE 1-->
                                    <div class="col-lg-12">
                                        <h5 class="pt-3 pb-3 "><b>Payment Prooof</b></h5>
                                        <div class="row">
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 1 : <a href="../user_dashboard/review_payment_proof/<?php echo $ctgy2['payment_proof_1']; ?>" target="_blank">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 2 : <a href="../user_dashboard/review_payment_proof/<?php echo $ctgy2['payment_proof_2']; ?>" target="_blank">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 3 : <a href="../user_dashboard/review_payment_proof/<?php echo $ctgy2['payment_proof_3']; ?>" target="_blank">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 4 : <a href="../user_dashboard/review_payment_proof/<?php echo $ctgy2['payment_proof_4']; ?>" target="_blank">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 5 : <a href="../user_dashboard/review_payment_proof/<?php echo $ctgy2['payment_proof_5']; ?>" target="_blank">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 6 : <a href="../user_dashboard/review_payment_proof/<?php echo $ctgy2['payment_proof_6']; ?>" target="_blank">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 7 : <a href="../user_dashboard/review_payment_proof/<?php echo $ctgy2['payment_proof_7']; ?>" target="_blank">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 8 : <a href="../user_dashboard/review_payment_proof/<?php echo $ctgy2['payment_proof_8']; ?>" target="_blank">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 9 : <a href="../user_dashboard/review_payment_proof/<?php echo $ctgy2['payment_proof_9']; ?>" target="_blank">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 10 : <a href="../user_dashboard/review_payment_proof/<?php echo $ctgy2['payment_proof_10']; ?>" target="_blank">View</a>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-lg-5">
                                        <form action="" method="POST">
                                            <!--`comment_id`, `period_details_id`, `user_id`, `comment_msg`, `comment_date` SELECT * FROM `under_review_comment` WHERE 1-->
                                            <input type="hidden" name="user_id" value="<?php echo $session_user_id; ?>">
                                            <input type="hidden" name="period_details_id" value="<?php echo $period_details_id; ?>">
                                            <input type="hidden" name="comment_date" value="<?php echo date("d-m-Y"); ?>">
                                            
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="">Comments</label>
                                                    <textarea class="form-control" name="comment_msg" id="comment_msg"  rows="5"></textarea>
                                                </div>
                                                <div class="col-sm-12 pt-2">
                                                    <input type="submit" name="submit_comment" class="btn btn-success" value="submit">
                                                </div>
                                            </div>
                                        <form>

                                    </div>
                                
                                    <div class="col-lg-7" style="overflow:scroll; height:400px;">
                                        <h5><b>Posts</b></h5>
                                        <?php
                                        //`comment_id`, `period_details_id`, `user_id`, `comment_msg`, `comment_date` SELECT * FROM `under_review_comment` WHERE 1
                                        $sql_ctgy3="SELECT * FROM under_review_comment WHERE period_details_id='$period_details_id'";
                                        $query_ctgy3=mysqli_query($conn,$sql_ctgy3);
                                        while($ctgy3=mysqli_fetch_array($query_ctgy3)) 
                                        {
                                            $comment_id=$ctgy3['comment_id'];
                                            $user_id=$ctgy3['user_id'];
                                            $sql_ctgy4="SELECT * FROM users WHERE user_id='$user_id'";
                                            $query_ctgy4=mysqli_query($conn,$sql_ctgy4);
                                            if($ctgy4=mysqli_fetch_array($query_ctgy4)) 
                                            {
                                                $membership_id=$ctgy4['membership_id'];
                                            }
                                        
                                        ?>

                                        <div class="row mb-3">
                                            <div class="col-lg-10">
                                                <p style="margin-bottom:0px;"><?php echo $ctgy3['comment_msg']; ?></p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6 class="p-0">User ID : <?php echo $membership_id; ?></h6>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="text-right p-0">Posted On <?php echo $ctgy3['comment_date']; ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="">
                                                    <?php
/*

                                                        if(isset($_POST['comment_like']))
                                                        {
                                                            //`like_dislike_id`, `user_id`, `comment_id`, `comment_like`, `comment_dislike` SELECT * FROM `under_review_comment_like_dislike` WHERE 1-->
                                                            $user_id=$_POST['user_id'];
                                                            $comment_id=$_POST['comment_id'];
                                                            $comment_like=1;


                                                            $sql="INSERT INTO under_review_comment_like_dislike (user_id, comment_id, comment_like)
                                                            VALUES ('$user_id', '$comment_id', '$comment_like')";
                                                            $query=mysqli_query($conn,$sql);


                                                                


                                                            if($query)
                                                            {
                                                                header("Location:under_review_default.php?period_details_id=". $period_details_id);
                                                            }
                                                            else{
                                                                echo "Failed: " . mysqli_error($conn);
                                                            }






                                                            $update=mysqli_query($conn,"update  users  set user_id='$user_id', comment_id='$comment_id', comment_like='$comment_like' where user_id='$user_id'");
               

                                                            if($update)
                                                            {
                                                                
                                                                header("location:dashboard.php?msg=Updated Successfully");
                                                            }
                                                            else
                                                            {
                                                                $err=mysql_error();
                                                            }
                                                            
                                                        }

*/

                                                    ?>




                                                    <form id="respons_like_dislike">
                                                        <input type="text" name="user_id" value="<?php echo $session_user_id; ?>">
                                                        <input type="text" name="comment_id" value="<?php echo $comment_id; ?>">
                                                        <input type="hidden" name="period_details_id" value="<?php echo $period_details_id; ?>">
                                                        <!--`like_dislike_id`, `user_id`, `comment_id`, `comment_like`, `comment_dislike` SELECT * FROM `under_review_comment_like_dislike` WHERE 1-->
                                                        
                                                        <div class="row">
                                                            <div class="col-6 p-0 text-center">
                                                                <button type="submit" name="comment_like" onclick="submitForm()" class="bg-transparent border-0">
                                                                <?php echo $comment_id; ?>
                                                                    <!--<i class="fa-solid fa-thumbs-up" style="font-size:21px"></i>-->
                                                                </button>
                                                                

                                                                <div><p id="result">100</p></div>
                                                            </div>

                                                            <div class="col-6 p-0 text-center">
                                                                <button type="submit" name="comment_dislike"  class="bg-transparent border-0" style="color: #24a0ed;">
                                                                    <i class="fa-solid fa-thumbs-up" style="font-size:21px"></i>
                                                                </button>
                                                                <div><p>100</p></div>
                                                            </div>
                                                        </div>
                                                       
                                                         
                                                    
                                                        
                                                    </form>                                                    
                                                </div>

                                                
                                            </div>
                                        </div>
                                        
                                        <?php
                                        }
                                        ?>
                                        



                                    </div>

                                </div>

                                <?php
                                }
                                ?>

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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function submitForm() {
            // Get form data
            var formData = $('#respons_like_dislike').serialize();

            // AJAX request
            $.ajax({
                type: 'POST',
                url: 'respons_like_dislike.php',
                data: formData,
                success: function(response) {
                    // Display the response in the 'result' div
                    $('#result').html(response);
                }
            });
        }
    </script>
</body>

</html>