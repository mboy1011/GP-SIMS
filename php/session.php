<?php
   require('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT * FROM tbl_employee WHERE lname='$user_check'");
   $rowing = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   // PRODUCT CHECKING
    $counting0 = 0;
	$counting1 = 0;
	$mysql = mysqli_query($db,"SELECT * FROM tbl_expired_products");
	$mysql2 = mysqli_query($db,"SELECT * FROM tbl_outofstocks");
	$mysql3 = mysqli_query($db,"SELECT * FROM tbl_overdue");
	mysqli_query($db,"UPDATE tbl_products SET status='EXPIRING' WHERE expiry_date<=DATE_ADD(CURDATE(),INTERVAL 12 MONTH)");
	mysqli_query($db,"UPDATE tbl_products SET status='OUT OF STOCKS' WHERE quantity=0");
	mysqli_query($db,"UPDATE tbl_sales SET status='OVERDUE' WHERE due_date=CURDATE() AND status!='CANCELLED'");
	$counting0 = mysqli_num_rows($mysql);
	$counting1 = mysqli_num_rows($mysql2);
	$counting2 = mysqli_num_rows($mysql3);
	$counting0+=$counting1;
	// echo $count;
	//Year Settings
	$yearly = mysqli_query($db,'SELECT year from tbl_year');
	$rower = mysqli_fetch_assoc($yearly);
	$year = $rower['year'];
   $name = $rowing['lname'].", ".$rowing['fname']." ".$rowing['mname'].". ";   
   if(!isset($_SESSION['login_user'])){
      header("location:../index");
   }
?>