<?php
	include 'config.php';
	if (isset($_POST['chart'])) {
		$yr = mysqli_real_escape_string($db,$_POST['year']);
		$sql = mysqli_query($db,"SELECT Month, Total FROM tbl_monthly_sales_report WHERE Year='$yr'	ORDER BY Month ASC");
		$data = array();
		foreach ($sql as $row) {
			$data[] = $row;
		}
		print json_encode($data);
		mysqli_close($db);	
	}
?>