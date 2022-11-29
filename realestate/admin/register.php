<?php
session_start();
include'include/config.php'; 
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
      <div class="card-header">Register</div>
        <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          <?php 
		  if(isset($err))
		  {
			echo '<div class="form-group">
            <h6 class="bg-danger" style="padding:10px;border-radius:5px">'.$err.'</h6></div>';	  
		  }
		  ?>
		   		  
		  <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input class="form-control" id="exampleInputEmail1" name="firstname" required type="text" placeholder="Enter Username">
          </div>

		  <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <i style="font-style: normal; font-size: 15px;">@</i>
            <input class="form-control" id="exampleInputEmail1" name="email" required type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" name="pwd" required type="password" placeholder="Password">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Conform Password</label>
            <input class="form-control" id="exampleInputPassword1" name="cpwd" required type="password" placeholder="Conform Password">
          </div>
          <label for="">User:</label>
							<div class="form-group">
								<select name="user" id="usear" class="form-control">
									<option value="user">User</option>
									<option value="creater">Admin</option>
									<option value="admin">Builder</option>
								</select>
                <label for="">Gender:</label>
                <select name="gender" id="" class="form-control">	
                <option value="male">Male</option>
								  <option value="femal">Female</option>
								</select>
							</div>
		  <input class="btn btn-primary btn-block" type="submit" value="Register" onblur="registrstion()" name="save"/>
      <a href="index.php">Already A User? Log in</a>
    </br>
    <div class="info-container">
    <?php
				if(isset($_POST['save'])){
					$ue=$_POST['firstname'];
					$ee=$_POST['email'];
					$user=$_POST['user'];
					$pe=$_POST['pwd'];
					$ge=$_POST['gender'];
					$cpe=$_POST['cpwd'];
					$token=uniqid();
					
					$q1="INSERT INTO `users`(`firstname`, `email`, `user`, `password`, `gender`, `token`) 
					VALUES ('$ue','$ee','$user','$pe','$ge','$token')";
					if($ue==""){
						?>
							<script>
								function registration(){
									alert("Enter user name");
								}
							</script>
						<?php
					}
					else if($ue==" "){
						?>
							<script>
								function registration(){
									alert("Enter proper user name");
								}
							</script>
						<?php
					}
					else if($ee==""){
						?>
							<script>
								function registration(){
									alert("Enter Email");
								}
							</script>
						<?php
					}
					else if($ee==" "){
						?>
							<script>
								function registration(){
									alert("Enter proper Email");
								}
							</script>
						<?php
					}
					else if($pe==""){
						?>
							<script>
								function registration(){
									alert("Enter password");
								}
							</script>
						<?php
					}
					else if($pe==" "){
						?>
							<script>
								function registration(){
									alert("Enter proper password");
								}
							</script>
						<?php
					}
					else if($cpe==""){
						?>
							<script>
								function registration(){
									alert("Enter conform password");
								}
							</script>
						<?php
					}
					else if($cpe==" "){
						?>
							<script>
								function registration(){
									alert("Enter proper conform password");
								}
							</script>
						<?php
					}
					else if($pe!=$cpe){
						?>
							<script>
								function registration(){
									alert("Password is not match");
								}
							</script>
						<?php
					}
					else{
						if(mysqli_query($con,$q1))
    					{    
					
							$_SESSION['ue']=$ue;
							$_SESSION['pe']=$pe;
							$_SESSION['user']=$user;
							header("location:index.php");
    					}
    					else
    					{
        					?>
								<script>
									function registration(){
										alert("user name and email is already exist");
									}
								</script>
							<?php
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
