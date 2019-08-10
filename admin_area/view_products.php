
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
 if(isset($_GET['view_products'])){

?>

<table align="center" width="795" bgcolor="#FFFFFF">

   <tr align="center">
      <td colspan="8"><h2>View All Products</h2></td>
   </tr>
   
   <tr>
   
       <th>Product No</th>
       <th>Title</th>
       <th>Image</th>
       <th>Price</th>
       <th>Total Sold</th>
       <th>Status</th>
       <th>Edit</th>
       <th>Delete</th>     
   </tr>
   <?php
   
    include("includes/db.php");
	
	$i =0;
	
	$get_pro = "select * from Products";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	while($row_pro=mysqli_fetch_array($run_pro)){
		
		$p_id = $row_pro['product_id'];
		$p_title = $row_pro['product_title'];
		$p_img = $row_pro['product_img1'];
		$p_price = $row_pro['product_price'];
		$status = $row_pro['product_status'];
		
		
		$i++;
		
   
   ?>
   <tr align="center">
   
     <td><?php echo $i; ?></td>
     <td><?php echo $p_title; ?></td>
     <td><img src="product_images/<?php echo $p_img; ?>" width="80" height="80"></td>
     <td><?php echo $p_price; ?></td>
     <td>
     <?php
	 $get_sold = "select * from pending_orders where product_id='$p_id'";
	 
	 $run_sold = mysqli_query($con, $get_sold);
	 
	 $count = mysqli_num_rows($run_sold);
	 
	 echo $count;
	 
	 ?>
     </td>
     <td>
        <?php echo $status; ?>
     </td>
     <td><a href="index.php?edit_pro=<?php echo $p_id ?>">Edit</a></td>
     <td><a href="delete_pro.php?delete_pro=<?php echo $p_id ?>">Delete</a></td>
   
   </tr>
   
   <?php } ?>
   
   </table>
   
    <?php }
	 ?>

</body>
</html>