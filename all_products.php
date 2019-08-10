<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sliet store</title>
 <link rel="stylesheet" href="styles/style.css" media="all" />

</head>

<body>

   
   
<!--main container starts-->
<div class="main_wrapper">

     


      <!--header starts here-->     
      <div class="header_wrapper"> 
      <a href="index.php"> <img src="image/store2.jpg" style="float:right;"></a>
     
      </div>
      <!--header ends-->
      <!--navagation bar start-->
     <div id="navbar">
     
     <ul id="menu">  
         <li><a href="index.php">Home</a></li>
         <li><a href="all_products.php">All Products</a></li>
         
           <?php
           if(isset($_SESSION['customer_email'])){
         
        echo"<li><a href='customer/my_account.php'>My Account</a></li>";
		   }
		   else {
			   
			  echo "<a href='checkout.php' style='color:#white;'>Login</a>";
			   }
			   
			   ?>
         <?php
           if(isset($_SESSION['customer_email'])){
         
        echo"<span style='display:none'> <li><a href='../user_register.php'>Sign Up</a></li></span>";
		   }
		   else {
			   
			   echo " <li><a href='customer_register.php'>Sign Up</a></li>";
			   }
		   
		   
         ?>
         <li><a href="cart.php">Shopping Cart</a></li>
         <li><a href="contact.php">Contact Us</a></li>
 
       </ul>
       <div id="form">   
       <form method="get" action="results.php" enctype="multipart/form-data">
       <input type="text" name="user query" placeholder="search a product"/>
       <input type="submit" name="search" value="search"/>
       
       
       
       </form>
       
       
       </div>
     
     
    </div>
    <!--navagation bar ends-->
  <div class="content_wrapper">
     
         <!-- leftside_war start-->
         <div id="left_sidebar">  
           
              <div id="sidebar_title" align="center">Categories </div>
         
               <ul id="cats">
         
               <?php getCats(); ?>
         
                </ul>
                <div id="sidebar_title" align="center">Brands</div>
                <ul id="cats">
                  <?php getBrands(); ?>     
                </ul>
         </div>
         <!--left_sidebae ends-->
         <!--right content start-->
        <div id="right_content">
     
              <div id="headline">
        
               <div id="headline_content">
                 <?php
                 if(!isset($_SESSION['customer_email'])){
					 
					 echo "<b>Welcome Gust!</b>";					 
					 }
					 else{						 
						 echo "<span style='color:yellow'><b>Welcome:</span>".$_SESSION['customer_email']."</b>";
						 }
				 ?>
                 <b style="color:yellow">Shoping Cart</b>
                  <span> - Total Items: <?php items() ?> - Total Price: <?php total_price(); ?> - <a href="cart.php" style="color:#FF0;">Go to cart</a>
                  &nbsp;
                   <?php
                     if(!isset($_SESSION['customer_email'])){
                        				  
                    echo "<a href='checkout.php' style='color:#FF3;'>Login</a>";
					 }
					 else {
						 echo  "<a href='logout.php' style='color:#FF3;'>Logout</a>";
						 
					 }
						 
					 
                  ?></span>
               </div>
              </div> 
         
           <div id="product_box">
              <?php 
	              $get_products = "select * from products ";
		  
		  
		  $run_products = mysqli_query($con, $get_products);
		  
		  while($row_products=mysqli_fetch_array($run_products))
		  {
			$pro_id = $row_products['product_id'];
			$pro_title = $row_products['product_title'];
			$pro_cat = $row_products['cat_id'];
			$pro_brand = $row_products['brand_id'];
			$pro_desc = $row_products['product_desc'];
			$pro_price = $row_products['product_price'];
			$pro_image = $row_products['product_img1'];  
			
			echo"
			<div id='single_product'>
			
			<h3>$pro_title</h3>
			
			<img src='admin_area/product_images/$pro_image' width='180' height='180' /><br>
			
			
			<p><b>RS:$pro_price </b></p>
			
			<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
			<a href='index.php?add_cart=$pro_id'><button style=float:right;'>Add to cart</button></a>
		
			
			</div>
			
			";
		
			  
			  
			  }

		 	   
	           ?>
           </div>   
        </div>
      
     
     
     
   </div>
   <!--right content ends-->
    <!--footer starts-->
    <div class="footer">
     <h1 style="color:#FFF; padding-top:30px; text-align:center;">&copy;2018-By www.worldmela.com</h1>
    </div>
    <!--footer ends-->
</div>
<!--main container end-->


</body>
</html>