
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
 <table width="795" align="center" bgcolor="#FFFFFF">
     <tr align="center" bgcolor="#FFFF33">
        <td colspan="8"><h2>All Users</h2></td>
     </tr>
     
     <tr align="center">
        <th>S.N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile No</th>
        <th>Country</th>
        <th>City</th>
        <th>Pin Code</th>
        <th>Delete</th>   
     </tr>
     
     <?php
	   include("includes/db.php");
	   
	     $get_c = "select * from customers";
		 
		 $run_c = mysqli_query($con, $get_c);
		 
		 $i=0;
		 
		 while($row_c=mysqli_fetch_array($run_c)){
			 
			$c_id = $row_c['customer_id'];
			$c_name = $row_c['customer_name'];
			$c_email = $row_c['customer_email'];
			$c_contact = $row_c['customer_contact'];
			$c_country = $row_c['customer_country'];
			$c_city = $row_c['customer_city'];
			$c_pin = $row_c['customer_pin'];
			 
			 
			$i++;
	 
	 ?>
     
     <tr align="center">
     
       <td><?php echo $i; ?></td>
       <td><?php echo $c_name; ?></td>
       <td><?php echo $c_email; ?></td>
       <td><?php echo $c_contact; ?></td>
       <td><?php echo $c_country; ?></td>
       <td><?php echo $c_city; ?></td>
       <td><?php echo $c_pin; ?></td>
       <td><a href="delete_c.php?delete_c=<?php echo $c_id; ?>">Delete</a></td>
  
     </tr>
     <?php  } ?>
 
 </table>



</body>
</html>