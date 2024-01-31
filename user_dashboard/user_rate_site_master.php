<?php
include_once("../db/conn.php");
require_once("../db/user_sequre.php");


//<!--`ratesite_id`, `eop_site_id`, `ratesite_credibility`, `ratesite_reliability`, `ratesite_intimacy`, 
//`ratesite_self_orientation`, `ratesite_review`, `ratesite_date`SELECT * FROM `user_rate_site_master` WHERE 1-->      



if(isset($_POST['submit_rate']))
{
    $eop_site_id=trim($_POST['eop_site_id']);
    $user_id=trim($_POST['user_id']);
    $ratesite_credibility=trim($_POST['ratesite_credibility']);
    $ratesite_reliability=trim($_POST['ratesite_reliability']);
    $ratesite_intimacy=trim($_POST['ratesite_intimacy']);
    $ratesite_self_orientation=trim($_POST['ratesite_self_orientation']);
    $ratesite_date=date("d-m-Y");

        $sql="INSERT INTO user_rate_site_master (eop_site_id, user_id, ratesite_credibility, ratesite_reliability, ratesite_intimacy, ratesite_self_orientation, ratesite_date)
        VALUES ('$eop_site_id', '$user_id', '$ratesite_credibility', '$ratesite_reliability', '$ratesite_intimacy', '$ratesite_self_orientation', '$ratesite_date')";
        $query=mysqli_query($conn,$sql);
        if($query){
            header("Location:user_rate_site_master.php?msg=New record submited successfully");
        }
        else{
            echo "Failed: " . mysqli_error($conn);
        }
}



if(isset($_POST['submit_review']))
{
    $eop_site_id=trim($_POST['eop_site_id']);
    $user_id=trim($_POST['user_id']);
    $reviewsite_description=trim($_POST['reviewsite_description']);
    $reviewsite_date=date("d-m-Y");
// <!--`reviewsite_id`, user_id ,  `eop_site_id`, `reviewsite_description`  reviewsite_date SELECT * FROM `user_review_site_master` WHERE 1-->
        $sql="INSERT INTO user_review_site_master (user_id , eop_site_id, reviewsite_description,  reviewsite_date)
        VALUES ('$user_id', '$eop_site_id','$reviewsite_description', '$reviewsite_date')";
        $query=mysqli_query($conn,$sql);
        if($query){
            header("Location:user_rate_site_master.php?msg2=New record submited successfully");
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
    <title>ADD LINKS</title>
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
<style>

</style>
    <script>
        function myFunction() {
            if (confirm("Are you sure to delete?") == true) {            
            return true;
            } else {
                return false;
                
            }
        }

    </script>
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
<?php if(isset($_REQUEST['xedit']))
         {
//<!--`ratesite_id`, `eop_site_id`, `ratesite_credibility`, `ratesite_reliability`, `ratesite_intimacy`, `ratesite_self_orientation`, `ratesite_review`, `ratesite_date`SELECT * FROM `user_rate_site_master` WHERE 1 -->
           $ratesite_id=$_REQUEST['ratesite_id'];
		   $qre=mysqli_query($conn,"SELECT * FROM user_adv_addlink_master where ratesite_id=$ratesite_id");
		   if($fetch=mysqli_fetch_array($qre))
			{
			  $ratesite_id=$fetch['ratesite_id'];
			  $parents_site_name=$fetch['parents_site_name'];
              $parents_link=$fetch['parents_link'];
              $adv_link=$fetch['adv_link'];
			}
}
?>
<!-- Nav header side =========================================-->
            <?php include 'dashboard_header.php'; ?>
<!-- Nav header side =========================================-->


<!--=====================================-->
        <div class="content-wrapper">
<!--=====================================-->






<!--=========== Start Indigator Bar===============================-->
            <div class="row pt-2 text-center" style="background-color:#629dad; color:#fff; font-width:700;">
                <div class="col-lg-12">
                   <h5><b>RATE YOUR SITE</b></h5>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->










<!--=========== START PAGE CONTENT======================================================================-->


            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Rating Site</div>
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

                                    <form action="" method="get" enctype="multipart/form-data" >    
                                        <!--`ratesite_id`, `eop_site_id`, `ratesite_credibility`, `ratesite_reliability`, `ratesite_intimacy`, `ratesite_self_orientation`, `ratesite_review`, `ratesite_date`SELECT * FROM `user_rate_site_master` WHERE 1-->
                                        <input class="form-control" type="hidden" name="ratesite_id" id="ratesite_id" value="<?php if(isset($_REQUEST['xedit'])) {echo $ratesite_id;}?>">                         
                                        <input type="hidden" name="user_id" value="<?php echo $session_user_id; ?>">
                                            <div class="row">

                                              
                                                <div class="col-sm-3 form-group">
                                                    <label>Site Name</label>
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
                                                </div>

                                                <div class="col-sm-2 text-center form-group">
                                                    <label>Credibility</label>
                                                    <div class="text-center">
                                                        <div id="full-stars-example-two">
                                                            <div class="rating-group">
                                                                <input disabled checked class="rating__input rating__input--none" name="ratesite_credibility" id="ratesite_credibility-none" value="0" type="radio">

                                                                <label aria-label="1 star" class="rating__label" for="ratesite_credibility-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_credibility" id="ratesite_credibility-1" value="1" type="radio">

                                                                <label aria-label="2 stars" class="rating__label" for="ratesite_credibility-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_credibility" id="ratesite_credibility-2" value="2" type="radio">

                                                                <label aria-label="3 stars" class="rating__label" for="ratesite_credibility-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_credibility" id="ratesite_credibility-3" value="3" type="radio">

                                                                <label aria-label="4 stars" class="rating__label" for="ratesite_credibility-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_credibility" id="ratesite_credibility-4" value="4" type="radio">

                                                                <label aria-label="5 stars" class="rating__label" for="ratesite_credibility-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_credibility" id="ratesite_credibility-5" value="5" type="radio">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-2 text-center form-group">
                                                    <label>Reliability</label>
                                                    <div class="text-center">
                                                        <div id="full-stars-example-two">
                                                            <div class="rating-group">
                                                                <input disabled checked class="rating__input rating__input--none" name="ratesite_reliability" id="ratesite_reliability-none" value="0" type="radio">

                                                                <label aria-label="1 star" class="rating__label" for="ratesite_reliability-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_reliability" id="ratesite_reliability-1" value="1" type="radio">

                                                                <label aria-label="2 stars" class="rating__label" for="ratesite_reliability-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_reliability" id="ratesite_reliability-2" value="2" type="radio">

                                                                <label aria-label="3 stars" class="rating__label" for="ratesite_reliability-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_reliability" id="ratesite_reliability-3" value="3" type="radio">

                                                                <label aria-label="4 stars" class="rating__label" for="ratesite_reliability-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_reliability" id="ratesite_reliability-4" value="4" type="radio">

                                                                <label aria-label="5 stars" class="rating__label" for="ratesite_reliability-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_reliability" id="ratesite_reliability-5" value="5" type="radio">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-sm-2 text-center form-group">
                                                    <label>Intimacy</label>
                                                    <div class="text-center">
                                                        <div id="full-stars-example-two">
                                                            <div class="rating-group">
                                                                <input disabled checked class="rating__input rating__input--none" name="ratesite_intimacy" id="ratesite_intimacy-none" value="0" type="radio">

                                                                <label aria-label="1 star" class="rating__label" for="ratesite_intimacy-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_intimacy" id="ratesite_intimacy-1" value="1" type="radio">

                                                                <label aria-label="2 stars" class="rating__label" for="ratesite_intimacy-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_intimacy" id="ratesite_intimacy-2" value="2" type="radio">

                                                                <label aria-label="3 stars" class="rating__label" for="ratesite_intimacy-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_intimacy" id="ratesite_intimacy-3" value="3" type="radio">

                                                                <label aria-label="4 stars" class="rating__label" for="ratesite_intimacy-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_intimacy" id="ratesite_intimacy-4" value="4" type="radio">

                                                                <label aria-label="5 stars" class="rating__label" for="ratesite_intimacy-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_intimacy" id="ratesite_intimacy-5" value="5" type="radio">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2 text-center form-group">
                                                    <label>Self Orientation</label>
                                                    <div class="text-center">
                                                        <div id="full-stars-example-two">
                                                            <div class="rating-group">
                                                                <input disabled checked class="rating__input rating__input--none" name="ratesite_self_orientation" id="ratesite_self_orientation-none" value="0" type="radio">

                                                                <label aria-label="1 star" class="rating__label" for="ratesite_self_orientation-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_self_orientation" id="ratesite_self_orientation-1" value="1" type="radio">

                                                                <label aria-label="2 stars" class="rating__label" for="ratesite_self_orientation-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_self_orientation" id="ratesite_self_orientation-2" value="2" type="radio">

                                                                <label aria-label="3 stars" class="rating__label" for="ratesite_self_orientation-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_self_orientation" id="ratesite_self_orientation-3" value="3" type="radio">

                                                                <label aria-label="4 stars" class="rating__label" for="ratesite_self_orientation-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_self_orientation" id="ratesite_self_orientation-4" value="4" type="radio">

                                                                <label aria-label="5 stars" class="rating__label" for="ratesite_self_orientation-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="ratesite_self_orientation" id="ratesite_self_orientation-5" value="5" type="radio">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div> 
                                            </div>
                                            
                                            </div>
                                            <div class="form-group">
                                               <button class="btn btn-success" type="submit" name="submit_rate" >Submit</button>
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>











            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Write a Site Review</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                                <?php
                                    if (isset($_GET["msg2"])) {
                                    $msg2 = $_GET["msg2"];
                                    
                                    echo'
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>'. $msg2 . '</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>';
                                    }
                                    ?>
                            <div class="ibox-body">

                                    <form action="" method="post" enctype="multipart/form-data" >    
                                        <!--`reviewsite_id`, `eop_site_id`, `reviewsite_description` SELECT * FROM `user_review_site_master` WHERE 1-->
                                        <input class="form-control" type="hidden" name="reviewsite_id" id="reviewsite_id" value="<?php if(isset($_REQUEST['xedit'])) {echo $reviewsite_id;}?>">                         
                                        <input type="hidden" name="user_id" value="<?php echo $session_user_id; ?>">   
                                        <div class="row">

                                              
                                                <div class="col-sm-3 form-group">
                                                    <label>Site Name</label>
                                                    <select class="form-control" name="eop_site_id" require>
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
                                                </div>



                                                <div class="col-sm-9 form-group">
                                                    <label>Write a Rewiew</label>
                                                    <textarea  class="form-control" name="reviewsite_description" id="" cols="30" rows="1" placeholder="Enter site review...."></textarea>

                                                    
                                                </div>
                                                <div> 
                                            </div>
                                            
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success" type="submit" name="submit_review" >Submit</button>
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

    function crd_btn_function(){

        var crd_btn_1=document.getElementById('crd_btn_1');

        crd_btn_1.style.color = "#000";
    
    }
    </script>
</body>

</html>