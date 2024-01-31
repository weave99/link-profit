<?php
include_once("../db/conn.php");
require_once("../db/user_sequre.php");



    //`user_id`, `membership_status`, `membership_category`, `membership_id`, `user_track_url`, `name`, `age`, `contact_no`, `profile_picture`, 
    //`city`, `state`, `country`, `zip_code`, `address`, `qualification`, `have_skill_in`, `expert_in_skill`, `mother_language`, `fluent_language`, 
    //`ethinity`, `gender`, `maretial_status`, `family_members_no`, `monthly_gross_family_income`, `occupation`, `id_proof_documents_name`,
    //`id_proof_documents_image`, `documents_upload_status`, `profile_completion`, `email`, `password`, `dob`, `date_of_joining`, `account_status`, 
    //`verify_otp`, `login_date`, `login_time`, `logout_time` SELECT * FROM `users` WHERE 1
    

if(isset($_POST['update']))
{
                                                         
        $user_id=trim($_POST['user_id']);

        $query_old=mysqli_query($conn,"SELECT * FROM users where user_id=$user_id");
        if($fetch_old=mysqli_fetch_array($query_old))
        {
          $profile_picture_old=$fetch_old['profile_picture'];
          $profile_completion_old=$fetch_old['profile_completion'];
        }
        $name= $_POST['name'] ;
        $contact_no= $_POST['contact_no'] ;
        $city= $_POST['city'] ;
        $state= $_POST['state'] ;
        $country= $_POST['country'] ;
        $zip_code= $_POST['zip_code'] ;
        $address= $_POST['address'] ;
        $qualification= $_POST['qualification'] ;
        $have_skill_in= $_POST['have_skill_in'] ;
        $expert_in_skill= $_POST['expert_in_skill'] ;
        $mother_language= $_POST['mother_language'] ;
        $fluent_language= $_POST['fluent_language'] ;
        $ethinity= $_POST['ethinity'] ;
        $gender= $_POST['gender'] ;
        $maretial_status= $_POST['maretial_status'] ;
        $family_members_no= $_POST['family_members_no'] ;
        $monthly_gross_family_income= $_POST['monthly_gross_family_income'] ;        
        $occupation= $_POST['occupation'] ;
        $profile_completion=$profile_completion_old + 30 ; //Update old + 30%


        if(!empty($_FILES['profile_picture']['name'])){
            $errors= array();
            $profile_picture=$_FILES['profile_picture']['name'];
            $profile_picture_temp=$_FILES['profile_picture']['tmp_name'];
            if(empty($errors)==true){
                unlink("users_image/".$profile_picture_old);
                move_uploaded_file($profile_picture_temp,"users_image/".$profile_picture);
                $update1=mysqli_query($conn,"update  users  set profile_picture='$profile_picture' where user_id='$user_id'");
            }
        }
        
        //`user_id`, `membership_status`, `membership_category`, `membership_id`, `user_track_url`, `name`, `age`, `contact_no`, `profile_picture`, 
        //`city`, `state`, `country`, `zip_code`, `address`, `qualification`, `have_skill_in`, `expert_in_skill`, `mother_language`, `fluent_language`, 
        //`ethinity`, `gender`, `maretial_status`, `family_members_no`, `monthly_gross_family_income`, `occupation`, `id_proof_documents_name`,
        //`id_proof_documents_image`, `documents_upload_status`, `profile_completion`, `email`, `password`, `dob`, `date_of_joining`, `account_status`, 
        //`verify_otp`, `login_date`, `login_time`, `logout_time` SELECT * FROM `users` WHERE 1
        
        $update=mysqli_query($conn,"update  users  set name='$name', contact_no='$contact_no', profile_picture='$profile_picture', city='$city', state='state', country='$country', zip_code='$zip_code', address='$address', qualification='$qualification', have_skill_in='$have_skill_in', expert_in_skill='$expert_in_skill', mother_language='$mother_language', fluent_language='$fluent_language', ethinity='$ethinity', gender='$gender', maretial_status='$maretial_status', family_members_no='$family_members_no', monthly_gross_family_income='$monthly_gross_family_income', occupation='$occupation', profile_completion='$profile_completion' where user_id='$user_id'");
               

    if($update)
    {
        
        header("location:dashboard.php?msg=Updated Successfully");
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
                   <h5><b>UPDATE PROFILE</b></h5>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->










<!--=========== START PAGE CONTENT======================================================================-->
<?php 
                        //`user_id`=, `name`, `street`, `city`, `state`, `country`, `zip_code`, `contact_no`, `profile_picture`,
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
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Upload Your Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">

                                        <form action="" method="post" enctype="multipart/form-data" >    
                                                   
                                        <input class="form-control" type="hidden" name="user_id" id="user_id" value="<?php echo $fetch['user_id']; ?>" required>                         
                                            <div class="row">
                                                <!--==========Not Update========================-->
                                                <div class="col-sm-4 form-group">
                                                    <label>Membership</label>
                                                    <input class="form-control" type="text" name="" id=""   placeholder="" value="<?php echo $fetch['membership_category'];?>" readonly>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label>Email Id</label>
                                                    <input class="form-control" type="email" name="" id=""   placeholder="" readonly value="<?php echo $fetch['email']; ?>">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label>Date Of Birth</label>
                                                    <input class="form-control" type="text" name="dob" id="dob" value="<?php echo $fetch['dob']; ?>" readonly placeholder=""> 
                                                </div>
                                                <!--==========Not Update========================-->
                                            </div>
                                            <div class="row">

                                              
                                                <div class="col-sm-4 form-group">
                                                    <label>Name</label>
                                                    <input class="form-control" type="text" name="name" id="name" placeholder="Enter name" onKeyUp="convert_data_to_upper(this);" value="<?php echo $fetch['name']; ?>" required>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label>Mobile No.</label>
                                                    <input class="form-control" type="number" name="contact_no" id="contact_no"   placeholder="Enter Mobile No." value="<?php echo $fetch['contact_no']; ?>">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label>Change profile picture</label>
                                                    <img src="users_image/<?php echo $fetch['profile_picture'];?>" width="100px;"/>
                                                    <input class="form-control" type="file" name="profile_picture" id="profile_picture"   placeholder=""  >
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>City</label>
                                                    <input class="form-control" type="text" name="city" id="city"   placeholder="" value="<?php echo $fetch['city']; ?>" require>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>State</label>
                                                    <input class="form-control" type="text" name="state" id="state"   placeholder="" value="<?php echo $fetch['state']; ?>" require>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Country</label>
                                                    <input class="form-control" type="text" name="country" id="country"   placeholder="" value="<?php echo $fetch['country']; ?>" require>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Zip Code</label>
                                                    <input class="form-control" type="text" name="zip_code" id="zip_code"   placeholder="" value="<?php echo $fetch['zip_code']; ?>" require>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Address</label>
                                                    <input class="form-control" type="text" name="address" id="address"   placeholder="Enter Address" value="<?php echo $fetch['address']; ?>" require>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Educational Qualification</label>
                                                    <input class="form-control" type="text" name="qualification" id="qualification"   placeholder="Enter Qualification" value="<?php echo $fetch['qualification']; ?>" require>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Have  Skills IN</label>
                                                    <input class="form-control" type="text" name="have_skill_in" id="have_skill_in"   placeholder="Enter Have Skill In" value="<?php echo $fetch['have_skill_in']; ?>" require>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Expert In Skills</label>
                                                    <input class="form-control" type="text" name="expert_in_skill" id="expert_in_skill"   placeholder="Enter Expert In Skills" value="<?php echo $fetch['expert_in_skill']; ?>" require>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Mother Language</label>
                                                    <input class="form-control" type="text" name="mother_language" id="mother_language" value="<?php echo $fetch['mother_language']; ?>" placeholder=""> 
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Fluent In Language</label>
                                                    <select class="form-control" name="fluent_language" id="fluent_language">
                                                        <option value="" selected>Choose</option>
                                                        <option value="English" <?php if(($fetch['fluent_language']) == 'English') echo 'selected';?> >English</option>
                                                        <!--Add others -->
                                                    </select>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Ethinity</label>
                                                    <input class="form-control" type="text" name="ethinity" id="ethinity"value="<?php echo $fetch['ethinity']; ?>" placeholder=""> 
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control" name="gender" id="gender">
                                                        <option value="" selected>Choose</option>
                                                        <option value="Male" <?php if(($fetch['gender']) == 'Male') echo 'selected';?> >Male</option>
                                                        <option value="Female" <?php if(($fetch['gender']) == 'Female') echo 'selected';?> >Female</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Maretial Status</label>
                                                    <select class="form-control" name="maretial_status" id="maretial_status">
                                                        <option value="" selected>Choose Status</option>
                                                        <option value="Married" <?php if(($fetch['maretial_status']) == 'Married') echo 'selected';?> >Married</option>
                                                        <option value="Unmarried" <?php if(($fetch['maretial_status']) == 'Unmarried') echo 'selected';?> >Unmarried</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Family Members No.</label>
                                                    <input class="form-control" type="text" name="family_members_no" id="family_members_no" value="<?php echo $fetch['family_members_no']; ?>" placeholder=""> 
                                                </div>

                                                <div class="col-sm-3 form-group">
                                                    <label>Monthly Gross Family Income</label>
                                                    <input class="form-control" type="text" name="monthly_gross_family_income" id="monthly_gross_family_income" value="<?php echo $fetch['monthly_gross_family_income']; ?>" placeholder=""> 
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Occupation</label>
                                                    <input class="form-control" type="text" name="occupation" id="occupation" value="<?php echo $fetch['occupation']; ?>" placeholder="Enter Occupation"> 
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
                                                <button class="btn btn-success" type="submit" name="update">Update</button>
                                            </div>
                                        </form>
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