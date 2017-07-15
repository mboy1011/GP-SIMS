<?php
		include 'config.php';
		$sql = mysqli_query($db,'SELECT year from tbl_year');
		$row = mysqli_fetch_assoc($sql);
		$yr = $row['year'];
		$sql = mysqli_query($db,"SELECT Month, Total FROM tbl_monthly_sales_report WHERE Year='$yr'	ORDER BY Month DESC");
		$data = array();
		foreach ($sql as $row) {
			$data[] = $row;
		}
		print json_encode($data);
		mysqli_close($db);	
?>