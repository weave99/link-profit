<?php
include_once("../db/conn.php");
require_once("../db/admin_sequre.php");
//`eop_site_id`, `eop_category_id`, `eop_site_name`, `eop_site_description`, `eop_site_status` SELECT * FROM `earning_opportunities_site_description` WHERE 1
if(isset($_POST['delete']))	
{
       $eop_site_id=$_POST['eop_site_id'];
       
      $qury=mysqli_query($conn,"DELETE FROM `earning_opportunities_site_description` WHERE eop_site_id='$eop_site_id'");
      header("location:earning_opportunities_site_description.php?msg=Successfully deleted");
        
}


if(isset($_POST['submit']))
{
    $eop_category_id= $_POST['eop_category_id'] ;
    $eop_site_name= $_POST['eop_site_name'] ;
    $eop_site_description= $_POST['eop_site_description'] ;

    $sql="INSERT INTO earning_opportunities_site_description (eop_category_id, eop_site_name, eop_site_description)
    VALUES ('$eop_category_id', '$eop_site_name', '$eop_site_description')";
    $query=mysqli_query($conn,$sql);
    if($query){
    
        header("Location:earning_opportunities_site_description.php?msg=New record submited successfully");
    
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }

}

if(isset($_POST['update']))
{
                                                         
        $eop_site_id=trim($_POST['eop_site_id']);
        $eop_category_id= $_POST['eop_category_id'] ;
        $eop_site_name= $_POST['eop_site_name'] ;
        $eop_site_description= $_POST['eop_site_description'] ;


        $update=mysqli_query($conn,"update  earning_opportunities_site_description  set eop_category_id='$eop_category_id', eop_site_name='$eop_site_name', eop_site_description='$eop_site_description' where eop_site_id='$eop_site_id'");
               
    if($update)
    {
        $msg="Successfully updated";
    }
    else
    {
        $msg=mysql_error();
    }
        header("location:earning_opportunities_site_description.php?msg=".$msg);
}


if(isset($_POST['actived']))
{                                            
        $eop_site_id=trim($_POST['eop_site_id']);

        $update=mysqli_query($conn,"update  earning_opportunities_site_description  set eop_site_status=0 where eop_site_id='$eop_site_id'");
               
    if($update)
    {
        $msg="Successfully updated";
    }
    else
    {
        $msg=mysql_error();
    }
        header("location:earning_opportunities_site_description.php?msg=".$msg);
}


if(isset($_POST['deactived']))
{                                            
        $eop_site_id=trim($_POST['eop_site_id']);

        $update=mysqli_query($conn,"update  earning_opportunities_site_description  set eop_site_status=1 where eop_site_id='$eop_site_id'");
               
    if($update)
    {
        $msg="Successfully updated";
    }
    else
    {
        $msg=mysql_error();
    }
        header("location:earning_opportunities_site_description.php?msg=".$msg);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Link Profit</title>
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <!-- GLOBAL MAINLY STYLES-->
    <link href="dashboard-source/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="dashboard-source/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="dashboard-source/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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

        function myFunction2() {
            if (confirm("Are you sure to changes?") == true) {            
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
            //`eop_site_id`, `eop_category_id`, `eop_site_name`, `eop_site_description`, `eop_site_status` SELECT * FROM `earning_opportunities_site_description` WHERE 1
           $eop_site_id=$_REQUEST['eop_site_id'];
		   $qre=mysqli_query($conn,"SELECT * FROM earning_opportunities_site_description where eop_site_id=$eop_site_id");
		   if($fetch=mysqli_fetch_array($qre))
			{
			  $eop_site_id=$fetch['eop_site_id'];
              $eop_category_id=$fetch['eop_category_id'];
			  $eop_site_name=$fetch['eop_site_name'];
              $eop_site_description=$fetch['eop_site_description'];
              $eop_site_status=$fetch['eop_site_status'];

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
                   <h4 style="text-transform: uppercase;">EARNING OPPORTUNITIES SITE DESCRIPTION</h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== Start Party Details===============================-->





            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Site Description</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                            
                            <?php
                           //`eop_site_id`, `eop_category_id`, `eop_site_name`, `eop_site_description`, `eop_site_status` SELECT * FROM `earning_opportunities_site_description` WHERE 1
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
                                            <input type="hidden" id="eop_site_id" name="eop_site_id"  readonly="readonly" value="<?php if(isset($_REQUEST['xedit'])) {echo $eop_site_id;}?>" />    

                                            <div class="row">
                                                <div class="col-sm-3 form-group">
                                                    <label>Site Category <span class="text-danger">*</span></label>
                                                    <!--`eop_category_id`, `eop_category_name` SELECT * FROM `earning_opportunities_category_master` WHERE 1-->
                                                    <select class="form-control"    name="eop_category_id" id="">
                                                        <option value="" selected disabled="none"> Choose category</option>
                                                        <?php
                                                        $sql_ctgy="SELECT * FROM earning_opportunities_category_master WHERE 1";
                                                        $query_ctgy=mysqli_query($conn,$sql_ctgy);
                                                        while($ctgy=mysqli_fetch_array($query_ctgy)) 
                                                        {?>
                                                            <option value="<?php echo $ctgy['eop_category_id'];?>" <?php if(isset($_REQUEST['xedit'])) if($ctgy['eop_category_id']==$eop_category_id) echo 'selected';?>><?php echo $ctgy['eop_category_name'];?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label>Site Name <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="eop_site_name" value="<?php if(isset($_REQUEST['xedit'])) {echo $eop_site_name;}?>" placeholder="Enter name" required>
                                                </div>  
                                                <div class="col-sm-6 form-group">
                                                    <label>Site Description<span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="eop_site_description" cols="" rows="1"  placeholder="Enter description" required><?php if(isset($_REQUEST['xedit'])) {echo $eop_site_description;}?></textarea>
                                                    
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <div>
                                                        <?php if(isset($_REQUEST['xedit'])) { ?><button class="btn btn-success" type="submit" name="update" >Update</button><?php } else {?><button class="btn btn-success" type="submit" name="submit" >Submit</button><?php } ?>
                                                    </div>
                                                </div>
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
                                <div class="ibox-title">Site Description Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="">Name</th>
                                            <th class="">Description</th>
                                            <th class="">Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    //`eop_site_id`, `eop_category_id`, `eop_site_name`, `eop_site_description`, `eop_site_status` SELECT * FROM `earning_opportunities_site_description` WHERE 1
                                        $sql1="SELECT * FROM earning_opportunities_site_description WHERE 1";
                                        $query1=mysqli_query($conn,$sql1);
                                        while($prd=mysqli_fetch_array($query1)) 
                                        {?>
                                            <tr>
                                                
                                                <td><b><?php echo $prd['eop_site_name'];?></b></td>
                                                <td><b><?php echo $prd['eop_site_description'];?></b></td>
                                                <td><b><?php if($prd['eop_site_status']==0){ echo "Actived";} else { echo "Deactived";}?></b></td>

                                                <!--========= Impotant sweet alert js =================-->

                                                <form action="" method="post"  onsubmit="return myFunction2();">
                                                    <input type="hidden" name="eop_site_id" value="<?php echo $prd['eop_site_id'];?>" />
                                                    <?php
                                                    if($prd['eop_site_status']==0){?>
                                                        <td><button style="border:none;background:transparent;" class="text-danger" type="submit" name="deactived"><i class="fa-solid fa-circle-xmark" style="font-size:25px;"></i></a></button>&nbsp;</td>
                                                    <?php
                                                    }
                                                    else
                                                    {?>
                                                        <td><button style="border:none;background:transparent;" class="text-success" type="submit" name="actived"><i class="fa-solid fa-circle-check" style="font-size:25px;"></i></a></button>&nbsp;</td>
                                                    <?php
                                                    }
                                                    ?>
                                                    
                                                  

                                                </form>
                                                
                                                <form method="post" action="" enctype="multipart/form-data" onsubmit="return myFunction();">          
                                                    <input type="hidden" name="eop_site_id" value="<?php echo $prd['eop_site_id'];?>" />

                                                  
                                                <td class="d-flex">
                                                    <a href="earning_opportunities_site_description.php?xedit=1&eop_site_id=<?php echo $prd['eop_site_id'];?>"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:25px;"></i></a>
                                                    <button  style="border:none; color:#007bff" type="submit" name="delete"><i class="fa fa-trash" aria-hidden="true" style="font-size:25px;"></i></a></button>
                                                </td>
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