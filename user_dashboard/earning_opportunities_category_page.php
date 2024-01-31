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
    <?php
    

    //$sql_eop_category_page="SELECT eop_site_id,eop_category_name,earning_opportunities_site_description.eop_category_id, eop_site_name, eop_site_description, eop_site_status FROM 
    //earning_opportunities_site_description,earning_opportunities_category_master  WHERE earning_opportunities_site_description.eop_category_id=earning_opportunities_category_master.eop_category_id";
        //$sql_eop_category_page="SELECT * FORM earning_opportunities_site_description WHERE eop_category_id=$eop_category_id";
    //$query_eop_category_page=mysqli_query($conn,$sql_eop_category_page);
    //if($fetch_eop_category_page=mysqli_fetch_array($query_eop_category_page)) 
    //{



    //}




    

 //`eop_site_id`, `eop_category_id`, `eop_site_name`, `eop_site_description`, `eop_site_status` SELECT * FROM `earning_opportunities_site_description` WHERE 1
    
  //`eop_category_id`, `eop_category_name` SELECT * FROM `earning_opportunities_category_master` WHERE 1




   

       
       
       


    ?>  

<!--=====================================-->
        <div class="content-wrapper">
<!--=====================================-->


                <?php
                $page_category=$_REQUEST['page_category'];
                $sql_ctgy0="SELECT * FROM earning_opportunities_category_master WHERE eop_category_id='$page_category'";
                $query_ctgy0=mysqli_query($conn,$sql_ctgy0);
                if($ctgy0=mysqli_fetch_array($query_ctgy0)) 
                {
                    $eop_category_name=$ctgy0['eop_category_name'];
                }

                ?>
<!--=========== Start Indigator Bar===============================-->
            <div class="row pt-2 text-center" style="background-color:#629dad; color:#fff; font-width:700;">
                <div class="col-lg-12">
                   <h5><b><?php echo $eop_category_name;?></b></h5>
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
                                    <?php include ("earning_oportunities_header_tab.php");?>
                               </div>

                               <div class="row mt-3 mb-5">
                                    <div class="col-lg-9">
                                        <h4><b>Many <?php echo $eop_category_name;?> Sites are available choose sites according to your preferance</b></h4>
                                    </div>
                                    <div class="col-lg-3">
                                        <form action="">
                                                <select class="form-control" name="eop_site_id" id="">
                                                        <option value="" selected disabled="none"> Choose category</option>
                                                        <?php
                                                        $sql_ctgy="SELECT * FROM earning_opportunities_site_description WHERE 1";
                                                        $query_ctgy=mysqli_query($conn,$sql_ctgy);
                                                        while($ctgy=mysqli_fetch_array($query_ctgy)) 
                                                        {?>
                                                            <option value="<?php echo $ctgy['eop_site_id'];?>" <?php if(isset($_REQUEST['xedit'])) if($ctgy['eop_site_id']==$eop_site_id) echo 'selected';?>><?php echo $ctgy['eop_site_name'];?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                        </form>
                                    </div>
                                </div>



                                <?php

                                //`eop_site_id`, `eop_category_id`, `eop_site_name`, `eop_site_description`, `eop_site_status` SELECT * FROM `earning_opportunities_site_description` WHERE 1
                                $sql_ctgy2="SELECT * FROM earning_opportunities_site_description WHERE eop_category_id=$page_category";
                                $query_ctgy2=mysqli_query($conn,$sql_ctgy2);
                                while($ctgy2=mysqli_fetch_array($query_ctgy2)) 
                                {
                                 /* `ratesite_id`, `user_id`, `eop_site_id`, `ratesite_credibility`,
                                  `ratesite_reliability`, `ratesite_intimacy`, `ratesite_self_orientation`, `ratesite_date`SELECT * FROM `user_rate_site_master` WHERE 1   */
                                   $eop_site_id=$ctgy2['eop_site_id']; 
                                   $currentDate = date('d.m.Y'); // Get the current date in YYYY-MM-DD format
                                   $sevenDaysAgo = date('d.m.Y', strtotime('-7 days', strtotime($currentDate))); // Calculate 7 days ago

                                  $sql3="SELECT * FROM user_rate_site_master WHERE eop_site_id=$eop_site_id and 
                                  str_to_date(ratesite_date,'%d.%m.%Y')>str_to_date('$sevenDaysAgo','%d.%m.%Y') and 
                                  str_to_date(ratesite_date,'%d.%m.%Y')<=str_to_date('$currentDate','%d.%m.%Y')";

                                  $ratesite_credibility_1_total=0;
                                  $ratesite_credibility_2_total=0;
                                  $ratesite_credibility_3_total=0;
                                  $ratesite_credibility_4_total=0;
                                  $ratesite_credibility_5_total=0;

                                  $ratesite_reliability_1_total=0;
                                  $ratesite_reliability_2_total=0;
                                  $ratesite_reliability_3_total=0;
                                  $ratesite_reliability_4_total=0;
                                  $ratesite_reliability_5_total=0;

                                  $ratesite_intimacy_1_total=0;
                                  $ratesite_intimacy_2_total=0;
                                  $ratesite_intimacy_3_total=0;
                                  $ratesite_intimacy_4_total=0;
                                  $ratesite_intimacy_5_total=0;

                                  $ratesite_self_orientation_1_total=0;
                                  $ratesite_self_orientation_2_total=0;
                                  $ratesite_self_orientation_3_total=0;
                                  $ratesite_self_orientation_4_total=0;
                                  $ratesite_self_orientation_5_total=0;


                                  $query3=mysqli_query($conn,$sql3);
                                  while($f3=mysqli_fetch_array($query3))
                                  {
                                    $ratesite_credibility=(int)($f3['ratesite_credibility']);
                                    switch($ratesite_credibility)
                                    {
                                        case 1: $ratesite_credibility_1_total++;
                                                break;
                                        case 2: $ratesite_credibility_2_total++;
                                                break;
                                        case 3: $ratesite_credibility_3_total++;
                                                break;
                                        case 4: $ratesite_credibility_4_total++;
                                                break;
                                        case 5: $ratesite_credibility_5_total++;
                                                
                                    }
                                    $ratesite_reliability=(int)($f3['ratesite_reliability']);
                                    switch($ratesite_reliability)
                                    {
                                        case 1: $ratesite_reliability_1_total++;
                                                break;
                                        case 2: $ratesite_reliability_2_total++;
                                                break;
                                        case 3: $ratesite_reliability_3_total++;
                                                break;
                                        case 4: $ratesite_reliability_4_total++;
                                                break;
                                        case 5: $ratesite_reliability_5_total++;
                                                
                                    }
                                    $ratesite_intimacy=(int)($f3['ratesite_intimacy']);
                                    switch($ratesite_intimacy)
                                    {
                                        case 1: $ratesite_intimacy_1_total++;
                                                break;
                                        case 2: $ratesite_intimacy_2_total++;
                                                break;
                                        case 3: $ratesite_intimacy_3_total++;
                                                break;
                                        case 4: $ratesite_intimacy_4_total++;
                                                break;
                                        case 5: $ratesite_intimacy_5_total++;
                                                
                                    }
                                    $ratesite_self_orientation=(int)($f3['ratesite_self_orientation']);
                                    switch($ratesite_self_orientation)
                                    {
                                        case 1: $ratesite_self_orientation_1_total++;
                                                break;
                                        case 2: $ratesite_self_orientation_2_total++;
                                                break;
                                        case 3: $ratesite_self_orientation_3_total++;
                                                break;
                                        case 4: $ratesite_self_orientation_4_total++;
                                                break;
                                        case 5: $ratesite_self_orientation_5_total++;
                                                
                                    }
                                  }
                                if(($ratesite_credibility_1_total+$ratesite_credibility_2_total+$ratesite_credibility_3_total+$ratesite_credibility_4_total+$ratesite_credibility_5_total)!=0)    
                                       $ratesite_credibility_score=(1*$ratesite_credibility_1_total+2*$ratesite_credibility_2_total+3*$ratesite_credibility_3_total+4*$ratesite_credibility_4_total+5*$ratesite_credibility_5_total)/($ratesite_credibility_1_total+$ratesite_credibility_2_total+$ratesite_credibility_3_total+$ratesite_credibility_4_total+$ratesite_credibility_5_total);
                                else
                                $ratesite_credibility_score=0;
                                
                                if(($ratesite_reliability_1_total+$ratesite_reliability_2_total+$ratesite_reliability_3_total+$ratesite_reliability_4_total+$ratesite_reliability_5_total)!=0)
                                     $ratesite_reliability_score=(1*$ratesite_reliability_1_total+2*$ratesite_reliability_2_total+3*$ratesite_reliability_3_total+4*$ratesite_reliability_4_total+5*$ratesite_reliability_5_total)/($ratesite_reliability_1_total+$ratesite_reliability_2_total+$ratesite_reliability_3_total+$ratesite_reliability_4_total+$ratesite_reliability_5_total);
                                else 
                                     $ratesite_reliability_score=0;
                                    
                                if(($ratesite_intimacy_1_total+$ratesite_intimacy_2_total+$ratesite_intimacy_3_total+$ratesite_intimacy_4_total+$ratesite_intimacy_5_total)!=0)   
                                      $ratesite_intimacy_score=(1*$ratesite_intimacy_1_total+2*$ratesite_intimacy_2_total+3*$ratesite_intimacy_3_total+4*$ratesite_intimacy_4_total+5*$ratesite_intimacy_5_total)/($ratesite_intimacy_1_total+$ratesite_intimacy_2_total+$ratesite_intimacy_3_total+$ratesite_intimacy_4_total+$ratesite_intimacy_5_total);
                                
                                else 
                                      $ratesite_intimacy_score=0;
                                
                                if(($ratesite_self_orientation_1_total+$ratesite_self_orientation_2_total+$ratesite_self_orientation_3_total+$ratesite_self_orientation_4_total+$ratesite_self_orientation_5_total)!=0)
                                    $ratesite_self_orientation_score=(1*$ratesite_self_orientation_1_total+2*$ratesite_self_orientation_2_total+3*$ratesite_self_orientation_3_total+4*$ratesite_self_orientation_4_total+5*$ratesite_self_orientation_5_total)/($ratesite_self_orientation_1_total+$ratesite_self_orientation_2_total+$ratesite_self_orientation_3_total+$ratesite_self_orientation_4_total+$ratesite_self_orientation_5_total);
                                else
                                    $ratesite_self_orientation_score=0;
                                
                                
                                if($ratesite_self_orientation_score!=0)
                                          $total_rating_score=($ratesite_credibility_score+$ratesite_reliability_score+$ratesite_intimacy_score)/$ratesite_self_orientation_score;   
                                else
                                          $$total_rating_score=0;
                                    
                                    
                                    
                                    ?>

                                    <div class="row  mb-5">
                                        <div class="col-lg-12">
                                            <div class="row"  style="border:1px solid #487380;">
                                                <div class="col-lg-3">
                                                    <p><b>Site Name : <?php echo $ctgy2['eop_site_name'];?></b></p>
                                                </div>
                                                <div class="col-lg-3 border">
                                                    <!--`ratesite_id`, `eop_site_id`, `ratesite_credibility`, `ratesite_reliability`, `ratesite_intimacy`, `ratesite_self_orientation`, `ratesite_review`, `ratesite_date` SELECT * FROM `user_rate_site_master` WHERE 1-->
                                                    
                                                    
                                                    <p><b>Trust Rate Score  : <?php echo number_format($total_rating_score,2);?></b></p>
                                                </div>
                                                <div class="col-lg-6 border">
                                                    <p><b>
                                                        Present Member:
                                                            <?php 
                                                            //`adv_id`, `user_id`, `parent_user_id`, `parents_site_id`, `sponsor_link`, `adv_status`, `submittion_date` SELECT * FROM `user_adv_addlink_master` WHERE 1
                                                            $present_member_sql = "SELECT * FROM user_adv_addlink_master where parents_site_id=$eop_site_id";
                                                            $present_member_result = mysqli_query($conn, $present_member_sql); 
                                                            // Return the number of rows in result set
                                                            $present_member_rowcount = mysqli_num_rows( $present_member_result );
                                                            //	Display result
                                                            printf("%d\n", $present_member_rowcount);
                                                            ?>



                                                        
                                                    &nbsp; &nbsp; &nbsp;  Reviews : <span class="text-danger">connect rate your site</span>  (1000) </b></p>
                                                </div>
                                            </div>
                                            <div class="row"  style="border:1px solid #487380;">
                                                <div class="col-lg-3 border">
                                                    <p class="text-justify"><b>Decription : </b><?php echo $ctgy2['eop_site_description'];?></p>
                                                </div>
                                                <div class="col-lg-3 border">
                                                    <h5 class="pt-2"><b>Rating Details</b></h5>
                                                    <div class="row">
                                                        <!--`ratesite_id`, `eop_site_id`, `ratesite_credibility`, `ratesite_reliability`, `ratesite_intimacy`, `ratesite_self_orientation`, `ratesite_review`, `ratesite_date` SELECT * FROM `user_rate_site_master` WHERE 1-->
                                                        <div class="col-lg-12 pt-3">
                                                            <h6><b>Credibility</b></h6>
                                                        </div>

                                                        <div class="col-lg-12 pl-1  d-flex">
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_credibility_1_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_credibility_2_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_credibility_3_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_credibility_4_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_credibility_5_total;?></div>
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 pt-3">
                                                            <h6><b>Reliability</b></h6>
                                                        </div>
                                                        <div class="col-lg-12 p-1  d-flex">
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_reliability_1_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_reliability_2_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_reliability_3_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_reliability_4_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_reliability_5_total;?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 pt-3">
                                                            <h6><b>Intimacy</b></h6>
                                                        </div>
                                                        <div class="col-lg-12 pl-1  d-flex">
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_intimacy_1_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_intimacy_2_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_intimacy_3_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_intimacy_4_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_intimacy_5_total;?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 pt-3">
                                                            <h6><b>Self Orientation</b></h6>
                                                        </div>
                                                        <div class="col-lg-12 pl-1  d-flex">
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_self_orientation_1_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_self_orientation_2_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_self_orientation_3_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_self_orientation_4_total;?></div>
                                                            </div>&nbsp;&nbsp;
                                                            <div class=" text-center">
                                                                <i class="bi bi-star-fill" style="color:orange;"></i>
                                                                <div><?php echo $ratesite_self_orientation_5_total;?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h5 class="pt-5"><b>Avg.Earning Trend</b></h5>
                                                    <p class="text-danger">Connect to payment proof ammount</p>
                                                    <div class="row">
                                                        <img src="../assets/img/charts_demo.png" alt="">
                                                    </div>
                                                    


                                                        
                                                            

                                                </div>
                                                <div class="col-lg-6 border">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <h6 class="pt-2"><b>Add Panel</b></h6>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <h6 class="pt-2"><b> Timer : 44.55.66</b></h6>
                                                        </div>
                                                    </div>
                                                    <div style="overflow:scroll; height:600px;">
                                                        <table class="table table-striped" >
                                                            
                                                            <tbody>
                                                            
                                                                <tr>
                                                                    <td class="p-0 text-center"><b>User ID</b></td>
                                                                    <td class="p-0 text-center"><b>Sponsor Link</b></td>
                                                                    <td class="p-0 text-center"><b>Country</b></td>  
                                                                </tr>
                                                                
                                                          
                                                                <!--`adv_id`, `user_id`, `parent_user_id`, `parents_site_id`, `sponsor_link`, `adv_status`, `submittion_date` SELECT * FROM `user_adv_addlink_master` WHERE 1-->
                                                                   
                                                                <?php
                                                                //echo $eop_site_id;
                                                                $sql_adv="SELECT * FROM user_adv_addlink_master WHERE adv_status=1 and parents_site_id=$eop_site_id";
                                                                $query_adv=mysqli_query($conn,$sql_adv);
                                                                while($fetch_adv_link=mysqli_fetch_array($query_adv)) 
                                                                {
                                                                    $user_id=$fetch_adv_link['user_id'];
                                                                    //`user_id``membership_id` `country` SELECT * FROM `users` WHERE 1
                                                                    $sql_user="SELECT * FROM users WHERE user_id=$user_id";
                                                                    $query_user=mysqli_query($conn,$sql_user);
                                                                    if($fetch_user_details=mysqli_fetch_array($query_user)){
                                                                        $membership_id=$fetch_user_details['membership_id'];
                                                                        $country=$fetch_user_details['country'];
                                                                    }
                                                                ?>
                                                                    
                                                                    <tr>
                                                                        <td class="text-center" style="padding:5px; font-size:12px;"><b><?php echo $membership_id; ?></b></td>
                                                                        <td class="text-center" style="padding:5px; font-size:12px;"><b><?php echo $fetch_adv_link['sponsor_link'];?></b></td>
                                                                        <td class="text-center" style="padding:5px; font-size:12px;"><b><?php echo $country; ?></b></td>
                                                                    </tr>

                                                                <?php
                                                                }
                                                                ?>
                                                                
                                                                    

                                                            </tbody>
                                                        </table>
                                                    </div>
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
    <script src="../assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
</body>
    <script>
        $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
    </script>

    <script>
	// chart 4
	var options = {
		series: [{
			name: 'Management',
			data: [85]
		}, {
			name: 'Client',
			data: [70]
		}, {
			name: 'Attendance',
			data: [80]
		}],
		chart: {
			foreColor: '#9ba7b2',
			type: 'bar',
			height: 260
		},
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: '55%',
				endingShape: 'rounded'
			},
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			show: true,
			width: 2,
			colors: ['transparent']
		},
		title: {
			
			align: 'left',
			style: {
				fontSize: '14px'
			}
		},
		colors: ["#00a7f3", '#3e954d', '#e95454'],
		xaxis: {
			categories: [' '],
		},
		fill: {
			opacity: 1
		},
		tooltip: {
			y: {
				formatter: function (val) {
					return  val + " %"
				}
			}
		}
	};
	var chart = new ApexCharts(document.querySelector("#chart4"), options);
	chart.render();
    </script>
</html>