 <?php 
 
     include("includes/db.php");
	 
	 
	 if(isset($_GET['edit_brand'])){
		 
		 $brand_id = $_GET['edit_brand'];
		 
		 $edit_brand = "select * from brands where brand_id='$brand_id'";
		 
		 $run_edit = mysqli_query($con, $edit_brand);
		 
		 $row_edit = mysqli_fetch_array($run_edit);
		
		  $brand_edit_id = $row_edit['brand_id']; 
		 $brand_title = $row_edit['brand_title'];
		 
		 } 
  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<br><form action="" method="post">

  <center> <h2>Edit This Brans</h2>
   
 <br> <input type="text" name="brand_title1" value="<?php echo $brand_title; ?>"/>
 
  <input type="submit" name="update_brand" value="Update brands" />
    </center>                                  
  
</form>

 

</body>
</html>

<?php
  if(isset($_POST['update_brand'])){
	  
	  $brand_title123 = $_POST['brand_title1'];
	  
	  $update_brand = "update brands set brand_title='$brand_title123' where brand_id='$brand_edit_id'";
	  
	  $run_update = mysqli_query($con, $update_brand);
	  
	  if($update_brand){
		  
		  echo "<script>alert('brands has been updated')</script>";
		   echo "<script>window.open('index.php?view_brands','_self')</script>"; 
		  }
	  }
	
?>