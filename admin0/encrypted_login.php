<?php 
include "../db/conn.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';




if(isset($_POST['login']))	
{	
//`id`, `role_name`, `membership_id`, `email`, `password`, `verify_otp`, `lock_user` SELECT * FROM `admin` WHERE 1
	$role_name=trim($_POST['role_name']);
    $membership_id=trim($_POST['membership_id']);
    $password=trim($_POST['password']);
	$default_password="Password@123";
    $genarate_otp= random_int(100000, 999999);



            // Retrieve user data from the database
			$sql = "SELECT * FROM admin WHERE membership_id='$membership_id'";
			$query=mysqli_query($conn,$sql);
			if($fetch=mysqli_fetch_array($query)) {
				$email=$fetch['email'];

				if($fetch['role_name']==$role_name){

					if($fetch['lock_user']*1!=1){

						// Verify the password
						if(password_verify($password, $fetch['password'])) {

							if($fetch['password']==$default_password){

								header("Location:encrypted_set_password.php?membership_id=".$membership_id);
							}
							else{
								$insertQuery=mysqli_query($conn,"UPDATE admin set verify_otp='$genarate_otp' where email='$email'");
								if($insertQuery){
									$mail = new PHPMailer(true);
									$mail->isSMTP();
									$mail->Host = 'smtp.gmail.com';
									$mail->SMTPAuth = true;
									$mail->Username = 'check.formsubmission@gmail.com';
									$mail->Password = 'mehzqzvfwwggxpzo';
									$mail->SMTPSecure = 'ssl';
									$mail->Port = 465;
									$mail->setFrom($email,'Earnify Confirmation Code');
									$mail->addAddress($email);
									$mail->isHTML(true);
									$mail->Subject = "Earnify Send a confirmation code" ;
									$mail->Body = "<br> Your Confirmation Code is: </b>".$genarate_otp;
								
								
									if($mail->send()){
									
										header("Location:encrypted_login_verify_otp.php?membership_id=".$membership_id."&role_name=".$role_name);
									}
									else{
									echo "<script>alert('Error please try again')</script>";
									}
								}
							}


						}
						else {
							header("location:encrypted_login.php?msg=Invalide Password");
						}

					}
					else{
						header("location:encrypted_login.php?msg=Your Login Access Has Been Denited");
					}
				}
				else{
					header("location:encrypted_login.php?msg=Invalide Role");
				}
	
			}
			else{
				header("location:encrypted_login.php?msg=Invalide User");
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
				<div class="login100-pic pt-5 mt-5" >
					<img src="admin-source/images/logo.png" width="100%" alt="IMG">
				</div>

				<form action="" method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						Log In
					</span>
					<div class="wrap-input100 validate-input">
						<select class="form-control" name="role_name" required>
							<option value="">Select role</option>
							<?php
							//`role_id`, `role_name` SELECT * FROM `admin_role_master` WHERE `role_id`, `role_name` 1
                            $sql_ctgy="SELECT * FROM admin_role_master WHERE 1";
                            $query_ctgy=mysqli_query($conn,$sql_ctgy);
                            while($ctgy=mysqli_fetch_array($query_ctgy)) 
                            {?>
                                <option value="<?php echo $ctgy['role_name'];?>"><?php echo $ctgy['role_name'];?></option>
                            <?php
                            }
                            ?>  
						</select>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="form-control" type="text" name="membership_id" id="membership_id" placeholder="User ID" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
						<span class="focus-input100"></span>
					</div>
					<p class="text-danger text-center"><b><?php if (isset($_REQUEST["msg"])) {$msg = $_REQUEST["msg"];echo $msg ;}?></b></p>
					<div class="container-login100-form-btn">
						<button type="submit" name="login" class="login100-form-btn">
							Login
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