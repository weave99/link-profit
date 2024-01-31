<?php
include_once("../db/conn.php");
require_once("../db/admin_sequre.php");

if(isset($_POST['delete']))	
{
       $banner_code_id=$_POST['banner_code_id'];
       
      $qury=mysqli_query($conn,"DELETE FROM banner_code_master WHERE member_category_id='$member_category_id'");
      header("location:banner_code_master.php?msg=Successfully deleted");
        
}
//`banner_code_id`, `banner_code_link`, `banner_code_image` SELECT * FROM `banner_code_master` WHERE 1

if(isset($_POST['submit']))
{


    if(isset($_FILES['banner_code_image'])){
        $errors= array();
        $banner_code_image=$_FILES['banner_code_image']['name'];
        $banner_code_image_temp=$_FILES['banner_code_image']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($banner_code_image_temp,"../assets/img/banner_code_images/".$banner_code_image);
        }
    }
    $banner_code_link=$banner_code_image;

    $sql="INSERT INTO banner_code_master (banner_code_link, banner_code_image)
    VALUES ('$banner_code_link', '$banner_code_image')";
    $query=mysqli_query($conn,$sql);
    if($query){
    
        header("Location:banner_code_master.php?msg=New record submited successfully");
    
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }

}

if(isset($_POST['update']))
{
    //`banner_code_id`, `banner_code_link`, `banner_code_image` SELECT * FROM `banner_code_master` WHERE 1                                            
        $banner_code_id=trim($_POST['banner_code_id']);

        $query_old=mysqli_query($conn,"SELECT * FROM banner_code_master where banner_code_id=$banner_code_id");
        if($fetch_old=mysqli_fetch_array($query_old))
        {
          $banner_code_image_old=$fetch_old['banner_code_image'];
        }

        

        if(!empty($_FILES['banner_code_image']['name'])){
            $errors= array();
            $banner_code_image=$_FILES['banner_code_image']['name'];
            $banner_code_image_temp=$_FILES['banner_code_image']['tmp_name'];
            $banner_code_link=$banner_code_image;   // Collect code link *************
            if(empty($errors)==true){
                unlink("../assets/img/banner_code_images/".$banner_code_image_old);
                move_uploaded_file($banner_code_image_temp,"../assets/img/banner_code_images/".$banner_code_image);
                $update=mysqli_query($conn,"update  banner_code_master  set banner_code_link='$banner_code_link', banner_code_image='$banner_code_image' where banner_code_id='$banner_code_id'");
            }
        }
       

    if($update)
    {
        $err="Successfully updated";
    }
    else
    {
        $err=mysql_error();
    }
        header("location:banner_code_master.php?err=".$err);



}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Product Category</title>
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
    <script language="javascript">

        function myFunction() {
            if (confirm("Are you sure to delete?") == true) {            
            return true;
            } else {
                return false;
                
            }
        }



        function convert_data_to_upper(x)
        {
      
	    x.value=x.value.toUpperCase();
        }
 
 
        function check_numeric(x)
        {
            var str="-0123456789.";
            i=0;
            number_of_decimal_point=0;
            while(i<x.value.length)
                {
                    //alert(x.value);
                    if(str.indexOf(x.value.charAt(i))==-1)
                        {
                        x.value=x.value.substring(0,i);
                        return false;
                        }
                    if(".".indexOf(x.value.charAt(i))!=-1)
                        {
                        number_of_decimal_point++;
                        if(number_of_decimal_point>1)
                            {
                            x.value=x.value.substring(0,i);
                            return false;
                            }
                        }
                    i++;
                }
         }

        function check_decimal(x)
        {
            var str="0123456789.";
            i=0;
            number_of_decimal_point=0;
            while(i<x.value.length)
                {
                    //alert(x.value);
                    if(str.indexOf(x.value.charAt(i))==-1)
                        {
                        x.value=x.value.substring(0,i);
                        return false;
                        }
                    if(".".indexOf(x.value.charAt(i))!=-1)
                        {
                        number_of_decimal_point++;
                        if(number_of_decimal_point>1)
                            {
                            x.value=x.value.substring(0,i);
                            return false;
                            }
                        }
                    i++;
                }
	 
        }
</script>
</head>

<body class="fixed-navbar">

<?php if(isset($_REQUEST['xedit']))
         {
//`banner_code_id`, `banner_code_link`, `banner_code_image` SELECT * FROM `banner_code_master` WHERE 1
           $banner_code_id=$_REQUEST['banner_code_id'];
		   $qre=mysqli_query($conn,"SELECT * FROM banner_code_master where banner_code_id=$banner_code_id");
		   if($fetch=mysqli_fetch_array($qre))
			{
			  $banner_code_id=$fetch['banner_code_id'];
			  $banner_code_image=$fetch['banner_code_image'];

			}
}
?>
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
                   <h4 style="text-transform: uppercase;">Banner Code Master</h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== Start Party Details===============================-->





            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Upload Banner Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                            
                            <?php
                           //`banner_code_id`, `banner_code_link`, `banner_code_image` SELECT * FROM `banner_code_master` WHERE 1
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
                                        <form action="" method="POST" enctype="multipart/form-data" >
                                            <input type="hidden" id="banner_code_id" name="banner_code_id"  readonly="readonly" value="<?php if(isset($_REQUEST['xedit'])) {echo $banner_code_id;}?>" />    

                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label>Upload Banner Image <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="banner_code_image" value="<?php if(isset($_REQUEST['xedit'])) {echo $banner_code_image;}?>" placeholder="">
                                                </div>  
                                                <img src="../assets/img/banner_code_images/<?php if(isset($_REQUEST['xedit'])) {echo $fetch['banner_code_image'];}?>" width="100px;"/>
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



            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Banner Code Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="">SL</th>
                                            <th class="">Banner Image Link</th>
                                            <th width="200px">Banner Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                   //`banner_code_id`, `banner_code_link`, `banner_code_image` SELECT * FROM `banner_code_master` WHERE 1
                                        $sql1="SELECT * FROM banner_code_master WHERE 1";
                                        $query1=mysqli_query($conn,$sql1);
                                        while($prd=mysqli_fetch_array($query1)) 
                                        {?>
                                            <tr>
                                                <td><b><?php echo $prd['banner_code_id'];?></b></td>
                                                <td><b>http://localhost/skc@soumo/software&websites/Link%20Profit/Link%20Profit%20Portal/assets/img/banner_code_images/<?php echo $prd['banner_code_link'];?></b></td>
                                                <td><img src="../assets/img/banner_code_images/<?php echo $prd['banner_code_image'];?>" alt=""></td>

                                                <!--========= Impotant sweet alert js =================-->
                                                
                                                <form method="post" action="" enctype="multipart/form-data" onsubmit="return myFunction();">          
                                                    <input type="hidden" name="banner_code_id" value="<?php echo $prd['banner_code_id'];?>" />

                                                <td class="d-flex"><a href="banner_code_master.php?xedit=1&banner_code_id=<?php echo $prd['banner_code_id'];?>"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:25px;"></i></a><button  style="border:none; color:#007bff" type="submit" name="delete"><i class="fa fa-trash" aria-hidden="true" style="font-size:25px;"></i></a></button></td>
                                              </form>

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
<!--=========== End Party Details===============================-->








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