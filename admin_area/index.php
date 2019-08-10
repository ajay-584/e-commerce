<?php
session_start();
if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";
	
	}
	
	else {
		
?>

<!DOCTYPE html>
<html>
<head>

<title>Untitled Document</title>

<link rel= "stylesheet" href="styles/style.css" media="all" />
</head>

<div class="wrapper">
     <div class="header"><center><h1>ADMIN PANNEL</h1></center></center></div>

     
     <div class="right">
        <h2 align="center">Manage Content</h2>
        <a href="index.php?insert_product">Insert New Product</a>
        <a href="index.php?view_products">View All Product</a>
        <a href="index.php?insert_cat">Insert Categories</a>
        <a href="index.php?view_cats">View All Categories</a>
        <a href="index.php?insert_brand">Insert New Brand</a>
        <a href="index.php?view_brands">View All brands</a>
        <a href="index.php?view_customers">View Customers</a>
        <a href="index.php?view_orders">View Orders</a>
        <a href="logout.php">Admin Logout</a>
     </div>
     
      <div class="left">
      <h2 style="color:#F00; text-align:center; padding:20px;">Welcome In Admin Pannel</h2> 
      <?php
	  include("includes/db.php");
	  
	  if(isset($_GET['insert_product'])){
		  
		  include("insert_product.php");
		  
		  
		  }
		  
		   if(isset($_GET['view_products'])){
		  
		  include("view_products.php");
		  
		   }
	   if(isset($_GET['edit_pro'])){
		  
		  include("edit_pro.php");
		  
		   }
		   
		    if(isset($_GET['insert_cat'])){
		  
		  include("insert_cat.php");
		  
		   }
		   
		     if(isset($_GET['view_cats'])){
		  
		  include("view_cats.php");
		  
		   }
		   
		    if(isset($_GET['edit_cat'])){
		  
		  include("edit_cat.php");
		  
		   }
		   
		   if(isset($_GET['delete_cat'])){
		  
		  include("delete_cat.php");
		  
		   }
		   
		     if(isset($_GET['insert_brand'])){
		  
		  include("insert_brand.php");
		  
		   }
		   
		    if(isset($_GET['view_brands'])){
		  
		  include("view_brands.php");
		  
		   }	
		    if(isset($_GET['edit_brand'])){
		  
		  include("edit_brand.php");
		  
		   }
		   
		    if(isset($_GET['delete_brand'])){
		  
		  include("delete_brand.php");
		  
		   }
		   
		    if(isset($_GET['view_customers'])){
		  
		  include("view_customers.php");
		  
		   }
		   
		    if(isset($_GET['view_orders'])){
		  
		  include("view_orders.php");
		  
		   }		  	  
	  		  	  
	  
	  ?>
      
      
      </div>
     
</div>
     
 

<body>
</body>
</html>
<?php } ?>