<?php
include("includes/db.php");


//Getting the customer id
$c = $_SESSION['customer_email'];
	
	$get_c = "select * from customers where customer_email='$c'";
	
	$run_c = mysqli_query($con, $get_c);
	
	$row_c=mysqli_fetch_array($run_c);
		
		$customer_id = $row_c['customer_id'];


?>


<table width="800" align="center" bgcolor="#CCCCCC">

     <tr>
       <th>Order NO</th>
       <th>Due Ammount</th>
       <th>Invoice No</th>
       <th>Total Products</th>
       <th>Order Date</th>
        <th>Deliver/Cancel</th>
       <th>Status</th></tr>
       
     <?php
	 $get_orders = "select * from customers_orders where customer_id='$customer_id'";
	 
	 $run_orders = mysqli_query($con, $get_orders);
	 
	 $i=0;
	 
	 while($row_orders=mysqli_fetch_array($run_orders)){
		 
		 $order_id = $row_orders['order_id'];
		 $due_ammount = $row_orders['due_amount'];
		 $invoice_no = $row_orders['invoice_no'];
		 $products = $row_orders['total_products'];
		 $date = $row_orders['order_date'];
		 $status = $row_orders['order_status'];
		 $i++;
		 
		 if($status=='processing'){
			 
			 $status = 'processing';
			 }
			 
			 else{
				 $status = 'cancel';
				 
				 }
		 
		 
		 
		 echo "
		 
		 <tr align='center'>
		    
			<td>$i</td>
			<td>$due_ammount</td>
			<td>$invoice_no</td>
			<td>$products</td>
			<td>$date</td>
			<td>$status</td>
			<td><a href='cancel.php?order_id=$order_id'>Cancel Order</a></td>
		 
		 </tr>		 
		 
		 "; 
		 
		 }
	 
	 ?>  
       

</table>