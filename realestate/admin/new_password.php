<?php
$token=$_GET['token'];
include('include/config.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Register</title>
  <!-- Bootstrap core CSS-->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin.css" rel="stylesheet">
  
  <link href="assets/css/fancybox/jquery.fancybox-buttons.css" rel="stylesheet">
  <link href="assets/css/fancybox/jquery.fancybox-thumbs.css" rel="stylesheet">
  <link href="assets/css/fancybox/jquery.fancybox.css" rel="stylesheet">

  
  
</head>

<body class="bg-dark">

 
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Recover</div>
        <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" name="pwd" required type="password" placeholder="Password">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Conform Password</label>
            <input class="form-control" id="exampleInputPassword1" name="cpwd" required type="password" placeholder="Conform Password">
          </div>
          
		  <input class="btn btn-primary btn-block" type="submit" value="Register" onblur="registrstion()" name="save"/>
      <a href="index.php">Already A User? Log in</a>
    </br>
    <div class="info-container">
    <?php
				if(isset($_POST['save'])){
					$pe=$_POST['pwd'];
					$cpe=$_POST['cpwd'];
					
					if($pe==$cpe){
                        $q1="UPDATE users
                                SET password = '$pe'
                                WHERE token='$token'";
					
						if(mysqli_query($con,$q1))
    					{    
							header("location:index.php");
    					}
                    }
    			    else
    				{
                          echo "Enter Match Passeord";  
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
