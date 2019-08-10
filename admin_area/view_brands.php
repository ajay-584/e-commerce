

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<table width="795" align="center" bgcolor="#FFCC33">
     <tr align="center" bgcolor="#FFFF99">
      <td colspan="4"><h2>View All Brands</h2></td>
     </tr>
    
    <tr>
    
      <th><b>Brands ID</b></th>   
      <th><b>Brands Tirle</b></th>   
      <th><b>Edit</b></th>   
      <th><b>Delete</b></th>   
    
    </tr>
    
    <?php 
	
	   include("includes/db.php");
	   
	   $get_brands = "select * from brands";
	   
	   $run_brands = mysqli_query($con, $get_brands);
	   
	   while($row_brands=mysqli_fetch_array($run_brands)){
		   
		   $brand_id = $row_brands['brand_id'];
		   $brand_title = $row_brands['brand_title'];
		   
		 
	?>
    
    <tr align="center">
      <td><?php echo $brand_id; ?></td>
      <td><?php echo $brand_title; ?></td>
      <td><a href="index.php?edit_brand=<?php echo $brand_id; ?>">Edit</a></td>
      <td><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">Delete</a></td>
    </tr>
     <?php }  ?>
</table>

</body>
</html>