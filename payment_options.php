
<!DOCTYPE html>
<html>
   
   <head>
     <title>Payment Option</title>
   </head>
   
<body>
<?php
	
include("includes/db.php");

?>

<div align="center" style="padding:20px; color:#C33">

<h1>Payment Option</h1><br>

<?php


$c_e = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$c_e'";

$run_customer = mysqli_query($con, $get_customer);

$customer = mysqli_fetch_array($run_customer);

$customer_id = $customer['customer_id']



?>
<table align="center" width="700" height="150" bgcolor="#FFFFFF" >


 <tr>
  <td align="center" style="padding:10px;"><a href="http//www.paypal.com"><h2>Online Payment</h2></a></td>
 </tr>
 <tr>
 <td align="center"><a href="order.php?c_id=<?php echo $customer_id; ?>"><h2>Cash On Delivery</h2></a></td>
 </tr>

</table><br>


&nbsp;&nbsp;&nbsp;<b>If you selected "Pay Ofline " option then please check your email to the invoice no for your orders</b>



</div>


</body>
</html>