<?php 
	// Update Quantity
	include 'config.php';
	$sql = mysqli_query($db,"SELECT * FROM tbl_salesdetails WHERE sales_no=12");
	$row = mysqli_fetch_assoc($sql);
	foreach ($row as $key) {
		// $sql2 = mysqli_query($db,"SELECT * FROM tbl_sales WHERE sales_no=$key");
		// foreach ($sql2 as $key2) {
		// 	$result  = mysqli_query($db,"UPDATE tbl_sales SET quantity = $key2['quantity'] WHERE sales_no=$key2['sales_no']");
		// 	if (!$result) {
		// 		echo "Failed to Update";
		// 	}else{
		// 		echo "Successfully Updated.";
		// 	}
		// }
		echo $key;
	}
	// Remove Products Ordered on table tbl_salesdetails
	// $remove = mysql_query($db,"DELETE FROM tbl_salesdetails WHERE sales_no=2");
	// if (!$remove) {
	// 	echo "Failed to Delete.";
	// }else{
	// 	echo "Successfully Deleted.";
	// }

?>