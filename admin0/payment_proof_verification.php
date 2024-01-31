<?php
include_once("../db/conn.php");
require_once("../db/admin_sequre.php");
//`pay_proof_id`, `user_id`, `eop_site_id`, `amount_received`, `received_currency`, `received_on`, `payment_file`, `upload_date`, `status` 
                                    //SELECT * FROM `user_payment_proof_master` WHERE 1 

if(isset($_POST['approved']))
{                                            
        $pay_proof_id=trim($_POST['pay_proof_id']);
        $update=mysqli_query($conn,"update  user_payment_proof_master  set status=1 where pay_proof_id='$pay_proof_id'");
    if($update)
    {
        $err="Successfully approved";
    }
    else
    {
        $err=mysql_error();
    }
        header("location:payment_proof_verification.php?msg=".$err);
}

if(isset($_POST['rejected']))
{                                            
        $pay_proof_id=trim($_POST['pay_proof_id']);
        $remarks=trim($_POST['remarks']);
        $update=mysqli_query($conn,"update  user_payment_proof_master  set status=2, remarks='$remarks' where pay_proof_id='$pay_proof_id'");
    if($update)
    {
        $err="Successfully Rejected";
    }
    else
    {
        $err=mysql_error();
    }
        header("location:payment_proof_verification.php?msg=".$err);
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

    <style>
    .zoom {
  background-color: green;
  transition: transform .2s; /* Animation */
  width: 100px;
  height: 100px;
  margin: 0 auto;
}
.zoom:hover {
  transform: scale(5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>


    <script language="javascript">

        function myFunction() {
            if (confirm("Are you sure to approved?") == true) {            
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
                   <h4 style="text-transform: uppercase;">Payment Proof Verification</h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== Start Party Details===============================-->





<div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Payment Proof Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="">Site Name</th>
                                            <th class="">Amount Received</th>
                                            <th class="">Currency</th>
                                            <th class="">Received on</th>
                                            <th width="150px">Payment Proof</th>
                                            <th class="">Upload Date</th>
                                            <th class="">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    //`pay_proof_id`, `user_id`, `eop_site_id`, `amount_received`, `received_currency`, `received_on`, `payment_file`, `upload_date`, `status` 
                                    //SELECT * FROM `user_payment_proof_master` WHERE 1 
                                        
                                    $sql1="SELECT * FROM user_payment_proof_master WHERE status=0";
                                    $query1=mysqli_query($conn,$sql1);
                                    while($prd=mysqli_fetch_array($query1)) 
                                        {

                                            $eop_site_id=$prd['eop_site_id'];
                                            $sql2="SELECT * FROM earning_opportunities_site_description WHERE eop_site_id=$eop_site_id";
                                            $query2=mysqli_query($conn,$sql2);
                                            if($prd2=mysqli_fetch_array($query2)) {
                                                $eop_site_name=$prd2['eop_site_name'];
                                            }

                                           
                                        ?>
                                            <tr>
                                                
                                                <td><b><?php echo $eop_site_name;?></b></td>
                                                <td><b><?php echo $prd['amount_received'];?></b></td>
                                                <td><b><?php echo $prd['received_currency'];?></b></td>
                                                <td><b><?php echo $prd['received_on'];?></b></td>
                                                <td><div class="zoom"><img src="../user_dashboard/users_payment_proof/<?php echo $prd['payment_file'];?>" alt="Proof Image" width="100%"></div></td>
                                                <td><b><?php echo $prd['upload_date'];?></b></td>
                                                <form method="post" action="" enctype="multipart/form-data" onsubmit="return myFunction();">          
                                                    <input type="hidden" name="pay_proof_id" value="<?php echo $prd['pay_proof_id'];?>" />

                                                <td class="d-flex">
                                                    <button  class="btn btn-success" type="submit" name="approved">Approved</a></button>&nbsp;
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter<?php echo $prd['pay_proof_id'];?>">Reject</button>
                                                </td>
                                              </form>
                                             

                                            </tr>






                                                                                    
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter<?php echo $prd['pay_proof_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="pay_proof_id" value="<?php echo $prd['pay_proof_id'];?>" />
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Remarks</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <textarea class="form-control" name="remarks" id="" cols="30" rows="5" placeholder="Type Reason..." required></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="rejected" class="btn btn-danger">Rejected</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                </div>
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


        <!-- Button trigger modal -->
        






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