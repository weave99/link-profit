<?php
include_once("../db/conn.php");
require_once("../db/admin_sequre.php");


if(isset($_POST['request_accepted']))	
{
       $user_id=$_POST['user_id'];

       $query_old=mysqli_query($conn,"SELECT * FROM users where user_id=$user_id");
       if($fetch_old=mysqli_fetch_array($query_old))
       {
           $profile_completion_old=$fetch_old['profile_completion'];
       }
       $membership_status="1";
       $documents_upload_status="1";
       $profile_completion=$profile_completion_old + 10 ; //Update old + 10%
       $under_review="1";
       $approved="1";
       $rejected="0";
       $verify_reason=$_POST['verify_reason'];
        /*
    //`user_id`, `membership_status`, `membership_category`, `membership_id`, `user_track_url`, `name`, `age`, `contact_no`, 
    //`profile_picture`, `city`, `state`, `country`, `zip_code`, `address`, `qualification`, `have_skill_in`, `expert_in_skill`, 
    //`mother_language`, `fluent_language`, `ethinity`, `gender`, `maretial_status`, `family_members_no`, 
    //`monthly_gross_family_income`, `occupation`, `id_proof_documents_name`, `id_proof_documents_image`, 
    //`documents_upload_status`, `profile_completion`, `email`, `password`, `dob`, `date_of_joining`, `account_status`, 
    //`verify_otp`, `login_date`, `login_time`, `logout_time` SELECT * FROM `users` WHERE 1
        */
        $update ="UPDATE users SET under_review='$under_review',  membership_status='$membership_status' where user_id='$user_id'";
        if ($conn->query($update) === TRUE) {

            $accepted ="UPDATE users SET documents_upload_status='$documents_upload_status', approved='$approved', verify_reason='$verify_reason', profile_completion='$profile_completion',  rejected='$rejected' where user_id='$user_id'";
            if ($conn->query($accepted) === TRUE) {
                $err="Successfully Approved";
                header("location:dashboard.php?msg=".$err);
            }
      }
      else
      {
          $err=mysql_error();
      }
}


if(isset($_POST['request_reject']))	
{
    $user_id=$_POST['user_id'];
    $query_old=mysqli_query($conn,"SELECT * FROM users where user_id=$user_id");
    if($fetch_old=mysqli_fetch_array($query_old))
    {
        $id_proof_documents_image_old=$fetch_old['id_proof_documents_image'];
    }

    $under_review="0";
    $approved="0";
    $rejected="1";
    $documents_upload_status="2"; // It is mandatory connect to profile 
    $verify_reason=$_POST['verify_reason'];


      $update ="UPDATE users SET under_review='$under_review' where user_id='$user_id'";
      if ($conn->query($update) === TRUE) {

            $reject ="UPDATE users SET rejected='$rejected', verify_reason='$verify_reason', approved='$approved', id_proof_documents_name='". NULL ."', id_proof_documents_image='". NULL ."', documents_upload_status='$documents_upload_status'  where user_id='$user_id'";
            unlink("../user_dashboard/users_id_proof/".$id_proof_documents_image_old);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
                   <h4>User Details</h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->










<!--=========== START PAGE CONTENT======================================================================-->

            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">About user </div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">

                           

                            <?php 
                            /*
                        //`user_id`, `membership_status`, `membership_category`, `membership_id`, `user_track_url`, `name`, `age`, `contact_no`, 
                        //`profile_picture`, `city`, `state`, `country`, `zip_code`, `address`, `qualification`, `have_skill_in`, `expert_in_skill`, 
                        //`mother_language`, `fluent_language`, `ethinity`, `gender`, `maretial_status`, `family_members_no`, 
                        //`monthly_gross_family_income`, `occupation`, `id_proof_documents_name`, `id_proof_documents_image`, 
                        //`documents_upload_status`, `profile_completion`, `email`, `password`, `dob`, `date_of_joining`, `account_status`, 
                        //`verify_otp`, `login_date`, `login_time`, `logout_time` SELECT * FROM `users` WHERE 1
                            */
                            $user_id=$_REQUEST['user_id'];
                            $sql="SELECT * FROM users WHERE user_id=$user_id";
                            $query=mysqli_query($conn,$sql);
                            if($fetch=mysqli_fetch_array($query)) 
                            {
                            ?>
                            
                            <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row m-b-5">
                                                    <div class="col-lg-2">
                                                        <?php
                                                        $profile_picture=$fetch['profile_picture'];
                                                        if($profile_picture!="")
                                                        {?>
                                                            <img class="rounded-circle" src="../user_dashboard/users_image/<?php echo $profile_picture; ?>" width="100%" alt="">
                                                            <?php 
                                                        }
                                                        else { ?>
                                                            <img src="../admin/dashboard-source/assets/img/admin-avatar.png" width="100%" alt="">
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-lg-8">
                                                       
                                                            <div class="h4 mt-4"><b> Name : <?php echo $fetch['name']; ?></b></div>
                                                            <div class="h5">Member ID : <?php echo $fetch['membership_id']; ?></div>
                                                            <div class="h5">Your Membership : <?php echo $fetch['membership_category']; ?></div>                                                            
                                                            <div class="h5">Email ID: <?php echo $fetch['email']; ?></div>

                                                            <div class="h5">Date of Birth : <?php echo $fetch['dob']; ?></div>


                                                            <div class="h5">Your are since : <?php echo $fetch['date_of_joining']; ?></div>
                                                            <div class="h5">Membership Status :
                                                                <b>
                                                                <?php 
                                                                if($fetch['membership_status']==1){?>
                                                                    <span class="text-success">Verified</span>
                                                                <?php
                                                                }else{?> 
                                                                    <span class="text-warning">Not Verified</span>
                                                                <?php
                                                                }
                                                                ?>  
                                                                </b>
                                                                

                                                            </div>
                                                            <div class="h5">Profile Completion : <?php echo $fetch['profile_completion']; ?>%</div>                                                        
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mt-4">
                                                <h4>Others Information</h4>
                                                    <!--
                                                            
                                                //`user_id`, `membership_status`, `membership_category`, `membership_id`, `user_track_url`, `name`, `age`, `contact_no`, 
                                                `//profile_picture`, `city`, `state`, `country`, `zip_code`, `address`, `qualification`, `have_skill_in`, `expert_in_skill`, 
                                                //`mother_language`, `fluent_language`, `ethinity`, `gender`, `maretial_status`, `family_members_no`, `monthly_gross_family_income`, 
                                                //`occupation`, `id_proof_documents_name`, `id_proof_documents_image`, `documents_upload_status`, `profile_completion`, `email`, 
                                                //`password`, `dob`, `date_of_joining`, `account_status`, `verify_otp`, `login_date`, `login_time`, `logout_time` 
                                                //SELECT * FROM `users` WHERE 1

                                                    -->
                                                    <ul class="list-group list-group-full list-group-divider">
                                                    <li class="list-group-item"><b>Mobile No. :</b> <?php echo $fetch['contact_no']; ?></li>
                                                    <li class="list-group-item"><b>Age :</b> <?php echo $fetch['dob']; ?></li>
                                                    <li class="list-group-item"><b>Educational Qualification :</b> <?php echo $fetch['qualification']; ?></li>
                                                    <li class="list-group-item"><b>Have Skills IN :</b> <?php echo $fetch['have_skill_in']; ?></li>
                                                    <li class="list-group-item"><b>Expert In Skills :</b> <?php echo $fetch['expert_in_skill']; ?></li>
                                                    <li class="list-group-item"><b>Mother Language :</b> <?php echo $fetch['mother_language']; ?></li>

                                                    <li class="list-group-item"><b>Fluent In Language :</b> <?php echo $fetch['fluent_language']; ?></li>
                                                    <li class="list-group-item"><b>Ethinity :</b> <?php echo $fetch['ethinity']; ?></li>
                                                    <li class="list-group-item"><b>Gender :</b> <?php echo $fetch['gender']; ?></li>
                                                    <li class="list-group-item"><b>Maretial Status :</b> <?php echo $fetch['maretial_status']; ?></li>
                                                    <li class="list-group-item"><b>Family Members No. :</b> <?php echo $fetch['family_members_no']; ?></li>
                                                    <li class="list-group-item"><b>Monthly Gross Family Income :</b> <?php echo $fetch['monthly_gross_family_income']; ?></li>
                                                    <li class="list-group-item"><b>Occupation :</b> <?php echo $fetch['occupation']; ?></li>
                                                    <li class="list-group-item"><b>Id Proof Documents Name :</b> <?php echo $fetch['id_proof_documents_name']; ?></li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <div>
                                                                <b>Id Proof Documents Image :</b> 

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="text-center" style="width:100%; height:200px; overflow:hidden; border:1px solid black;">
                                                                <?php 
                                                                if($fetch['id_proof_documents_image']==""){?>
                                                                    <b style="p-4">Document<br> Please Upload</b> 
                                                                <?php
                                                                }else{?> 
                                                                    <a href="../user_dashboard/users_id_proof/<?php echo $fetch['id_proof_documents_image'];?>" target="_blank"><img src="../user_dashboard/users_id_proof/<?php echo $fetch['id_proof_documents_image'];?>" alt=""></a>
                                                                <?php
                                                                }
                                                                ?>
                                                               
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mt-4">
                                                    <h4>Address</h4>
                                                    <ul class="list-group list-group-full list-group-divider">


                                                        <li class="list-group-item"><b>Country :</b> <?php echo $fetch['country']; ?></li>   
                                                        <li class="list-group-item"><b>State :</b> <?php echo $fetch['state']; ?></li>                                                                                                             
                                                        <li class="list-group-item"><b>City :</b> <?php echo $fetch['city']; ?></li>
                                                        <li class="list-group-item"><b>Zip Code :</b> <?php echo $fetch['zip_code']; ?> </li>
                                                        <li class="list-group-item"><b>Address :</b> <?php echo $fetch['address']; ?> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row p-5">
                                            <div class="col-lg-12">
                                                <form action="" method="post">
                                                    <div class="col-lg-6 form-group">
                                                        <textarea class="form-control mb-3" name="verify_reason" cols="10" rows="5" placeholder="Type Reason" ></textarea>

                                                        <input type="hidden" name="user_id" value="<?php echo $fetch['user_id'];?>">
                                                        <?php 
                                                        $under_review=$fetch['under_review'];
                                                        $approved=$fetch['approved'];
                                                        $rejected=$fetch['rejected'];
                                                        ?>
                                                            <button class="btn btn-danger" name="request_reject">Rejected Documents</button>
                                                            <button class="btn btn-success" name="request_accepted">Approved Documents</button>
                                                 
                                                        
                                                        
                                                    </div>
                                                    
        

                                                   
                                                </form>
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
    <!-- Custom JS Script -->
    <script src="dashboard-source/assets/js/app.js"></script>
    <script>
            //  Geo Location Btn fetch
    function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }}
    function showPosition(position) {
        document.getElementById("current_location").value="https://www.google.com/maps?q=" + position.coords.latitude + "," + position.coords.longitude;
    }

    </script>
</body>

</html>