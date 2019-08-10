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
         <li><a href="user_register.php">Sign Up</a></li>
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
                 <b>Welcome Gust!</b>
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
             <form action="customer_register.php" method="post" enctype="application/x-www-form-urlencoded" />
             
             <table width="800" align="center" height="400" bgcolor="#FFFFFF" >
             
               
               <tr align="center">
                  <td colspan="2"><h2>Create An Account<h2></td>
               </tr>
               
               <tr>
                  <td align="right"><b>Nmae:</b></td>
                  <td><input type="text" name="c_name" required /></td>
               </tr>
               
                <tr>
                  <td align="right"><b>Email:</b></td>
                  <td><input type="text" name="c_email" required /></td>
               </tr>
               
                <tr>
                  <td align="right"><b>Password:</b></td>
                  <td><input type="password" name="c_pass" required /></td>
               </tr>
               
                <tr>
                  <td align="right"><b>Country:</b></td>
                  <td>
                    <select name="c_country">
                      <option>Select Country</option>
                      <option>India</option>
                      <option>China</option>
                      <option>Pakistan</option>
                      <option>Bangla desh</option>
                      <option>Iran</option>
                      <option>Afganistan</option>
                      <option>S.U</option>
                      <option>U.K</option>
                      <option>Japan</option>
                      
                       
                       
                    </select>
                  
                  
                  </td>
               </tr>
               
                <tr>
                  <td align="right"><b>City:</b></td>
                  <td><input type="text" name="c_city" required /></td>
               </tr>
               
                <tr>
                  <td align="right"><b>Mobile NO:</b></td>
                  <td><input type="text" name="c_contact" required /></td>
               </tr>
               
                <tr>
                  <td align="right"><b>Address:</b></td>
                  <td><input type="text" name="c_address" required /></td>
               </tr>
               
                <tr>
                  <td align="right"><b>Pin Code</b></td>
                  <td><input type="text" name="c_pin" required /></td>
               </tr>
                              
               <tr align="center">
                  <td colspan="2"><input type="submit" name="register" value="Submit" /></td>
               </tr>
               
          
             </table>
             
             
             
             </form><br>
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


<?php
   if(isset($_POST['register'])){
	   
	   $c_name = $_POST['c_name'];
	   $c_email = $_POST['c_email'];
	   $c_pass = $_POST['c_pass'];
	   $c_country = $_POST['c_country'];
	   $c_city = $_POST['c_city'];
	   $c_contact = $_POST['c_contact'];
	   $c_address = $_POST['c_address'];
	   $c_pin = $_POST['c_pin'];
	  
	   
	   $c_ip = getIp();
	   
	   
	   $insert_customer = "INSERT INTO `customers`( `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_ip`, `customer_pin`) VALUES ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_ip','$c_pin')";
	   
	   $run_cutomer = mysqli_query($con, $insert_customer);
	   
	
	   
	   $sel_cart = "select * from cart where ip_add='$c_ip'";
	  
	  $run_cart = mysqli_query($con, $sel_cart);
	  
	  $check_cart = mysqli_num_rows($run_cart);
	  
	  if($check_cart>0){
		  
		  $_SESSION['customer_email']=$c_email;
		  
		   echo "<script>alert('Account is created succussfully, Thank you!')</script>";
		  echo "<script>window.open('checkout.php','_self')</script>";
		  
		  }
	   
	   else{
		   
          $_SESSION['customer_email']=$c_email;		   
		   echo "<script>alert('Account is created succussfully, Thank you!')</script>";
		   echo   "<script>window.open('index.php','_self')</script>";
		   
		   }
	   
	   
	   
	   
	   
	   }


?>