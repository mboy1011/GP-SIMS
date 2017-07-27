<?php
	include 'config.php';
	if ($_REQUEST['product']) {	
		$prod = mysqli_real_escape_string($db,$_POST['product']);
		$qty = mysqli_real_escape_string($db,$_POST['quantity']);
		$si_no = mysqli_real_escape_string($db,$_POST['salesno']);
		$c_id = mysqli_real_escape_string($db,$_POST['custid']);
		$query = mysqli_query($db,"SELECT * FROM tbl_products WHERE prod_id='$prod'");
		$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$price = $row['price'];
		// $inventory = intval($row['quantity']) - $qty;
		$total=floatval($row['price'])*$qty;
		$result = mysqli_query($db,"SELECT * FROM tbl_salesdetails WHERE sales_no='$si_no' AND prod_id='$prod'");
		if ($result->num_rows>0) {
			return false;
		}else{
			$sql = mysqli_query($db,"INSERT INTO tbl_salesdetails(sales_no,prod_id,quantity,price,amount) VALUES ('".intval($si_no)."','".floatval($prod)."','".intval($qty)."','".floatval($price)."','".floatval($total)."')");
			$sql1 = mysqli_query($db,"UPDATE tbl_products SET quantity=quantity-$qty WHERE prod_id='$prod'");
			if (!$sql||!$sql1) {
				return false;
			}else{
				return true;
			}
		}	
	}
?>