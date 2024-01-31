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
    /* <!--`report_id`, `period_details_id`, `availability`, `restricted`, `currency`, `daily_earnings`, `method_earning`, `min_amount_cashout`, 
    `cashout_interval`, `cashout_method`, `direct_ref_availability`, `rented_ref_availability`, `max_direct_referral`, `min_rented_referral`, 
    `upgradation_facilities`, `max_dr_upgraded_members`, `max_rr_upgraded_members`, `com__dr_earnings_levels`, `com__pd_affiliate_earnings`, 
    `com_pd_rented_referrals`, `commission_clicks`, `commission_tasks`, `commission_purchase`, `payment_proof_1`, `payment_proof_2`, 
    `payment_proof_3`, `payment_proof_4`, `payment_proof_5`, `payment_proof_6`, `payment_proof_7`, `payment_proof_8`, `payment_proof_9`, 
    `payment_proof_10` SELECT * FROM `under_review_report` WHERE 1
    */

     $period_details_id=$_POST['period_details_id'];
     $availability=$_POST['availability'];
     $restricted=$_POST['restricted'];
     $currency=$_POST['currency'];
     $daily_earnings=$_POST['daily_earnings'];
     $method_earning=$_POST['method_earning'];
     $min_amount_cashout=$_POST['min_amount_cashout'];
     $cashout_interval=$_POST['cashout_interval'];
     $cashout_method=$_POST['cashout_method'];
     $direct_ref_availability=$_POST['direct_ref_availability'];
     $rented_ref_availability=$_POST['rented_ref_availability'];
     $max_direct_referral=$_POST['max_direct_referral'];
     $min_rented_referral=$_POST['min_rented_referral'];
     $upgradation_facilities=$_POST['upgradation_facilities'];
     $max_dr_upgraded_members=$_POST['max_dr_upgraded_members'];
     $max_rr_upgraded_members=$_POST['max_rr_upgraded_members'];
     $com__dr_earnings_levels=$_POST['com__dr_earnings_levels'];
     $com__pd_affiliate_earnings=$_POST['com__pd_affiliate_earnings'];
     $com_pd_rented_referrals=$_POST['com_pd_rented_referrals'];
     $commission_clicks=$_POST['commission_clicks'];
     $commission_tasks=$_POST['commission_tasks'];
     $commission_purchase=$_POST['commission_purchase'];

     if(isset($_FILES['payment_proof_1'])){
        $errors= array();
        $payment_proof_1=$_FILES['payment_proof_1']['name'];
        $payment_proof_1_temp=$_FILES['payment_proof_1']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($payment_proof_1_temp,"../user_dashboard/review_payment_proof/".$payment_proof_1);
        }
    }
    if(isset($_FILES['payment_proof_2'])){
        $errors= array();
        $payment_proof_2=$_FILES['payment_proof_2']['name'];
        $payment_proof_2_temp=$_FILES['payment_proof_2']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($payment_proof_2_temp,"../user_dashboard/review_payment_proof//".$payment_proof_2);
        }
    }
    if(isset($_FILES['payment_proof_3'])){
        $errors= array();
        $payment_proof_3=$_FILES['payment_proof_3']['name'];
        $payment_proof_3_temp=$_FILES['payment_proof_3']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($payment_proof_3_temp,"../user_dashboard/review_payment_proof//".$payment_proof_3);
        }
    }
    if(isset($_FILES['payment_proof_4'])){
        $errors= array();
        $payment_proof_4=$_FILES['payment_proof_4']['name'];
        $payment_proof_4_temp=$_FILES['payment_proof_4']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($payment_proof_4_temp,"../user_dashboard/review_payment_proof//".$payment_proof_4);
        }
    }
    if(isset($_FILES['payment_proof_5'])){
        $errors= array();
        $payment_proof_5=$_FILES['payment_proof_5']['name'];
        $payment_proof_5_temp=$_FILES['payment_proof_5']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($payment_proof_5_temp,"../user_dashboard/review_payment_proof//".$payment_proof_5);
        }
    }
    if(isset($_FILES['payment_proof_6'])){
        $errors= array();
        $payment_proof_6=$_FILES['payment_proof_6']['name'];
        $payment_proof_6_temp=$_FILES['payment_proof_6']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($payment_proof_6_temp,"../user_dashboard/review_payment_proof//".$payment_proof_6);
        }
    }
    if(isset($_FILES['payment_proof_7'])){
        $errors= array();
        $payment_proof_7=$_FILES['payment_proof_7']['name'];
        $payment_proof_7_temp=$_FILES['payment_proof_7']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($payment_proof_7_temp,"../user_dashboard/review_payment_proof//".$payment_proof_7);
        }
    }
    if(isset($_FILES['payment_proof_8'])){
        $errors= array();
        $payment_proof_8=$_FILES['payment_proof_8']['name'];
        $payment_proof_8_temp=$_FILES['payment_proof_8']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($payment_proof_8_temp,"../user_dashboard/review_payment_proof//".$payment_proof_8);
        }
    }
    if(isset($_FILES['payment_proof_9'])){
        $errors= array();
        $payment_proof_9=$_FILES['payment_proof_9']['name'];
        $payment_proof_9_temp=$_FILES['payment_proof_9']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($payment_proof_9_temp,"../user_dashboard/review_payment_proof//".$payment_proof_9);
        }
    }
    if(isset($_FILES['payment_proof_10'])){
        $errors= array();
        $payment_proof_10=$_FILES['payment_proof_10']['name'];
        $payment_proof_10_temp=$_FILES['payment_proof_10']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($payment_proof_10_temp,"../user_dashboard/review_payment_proof//".$payment_proof_10);
        }
    }
    


    $sql="INSERT INTO under_review_report (period_details_id, availability, restricted, currency, daily_earnings, method_earning, min_amount_cashout, cashout_interval, cashout_method, direct_ref_availability, rented_ref_availability, max_direct_referral, min_rented_referral, upgradation_facilities, max_dr_upgraded_members, max_rr_upgraded_members, com__dr_earnings_levels, com__pd_affiliate_earnings, com_pd_rented_referrals, commission_clicks, commission_tasks, commission_purchase, payment_proof_1, payment_proof_2, payment_proof_3, payment_proof_4, payment_proof_5, payment_proof_6, payment_proof_7, payment_proof_8, payment_proof_9, payment_proof_10)
    VALUES ('$period_details_id', '$availability', '$restricted', '$currency', '$daily_earnings', '$method_earning', '$min_amount_cashout', '$cashout_interval', '$cashout_method', '$direct_ref_availability', '$rented_ref_availability', '$max_direct_referral', '$min_rented_referral', '$upgradation_facilities', '$max_dr_upgraded_members', '$max_rr_upgraded_members', '$com__dr_earnings_levels', '$com__pd_affiliate_earnings', '$com_pd_rented_referrals', '$commission_clicks', '$commission_tasks', '$commission_purchase', '$payment_proof_1', '$payment_proof_2', '$payment_proof_3', '$payment_proof_4', '$payment_proof_5', '$payment_proof_6', '$payment_proof_7', '$payment_proof_8', '$payment_proof_9', '$payment_proof_10')";
    $query=mysqli_query($conn,$sql);

   
    if($query)
    {
        header("Location:review_site_report.php?msg=Successfully Submitted");
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
                   <h4 style="text-transform: uppercase;">Review Sites Report</h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== Start Party Details===============================-->





            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title"></div>
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
                                            <!--`report_id`, `period_details_id`, `availability`, `restricted`, `currency`, `daily_earnings`, `method_earning`, `min_amount_cashout`, 
                                            `cashout_interval`, `cashout_method`, `direct_ref_availability`, `rented_ref_availability`, `max_direct_referral`, `min_rented_referral`, 
                                            `upgradation_facilities`, `max_dr_upgraded_members`, `max_rr_upgraded_members`, `com__dr_earnings_levels`, `com__pd_affiliate_earnings`, 
                                            `com_pd_rented_referrals`, `commission_clicks`, `commission_tasks`, `commission_purchase`, `payment_proof_1`, `payment_proof_2`, 
                                            `payment_proof_3`, `payment_proof_4`, `payment_proof_5`, `payment_proof_6`, `payment_proof_7`, `payment_proof_8`, `payment_proof_9`, 
                                            `payment_proof_10` SELECT * FROM `under_review_report` WHERE 1-->
                                            
                                            <input type="hidden" id="review_period_id" name="review_period_id"  readonly="readonly" value="<?php if(isset($_REQUEST['xedit'])) {echo $review_period_id;}?>" />    

                                            <div class="row">
                                                <div class="col-sm-3 form-group">
                                                    <label>Site Name<span class="text-danger">*</span></label>
                                                    <select class="form-control" name="period_details_id" id="period_details_id" required>
                                                        <option value="" selected disabled="none">Choose Site</option>

                                                        <?php
                                                        //`period_details_id`, `review_period_id`, `review_site_name`, `review_site_category`, `review_site_owner`, `review_site_online` SELECT * FROM `under_review_period_details` WHERE 1
                                                        $sql_ctgy="SELECT * FROM `under_review_period_details` WHERE 1";
                                                        $query_ctgy=mysqli_query($conn,$sql_ctgy);
                                                        while($ctgy=mysqli_fetch_array($query_ctgy)) 
                                                        {?>
                                                            <option value="<?php echo $ctgy['period_details_id'];?>" <?php if(isset($_REQUEST['xedit'])) if($ctgy['period_details_id']==$period_details_id) echo 'selected';?>><?php echo $ctgy['review_site_name'];?></option>
                                                        <?php
                                                        }
                                                        ?> 
                                                    </select>
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label>Availability <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="availability" value="<?php if(isset($_REQUEST['xedit'])) {echo $availability;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label>Restricted To <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="restricted" value="<?php if(isset($_REQUEST['xedit'])) {echo $restricted;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label>Currency <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="currency" value="<?php if(isset($_REQUEST['xedit'])) {echo $currency;}?>" placeholder="" required>
                                                </div>  
                                                <!--`report_id`, `period_details_id`, `availability`, `restricted`, `currency`, `daily_earnings`, `method_earning`, `min_amount_cashout`, 
                                                `cashout_interval`, `cashout_method`, `direct_ref_availability`, `rented_ref_availability`, `max_direct_referral`, `min_rented_referral`, 
                                                `upgradation_facilities`, `max_dr_upgraded_members`, `max_rr_upgraded_members`, `com__dr_earnings_levels`, `com__pd_affiliate_earnings`, 
                                                `com_pd_rented_referrals`, `commission_clicks`, `commission_tasks`, `commission_purchase`, `payment_proof_1`, `payment_proof_2`, 
                                                `payment_proof_3`, `payment_proof_4`, `payment_proof_5`, `payment_proof_6`, `payment_proof_7`, `payment_proof_8`, `payment_proof_9`, 
                                                `payment_proof_10` SELECT * FROM `under_review_report` WHERE 1-->
                                                <div class="col-sm-4 form-group">
                                                    <label>Daily Earnings (approx) <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="daily_earnings" value="<?php if(isset($_REQUEST['xedit'])) {echo $daily_earnings;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Method of Earnings <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="method_earning" value="<?php if(isset($_REQUEST['xedit'])) {echo $method_earning;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Minimum Amount to Cashout <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="min_amount_cashout" value="<?php if(isset($_REQUEST['xedit'])) {echo $min_amount_cashout;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Cashout Interval <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="cashout_interval" value="<?php if(isset($_REQUEST['xedit'])) {echo $cashout_interval;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Cashout Method <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="cashout_method" value="<?php if(isset($_REQUEST['xedit'])) {echo $cashout_method;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Direct Referrals Availability <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="direct_ref_availability" value="<?php if(isset($_REQUEST['xedit'])) {echo $direct_ref_availability;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Rented Referrals Availability <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="rented_ref_availability" value="<?php if(isset($_REQUEST['xedit'])) {echo $rented_ref_availability;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Maximum Direct Referral for Free Members<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="max_direct_referral" value="<?php if(isset($_REQUEST['xedit'])) {echo $max_direct_referral;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Maximum Rented Referral for Free Members <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="min_rented_referral" value="<?php if(isset($_REQUEST['xedit'])) {echo $min_rented_referral;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Upgradation Facilities <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="upgradation_facilities" value="<?php if(isset($_REQUEST['xedit'])) {echo $upgradation_facilities;}?>" placeholder="" required>
                                                </div>  

                                                <!--`report_id`, `period_details_id`, `availability`, `restricted`, `currency`, `daily_earnings`, `method_earning`, `min_amount_cashout`, 
                                                `cashout_interval`, `cashout_method`, `direct_ref_availability`, `rented_ref_availability`, `max_direct_referral`, `min_rented_referral`, 
                                                `upgradation_facilities`, `max_dr_upgraded_members`, `max_rr_upgraded_members`, `com__dr_earnings_levels`, `com__pd_affiliate_earnings`, 
                                                `com_pd_rented_referrals`, `commission_clicks`, `commission_tasks`, `commission_purchase`, `payment_proof_1`, `payment_proof_2`, 
                                                `payment_proof_3`, `payment_proof_4`, `payment_proof_5`, `payment_proof_6`, `payment_proof_7`, `payment_proof_8`, `payment_proof_9`, 
                                                `payment_proof_10` SELECT * FROM `under_review_report` WHERE 1-->
                                                <div class="col-sm-4 form-group">
                                                    <label>Maximum Direct Referral for Upgraded Members  <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="max_dr_upgraded_members" value="<?php if(isset($_REQUEST['xedit'])) {echo $max_dr_upgraded_members;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Maximum Rented Referral for Upgraded Members  <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="max_rr_upgraded_members" value="<?php if(isset($_REQUEST['xedit'])) {echo $max_rr_upgraded_members;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Commission from Direct Referrals Earnings Levels <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="com__dr_earnings_levels" value="<?php if(isset($_REQUEST['xedit'])) {echo $com__dr_earnings_levels;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Commission percentage on Direct Affiliate Earnings  <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="com__pd_affiliate_earnings" value="<?php if(isset($_REQUEST['xedit'])) {echo $com__pd_affiliate_earnings;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Commission percentate from Rented Referrals <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="com_pd_rented_referrals" value="<?php if(isset($_REQUEST['xedit'])) {echo $com_pd_rented_referrals;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>  Commission from Clicks  <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="commission_clicks" value="<?php if(isset($_REQUEST['xedit'])) {echo $commission_clicks;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label> Commission from Tasks <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="commission_tasks" value="<?php if(isset($_REQUEST['xedit'])) {echo $commission_tasks;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label> Commission from Purchase <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="commission_purchase" value="<?php if(isset($_REQUEST['xedit'])) {echo $commission_purchase;}?>" placeholder="" required>
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label> Payment Proof 1 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="payment_proof_1" value="<?php if(isset($_REQUEST['xedit'])) {echo $payment_proof_1;}?>"  accept="image/*" required>
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label> Payment Proof 2 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="payment_proof_2" value="<?php if(isset($_REQUEST['xedit'])) {echo $payment_proof_2;}?>"  accept="image/*" required>
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label> Payment Proof 3 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="payment_proof_3" value="<?php if(isset($_REQUEST['xedit'])) {echo $payment_proof_3;}?>"  accept="image/*" required>
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label> Payment Proof 4 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="payment_proof_4" value="<?php if(isset($_REQUEST['xedit'])) {echo $payment_proof_4;}?>"  accept="image/*" required>
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label> Payment Proof 5 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="payment_proof_5" value="<?php if(isset($_REQUEST['xedit'])) {echo $payment_proof_5;}?>"  accept="image/*" required>
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label> Payment Proof 6 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="payment_proof_6" value="<?php if(isset($_REQUEST['xedit'])) {echo $payment_proof_6;}?>"  accept="image/*" required>
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label> Payment Proof 7 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="payment_proof_7" value="<?php if(isset($_REQUEST['xedit'])) {echo $payment_proof_7;}?>"  accept="image/*" required>
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label> Payment Proof 8 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="payment_proof_8" value="<?php if(isset($_REQUEST['xedit'])) {echo $payment_proof_8;}?>"  accept="image/*" required>
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label> Payment Proof 9 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="payment_proof_9" value="<?php if(isset($_REQUEST['xedit'])) {echo $payment_proof_9;}?>"  accept="image/*" required>
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label> Payment Proof 10 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="payment_proof_10" value="<?php if(isset($_REQUEST['xedit'])) {echo $payment_proof_10;}?>"  accept="image/*" required>
                                                </div>  

                                                

                                            <!--`report_id`, `period_details_id`, `availability`, `restricted`, `currency`, `daily_earnings`, `method_earning`, `min_amount_cashout`, 
                                            `cashout_interval`, `cashout_method`, `direct_ref_availability`, `rented_ref_availability`, `max_direct_referral`, `min_rented_referral`, 
                                            `upgradation_facilities`, `max_dr_upgraded_members`, `max_rr_upgraded_members`, `com__dr_earnings_levels`, `com__pd_affiliate_earnings`, 
                                            `com_pd_rented_referrals`, `commission_clicks`, `commission_tasks`, `commission_purchase`, `payment_proof_1`, `payment_proof_2`, 
                                            `payment_proof_3`, `payment_proof_4`, `payment_proof_5`, `payment_proof_6`, `payment_proof_7`, `payment_proof_8`, `payment_proof_9`, 
                                            `payment_proof_10` SELECT * FROM `under_review_report` WHERE 1-->
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