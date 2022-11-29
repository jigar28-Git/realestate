<?php
include('include/config.php');
$un=$_POST['username'];
$em=$_POST['email']
$pwd=$_POST['pwd'];
$reg=$_POST['reg'];
if(isset($reg))
{
$que=mysqli_query($con,"insert into admin values('$un','$em','$cpwd')";	
if($row)
{
$_SESSION['email']=$email;
header('location:dashboard.php');
}	
else
{
$err="Pls Enter Valid Email or Password";	
}		
}
?>

