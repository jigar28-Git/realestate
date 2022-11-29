<?php 
include('include/header.php');
include'include/config.php';
extract($_REQUEST);

$id=$_REQUEST['id'];

$query=mysqli_query($con,"select * from users where id='$id'");
$res=mysqli_fetch_array($query);

$fn=$res[1];
$img=$res['image'];
$sold_res=$res['sold'];


if(isset($submit))
{
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $lname=$_POST['lname'];
    $npwd=$_POST['npwd'];
    $user=mysqli_filter($INPUT_POST,'user');

  $file=$_FILES['file']['name'];

  if($file=="")
  {

  $query="update users set firstname='$fname',lastname='$lname',email='$email',password='$npwd',user='$user' WHERE id=$id ";
  mysqli_query($con,$query); 

  $msg='<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Property Data Update successful.
  </div>';
    echo"<script>window.location.href='dashboard.php';</script>";
  }
  else
  {


    $query="update users set fname='$fname',lname='$lname',email='$email',npwd='$npwd',user='$user'";
  mysqli_query($con,$query);
  unlink("images/property_image/$img");

  move_uploaded_file($_FILES['file']['tmp_name'],"images/property_image/".$_FILES['file']['name']); 


   $msg='<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Property Data Update successful.
  </div>';

echo"<script>window.location.href='view_property.php';</script>";

   }          
}

         ?>        

    <!-- Header -->
    
    <section>
       
       <!-- Left Sidebar -->
<?php include('include/sidebar.php');?>
        <!-- #END# Left Sidebar -->
        <section class="content">
        <div class="container-fluid">
            <?php echo @$msg;?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-align: center;">
                                User Profile
                                
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="row clearfix">

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="fname" class="form-control" value="<?php $fn ?>"><?php echo $fn ?></input>
                                                <label class="form-label">First name</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="lname" class="form-control">
                                                <label class="form-label">Last name</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="email" class="form-control">
                                                <label class="form-label">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="npwd" class="form-control">
                                                <label class="form-label">New Passsword</label>
                                            </div>
                                            <small><i>Leave this blank if you dont want to change the password.</i></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                <div class="form-line">
                                <select name="user" id="usear" class="">
                                    <option value="user">User</option>
									<option value="creater">Creater</option>
									<option value="admin">Administrator</option>
								</select>
                                </div>
                                </div>
                                </div>
                                <div class="col-lg-14 col-md-16 col-sm-20 col-xs-20" style="text-align: left;">                                     
                                        <input type="submit" name="submit" class="btn btn-primary btn-lg m-l-15 waves-effect" value="Submit">
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php include'include/footer.php';?>