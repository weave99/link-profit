<?php
include_once("../db/conn.php");
require_once("../db/admin_sequre.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';




if(isset($_POST['delete']))	
{
       $id=$_POST['id'];
       
      $qury=mysqli_query($conn,"DELETE FROM admin WHERE id='$id'");
      header("location:create_administrator.php?err=Successfully deleted");
        
}

if(isset($_POST['submit']))
{
    //`id`, `role`, `membership_id`, `email`, `password`, `verify_otp` SELECT * FROM `admin` WHERE 1
    // //`role_id`, `role_name` SELECT * FROM `user_role_master` WHERE `role_id`, `role_name` 1
    $role_name= $_POST['role_name'] ;
    $membership_id= $_POST['membership_id'] ;
    $email=trim($_POST['email']);
    $password="Password@123";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql="INSERT INTO admin (role_name, membership_id, email, password)
    VALUES ('$role_name', '$membership_id', '$email', '$hashedPassword')";
    $query=mysqli_query($conn,$sql);
    if($query){
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'check.formsubmission@gmail.com';
        $mail->Password = 'mehzqzvfwwggxpzo';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom($email,'support@earnify.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = "Earnify Admin Panel Login Details";
        $mail->Body = "
                        <h1>Admin Panel Login Details</h1>
                        <h4>User Role - " . $role_name . "</h4>
                        <h4>User ID - " . $membership_id . "</h4>
                        <h4>Password - " . $password . "</h4>
                    ";
    
    
        if($mail->send()){
        
            header("Location:create_administrator.php?msg=New record submited successfully");
        }
        else{
        echo "<script>alert('Error please try again')</script>";
        }
        
    
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }

}

if(isset($_POST['update']))
{
        //`id`, `role`, `membership_id`, `email`, `password`, `verify_otp` SELECT * FROM `admin` WHERE 1                     
        $id=trim($_POST['id']);
        $role_name= $_POST['role_name'] ;
        $membership_id= $_POST['membership_id'] ;
        $email=trim($_POST['email']);


        $old_query=mysqli_query($conn,"SELECT * FROM admin where id=$id");
        if($old_fetch=mysqli_fetch_array($old_query))
         {
            $role_name_old=$old_fetch['role_name'];
         }



        $update=mysqli_query($conn,"update  admin  set role_name='$role_name' where id='$id'");
               

    if($update)
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'check.formsubmission@gmail.com';
        $mail->Password = 'mehzqzvfwwggxpzo';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom($email,'support@earnify.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = "Earnify Admin Panel Update Login Details";
        $mail->Body = "
                        <h1>Admin Panel Login Details Update</h1>
                        <h4>User ID - " . $membership_id . "</h4>
                        <h4>User Role Change To - ".$role_name_old." > <span style='color:red;'>" . $role_name . "</span></h4>
                    ";
    
        if($mail->send()){
        
            header("Location:create_administrator.php?msg=Updated and notify user successfully");
        }
        else{
        echo "<script>alert('Error please try again')</script>";
        }
        
    }
    else
    {
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
    <title>Create  Administrator</title>
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

        <?php
        ////`id`, `role`, `membership_id`, `email`, `password`, `verify_otp` SELECT * FROM `admin` WHERE 1
        if(isset($_REQUEST['xedit']))
         {
           $id=$_REQUEST['id'];
		   $qre=mysqli_query($conn,"SELECT * FROM admin where id=$id");
		   if($fetch=mysqli_fetch_array($qre))
			{
			  $role_name=$fetch['role_name'];
			  $membership_id=$fetch['membership_id'];
              $email=$fetch['email'];
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
                   <h4 style="text-transform: uppercase;">Create  Administrator</h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== Start Party Details===============================-->



            <?php if(isset($_REQUEST['xedit'])) { ?>
                <div class="page-content fade-in-up">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">Update administrator</div>
                                    <div class="ibox-tools">
                                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                
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
                                            <form action="" method="POST">
                                                <input type="hidden" id="id" name="id"  readonly="readonly" value="<?php if(isset($_REQUEST['xedit'])) {echo $id;}?>" />    

                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label>Membership Id<span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="membership_id" value="<?php if(isset($_REQUEST['xedit'])) {echo $membership_id;}?>" readonly>
                                                    </div>  

                                                    <div class="col-sm-4 form-group">
                                                        <label>Email<span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="email" value="<?php if(isset($_REQUEST['xedit'])) {echo $email;}?>" readonly>
                                                    </div> 



                                                    <div class="col-sm-4 form-group">
                                                        <label>Role<span class="text-danger">*</span></label>
                                                        <select class="form-control" name="role_name">
                                                            <option value="">Select role</option>
                                                            <?php

                                                            //`role_id`, `role_name` SELECT * FROM `admin_role_master` WHERE 1
                                                            $sql_ctgy="SELECT * FROM admin_role_master WHERE 1";
                                                            $query_ctgy=mysqli_query($conn,$sql_ctgy);
                                                            while($ctgy=mysqli_fetch_array($query_ctgy)) 
                                                            {?>
                                                                <option value="<?php echo $ctgy['role_name'];?>" <?php if(isset($_REQUEST['xedit'])) if($ctgy['role_name']==$role_name) echo 'selected';?>><?php echo $ctgy['role_name'];?></option>
                                                            <?php
                                                            }
                                                            ?>  
                                                        </select>
                                                    </div>  


                                                </div>
                                                <div class="form-group">
                                                <button class="btn btn-success" type="submit" name="update" >Update</button>
                                                </div>
                                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <?php
            }else{?>

                <div class="page-content fade-in-up">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">Create a administrator</div>
                                    <div class="ibox-tools">
                                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                
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
                                            <form action="" method="POST">
                                                <input type="hidden" id="id" name="id"  readonly="readonly" value="<?php if(isset($_REQUEST['xedit'])) {echo $id;}?>" />    

                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label>Membership Id<span class="text-danger">*</span></label>
                                                        <input list="browsers1"  class="form-control"   name="membership_id" id="membership_id"   placeholder="Type membership id" />
                                                        <datalist id="browsers1">
                                                            <?php
                                                            //`user_id`, `membership_status`, `membership_category`, `membership_id`, `user_track_url`, `name`SELECT * FROM `users` WHERE 1
                                                            ////`id`, `role`, `membership_id`, `email`, `password`, `verify_otp` SELECT * FROM `admin` WHERE 1

                                                            $q=mysqli_query($conn,"select  Distinct membership_id  from users order by user_id");
                                                            while($f=mysqli_fetch_array($q))
                                                                {
                                                                ?>
                                                                    <option value="<?php echo $f['membership_id'];?>">
                                                                <?php
                                                                }
                                                                ?>
                                                        </datalist>  




                                                    </div>  

                                                    <div class="col-sm-4 form-group">
                                                        <label>Email<span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" name="email" value="<?php if(isset($_REQUEST['xedit'])) {echo $email;}?>" placeholder="Enter email...">
                                                    </div> 



                                                    <div class="col-sm-4 form-group">
                                                        <label>Role<span class="text-danger">*</span></label>
                                                        <select class="form-control" name="role_name">
                                                            <option value="">Select role</option>
                                                            <?php
                                                            //SELECT * FROM `admin_role_master` WHERE 1`role_id`, `role_name` 
                                                            $sql_ctgy="SELECT * FROM admin_role_master WHERE 1";
                                                            $query_ctgy=mysqli_query($conn,$sql_ctgy);
                                                            while($ctgy=mysqli_fetch_array($query_ctgy)) 
                                                            {?>
                                                                <option value="<?php echo $ctgy['role_name'];?>" <?php if(isset($_REQUEST['xedit'])) if($ctgy['role_name']==$role) echo 'selected';?>><?php echo $ctgy['role_name'];?></option>
                                                            <?php
                                                            }
                                                            ?>  
                                                        </select>
                                                    </div>  

                                                </div>
                                                <div class="form-group">
                                               <button class="btn btn-success" type="submit" name="submit" >Submit</button>
                                                </div>
                                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

























            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Administrator Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="">Member ID</th>
                                            <th class="">Role</th>
                                            <th class="">Email Id</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    //`id`, `role`, `membership_id`, `email`, `password`, `verify_otp` SELECT * FROM `admin` WHERE 1
                                        $sql1="SELECT * FROM admin WHERE 1";
                                        $query1=mysqli_query($conn,$sql1);
                                        while($prd=mysqli_fetch_array($query1)) 
                                        {?>
                                            <tr>
                                                
                                                <td><b><?php echo $prd['membership_id'];?></b></td>
                                                <td><b><?php echo $prd['role_name'];?></b></td>
                                                <td><b><?php echo $prd['email'];?></b></td>
                                                <!--========= Impotant sweet alert js =================-->

                                                
                                                <form method="post" action="" enctype="multipart/form-data" onsubmit="return myFunction();">          
                                                    <input type="hidden" name="id" value="<?php echo $prd['id'];?>" />

                                                <td class="d-flex"><a href="create_administrator.php?xedit=1&id=<?php echo $prd['id'];?>"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:25px;"></i></a><button  style="border:none; color:#007bff" type="submit" name="delete"><i class="fa fa-trash" aria-hidden="true" style="font-size:25px;"></i></a></button></td>
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