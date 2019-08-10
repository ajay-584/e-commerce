
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<table width="795" align="center" bgcolor="#FFCC33">
     <tr align="center" bgcolor="#FFFF99">
      <td colspan="4"><h2>View All Categories</h2></td>
     </tr>
    
    <tr>
    
      <th><b>Category ID</b></th>   
      <th><b>Category Tirle</b></th>   
      <th><b>Edit</b></th>   
      <th><b>Delete</b></th>   
    
    </tr>
    
    <?php 
	
	   include("includes/db.php");
	   
	   $get_cats = "select * from categories";
	   
	   $run_cats = mysqli_query($con, $get_cats);
	   
	   while($row_cats=mysqli_fetch_array($run_cats)){
		   
		   $cat_id = $row_cats['cat_id'];
		   $cat_title = $row_cats['cat_title'];
		   
		 
	?>
    
    <tr align="center">
      <td><?php echo $cat_id; ?></td>
      <td><?php echo $cat_title; ?></td>
      <td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
      <td><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
    </tr>
     <?php }  ?>
</table>

</body>
</html>