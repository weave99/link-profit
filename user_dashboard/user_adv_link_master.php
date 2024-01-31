<?php
include_once("../db/conn.php");
require_once("../db/user_sequre.php");


if(isset($_POST['delete']))	
{
       $adv_id=$_POST['adv_id'];
       
      $qury=mysqli_query($conn,"DELETE FROM user_adv_addlink_master WHERE adv_id='$adv_id'");
      header("location:user_adv_addlink_master.php?err=Successfully deleted");
        
}

//`adv_id`, `user_id`, `parent_user_id`, `parents_site_id`, `sponsor_link`, `adv_status`, `submittion_date`SELECT * FROM `user_adv_addlink_master` WHERE 1
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
<?php if(isset($_REQUEST['xedit']))
         {
            //<!--`adv_id`, `user_id`, `parent_user_id`, `parents_site_id`, `sponsor_link`, `adv_status`, `submittion_date`
            // SELECT * FROM `user_adv_addlink_master` WHERE 1 -->

           $adv_id=$_REQUEST['adv_id'];
		   $qre=mysqli_query($conn,"SELECT * FROM user_adv_addlink_master where adv_id=$adv_id");
		   if($fetch=mysqli_fetch_array($qre))
			{
			  $adv_id=$fetch['adv_id'];
              $sponsor_link=$fetch['sponsor_link'];
              $parent_user_id=$fetch['parent_user_id'];
              $qre2=mysqli_query($conn,"SELECT * FROM user_adv_addlink_master where user_id=$parent_user_id");
              if($fetch2=mysqli_fetch_array($qre2)){
                $parent_sponsor_link=$fetch2['sponsor_link'];
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
                   <h5><b>ADVERTISE LINKS</b></h5>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->










<!--=========== START PAGE CONTENT======================================================================-->

        <?php if(isset($_REQUEST['xedit'])) { ?>

            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Update Your links</div>
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
                                        <!--`adv_id`, `user_id`, parents_site_name, `sponsor_link`, `adv_link` SELECT * FROM `user_adv_addlink_master` WHERE 1     -->

                                        <!-- `eop_site_id`, `eop_category_id`, `eop_site_name`, `eop_site_description`, `eop_site_status` SELECT * FROM `earning_opportunities_site_description` WHERE 1-->
                                        <input class="form-control" type="hidden" name="adv_id" id="adv_id" value="<?php if(isset($_REQUEST['xedit'])) {echo $adv_id;}?>">                         
                                        <input type="hidden" name="user_id" value="<?php echo $session_user_id; ?>">

                                            <div class="row">
                                                <div class="col-sm-5 form-group">
                                                    <label>Sponsor Link</label>
                                                    <input class="form-control" type="text" name="sponsor_link" id="sponsor_link"   placeholder="Enter parents link" value="<?php if(isset($_REQUEST['xedit'])) {echo $parent_sponsor_link;}?>"  require >
                                                </div>
                                                <div class="col-sm-5 form-group">
                                                    <label>Your Advertisement Link</label>
                                                    <input class="form-control" type="text" name="adv_link" id="adv_link" onClick="validate_site(this)"  placeholder="Enter advertisement link" value="<?php if(isset($_REQUEST['xedit'])) {echo $sponsor_link;}?>" require>
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

        <?php
        }
        else{?>

            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Upload Your links</div>
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
                                        <!--`adv_id`, `user_id`, parents_site_name, `sponsor_link`, `adv_link` SELECT * FROM `user_adv_addlink_master` WHERE 1     -->

                                        <!-- `eop_site_id`, `eop_category_id`, `eop_site_name`, `eop_site_description`, `eop_site_status` SELECT * FROM `earning_opportunities_site_description` WHERE 1-->
                                        <input class="form-control" type="hidden" name="adv_id" id="adv_id" value="<?php if(isset($_REQUEST['xedit'])) {echo $adv_id;}?>">                         
                                        <input type="hidden" name="user_id" value="<?php echo $session_user_id; ?>">

                                            <div class="row">
                                                <div class="col-sm-2 form-group">
                                                    <label>Site Name</label>
                                                    <select class="form-control" name="parents_site_id" id="parents_site_id"  require>
                                                        <option value="" selected disabled="none"> Choose category</option>
                                                        <?php
                                                        //`adv_id`, `user_id`, `parent_user_id`, `parents_site_id`, `sponsor_link`,
                                                        // `adv_status`, `submittion_date`SELECT * FROM `user_adv_addlink_master` WHERE 1

                                                        //`eop_site_id`, `eop_category_id`, `eop_site_name`, `eop_site_description`, `eop_site_status`SELECT * FROM `earning_opportunities_site_description` WHERE 1
                                                        
                                                        $sql_ctgy="SELECT * FROM earning_opportunities_site_description WHERE eop_site_id NOT IN (select parents_site_id from user_adv_addlink_master where user_id=$session_user_id)";
                                                        $query_ctgy=mysqli_query($conn,$sql_ctgy);
                                                        while($ctgy=mysqli_fetch_array($query_ctgy)) 
                                                        {?>
                                                            <option value="<?php echo $ctgy['eop_site_id'];?>" <?php if(isset($_REQUEST['xedit'])) if($ctgy['eop_site_id']==$eop_site_id) echo 'selected';?>><?php echo $ctgy['eop_site_name'];?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-5 form-group">
                                                    <label>Sponsor Link</label>
                                                    <input class="form-control" type="text" name="sponsor_link" id="sponsor_link"   placeholder="Enter parents link" value="<?php if(isset($_REQUEST['xedit'])) {echo $sponsor_link;}?>"  require >
                                                </div>
                                                <div class="col-sm-5 form-group">
                                                    <label>Your Advertisement Link</label>
                                                    <input class="form-control" type="text" name="adv_link" id="adv_link" onClick="validate_site(this)"  placeholder="Enter advertisement link" value="<?php if(isset($_REQUEST['xedit'])) {echo $sponsor_link;}?>" require>
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

        <?php
        }
        ?>
















            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Sponsor Link  Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="">Site Name</th>
                                            <th class="">Sponsor Links</th>
                                            <th class="">Your Links</th>
                                            <th class="">Submission Date</th>
                                           
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    //`adv_id`, `user_id`, `parent_user_id`, `parents_site_id`, `sponsor_link`, `adv_status`, `submittion_date` SELECT * FROM `user_adv_addlink_master` WHERE 1
                                    //<!-- `eop_site_id`, `eop_category_id`, `eop_site_name`, `eop_site_description`, `eop_site_status` SELECT * FROM `earning_opportunities_site_description` WHERE 1-->
                                        
                                    $sql1="SELECT * FROM user_adv_addlink_master WHERE user_id=$session_user_id";
                                    $query1=mysqli_query($conn,$sql1);
                                    while($prd=mysqli_fetch_array($query1)) 
                                        {

                                            $parents_site_id=$prd['parents_site_id'];
                                            $sql2="SELECT * FROM earning_opportunities_site_description WHERE eop_site_id=$parents_site_id";
                                            $query2=mysqli_query($conn,$sql2);
                                            if($prd2=mysqli_fetch_array($query2)) {
                                                $eop_site_name=$prd2['eop_site_name'];
                                            }

                                            $parent_user_id=$prd['parent_user_id'];
                                            $sql3="SELECT * FROM user_adv_addlink_master WHERE user_id=$parent_user_id";
                                            $query3=mysqli_query($conn,$sql3);
                                            if($prd3=mysqli_fetch_array($query3)) {
                                                $parent_sponsor_link=$prd3['sponsor_link'];
                                            }
                                        ?>
                                            <tr>
                                                
                                                <td><b><?php echo $eop_site_name;?></b></td>
                                                <td><b><?php echo $parent_sponsor_link;?></b></td>
                                                <td><b><?php echo $prd['sponsor_link'];?></b></td>
                                                <td><b><?php echo $prd['submittion_date'];?></b></td>
                                                <!--========= Impotant sweet alert js =================-->

                                                
                                                <form method="post" action="" enctype="multipart/form-data" onsubmit="return myFunction();">          
                                                    <input type="hidden" name="adv_id" value="<?php echo $prd['adv_id'];?>"/>

                                                <td class="d-flex"><a href="user_adv_addlink_master.php?xedit=1&adv_id=<?php echo $prd['adv_id'];?>"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:25px;"></i></a><button  style="border:none; color:#007bff" type="submit" name="delete"><i class="fa fa-trash" aria-hidden="true" style="font-size:25px;"></i></a></button></td>
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