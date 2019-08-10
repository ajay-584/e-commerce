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
       <input type="text" name="user_query" placeholder="search a product"/>
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
        <?php
		cart();
		
		?>
     
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
                  &nbsp;<?php
                     if(!isset($_SESSION['customer_email'])){
                        				  
                    echo "<a href='checkout.php' style='color:#FF3;'>Login</a>";
					 }
					 else {
						 echo  "<a href='logout.php' style='color:#FF3;'>Logout</a>";
						 
					 }
						 
					 
                  ?>  </span>
               </div>
              </div> 
            
              
         
           <div>
              <?php 
	              if(!isset($_SESSION['customer_email'])){
					  
					  
					  include("customer/customer_login.php");
					  
				  }
					  
					  else {
						  
						  include("payment_options.php");
						  
						  
						  }
					  
					  
					  	   
	           ?>
           </div>   
        </div>
      
     
     
     
   </div>
   <!--right content ends-->
    <!--footer starts-->
    <div class="footer">
     <h1 style="color:#FFF; padding-top:30px; text-align:center;">&copy;2018-By www.sliet-store.com</h1>
     <h2  style="color:#FFF; padding-bottom:10px; text-align:right; margin-right:10px;"><b>Developed By Ajay Kumar</b></h2>
    </div>
    <!--footer ends-->
</div>
<!--main container end-->


</body>
</html>