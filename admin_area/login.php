<?php 
session_start();
include("includes/db.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="login.css" media="all" />
</head>

<body>
<div class="login">
	<h1>Admin Login</h1>
    <form method="post">
    	<input type="text" name="admin_email" placeholder="Email" required="required" />
        <input type="password" name="admin_pass" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login"> Login</button>
    </form>
</div>

<h2 style="color:white; text-align:center; padding:20px;"><?php echo @$_GET['logout']; ?></h2> 

</body>
</html>

<?php

if(isset($_POST['login'])){
	
	$user_email = $_POST['admin_email'];
	$user_pass = $_POST['admin_pass'];
	
	$sel_admin = "select * from admins where admin_email='$user_email' AND admin_pass='$user_pass'";
	
	$run_admin = mysqli_query($con, $sel_admin);
	
	$check_admin = mysqli_num_rows($run_admin);
	
	if($check_admin==1){
		
		$_SESSION['admin_email']=$user_email;
		
		echo "<script>window.open('index.php?logged_in','_self')</script>";
		}
	 else {
		 
		 echo "<script>alert('Please give valid email and password!')</script>";
		 
		 }
	
	}



?>