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
    <title>Earnify</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
                   <h5><b>Under Review</b></h5>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->










<!--=========== START PAGE CONTENT======================================================================-->


            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-body">
                                <div class="row"  style="border:1px solid #487380;">
                                    <div class="col-lg-6">
                                        <p class="pt-3"><b>Reviewing From: 30/11/2023</b></p>
                                    </div>
                                    <div class="col-lg-3 ">
                                        <p class="pt-3"><b>Review will End on : 05/02/2024</b></p>
                                    </div>
                                    <div class="col-lg-3 ">
                                       <a href=""><p class="btn btn-success mt-2" style="float:right">Archive</p></a> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h5 class="pt-3 pb-3"><b>Currently Reviewing : 25 Sites</b></h5>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="d-flex" style="overflow-x:scroll;">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <div class="card mr-2" style="width:280px;">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Site Name : Xyz.com</h4>
                                                                <h4 class="card-title">Site Category : Paid to Click</h4>
                                                                <h4 class="card-title">Site Owned : xyz pvt ltd</h4>
                                                                <h4 class="card-title">Online Since : 24.11.2023</h4>
                                                            </div>
                                                        </div>                                                    
                                                    </td>

                                                    <td>
                                                        <div class="card mr-2" style="width:280px;">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Site Name : Xyz.com</h4>
                                                                <h4 class="card-title">Site Category : Paid to Click</h4>
                                                                <h4 class="card-title">Site Owned : xyz pvt ltd</h4>
                                                                <h4 class="card-title">Online Since : 24.11.2023</h4>
                                                            </div>
                                                        </div>                                                    
                                                    </td>
                                                    <td>
                                                        <div class="card mr-2" style="width:280px;">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Site Name : Xyz.com</h4>
                                                                <h4 class="card-title">Site Category : Paid to Click</h4>
                                                                <h4 class="card-title">Site Owned : xyz pvt ltd</h4>
                                                                <h4 class="card-title">Online Since : 24.11.2023</h4>
                                                            </div>
                                                        </div>                                                    
                                                    </td>
                                                    <td>
                                                        <div class="card mr-2" style="width:280px;">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Site Name : Xyz.com</h4>
                                                                <h4 class="card-title">Site Category : Paid to Click</h4>
                                                                <h4 class="card-title">Site Owned : xyz pvt ltd</h4>
                                                                <h4 class="card-title">Online Since : 24.11.2023</h4>
                                                            </div>
                                                        </div>                                                    
                                                    </td>
                                                    <td>
                                                        <div class="card mr-2" style="width:280px;">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Site Name : Xyz.com</h4>
                                                                <h4 class="card-title">Site Category : Paid to Click</h4>
                                                                <h4 class="card-title">Site Owned : xyz pvt ltd</h4>
                                                                <h4 class="card-title">Online Since : 24.11.2023</h4>
                                                            </div>
                                                        </div>                                                    
                                                    </td>
                                                    <td>
                                                        <div class="card mr-2" style="width:280px;">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Site Name : Xyz.com</h4>
                                                                <h4 class="card-title">Site Category : Paid to Click</h4>
                                                                <h4 class="card-title">Site Owned : xyz pvt ltd</h4>
                                                                <h4 class="card-title">Online Since : 24.11.2023</h4>
                                                            </div>
                                                        </div>                                                    
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>


                                        
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-lg-12">
                                        <h5>Review Report</h5>

                                        <form action="">
                                        <div class="row">
                                            <div class="col-sm-4 from-group">
                                                <label for="">Site name</label>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Select Site</option>
                                                    <option value="">xyz.com</option>
                                                </select>
                                            </div>
                                        </div>                                            
                                        </form>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-lg-12">
                                        <p>Availability : All Countries   &nbsp; &nbsp; &nbsp;   Restricted To : Russia  &nbsp; &nbsp; &nbsp;  Currency: Dollor / En   &nbsp; &nbsp; &nbsp;  Daily Earnings (approx) :  $85 &nbsp; &nbsp; &nbsp;  Method of Earnings: Task, sarvays</p>
                                      
                                        <p> Minimum Amount to Cashout : $50  &nbsp; &nbsp; &nbsp; Cashout Interval :  7 Days  &nbsp; &nbsp; &nbsp; Cashout Method : paypal &nbsp; &nbsp; &nbsp; Direct Referrals Availability : Yes  &nbsp; &nbsp; &nbsp;   Rented Referrals Availability : Yes </p>


                                        <p>Maximum Direct Referral for Free Members : 10000000  &nbsp; &nbsp; &nbsp; Maximum Rented Referral for Free Members : 1000000   &nbsp; &nbsp; &nbsp;   Upgradation Facilities :  Yes  </p>
                                        <p> Maximum Direct Referral for Upgraded Members : 100000     &nbsp; &nbsp; &nbsp;    Maximum Rented Referral for Upgraded Members : 1555000 </p>

                                        <p>Commission from Direct Referrals Earnings Levels: 50 level    &nbsp; &nbsp; &nbsp;   Commission percentage on Direct Affiliate Earnings : 100%  </p>


                                        <p>    Commission percentate from Rented Referrals  : 200%   &nbsp; &nbsp; &nbsp;   Commission from Clicks: 10%  &nbsp; &nbsp; &nbsp; Commission from Tasks : 57%     &nbsp; &nbsp; &nbsp;   Commission from Purchase: 44% </p>
                                    </div>

                                    <div class="col-lg-12">
                                        <h5 class="pt-3 pb-3 "><b>Payment Prooof</b></h5>
                                        <div class="row">
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 1 : <a href="">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 2 : <a href="">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 3 : <a href="">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 4 : <a href="">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 5 : <a href="">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 6 : <a href="">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 7 : <a href="">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 8 : <a href="">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 9 : <a href="">View</a>
                                            </div>
                                            <div class="col-lg-3 pb-3">
                                                Payment Proof 10 : <a href="">View</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input class="form-control" type="hidden" value="userid (not display)">
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="">Comments</label>
                                                <textarea class="form-control" name="" id="" cols="30" rows="5">

                                                </textarea>
                                            </div>
                                            <div class="col-sm-12 pt-2">
                                                <input type="submit" class="btn btn-success" value="submit">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-7" style="overflow:scroll; height:400px;">
                                        <h5><b>No of Post : 10</b></h5>


                                        <div class="row">
                                            <div class="col-lg-10">
                                                <p>  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi dicta tempore dolore asperiores enim. Laudantium numquam, corrupti fugit voluptas sit rem laborum quo quaerat voluptatibus consequatur minus, ad dolor pariatur.</p>
                                            </div>
                                            <div class="col-lg-2">
                                                <button style="border:none;background:transparent;">
                                                     <i class="fa-solid fa-thumbs-up" style="font-size:21px"></i>
                                                     <p> 100</p>
                                                    
                                                </button>
                                                <button style="border:none;background:transparent;">
                                                    <i class="fa-solid fa-thumbs-down" style="font-size:21px"></i>
                                                    <p> 50</p>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <p>  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi dicta tempore dolore asperiores enim. Laudantium numquam, corrupti fugit voluptas sit rem laborum quo quaerat voluptatibus consequatur minus, ad dolor pariatur.</p>
                                            </div>
                                            <div class="col-lg-2">
                                                <button style="border:none;background:transparent;">
                                                     <i class="fa-solid fa-thumbs-up" style="font-size:21px"></i>
                                                     <p> 100</p>
                                                    
                                                </button>
                                                <button style="border:none;background:transparent;">
                                                    <i class="fa-solid fa-thumbs-down" style="font-size:21px"></i>
                                                    <p> 50</p>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <p>  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi dicta tempore dolore asperiores enim. Laudantium numquam, corrupti fugit voluptas sit rem laborum quo quaerat voluptatibus consequatur minus, ad dolor pariatur.</p>
                                            </div>
                                            <div class="col-lg-2">
                                                <button style="border:none;background:transparent;">
                                                     <i class="fa-solid fa-thumbs-up" style="font-size:21px"></i>
                                                     <p> 100</p>
                                                    
                                                </button>
                                                <button style="border:none;background:transparent;">
                                                    <i class="fa-solid fa-thumbs-down" style="font-size:21px"></i>
                                                    <p> 50</p>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <p>  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi dicta tempore dolore asperiores enim. Laudantium numquam, corrupti fugit voluptas sit rem laborum quo quaerat voluptatibus consequatur minus, ad dolor pariatur.</p>
                                            </div>
                                            <div class="col-lg-2">
                                                <button style="border:none;background:transparent;">
                                                     <i class="fa-solid fa-thumbs-up" style="font-size:21px"></i>
                                                     <p> 100</p>
                                                    
                                                </button>
                                                <button style="border:none;background:transparent;">
                                                    <i class="fa-solid fa-thumbs-down" style="font-size:21px"></i>
                                                    <p> 50</p>
                                                </button>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-10">
                                                <p>  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi dicta tempore dolore asperiores enim. Laudantium numquam, corrupti fugit voluptas sit rem laborum quo quaerat voluptatibus consequatur minus, ad dolor pariatur.</p>
                                            </div>
                                            <div class="col-lg-2">
                                                <button style="border:none;background:transparent;">
                                                     <i class="fa-solid fa-thumbs-up" style="font-size:21px"></i>
                                                     <p> 100</p>
                                                    
                                                </button>
                                                <button style="border:none;background:transparent;">
                                                    <i class="fa-solid fa-thumbs-down" style="font-size:21px"></i>
                                                    <p> 50</p>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-10">
                                                <p>  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi dicta tempore dolore asperiores enim. Laudantium numquam, corrupti fugit voluptas sit rem laborum quo quaerat voluptatibus consequatur minus, ad dolor pariatur.</p>
                                            </div>
                                            <div class="col-lg-2">
                                                <button style="border:none;background:transparent;">
                                                     <i class="fa-solid fa-thumbs-up" style="font-size:21px"></i>
                                                     <p> 100</p>
                                                    
                                                </button>
                                                <button style="border:none;background:transparent;">
                                                    <i class="fa-solid fa-thumbs-down" style="font-size:21px"></i>
                                                    <p> 50</p>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <p>  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi dicta tempore dolore asperiores enim. Laudantium numquam, corrupti fugit voluptas sit rem laborum quo quaerat voluptatibus consequatur minus, ad dolor pariatur.</p>
                                            </div>
                                            <div class="col-lg-2">
                                                <button style="border:none;background:transparent;">
                                                     <i class="fa-solid fa-thumbs-up" style="font-size:21px"></i>
                                                     <p> 100</p>
                                                    
                                                </button>
                                                <button style="border:none;background:transparent;">
                                                    <i class="fa-solid fa-thumbs-down" style="font-size:21px"></i>
                                                    <p> 50</p>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <p>  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi dicta tempore dolore asperiores enim. Laudantium numquam, corrupti fugit voluptas sit rem laborum quo quaerat voluptatibus consequatur minus, ad dolor pariatur.</p>
                                            </div>
                                            <div class="col-lg-2">
                                                <button style="border:none;background:transparent;">
                                                     <i class="fa-solid fa-thumbs-up" style="font-size:21px"></i>
                                                     <p> 100</p>
                                                    
                                                </button>
                                                <button style="border:none;background:transparent;">
                                                    <i class="fa-solid fa-thumbs-down" style="font-size:21px"></i>
                                                    <p> 50</p>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <p>  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi dicta tempore dolore asperiores enim. Laudantium numquam, corrupti fugit voluptas sit rem laborum quo quaerat voluptatibus consequatur minus, ad dolor pariatur.</p>
                                            </div>
                                            <div class="col-lg-2">
                                                <button style="border:none;background:transparent;">
                                                     <i class="fa-solid fa-thumbs-up" style="font-size:21px"></i>
                                                     <p> 100</p>
                                                    
                                                </button>
                                                <button style="border:none;background:transparent;">
                                                    <i class="fa-solid fa-thumbs-down" style="font-size:21px"></i>
                                                    <p> 50</p>
                                                </button>
                                            </div>
                                        </div>
                                    </div>



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
</body>

</html>