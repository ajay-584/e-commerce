<?php 
session_start();
include("includes/db.php");

if(isset($_GET['order_id'])){
	$order_id = $_GET['order_id'];
	
	$cancel = 'cancel_order';
	
	$update_cancel_c = "UPDATE `customers_orders` SET `order_status`='$cancel' WHERE order_id='$order_id'";
	
	$run_cancel_c = mysqli_query($con, $update_cancel_c);
	
	$update_cancel = "UPDATE `pending_orders` SET `order_status`='$cancel' WHERE order_id='$order_id'";
	
	$run_cancel = mysqli_query($con, $update_cancel);
	
	if($run_cancel){
		
		echo "<script>alert('Your order cancelation has been suceesfull. Thank you!')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
		
		}
	
	}

?>

