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
                  <span> - Total Items: <?php items() ?> - Total Price: <?php total_price(); ?> - <a href="index.php" style="color:#FF0;">Back to Shoping</a>
                 &nbsp; <?php
                     if(!isset($_SESSION['customer_email'])){
                        				  
                    echo "<a href='checkout.php' style='color:#FF3;'>Login</a>";
					 }
					 else {
						 echo  "<a href='logout.php' style='color:#FF3;'>Logout</a>";
						 
					 }
						 
					 
                  ?> 
				  
                  </span>
               </div>
              </div> 
            
              
         
           <div id="product_box"><br>
             <form action="cart.php" method="post" enctype="multipart/form-data">
             
             <table width="750" align="center" bgcolor="#FFFFFF" style="padding:10px;">
             
                <tr align="center">
                  <td><b>Remove</b></td>
                  <td><b>Product(s)</b></td>
                  <td><b>Quantity</b></td>
                  <td><b>Price</b></td>
                </tr>
                
                <?php
				
				
                 
    $ip_add = getIp();
	
	$total = 0;
	
	$sel_price = "select * from cart where ip_add='$ip_add'";
	
	$run_price = mysqli_query($con, $sel_price);
	
	while ($record=mysqli_fetch_array($run_price)){
		
		$pro_id = $record['p_id'];
		
		$pro_price = "select * from products where product_id='$pro_id'";
		
		$run_pro_price = mysqli_query($con,$pro_price);
		
		while ($p_price = mysqli_fetch_array($run_pro_price)){
			
			$product_price = array($p_price['product_price']);
			$product_title = $p_price['product_title'];
			$product_image = $p_price['product_img1'];
			$only_price = $p_price['product_price'];
			
			$values = array_sum($product_price);
			
			$total +=$values;
				
?>                
                <tr>
                  
                  <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"</td>
                  
                  <td><?php echo $product_title; ?><br><img src="admin_area/product_images/<?php echo $product_image ?>" width="80" width="80"></td>
                  
                  <td><input type="text" name="qty" value="1" size="2" /></td>
                  <?php
									  
                     if(isset($_POST['update'])){
						 
						   $qty = $_POST['qty'];
						 
						 $insert_qty = "update cart set qty='$qty' where ip_add='$ip_add'";
						 
						 $run_qty = mysqli_query($con, $insert_qty);
						 
					 
						 $get_qty = "select * from cart where ip_add='$ip_add'";
						 
						 $run_get = mysqli_query($con, $get_qty);
						 
						 while ($p_qty = mysqli_fetch_array($run_get)){
							 
							 
							$n_qty = $p_qty['qty'];
							
						 
						 
						  // $total = $total*$n_qty;
														 
						 }}
						 
						  
						               
                  
                    ?>                  
                  <td><?php echo"RS:".$only_price; ?></td>
                  
                 </tr>
                 <?php } } ?>
                 
                 <tr>
                   <td colspan="3" align="right"><b>Total Price:</b></td>
                   <td><b><?php echo"RS:".$total; ?></b></td>
                 </tr>
                 
                 <tr></tr>
                 <tr></tr>
                                
                 <tr align="center">
                 
                   <td colspan="2"><input type="submit" name="update" value="Update Cart"/></td>
                   <td style="padding:10px;"><input type="submit" name="continue" value="Continue To Shoping"/></td>
                   <td><button><a href="checkout.php" style="text-decoration:none; color:#000;">Checkout</a></button></td>
                 
                 
                 </tr>

              
              </table>
             
             </form>
 
 <?php 
 
 
   function updatecart(){
	   
     global $con;
   
   if(isset($_POST['update'])){
	   
	   foreach($_POST['remove'] as $remove_id){
		   
		   $delete_products = "delete from cart where p_id='$remove_id'";
		   
		   $run_delete = mysqli_query($con, $delete_products);
		   
		   if($run_delete)
		   {
			   echo "<script>window.open('cart.php','_self')</script>";			   
			   
			   }		   		   
	     }
	   
	   }
   if(isset($_POST['continue'])){
	   
	   echo  "<script>window.open('index.php','_self')</script>";
	   	
	   }
 
 
   }
 
  echo @$up_cart= updatecart(); 
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