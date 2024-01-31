<?php
include_once("../db/conn.php");

//`id`, `full_name`, `email`, `country`, `state`, `city`, `zip_code`, `password`, `user_status`, `login_time` SELECT * FROM `users` WHERE 1
if(isset($_POST['verify']))	
{

	$membership_id=$_REQUEST['membership_id'];
	$role_name=$_REQUEST['role_name'];
    $verify_otp=trim($_POST['verify_otp']);	

    // Retrieve user data from the database
	$sql = "SELECT * FROM admin WHERE membership_id='$membership_id'";
	$query=mysqli_query($conn,$sql);
	if($fetch=mysqli_fetch_array($query)) {

		if($fetch['role_name']==$role_name){

			if($fetch['verify_otp']==$verify_otp){

				$update=mysqli_query($conn,"UPDATE admin set verify_otp='" . NULL . "' where membership_id='$membership_id' and role_name='$role_name'");
				
				
				if($update){
					session_start();
					$_SESSION['membership_id']=$membership_id;
					$_SESSION['role_name']=$role_name;
					header("location:dashboard.php");
				}

			}
			else{
                header("location:encrypted_login_verify_otp.php?membership_id=".$membership_id."&role_name=".$role_name."&msg=Invalide Code");
            }
		}
    } 
    else {
        echo '<script>alert("Email No Did not Match ! Please check your email")</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="../assets/img/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin-source/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin-source/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin-source/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="admin-source/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin-source/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin-source/css/util.css">
	<link rel="stylesheet" type="text/css" href="admin-source/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic" >
					<img src="admin-source/images/logo.png" width="100%" alt="IMG">
				</div>

				<form action="" method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						Verify OTP
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="verify_otp" id="verify_otp" placeholder="Enter OTP">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<p class="text-danger text-center"><b><?php if (isset($_REQUEST["msg"])) {$msg = $_REQUEST["msg"];echo $msg ;}?></b></p>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" name="verify">
							Submit
						</button>
					</div>

					<!--
					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Password
						</a>
					</div>
					-->
					
					<div class="text-center p-t-136">
					<!--<a class="txt2" href="sskm-admin-register.php">
							Register Now
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					-->
					</div>
					
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="admin-source/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="admin-source/vendor/bootstrap/js/popper.js"></script>
	<script src="admin-source/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="admin-source/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="admin-source/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>