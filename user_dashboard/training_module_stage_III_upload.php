<?php
ini_set('upload_max_filesize', '150M');
ini_set('post_max_size', '150M');
include_once("../db/conn.php");
require_once("../db/user_sequre.php");


if(isset($_POST['delete']))	
{
       $adv_id=$_POST['adv_id'];
       
      $qury=mysqli_query($conn,"DELETE FROM training_module_stage_iii WHERE adv_id='$adv_id'");
      header("location:training_module_stage_iii_upload.php?err=Successfully deleted");
        
}

//`vdo_id`, `user_id`, `site_name`, `site_category`, `subject`, video_file, `upload_date`, `status`, `remarks` SELECT * FROM `training_module_stage_iii` WHERE 1
if(isset($_POST['submit']))
{
    $user_id=$_POST['user_id'] ;
    $site_name=$_POST['site_name'];
    $site_category=$_POST['site_category'];
    $subject=$_POST['subject'];
    $upload_date=date('d.m.Y');

    if(isset($_FILES['videoFile'])){
        $errors= array();
        $videoFile=$_FILES['videoFile']['name'];
        $videoFile_temp=$_FILES['videoFile']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($videoFile_temp,"training_module_stage_iii/".$videoFile);
        }
    }
 /*
    if (isset($_FILES["videoFile"]) && $_FILES["videoFile"]["error"] == UPLOAD_ERR_OK) {
        $uploadDir = "uploads/";
        $uploadFile = $uploadDir . basename($_FILES["videoFile"]["name"]);

        // Check if the file already exists
        if (file_exists($uploadFile)) {
            echo "File already exists. Please choose a different file.";
        } else {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["videoFile"]["tmp_name"],"training_module_stage_iii/".$uploadFile)) {
                echo "File successfully uploaded.";
            } else {
                echo "Error uploading file.";
            }
        }
    } else {
        echo "Error: " . $_FILES["videoFile"]["error"];
    }
   */
        $sql="INSERT INTO training_module_stage_iii (user_id, site_name, site_category, subject, video_file, upload_date)
        VALUES ($user_id, '$site_name', '$site_category', '$subject', '$videoFile', '$upload_date')";
        $query=mysqli_query($conn,$sql);
        if($query){
            header("Location:training_module_stage_iii_upload.php?msg=New record submited successfully");
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
    <title>Training Module Upload</title>
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
                   <h5 class="text-uppercase"><b>Training Module Stage III Upload </b></h5>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->










<!--=========== START PAGE CONTENT======================================================================-->



            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Upload Your Video</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
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
                            <div class="ibox-body">

                                    <form action="" method="post" enctype="multipart/form-data"  >    
                                        <!--`vdo_id`, `user_id`, `site_name`, `site_category`, `subject`, `upload_date`, `status`, `remarks` SELECT * FROM `training_module_stage_iii` WHERE 1-->

                                        <input type="hidden" name="user_id" value="<?php echo $session_user_id; ?>">

                                            <div class="row">
                                                <div class="col-sm-3 form-group">
                                                    <label>Site Name</label>
                                                    <select class="form-control" name="site_name" id="site_name"  required>
                                                        <option value="" selected disabled="none"> Choose site</option>
                                                        <?php
                                                        //`adv_id`, `user_id`, `parent_user_id`, `site_name`, `site_category`,
                                                        // `adv_status`, `submittion_date`SELECT * FROM `training_module_stage_iii` WHERE 1

                                                        //`eop_site_id`, `eop_category_id`, `eop_site_name`, `eop_site_description`, `eop_site_status`SELECT * FROM `earning_opportunities_site_description` WHERE 1
                                                        
                                                        $sql_ctgy="SELECT * FROM earning_opportunities_site_description WHERE 1";
                                                        $query_ctgy=mysqli_query($conn,$sql_ctgy);
                                                        while($ctgy=mysqli_fetch_array($query_ctgy)) 
                                                        {?>
                                                            <option value="<?php echo $ctgy['eop_site_name'];?>"><?php echo $ctgy['eop_site_name'];?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Site Category</label>
                                                    <select class="form-control" name="site_category" id="site_category"  required>
                                                        <option value="" selected disabled="none"> Choose category</option>
                                                        <?php
                                                        //`eop_category_id`, `eop_category_name` SELECT * FROM `earning_opportunities_category_master` WHERE 1
                                                        
                                                        $sql_ctgy2="SELECT * FROM earning_opportunities_category_master WHERE 1";
                                                        $query_ctgy2=mysqli_query($conn,$sql_ctgy2);
                                                        while($ctgy2=mysqli_fetch_array($query_ctgy2)) 
                                                        {?>
                                                            <option value="<?php echo $ctgy2['eop_category_name'];?>"><?php echo $ctgy2['eop_category_name'];?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label>Video Title</label>
                                                    <input class="form-control" type="text" name="subject" id="subject" placeholder="Enter title" required>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label>Video File <span class="text-danger">* (Max Size 350MB)</span></label>
                                                    <input class="form-control" type="file" name="videoFile" id="videoFile" accept="video/*">
                                                </div>
                                                <div> 
                                            </div>
                                            
                                            </div>
                                            <div class="form-group">
                                                <?php if(isset($_REQUEST['xedit'])) { ?><button class="btn btn-success" type="submit" name="update" >Update</button><?php } else {?><button class="btn btn-success" type="submit" name="submit" >Submit</button><?php } ?>
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

    <script>

    function validate_site(link){

    var linkName = link.value;
    
    }
    </script>
</body>

</html>