<?php
include_once("../db/conn.php");
require_once("../db/admin_sequre.php");
//`notification_id`, `notification_type`, `member_category_id`, `message_day` SELECT * FROM `notification_master` WHERE 1
if(isset($_POST['delete']))	
{
       $notification_id=$_POST['notification_id'];
       
      $qury=mysqli_query($conn,"DELETE FROM `notification_master` WHERE notification_id='$notification_id'");
      header("location:notification_master.php?msg=Successfully deleted");
        
}


if(isset($_POST['submit']))
{

    $notification_type_id= $_POST['notification_type_id'] ;
    $member_category_id= $_POST['member_category_id'] ;
    $message_day= $_POST['message_day'] ;

    $sql="INSERT INTO notification_master (notification_type_id, member_category_id, message_day)
    VALUES ('$notification_type_id', '$member_category_id', '$message_day')";
    $query=mysqli_query($conn,$sql);
    if($query){
    
        header("Location:notification_master.php?msg=New record submited successfully");
    
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }

}

if(isset($_POST['update']))
{
                                                         
        $notification_type_id=trim($_POST['notification_type_id']);
        $notification_type= $_POST['notification_type'] ;
        $member_category_id= $_POST['member_category_id'] ;
        $message_day= $_POST['message_day'] ;

        $update=mysqli_query($conn,"update  notification_master  set notification_type='$notification_type',member_category_id='$member_category_id', message_day='$message_day'  where notification_id='$notification_id'");
               

    if($update)
    {
        $msg="Successfully updated";
    }
    else
    {
        $msg=mysql_error();
    }
        header("location:notification_master.php?err=".$msg);



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
            //`notification_id`, `notification_type`, `membership_category_id`, `message_day` SELECT * FROM `notification_master` WHERE 1
           $notification_id=$_REQUEST['notification_id'];
		   $qre=mysqli_query($conn,"SELECT * FROM notification_master where notification_id=$notification_id");
		   if($fetch=mysqli_fetch_array($qre))
			{
			  $notification_id=$fetch['notification_id'];
			  $notification_type_id=$fetch['notification_type_id'];
              $member_category_id=$fetch['member_category_id'];
              $message_day=$fetch['message_day'];

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
                   <h4 style="text-transform: uppercase;">Notification Master</h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== Start Party Details===============================-->





            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Send Notification</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                            
                            <?php
                           //`notification_id`, `notification_type`, `membership_category_id`, `message_day` SELECT * FROM `notification_master` WHERE 1
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
                                            <input type="hidden" id="notification_id" name="notification_id"  readonly="readonly" value="<?php if(isset($_REQUEST['xedit'])) {echo $notification_id;}?>" />    

                                            <div class="row">
                                                <div class="col-sm-3 form-group">
                                                    <label>Notification Type <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="notification_type_id">
                                                    <option value="">Choose</option>
                                                        <?php
                                                        //`notification_type_id`, `notification_name`, `notification_subject`, `notification_content` SELECT * FROM `notification_type_master` WHERE 1
                                                        $sql_ctgy="SELECT * FROM `notification_type_master` WHERE 1";
                                                        $query_ctgy=mysqli_query($conn,$sql_ctgy);
                                                        while($ctgy=mysqli_fetch_array($query_ctgy)) 
                                                        {?>
                                                            <option value="<?php echo $ctgy['notification_type_id'];?>" <?php if(isset($_REQUEST['xedit'])) if($ctgy['notification_type_id']==$notification_type_id) echo 'selected';?>><?php echo $ctgy['notification_name'];?></option>
                                                        <?php
                                                        }
                                                        ?>  
                                                    </select>

                                                    
                                                   
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label>Member Category <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="member_category_id">
                                                        <option value="">Choose</option>
                                                    <?php
                                                        //`member_category_id`, `member_category_name` SELECT * FROM `member_category_master` WHERE 1
                                                        $sql_ctgy="SELECT * FROM `member_category_master` WHERE 1";
                                                        $query_ctgy=mysqli_query($conn,$sql_ctgy);
                                                        while($ctgy=mysqli_fetch_array($query_ctgy)) 
                                                        {?>
                                                            <option value="<?php echo $ctgy['member_category_id'];?>" <?php if(isset($_REQUEST['xedit'])) if($ctgy['member_category_id']==$member_category_id) echo 'selected';?>><?php echo $ctgy['member_category_name'];?></option>
                                                        <?php
                                                        }
                                                        ?> 

                                                    </select>
                                                  
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label>Message Day <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="date" name="message_day" value="<?php if(isset($_REQUEST['xedit'])) {echo $message_day;}?>" placeholder="Enter content"required>
                                                </div>  
                                                <div class="col-sm-3 form-group">
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
                                <div class="ibox-title">Notification Type Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="">Type </th>
                                            <th class="">Category </th>
                                            <th>Message Day</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
//`notification_id`, `notification_type_id`, `member_category_id`, `message_day`SELECT * FROM `notification_master` WHERE 1
//`notification_type_id`, `notification_name`, `notification_subject`, `notification_content` SELECT * FROM `notification_type_master` WHERE 1
//`member_category_id`, `member_category_name` SELECT * FROM `member_category_master` WHERE 1

                                        $sql1="SELECT notification_id,message_day,notification_name,member_category_name FROM notification_master,notification_type_master,member_category_master  
                                        WHERE notification_master.notification_type_id=notification_type_master.notification_type_id and notification_master.member_category_id=member_category_master.member_category_id";
                                        $query1=mysqli_query($conn,$sql1);
                                        while($prd=mysqli_fetch_array($query1)) 
                                        {
                                            
                                            $notification_id=$prd['notification_id'];
                                            $message_day=$prd['message_day'];
                                            $notification_name=$prd['notification_name'];
                                            $member_category_name=$prd['member_category_name'];
                                            
                                        ?>
                                            <tr>
                                                
                                                <td><b><?php echo  $notification_name;?></b></td>
                                                <td><b><?php echo $member_category_name;?></b></td>
                                                <td><b><?php echo $prd['message_day'];?></b></td>

                                                <!--========= Impotant sweet alert js =================-->

                                                
                                                <form method="post" action="" enctype="multipart/form-data" onsubmit="return myFunction();">          
                                                    <input type="hidden" name="notification_id" value="<?php echo $prd['notification_id'];?>" />

                                                <td class="d-flex"><a href="notification_master.php?xedit=1&notification_id=<?php echo $prd['notification_id'];?>"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:25px;"></i></a><button  style="border:none; color:#007bff" type="submit" name="delete"><i class="fa fa-trash" aria-hidden="true" style="font-size:25px;"></i></a></button></td>
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