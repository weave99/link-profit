<?php
include_once("../db/conn.php");
require_once("../db/user_sequre.php");


if(isset($_POST['delete']))	
{
       $adv_id=$_POST['adv_id'];
       
      $qury=mysqli_query($conn,"DELETE FROM user_adv_addlink_master WHERE adv_id='$adv_id'");
      header("location:user_adv_addlink_master.php?err=Successfully deleted");
        
}

//`vdo_id`, `user_id`, `site_name`, `site_category`, `subject`, `upload_date`, `status`, `remarks` SELECT * FROM `training_module_stage_iii` WHERE 1
if(isset($_POST['submit']))
{
    $user_id=$_POST['user_id'] ;
    $parents_site_id= $_POST['parents_site_id'] ;
    $sponsor_link=trim($_POST['sponsor_link']);
    $adv_link=trim($_POST['adv_link']);
    $submittion_date=date('d.m.Y');


    $Verifysponsor_link="SELECT * FROM user_adv_addlink_master WHERE sponsor_link='$sponsor_link'";
    $result = $conn->query($Verifysponsor_link);

    if ($result->num_rows > 0) {
        
        if($f=mysqli_fetch_array($result)){
            $parent_user_id=$f['user_id'];
        }

        $sql="INSERT INTO user_adv_addlink_master (user_id,parent_user_id, parents_site_id, sponsor_link, submittion_date)
        VALUES ($user_id,$parent_user_id, $parents_site_id, '$adv_link', '$submittion_date')";
        $query=mysqli_query($conn,$sql);
        if($query){
            header("Location:user_adv_addlink_master.php?msg=New record submited successfully");
        }
        else{
            echo "Failed: " . mysqli_error($conn);
        }

    } 
    else {
        echo '<script>alert("Sponsor Link Did not match ! Please check the Link.")</script>';
    }


}




if(isset($_POST['update']))
{
        //<!--`adv_id`, `user_id`, `parent_user_id`, `parents_site_id`, `sponsor_link`, `adv_status`, `submittion_date` 
        //SELECT * FROM `user_adv_addlink_master` WHERE 1 -->                                             
        $adv_id=trim($_POST['adv_id']);
        $sponsor_link=trim($_POST['sponsor_link']);
        $adv_link=trim($_POST['adv_link']);


        $Verifysponsor_link="SELECT * FROM user_adv_addlink_master WHERE sponsor_link='$sponsor_link'";
        $result = $conn->query($Verifysponsor_link);
    
        if ($result->num_rows > 0) {
            
            if($f=mysqli_fetch_array($result)){
                $parent_user_id=$f['user_id'];
            }

            $update=mysqli_query($conn,"update  user_adv_addlink_master  set parent_user_id='$parent_user_id',sponsor_link='$adv_link'  where adv_id='$adv_id'");

            if($update)
            {
                header("Location:user_adv_addlink_master.php?msg=Updated successfully");
            }
            else
            {
                $msg=mysql_error();
                header("location:user_adv_addlink_master.php?msg=".$msg);
            }
    
        } 
        else {
            echo '<script>alert("Sponsor Link Did not match ! Please check the Link.")</script>';
        }
    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Training Module Stage III</title>
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

    <script>
        function myFunction() {
            if (confirm("Are you sure to delete?") == true) {            
            return true;
            } else {
                return false;
                
            }
        }


    function validate()
    {
        
        var parents_site_id=document.getElementById("parents_site_id").value;
        var sponsor_link=document.getElementById("sponsor_link").value;
        var adv_link=document.getElementById("adv_link").value;

        var cnt=document.getElementById("cnt").value;
        var i=0;

     if(sponsor_link==adv_link)
     {
        alert("Sponsor Link & Adv Link cannot be same");
        return false;
     }


        while(i*1<cnt*1)
           {
            
            i++;
            eop_site_id=document.getElementById("eop_site_id"+i).value;
            eop_site_name=document.getElementById("eop_site_name"+i).value;
            //alert(parents_site_id+"***"+eop_site_id+"***"+eop_site_name+" P Link:"+sponsor_link+"Adv Link:"+adv_link);
            
              if(parents_site_id==eop_site_id)
                 {
                    
                    
                    if(sponsor_link.indexOf(eop_site_name)!=-1 && adv_link.indexOf(eop_site_name)!=-1)
                      {
                        //alert("PPP");
                        return true;
                      }
                        
                 }
           }
        alert("Invalid Sponsor Link / Adv Link");
        return false;
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
                   <h5><b>Training Module Stage III</b></h5>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->










<!--=========== START PAGE CONTENT======================================================================-->


            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Search Here</div>
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

                                    <form action="" method="post" enctype="multipart/form-data" onSubmit="return validate();" >    

                                            <div class="row">

                                                <div class="col-sm-5 form-group">
                                                    <input class="form-control" type="text" name="search_data" id="search_data"   placeholder="Search by catagory / site name / subject "  require >
                                                </div>
                                                <div class="col-sm-5 form-group">
                                                   <button class="btn btn-success" type="submit" name="search" >Search</button>
                                                <div> 
                                            </div>
                                            
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--//`vdo_id`, `user_id`, `site_name`, `site_category`, `subject`, `upload_date`, `status`, `remarks` SELECT * FROM `training_module_stage_iii` WHERE 1-->




            

















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