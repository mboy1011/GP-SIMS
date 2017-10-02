<?php
		include 'session.php';
		if ($_REQUEST['sales']) {
			$sql = mysqli_query($db,"SELECT Month, Total FROM tbl_monthly_income WHERE Year='$year' ORDER BY Month ASC");
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
		}else if ($_REQUEST['expenses']) {
			$sql = mysqli_query($db,"SELECT Month, Total FROM tbl_monthly_expenses WHERE Year='$year' ORDER BY Month ASC");
			$data = array();
			foreach ($sql as $row) {
				$data[] = $row;
			}
			print json_encode($data);
			mysqli_close($db);
		}else if ($_REQUEST['prod_det']) {
			$id = mysqli_real_escape_string($db,$_POST['prod_det']);
			$sql = mysqli_query($db,"SELECT name,description,packing,price,brand_type FROM tbl_products WHERE prod_id='$id'");
			$data = array();
			foreach ($sql as $row) {
				$data[] = $row;
			}
			print json_encode($data);
			mysqli_close($db);
		}elseif ($_REQUEST['cust_data']) {
			$cid=mysqli_real_escape_string($db,$_POST['si_cust_id']);
            $sql = mysqli_query($db,"SELECT * FROM tbl_customers WHERE cus_id=$cid");
            $data = array();
            foreach ($sql as $row) {
            	$data[]=$row;
            }
            print json_encode($data);
            mysqli_close($db);
		}
?>