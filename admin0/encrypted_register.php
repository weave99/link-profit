<?php 
include_once("../db/conn.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';




if(isset($_POST['register']))	
{
    $email=trim($_POST['email']);
    $genarate_otp= random_int(100000, 999999);
	//email `userid`, `password`SELECT * FROM `admin` WHERE 1



            // Check if the email is already registered
            $checkUserQuery = "SELECT * FROM admin WHERE email = '$email'";
            $result = $conn->query($checkUserQuery);

            if ($result->num_rows > 0) {
                echo '<script>alert("Email already registered. Please use a different Email.")</script>';
            } 
            else {

                // Insert user data into the database
                $insertQuery = "INSERT INTO admin (email, verify_otp)
                                VALUES ('$email', '$genarate_otp')";

                $query=mysqli_query($conn,$insertQuery);
                if($query){

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
                      
                        header("Location:encrypted_register_verify_otp.php?email=".$email);
                    }
                    else{
                      echo "<script>alert('Error please try again')</script>";
                    }
                }
                else {
                    echo "Error: " . $insertQuery . "<br>" . $conn->error;
                }
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
						Register
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" id="email" placeholder="User ID">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

				
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" name="register">
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