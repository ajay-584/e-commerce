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
      <a href="../index.php"> <img src="image/store2.jpg" style="float:right;"></a>
      <h1 style="text-align:center; text-height:30px; padding-top:20px;">WORLDMELA.COM</h1>
     
      </div>
      <!--header ends-->
      <!--navagation bar start-->
     <div id="navbar">
     
     <ul id="menu">  
         <li><a href="../index.php">Home</a></li>
         <li><a href="../all_products.php">All Products</a></li>
         <li><a href="my_account.php">My Account</a></li>
         <?php
           if(isset($_SESSION['customer_email'])){
         
        echo"<span style='display:none'> <li><a href='../user_register.php'>Sign Up</a></li></span>";
		   }
		   else {
			   
			   echo " <li><a href='../user_register.php'>Sign Up</a></li>";
			   }
		   
		   
         ?>
         
         <li><a href="../cart.php">Shopping Cart</a></li>
         <li><a href="../contact.php">Contact Us</a></li>
 
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
           
              <div id="sidebar_title" align="center">Manage Account</div>
         
               <ul id="cats">
                 
				   
				   <img src="customer_photos/pro.png" width="120" height="150" />
				  
				  
				  
                  <li><a href="my_account.php?my_orders">My Order</a></li>
                  <li><a href="my_account.php?edit_account">Edit Account</a></li>
                  <li><a href="my_account.php?change_pass">Change Password</a></li>
                  <li><a href="logout.php">Logout</a></li>
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
				 </span>
               </div>
              </div> 
            
              
         
           <div style="background:#FFF">
             
             <h2 style="background:#999; color:#000; padding:20px; text-align:center;">Manage Your Account</h2>
             
             <?php getdefault(); ?>
             <?php
			  if(isset($_GET['my_orders'])){
				  
				  include("my_orders.php");
				  
				  }
				  
				   if(isset($_GET['edit_account'])){
				  
				  include("edit_account.php");
				  
				  }
				  
				    if(isset($_GET['change_pass'])){
				  
				  include("change_pass.php");
				  
				  }
				  
				   
			 
			 ?>
           </div>   
        </div>
      
     
     
     
   </div>
   <!--right content ends-->
    <!--footer starts-->
    <div class="footer">
     <h1 style="color:#FFF; padding-top:30px; text-align:center;">&copy;2018-By www.worldmela.com</h1>
     <h2  style="color:#FFF; padding-bottom:10px; text-align:right; margin-right:10px;"><b>Developed By Ajay Kumar</b></h2>
    </div>
    <!--footer ends-->
</div>
<!--main container end-->


</body>
</html>