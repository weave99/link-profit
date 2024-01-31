<?php
include_once("../db/conn.php");
require_once("../db/user_sequre.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';


if(isset($_POST['account_verify']))
{
    $email= $_POST['email'] ;
    $genarate_otp= random_int(100000, 999999);

    $query=mysqli_query($conn,"UPDATE users set verify_otp='$genarate_otp' where email='$email'");

    if($query){
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'check.formsubmission@gmail.com';
        $mail->Password = 'mehzqzvfwwggxpzo';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom($email,'Earnify Confirmation Code');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = "Earnify Send a confirmation code" ;
        $mail->Body = "<br> Your Confirmation Code is: </b>".$genarate_otp;
        if($mail->send()){
        
            header("Location:account_verify_otp.php?email=".$email);
        }
        else{
        echo "<script>alert('Error please try again')</script>";
        }
    }
    else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
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
                   <h4> DASHBOARD</h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== START PAGE CONTENT======================================================================-->
<?php 
    //`user_id`, `name`, `street`, `city`, `state`, `country`, `zip_code`, `contact_no`, `profile_picture`,
    //`membership_category`, `membership_id`, `ethinity`, `maretial_status`, `family_members_no`, 
    //`monthly_gross_family_income`, `id_proof_documents_name`, `id_proof_documents_image`, `documents_upload_status`, 
    //`membership_status`, `profile_completion`, `email`, `password`, `dob`, `date_of_joining`, `account_status`, `verify_otp`, 
    //`login_time` SELECT * FROM `users` WHERE 1

    $qre=mysqli_query($conn,"SELECT * FROM users where email='$session_user_name'");
    if($fetch=mysqli_fetch_array($qre))
    {
    ?>


            <div class="page-content fade-in-up">
                <div class="row">
                    <!--
                    <div class="col-lg-3 col-md-4">
                        <div class="ibox">
                            <div class="ibox-body text-center">
                                <div class="m-t-20">
                                    <img class="img-circle" src="user_image/testimonial-2.jpg"/>
                                </div>
                                <h5 class="font-strong m-b-10 m-t-10">Jon</h5>
                                <div class="m-b-20 text-muted">Employee</div>
                            </div>
                        </div>
                    </div>
                    -->

                    
                    <div class="col-lg-12 col-md-8">
                        <div class="ibox">
                            <div class="ibox-body">
                            <?php
                                    if (isset($_GET["msg"])) {
                                    $msg = $_GET["msg"];
                                    
                                    echo'
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>'. $msg . '</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>';
                                    }
                                    ?>
                                <ul class="nav nav-tabs tabs-line">
                                    <li class="nav-item">
                                    <h5 class="m-b-20 m-t-10" style="color:#306674;"><i class="fa fa-user"></i> Personal Details</h5>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-1">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row m-b-5">
                                                    <div class="col-lg-2">

                                                        <?php
                                                            $profile_picture=$fetch['profile_picture'];
                                                        if($profile_picture!="")
                                                        {?>
                                                            <img class="rounded-circle" src="users_image/<?php echo $profile_picture; ?>" width="100%" alt="">
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
                                                                if($fetch['membership_status']=="0"){?>
                                                                    <span class="text-warning"> Not Verify (Upload Your Id Proof)</span>
                                                                <?php
                                                                }elseif($fetch['membership_status']==1){?>
                                                                    <span class="text-success">Verified</span>
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
                                                                    <a href="users_id_proof/<?php echo $fetch['id_proof_documents_image'];?>" target="_blank"><img src="users_id_proof/<?php echo $fetch['id_proof_documents_image'];?>" alt=""></a>
                                                                <?php
                                                                }
                                                                ?>
                                                               
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                        <li class="list-group-item"><b>Documents Upload Status :
                                                                <?php 
                                                                if($fetch['documents_upload_status']==""){?>
                                                                    <span class="text-danger">Upload Document</span>
                                                                    
                                                                <?php
                                                                }elseif($fetch['documents_upload_status']=="0"){?> 
                                                                   <span class="text-warning">Verification under process</span>
                                                                <?php
                                                                }elseif($fetch['documents_upload_status']=="1"){?> 
                                                                    <span class="text-success">Verifed</span>
                                                                    <div><span class="text-success"><?php echo $fetch['verify_reason'];?> </span></div>
                                                                <?php
                                                                }else{?> 
                                                                    <span class="text-danger">Rejected</span>
                                                                    <div><span class="text-danger"><?php echo $fetch['verify_reason'];?></span></div>
                                                                <?php
                                                                }
                                                                ?>
                                                                  
                                                                </b>
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
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php 
    }
    ?>





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