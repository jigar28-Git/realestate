<?php include '.\include\config.php' ?>
<?php
ob_start();
session_start();



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('.\PHPMailer\PHPMailer.php');
require('.\PHPMailer\SMTP.php');
require('.\PHPMailer\Exception.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>
  <!-- Bootstrap core CSS-->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin.css" rel="stylesheet">

  
  
</head>

<body class="bg-dark">

 
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Send Email</div>
        <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          		  
		  <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" name="email" required type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
		  <input class="btn btn-primary btn-block" type="submit" value="SEND" name="save"/>
		
          <?php
				if(isset($_POST['save'])){
					$email= mysqli_real_escape_string($con, $_POST['email']);
					
					$q1="SELECT * FROM users WHERE email='$email'";
                    
                    $q_result=mysqli_query($con,$q1);
                    $result=mysqli_num_rows($q_result);


						if($result==1)
    					{ 
                            $userdata= mysqli_fetch_array($q_result);

                             $username=$userdata['firstname'];
                             $token=$userdata['token'];

                            $link="http://localhost/realestate/admin/new_password.php?token=$token";
                            $mail = new PHPMailer(true);

                            $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com';
                            $mail->SMTPAuth = true; 
                            // Gmail ID which you want to use as SMTP server
                            $mail->Username = 'jkalariya487@rku.ac.in';
                            // Gmail Password
                            $mail->Password = 'Rku@123456';
                            $mail->Port = 587;

                            // Email ID from which you want to send the email
                            $mail->setFrom('jigarkalriya123@gmail.com');
                            // Recipient Email ID where you want to receive emails
                            $mail->addAddress($email);

                            $mail->isHTML(true);
                            $mail->Subject = 'Password Recover';
                            $mail->Body = "<h4>Hello, $username </h4><br> Click Here For Recover Your Password <br>URL : $link";

                            if($mail->send()){
                                header("location:index.php");
                            }
                            else{
                                echo "error";
                            }
			            }
                    }
			?>
        
        </form>
        
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  
 
</body>
	
</html>