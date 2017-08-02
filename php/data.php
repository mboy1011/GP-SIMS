<?php
		include 'session.php';
		if ($_REQUEST['sales']) {
			$sql = mysqli_query($db,"SELECT Month, Total FROM tbl_monthly_sales_report WHERE Year='$year' ORDER BY Month DESC");
			$data = array();
			foreach ($sql as $row) {
				$data[] = $row;
			}
			print json_encode($data);
			mysqli_close($db);		
		}else if ($_REQUEST['product']) {
			$sql = mysqli_query($db,"SELECT Month, Total FROM tbl_monthly_products_out WHERE Year='$year' ORDER BY Month DESC");
			$data = array();
			foreach ($sql as $row) {
				$data[] = $row;
			}
			print json_encode($data);
			mysqli_close($db);		
		}
?>