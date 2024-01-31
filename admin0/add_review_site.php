<?php
include_once("../db/conn.php");
require_once("../db/admin_sequre.php");
//`eop_category_id`, `eop_category_name` SELECT * FROM `earning_opportunities_category_master` WHERE 1
if(isset($_POST['delete']))	
{
       $eop_category_id=$_POST['eop_category_id'];
       
      $qury=mysqli_query($conn,"DELETE FROM `earning_opportunities_category_master` WHERE eop_category_id='$eop_category_id'");
      header("location:earning_opportunities_category_master.php?err=Successfully deleted");
        
}


if(isset($_POST['submit']))
{
    // <!--`review_period_id`, `review_form`, `review_end`, `review_archive_date`, `review_site_status` SELECT * FROM `under_review_period` WHERE 1-->
    //<!--`period_details_id`, `review_period_id`, `review_site_name`, `review_site_category`, `review_site_owner`, `review_site_online` SELECT * FROM `under_review_period_details` WHERE 1-->
    $review_form_date= $_POST['review_form'] ;
    $review_form = date("d-m-Y", strtotime($review_form_date));

    $review_end= $_POST['review_end'] ;
    $review_end = date("d-m-Y", strtotime($review_end));

    $review_archive_date= $_POST['review_archive_date'] ;
    $review_archive = date("d-m-Y", strtotime($review_archive_date));



    $review_site_status="0" ;

    $sql="INSERT INTO under_review_period (review_form, review_end, review_archive, review_site_status)
    VALUES ('$review_form','$review_end','$review_archive','$review_site_status')";
    $query=mysqli_query($conn,$sql);

    $max_review_period_id=mysqli_insert_id($conn);

    if($query)
    {

        // Begin For Facing road
        $i=0;
        while(isset($_POST['review_site_name'][$i]))
                 {
                if(trim($_POST['review_site_name'][$i])!="")
                {
                    $review_site_name=trim($_POST['review_site_name'][$i]);
                    $review_site_category=trim($_POST['review_site_category'][$i]);
                    $review_site_owner=trim($_POST['review_site_owner'][$i]);
                    $review_site_online = date("d-m-Y", strtotime(trim($_POST['review_site_online'][$i])));

                        $sql1="INSERT INTO under_review_period_details (review_period_id, review_site_name, review_site_category, review_site_owner, review_site_online)
                        VALUES ($max_review_period_id, '$review_site_name','$review_site_category','$review_site_owner', '$review_site_online')";
                        $insert2=mysqli_query($conn,$sql1);
                      }
                   $i++;
                }
        //end of Facing Road


        header("Location:add_review_site.php?msg=Successfully Updated");
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
    <title>Link Profit</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
            //`eop_category_id`, `eop_category_name` SELECT * FROM `earning_opportunities_category_master` WHERE 1
           $eop_category_id=$_REQUEST['eop_category_id'];
		   $qre=mysqli_query($conn,"SELECT * FROM earning_opportunities_category_master where eop_category_id=$eop_category_id");
		   if($fetch=mysqli_fetch_array($qre))
			{
			  $eop_category_id=$fetch['eop_category_id'];
			  $eop_category_name=$fetch['eop_category_name'];
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
                   <h4 style="text-transform: uppercase;">Review Sites</h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== Start Party Details===============================-->





            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Add Sites</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                            
                            <?php
                           //`eop_category_id`, `eop_category_name` SELECT * FROM `earning_opportunities_category_master` WHERE 1
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
                                            <!--`review_period_id`, `review_form`, `review_end`, `review_archive_date`, `review_site_status` SELECT * FROM `under_review_period` WHERE 1-->
                                            <!--`period_details_id`, `review_period_id`, `review_site_name`, `review_site_category`, `review_site_owner`, `review_site_online` SELECT * FROM `under_review_period_details` WHERE 1-->
                                            
                                            <input type="hidden" id="review_period_id" name="review_period_id"  readonly="readonly" value="<?php if(isset($_REQUEST['xedit'])) {echo $review_period_id;}?>" />    

                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label>Review Form<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="date" name="review_form" value="<?php if(isset($_REQUEST['xedit'])) {echo $review_form;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Review End<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="date" name="review_end" value="<?php if(isset($_REQUEST['xedit'])) {echo $review_end;}?>" placeholder="" required>
                                                </div>  
                                                
                                                <div class="col-sm-4 form-group">
                                                    <label>Archive Date<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="date" name="review_archive_date" value="<?php if(isset($_REQUEST['xedit'])) {echo $review_archive_date;}?>" placeholder="" required>
                                                </div>  
                                                


                                                <div class="col-lg-12 form-group">
                                                   <table id="add_dynamic_site_table">
                                                        <tr>
                                                            <td class="col-sm-3 p-1">
                                                                <label>Site Name<span class="text-danger">*</span></label>
                                                                 <input class="form-control" type="text" name="review_site_name[]" value="<?php if(isset($_REQUEST['xedit'])) {echo $review_site_name;}?>" placeholder="" required>
                                                            </td>
                                                            <td class="col-sm-3 p-1">
                                                                <label>Site Category<span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" name="review_site_category[]" value="<?php if(isset($_REQUEST['xedit'])) {echo $review_site_category;}?>" placeholder="" required>
                                                            </td>
                                                            <td class="col-sm-3 p-1">
                                                                <label>Site Owner<span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" name="review_site_owner[]" value="<?php if(isset($_REQUEST['xedit'])) {echo $review_site_owner;}?>" placeholder="" required>
                                                            </td>
                                                            <td class="col-sm-3 p-1">
                                                                <label>Online Since<span class="text-danger">*</span></label>
                                                                <input class="form-control" type="date" name="review_site_online[]" value="<?php if(isset($_REQUEST['xedit'])) {echo $review_site_online;}?>" placeholder="" required>
                                                            </td>
                                                            <td class="col-sm-3">
                                                                <label for="">&nbsp;</label>
                                                                <div>
                                                                  <button type="button" name="add_row_btn" id="add_row_btn" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                   </table>
                                                </div>
                                                <div class="col-sm-1 form-group">
                                                    <label for="">&nbsp;</label>
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
                                <div class="ibox-title">Earning Opportunities Site Category Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="">Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    //`eop_category_id`, `eop_category_name` SELECT * FROM `earning_opportunities_category_master` WHERE 1
                                        $sql1="SELECT * FROM earning_opportunities_category_master WHERE 1";
                                        $query1=mysqli_query($conn,$sql1);
                                        while($prd=mysqli_fetch_array($query1)) 
                                        {?>
                                            <tr>
                                                <td><b><?php echo $prd['eop_category_name'];?></b></td>
                                                <!--========= Impotant sweet alert js =================-->

                                                
                                                <form method="post" action="" enctype="multipart/form-data" onsubmit="return myFunction();">          
                                                    <input type="hidden" name="eop_category_id" value="<?php echo $prd['eop_category_id'];?>" />

                                                <td class="d-flex"><a href="earning_opportunities_category_master.php?xedit=1&eop_category_id=<?php echo $prd['eop_category_id'];?>"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:25px;"></i></a><button  style="border:none; color:#007bff" type="submit" name="delete"><i class="fa fa-trash" aria-hidden="true" style="font-size:25px;"></i></a></button></td>
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

    <script>

        $(document).ready(function(){
            var html='<tr> <td class="col-sm-3 p-1"> <label>Site Name<span class="text-danger">*</span></label> <input class="form-control" type="text" name="review_site_name[]" value="<?php if(isset($_REQUEST['xedit'])) {echo $review_site_name;}?>" placeholder="" required> </td> <td class="col-sm-3 p-1"> <label>Site Category<span class="text-danger">*</span></label> <input class="form-control" type="text" name="review_site_category[]" value="<?php if(isset($_REQUEST['xedit'])) {echo $review_site_category;}?>" placeholder="" required> </td> <td class="col-sm-3 p-1"> <label>Site Owner<span class="text-danger">*</span></label> <input class="form-control" type="text" name="review_site_owner[]" value="<?php if(isset($_REQUEST['xedit'])) {echo $review_site_owner;}?>" placeholder="" required> </td> <td class="col-sm-3 p-1"> <label>Online Since<span class="text-danger">*</span></label> <input class="form-control" type="date" name="review_site_online[]" value="<?php if(isset($_REQUEST['xedit'])) {echo $review_site_online;}?>" placeholder="" required> </td> <td class="col-sm-3"> <label for="">&nbsp;</label> <div> <button type="button" name="remove_row_btn" id="remove_row_btn" class="btn btn-danger"><i class="fa-solid fa-minus"></i></button> </div> </td> </tr>';
            
            var x = 1;
            $("#add_row_btn").click(function(){
                $("#add_dynamic_site_table").append(html);
            });
            $("#add_dynamic_site_table").on('click','#remove_row_btn',function(){
                $(this).closest('tr').remove();
				calculate_total_commodity(this);
				
            });
        });
    </script>
</body>

</html>