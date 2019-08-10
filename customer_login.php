<?php 

@session_start();

include("includes/db.php");

?>
<div>
  
  <form action="checkout.php" method="post">
   
   <table width="800" bgcolor="#FFFFFF" align="center" height="200">
   
   
   <tr align="center">
   <td colspan="4"><h2>LOGIN OR REGISTRATION</h2></td>
   </tr>
   
   <tr>
     <td align="right"><b>Enter your email:</b></td>
     <td align="left"><input type="text" name="c_email" value="" /></td>
   </tr>
   
   <tr>
   <td align="right"><b>Enter Password:</b></td>
   <td align="left"> <input type="password" name="c_pass" value="" /></td>
   </tr>
   
   <tr align="center"><td colspan="4"><a href="checkout.php?forgot_pass">Forgot Password</a></td></tr>
   
   <tr align="center">
   <td colspan="4" ><input type="submit" name="c_login" value="Login" /></td>
   </tr>
   
   
   
   </table>
    
  </form>
  <?php 
   if(isset($_GET['forgot_pass'])){
	   
	   echo "
	     
	    <div align='center'>
		  
		  <b>Enter your register email for recover password</b>
		  <form action='' method='post'>
		  <input type='text' name='c_email' placeholder='Email' required /><br>
		  
		  <input type='submit' name='forgot_pass' value='Submit' />
		  </form>
		</div>	   
	   ";
    if(isset($_POST['forgot_pass'])){
		
		$c_email = $_POST['c_email'];
		
		$sel_c = "select * from customers where customer_email='$c_email'";
		
		$run_c = mysqli_query($con, $sel_c);
		
		$check_c = mysqli_num_rows($run_c);
		
		$row_c = mysqli_fetch_array($run_c);
		
		$c_name = $row_c['customer_name'];
		$c_pass = $row_c['customer_pass'];
		
		if($check_c==0){
			
			echo "<script>alert('The email is not registered!')</script>";
			exit();
			}
		  else {
			  
			  $from = 'sliet584@gmail.com';
			  
			  $sub = 'Your Password';
			  
			  $message = "
			  <html>
			     
			  <h3> Dear $c_name </h3>
			  <p>You requested for password at <b>www.worldmela.com</b></p>
			  <b>Your Password is </b><span style'color:red;'>$c_pass</span>
			  
			  <h3> Thanks for visiting on my website</h3>
			  
			  
			  </html>
			  		
			  ";
			  mail($c_email,$sub,$message,$from);
			  
			  echo "<script>alert('Password sent on email. Please check your email!')</script>";
			  echo "<script>window.open('checkout.php','_self')</script>";
			  }
		}

	   }
  ?>
  
  
     <h2 style="float:right; padding:10px;"><a href="customer_register.php">New? Register Here</a></h2>
  
  </div>
  
  
  
  <?php
  if(isset($_POST['c_login'])){
	  
	  $customer_email = $_POST['c_email'];
	  $customer_pass = $_POST['c_pass'];
	  
	  $sel_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
	  
	  $run_customer = mysqli_query($con, $sel_customer);
	  
	  $check_customer = mysqli_num_rows($run_customer);
	  
	  $get_ip = getIp();
	  
	  $sel_cart = "select * from cart where ip_add='$get_ip'";
	  
	  $run_cart = mysqli_query($con, $sel_cart);
	  
	  $check_cart = mysqli_num_rows($run_cart);
	  
	  if($check_customer==0){
		  
		  echo "<script>alert('Email Or Password is incorrect, please try again!')</script>";
		  
		  exit();
		  
	  }
		  if($check_customer==1 AND $check_cart==0){
			  
			  $_SESSION['customer_email']=$customer_email;
			  
			   echo "<script>alert('you successfully logged in, you can order now!')</script>";
				  
			  echo "<script>window.open('customer/my_account.php','_self')</script>";
			  
			  }
			  
			  else{
				  
				   $_SESSION['customer_email']=$customer_email;
				   
				   echo "<script>alert('you successfully logged in, you can order now!')</script>";
				  
				  include("payment_options.php");
				  
				  }		  
		  
	     
	 
	  
	  }
  
  
  
  ?>
  