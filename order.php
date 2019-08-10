<?php
include("includes/db.php");
include("functions/functions.php");	


//Getting customer ID
if(isset($_GET['c_id'])){
	
	$customer_id = $_GET['c_id'];
	
	$c_email = "select * from customers where customer_id='$customer_id' ";
	
	$run_email = mysqli_query($con, $c_email);
	
	$row_email = mysqli_fetch_array($run_email);
	
	$customer_email = $row_email['customer_email'];
	
	$customer_name  = $row_email['customer_name'];
	
	
	
	}
//Getting products price and no of items

 $ip_add = getIp();
	
	$total = 0;
	
	$sel_price = "select * from cart where ip_add='$ip_add'";
	
	$run_price = mysqli_query($db, $sel_price); 
	
	$status = 'processing';
	
	$invoice_no = mt_rand();
	
	$count_pro = mysqli_num_rows($run_price); 
	
	$i=0;
	
	while ($record=mysqli_fetch_array($run_price)){
		
		$pro_id = $record['p_id'];
		
		$pro_price = "select * from products where product_id='$pro_id'";
		
		$run_pro_price = mysqli_query($db,$pro_price);
		
		while ($p_price = mysqli_fetch_array($run_pro_price)){
			
			$product_name = $p_price['product_title'];
			
			$product_price = array($p_price['product_price']);
			
			$values = array_sum($product_price);
			
			$total +=$values;
			
			$i++;
			
			}				
		}

//Getting quantity from cart 

$get_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con, $get_cart);

$get_qty = mysqli_fetch_array($run_cart);

$qty = $get_qty['qty'];


if($qty==0){
	
	$qty = 1;
	
	$sub_total = $total;
	
	}

     else{
		 $qty=$qty;
		 
		 $sub_total=$total*$qty;
		 
		 }
		 
		 
		 $insert_order = "INSERT INTO `customers_orders`(`customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES ('$customer_id','$sub_total','$invoice_no','$count_pro',NOW(),'$status')";
		 
		 
		 $run_order = mysqli_query($con,$insert_order);
		 
			 
			 echo "<script>alert('Order successfully confirmed Thanks!')</script>";
			 echo "<script>window.open('customer/my_account.php','_self')</script>";
			 
			
			 
			 $insert_to_pending_orders = "INSERT INTO `pending_orders`(`customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES ('$customer_id','$invoice_no','$pro_id','$qty','$status')";
			 $run_pending_order = mysqli_query($con,$insert_to_pending_orders);
			 
			  $empty_cart = "delete from cart where ip_add='$ip_add'";
			 $run_empty = mysqli_query($con,$empty_cart);
			 
		
		
		
		$from = 'sliet584@gmail.com';
		
		$sub = 'Order Dtails';
		
		$message = "
		
		  <html>
		     <p>
			   Hello Dear <b>$customer_name</b> you hava ordered some products on our website worldmela.com </p>
		     <table align='center' width='600' border='2'>
			 
			 <tr><td><h2>Your Orders Details from worldmela.com</h2></td></tr>
			 
			 <tr>
			    
				<th>S.N</th>
				<th>Products Name</th>
				<th>Quantity</th>
				<th>Total Price</th>
				<th>Invoice No</th>
			 			 
			 </tr>
			 
			 <tr>
			    <td>$i</td>
				<td>$product_name</td>
			    <td>$qty</td>
				<td>$sub_total</td>
				<td>$invoice_no</td>			 
			 </tr>
			 </table>
			 
			 <h3>Your Order will deliver under 3days.</h3>
		
		  <h3>Thanks for visiting on worldmela.com </h3>
			
		</html>
		";
		
		mail($customer_email,$sub,$message,$from);	
?>

  

