<?php
	include 'config.php';
	if (isset($_POST['chart2'])) {
		$yr = mysqli_real_escape_string($db,$_POST['year2']);
		$sql = mysqli_query($db,"SELECT Month, Total FROM tbl_monthly_products_out WHERE Year='$yr'	ORDER BY Month DESC");
		$data = array();
		foreach ($sql as $row) {
			$data[] = $row;
		}
		print json_encode($data);
		mysqli_close($db);		
	}
?>