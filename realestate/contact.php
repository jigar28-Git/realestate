<?php
 session_start();
 include'include/config.php';  
 include('include/header.php');
 ?>
<!-- main header end -->

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Contact Us</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php">Home</a></li>
                <li class="active">Contact Us</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner end -->

<!-- Contact 1 start -->
<div class="contact-1 content-area-7">
    <div class="container">
        <div class="main-title">
            <h1>Contact Us</h1>
        </div>

        <div class="row">
            <div class="col-lg-7 col-md-7 col-md-7">
                <form action="#" method="GET" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group name">
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group email">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group subject">
                                <input type="text" name="subject" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group number">
                                <input type="text" name="phone" class="form-control" placeholder="Number">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group message">
                                <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <input class="send-btn" type="submit" value="Send Message" name="save"/>
                        </div>
                    </div>
                
                    <?php
				if(isset($_POST['save'])){

					$ue=$_POST['name'];
					$ee=$_POST['email'];
					$sub=$_POST['subject'];
					$ph=$_POST['phone'];
					$msg=$_POST['message'];
					
					$q1="INSERT INTO `contact`(`name`, `email`, `subject`, `number`, `message`) 
					VALUES ('$ue','$ee','$sub','$ph','$msg')";
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
							header("location:contact.php");
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

            <div class=" offset-lg-1 col-lg-4 offset-md-0 col-md-5">
                <div class="contact-info">
                    <h3>Contact Info</h3>
                    <div class="media">
                        <i class="fa fa-map-marker"></i>
                        <div class="media-body">
                            <h5 class="mt-0">Office Address</h5>
                            <p>--------------------</p>
                        </div>
                    </div>
                    <div class="media">
                        <i class="fa fa-phone"></i>
                        <div class="media-body">
                            <h5 class="mt-0">Phone Number</h5>
                            <p>Office<a href="tel:0477-0477-8556-552">: +918200 020 676</a> </p>
                        </div>
                    </div>
                    <div class="media mrg-btn-0">
                        <i class="fa fa-envelope"></i>
                        <div class="media-body">
                            <h5 class="mt-0">Email Address</h5>
                            <p><a href="#">info@propertyhunters.gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact 1 end -->

<!-- Google map start -->
<!-- Google map end -->

<!-- Footer start -->
<?php include('include/footer.php');?>