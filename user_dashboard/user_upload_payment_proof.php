<?php
include_once("../db/conn.php");
require_once("../db/user_sequre.php");

//`pay_proof_id`, `user_id`, `eop_site_id`, `amount_received`, `received_currency`, `received_on`, `payment_file`, `upload_date`, `status` 
//SELECT * FROM `user_payment_proof_master` WHERE 1 
if(isset($_POST['submit']))
{
    $user_id=$_POST['user_id'] ;
    $eop_site_id= $_POST['eop_site_id'] ;
    $amount_received=trim($_POST['amount_received']);
    $received_currency=trim($_POST['received_currency']);
    $received_on=trim($_POST['received_on']);

    if(isset($_FILES['payment_file'])){
        $errors= array();
        $payment_file=$_FILES['payment_file']['name'];
        $payment_file_temp=$_FILES['payment_file']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($payment_file_temp,"users_payment_proof/".$payment_file);
        }
    }
    $upload_date=date('d.m.Y');


        $sql="INSERT INTO user_payment_proof_master (user_id, eop_site_id, amount_received, received_currency, received_on, payment_file, upload_date)
        VALUES ($user_id, $eop_site_id, '$amount_received', '$received_currency', '$received_on', '$payment_file', '$upload_date')";
        $query=mysqli_query($conn,$sql);
        if($query){
            header("Location:user_upload_payment_proof.php?msg=New record submited successfully");
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
    <title>UPLOAD PAYMENT PROOF</title>
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
        
        var eop_site_id=document.getElementById("eop_site_id").value;
        var amount_received=document.getElementById("amount_received").value;
        var received_currency=document.getElementById("received_currency").value;

        var cnt=document.getElementById("cnt").value;
        var i=0;

     if(amount_received==received_currency)
     {
        alert("Sponsor Link & Adv Link cannot be same");
        return false;
     }


        while(i*1<cnt*1)
           {
            
            i++;
            eop_site_id=document.getElementById("eop_site_id"+i).value;
            eop_site_name=document.getElementById("eop_site_name"+i).value;
            //alert(eop_site_id+"***"+eop_site_id+"***"+eop_site_name+" P Link:"+amount_received+"Adv Link:"+received_currency);
            
              if(eop_site_id==eop_site_id)
                 {
                    
                    
                    if(amount_received.indexOf(eop_site_name)!=-1 && received_currency.indexOf(eop_site_name)!=-1)
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
<?php if(isset($_REQUEST['xedit']))
         {
            //<!--`adv_id`, `user_id`, `parent_user_id`, `eop_site_id`, `amount_received`, `adv_status`, `submittion_date`
            // SELECT * FROM `user_adv_addlink_master` WHERE 1 -->

           $adv_id=$_REQUEST['adv_id'];
		   $qre=mysqli_query($conn,"SELECT * FROM user_adv_addlink_master where adv_id=$adv_id");
		   if($fetch=mysqli_fetch_array($qre))
			{
			  $adv_id=$fetch['adv_id'];
              $amount_received=$fetch['amount_received'];
              $parent_user_id=$fetch['parent_user_id'];
              $qre2=mysqli_query($conn,"SELECT * FROM user_adv_addlink_master where user_id=$parent_user_id");
              if($fetch2=mysqli_fetch_array($qre2)){
                $parent_amount_received=$fetch2['amount_received'];
              }
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
                   <h5><b>PAYMENT PROOF</b></h5>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->










<!--=========== START PAGE CONTENT======================================================================-->



            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Upload Payment Proof</div>
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
                                        <!--`pay_proof_id`, `user_id`, `eop_site_id`, `amount_received`, `received_currency`, `received_on`, `payment_file`, `upload_date`, `status` SELECT * FROM `user_payment_proof_master` WHERE 1 -->

                                        <!-- `eop_site_id`, `eop_category_id`, `eop_site_name`, `eop_site_description`, `eop_site_status` SELECT * FROM `earning_opportunities_site_description` WHERE 1-->
                                        <input class="form-control" type="hidden" name="adv_id" id="adv_id" value="<?php if(isset($_REQUEST['xedit'])) {echo $adv_id;}?>">                         
                                        <input type="hidden" name="user_id" value="<?php echo $session_user_id; ?>">

                                            <div class="row">
                                                <div class="col-sm-2 form-group">
                                                    <label>Site Name <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="eop_site_id" id="eop_site_id"  required>
                                                        <option value="" selected disabled="none"> Choose site</option>
                                                        <?php
                                                        
                                                        //`eop_site_id`, `eop_category_id`, `eop_site_name`, `eop_site_description`, `eop_site_status`SELECT * FROM `earning_opportunities_site_description` WHERE 1
                                                        
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

                                                <div class="col-sm-3 form-group">
                                                    <label>Amount Received <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="number" name="amount_received" id="amount_received"   placeholder="Enter Amount"  required >
                                                </div>
                                                <div class="col-sm-2 form-group">
                                                    <label>Received in currency <span class="text-danger">*</span></label>
                                                    <select  class="form-control" name="received_currency" required>
                                                        <option selected disabled="none" value="">Choose currency</option>
                                                        <option value="USD">USD</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2 form-group">
                                                    <label>Received on <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="date" name="received_on" id="received_on"   placeholder=""  required >
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Payment Proof File <span class="text-danger">*  (only upload JPG)</span> </label>
                                                    <input class="form-control" type="file" name="payment_file" id="payment_file" required>
                                                </div>
                                                <div> 
                                            </div>
                                            
                                            </div>
                                            <div class="form-group">
                                                <?php if(isset($_REQUEST['xedit'])) { ?><button class="btn btn-success" type="submit" name="update" >Update</button><?php } else {?><button class="btn btn-success" type="submit" name="submit" >Submit</button><?php } ?>
                                            </div>

                                            <?php
                                            $cnt=0;
                                            //`eop_site_id`, `eop_category_id`, `eop_site_name`, `eop_site_description`, `eop_site_status`SELECT * FROM `earning_opportunities_site_description` WHERE 1                                           
                                            $sql20="SELECT * FROM earning_opportunities_site_description ";
                                            $q20=mysqli_query($conn,$sql20);
                                            while($f20=mysqli_fetch_array($q20)) 
                                            {
                                                $cnt++;
                                                ?>
                                                <input type="hidden" name="eop_site_id<?php echo $cnt;?>" id="eop_site_id<?php echo $cnt;?>" value="<?php echo $f20['eop_site_id'];?>">
                                                <input type="hidden" name="eop_site_name<?php echo $cnt;?>" id="eop_site_name<?php echo $cnt;?>" value="<?php echo $f20['eop_site_name'];?>">
                                          <?php
                                            }
                                            ?>
                                            <input type="hidden" name="cnt"  id="cnt" value="<?php echo $cnt;?>" >
                                                
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
                                            <th width="200px" class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    //`pay_proof_id`, `user_id`, `eop_site_id`, `amount_received`, `received_currency`, `received_on`, `payment_file`, `upload_date`, `status` 
                                    //SELECT * FROM `user_payment_proof_master` WHERE 1 
                                        
                                    $sql1="SELECT * FROM user_payment_proof_master WHERE  user_id=$session_user_id";
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
                                                <td><div class="zoom"><img src="users_payment_proof/<?php echo $prd['payment_file'];?>" alt="Proof Image" width="100%"></div></td>
                                                <td><b><?php echo $prd['upload_date'];?></b></td>
                                                <td  class="text-center"><b>
                                                    <?php 
                                                    if($prd['status']==0){?>
                                                        <span class="badge badge-warning">Pending</span>
                                                    <?php
                                                    }
                                                    elseif($prd['status']==1)
                                                    {?>
                                                        <span class="badge badge-success">Approved</span>
                                                       
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                        <span class="badge badge-danger">Rejected</span>
                                                        <div class="text-center">
                                                           <small><?php echo $prd['remarks'];?></small> 
                                                        </div>
                                                        
                                                    <?php
                                                    }
                                                    ?>
                                                </b></td>
                                             

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