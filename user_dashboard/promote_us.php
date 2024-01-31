<?php
include_once("../db/conn.php");
require_once("../db/user_sequre.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>DASHBOARD</title>
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
                   <h4> PROMOTE US </h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== START PAGE CONTENT======================================================================-->

            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Promotional Link </div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php
                                        $qre=mysqli_query($conn,"SELECT * FROM users where email='$session_user_name'");
                                        if($fetch=mysqli_fetch_array($qre))
                                        {
                                            $membership_id=$fetch['membership_id'];
                                        ?>
                                        <div class="h6 pt-3"><b>HTML LINK : </b><span id="promotional_link"><?php echo $domain_url."?ref=".$membership_id;?></span></div>
                                        <button class="btn btn-primary mt-3" onclick="copy_promotional_link()">Copy text</button>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">HTML Banners Links</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <?php
                                    //`banner_code_id`, `banner_code_link`, `banner_code_image` SELECT * FROM `banner_code_master` WHERE 1
                                    $sql1="SELECT * FROM banner_code_master WHERE 1";
                                    $query1=mysqli_query($conn,$sql1);
                                    while($prd=mysqli_fetch_array($query1)) 
                                    {?>
                                        <div class="row mt-3">
                                            <div class="col-lg-3">
                                                <img src="../assets/img/banner_code_images/<?php echo $prd['banner_code_image'];?>" alt="">
                                            </div>
                                            <div class="col-lg-9">


                                                <?php
                                                    $banner_image_url=$domain_url."assets/img/banner_code_images/".$prd['banner_code_image'];
                                                    $ban_id=$prd['banner_code_id'];
                                                    $create_banner_id="html_banner_code".$ban_id;
                                                ?>
                                                
                                               <b> HTML Banner Codes : </b> 
                                               <p id=""> &lt;a href="<?php echo $domain_url."?ref=".$membership_id."&ban_id=".$ban_id;?>"&gt;&lt;img src="<?php echo $banner_image_url; ?>"&gt;&lt;/a&gt;</p>                                       
                                               
                                               <p hidden id="<?php echo $create_banner_id;?>"> <a href="<?php echo $domain_url."?ref=".$membership_id."&ban_id=".$ban_id;?>"><img src="<?php echo $banner_image_url; ?>"></a></p>                                       
                                                
                                               <button class="btn btn-primary mt-3" onclick="copy_html_banners_link('<?php echo $create_banner_id;?>')">Copy text </button>
                                            
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

   
  const copy_promotional_link = async () => {
    let text = document.getElementById('promotional_link').innerHTML;
    try {            
      await navigator.clipboard.writeText(text);
      console.log(text);
      alert("Content copied to clipboard !");
    } catch (err) {
      //console.error('Failed to copy: ', err);
      alert('Failed to copy: ', err);
    }
  }


  const copy_html_banners_link = async (id) => {
    let text = document.getElementById(""+id).innerHTML;
    //let text = document.getElementById('html_banners_link').innerHTML;
    try {            
      await navigator.clipboard.writeText(text);
      console.log(text);
      alert("Content copied to clipboard !");
    } catch (err) {
      //console.error('Failed to copy: ', err);
      alert('Failed to copy: ', err);
    }
  }

</script>
</body>

</html>