

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<br /><form action="" method="post">
  <center> <h2>Insert New Brand</h2> 
 <br /> <input type="text" name="brand_title" />
  <input type="submit" name="insert_brand" value="Insert Brands" />
    </center>                                  
  
</form>

  <?php 
     include("includes/db.php");
	 
	 
	 if(isset($_POST['insert_brand'])){
		 
		 $brand_title = $_POST['brand_title'];
		 
		 $insert_brand = "insert into brands (brand_title) values('$brand_title')";
		 
		 $run_brand = mysqli_query($con, $insert_brand);
		 
		 if($run_brand){
			 
			 echo "<script>alert('New Brands has been inserted!')</script>";
			  echo "<script>window.open('index.php?view_brands','_self')</script>";
			 }
		 
		 }
	
  ?>

</body>
</html>