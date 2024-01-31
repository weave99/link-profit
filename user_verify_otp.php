<?php
include_once("db/conn.php");

//`id`, `full_name`, `email`, `country`, `state`, `city`, `zip_code`, `password`, `user_status`, `login_time` SELECT * FROM `users` WHERE 1
if(isset($_POST['send']))
{
    $email = $_REQUEST['email'];
    $verify_otp = $_POST['verify_otp'];

    // Login History Store
    $login_date=date('d/m/y');
    $login_time = date("h:i");
    $logout_time = date("h:i",time() + 7200);

    

        $checkVerifyQuery = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($checkVerifyQuery);

        if($result->num_rows > 0) {

            $sql="SELECT * FROM users WHERE verify_otp='$verify_otp'";
            $query=mysqli_query($conn,$sql);
            if($r=mysqli_fetch_array($query))
            {
                //$account_status= $_POST['account_status'] ;==1
                mysqli_query($conn,"UPDATE users set account_status='1', verify_otp='". NULL ."' where email='$email'");

                header("location:user_login.php");
            }
            else{
                    header("location:user_verify_otp.php?email=".$email."&msg=Invalide Code");
                }
        } 
        else {
            echo '<script>alert("Email No Did not Match ! Please check your email")</script>';
        }
}
?>

<!DOCTYPE html>
<html lang="eng">

<head>
    <title>Earnify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/magnific-popup.css">
    <link type="text/css" rel="stylesheet" href="assets/css/jquery.selectBox.css">
    <link type="text/css" rel="stylesheet" href="assets/css/dropzone.css">
    <link type="text/css" rel="stylesheet" href="assets/css/rangeslider.css">
    <link type="text/css" rel="stylesheet" href="assets/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/leaflet.css">
    <link type="text/css" rel="stylesheet" href="assets/css/slick.css">
    <link type="text/css" rel="stylesheet" href="assets/css/slick-theme.css">
    <link type="text/css" rel="stylesheet" href="assets/css/slick-theme.css">
    <link type="text/css" rel="stylesheet" href="assets/css/map.css">
    <link type="text/css" rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">


    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="assets/css/skins/default.css">

</head>
<body>


<!-- ==== Header === -->
<?php include("website_header.php");?>
<!-- ==== Header === -->



<div class="container pb-2 pt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-5 mt-5 mb-5 p-4 pt-5 pb-5" style="position:relative; left:50%; transform: translate(-50%, 0); background-color: #fff;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px;">
               <h6 class="text-center">One Confirmation code has been send to your email id</h6>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="form-create-account-email"></label>
                        <input type="text" class="form-control" name="verify_otp" placeholder="Enter Code" required>
                    </div>
                    <p class="text-danger"><b><?php if (isset($_REQUEST["msg"])) {$msg = $_REQUEST["msg"];echo $msg ;}?></b></p>
                    <div class="form-group clearfix">
                        <button type="submit" class="btn btn-sm btn-theme" name="send" style="position: relative; float: right;">Verify</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- ==== Footer === -->
<?php include("website_footer.php");?>
<!-- ==== Footer === -->


<!-- External JS libraries -->
<script src="assets/js/jquery-2.2.0.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.selectBox.js"></script>
<script src="assets/js/rangeslider.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.filterizr.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/backstretch.js"></script>
<script src="assets/js/jquery.countdown.js"></script>
<script src="assets/js/jquery.scrollUp.js"></script>
<script src="assets/js/particles.min.js"></script>
<script src="assets/js/typed.min.js"></script>
<script src="assets/js/dropzone.js"></script>
<script src="assets/js/jquery.mb.YTPlayer.js"></script>
<script src="assets/js/leaflet.js"></script>
<script src="assets/js/leaflet-providers.js"></script>
<script src="assets/js/leaflet.markercluster.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/maps.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4omYJlOaP814WDcCG8eubXcbhB-44Uac"></script>
<script src="assets/js/ie-emulation-modes-warning.js"></script>
<!-- Custom JS Script -->
<script  src="assets/js/app.js"></script>
</body>

</html>