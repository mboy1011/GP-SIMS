<?php
	include 'config.php';
	require 'crud.php';
	$oop = new CRUD();
	if ($_REQUEST['product']) {	
		$prod = mysqli_real_escape_string($db,$_POST['product']);
		$qty = mysqli_real_escape_string($db,$_POST['quantity']);
		if ($prod=='--Select Products Here--'||empty($qty)) {
			return false;
		}else{
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
	}else if($_REQUEST['prodin']){
		$prod = mysqli_real_escape_string($db,$_POST['prodin']);
		$query = mysqli_query($db,"SELECT prod_id,quantity FROM tbl_products WHERE prod_id='$prod'");
		$row = mysqli_fetch_assoc($query);
		echo $row['quantity']." box/boxes";	
	}else if($_REQUEST['cust']){
		$cust = mysqli_real_escape_string($db,$_POST['cust']);
		$query = mysqli_query($db,"SELECT sales_no FROM tbl_sales WHERE cus_id='$cust' AND status!='CANCELLED' AND status!='PAID'");
		while($row = mysqli_fetch_assoc($query)){
			echo "<option value='".$row['sales_no']."'>".$row['sales_no']."</option>";
		}
	}else if ($_REQUEST['tad']) {
		$tad = mysqli_real_escape_string($db,$_POST['tad']);
		$query = mysqli_query($db,"SELECT tbl_sales.total_amount-IFNULL(SUM(tbl_CRdetails.amount),0) as total_amount,tbl_sales.sales_no FROM tbl_sales INNER JOIN tbl_CRdetails ON tbl_sales.sales_no=tbl_CRdetails.sales_no WHERE tbl_sales.sales_no='$tad'");
		$row = mysqli_fetch_assoc($query);
		echo number_format($row['total_amount'],2,'.','');
	}else if ($_REQUEST['cr_si']) {
		$si = mysqli_real_escape_string($db,$_POST['cr_si']);
		$cr = mysqli_real_escape_string($db,$_POST['cr_no']);
		$am = mysqli_real_escape_string($db,$_POST['amount']);
		if ($si=='--Select Sales Invoice--'&&empty($am)||empty($si)||$am==0) {
			return false;
		}else{
			$sql = mysqli_query($db,"SELECT * FROM tbl_CRdetails WHERE cr_no='$cr' AND sales_no='$si'");
			if ($sql->num_rows>0) {
				return false;
			}else{
				$query = mysqli_query($db,"INSERT INTO tbl_CRdetails (cr_no,sales_no,amount) VALUES ('".$cr."','".$si."','".$am."')");
				if (!$query) {
					return false;
				}else{
					$sql1 = $oop->upStat($si);
					if (!$sql1) {
						return false;
					}else{
						return true;
					}
				}
			}
		}
	}else if ($_REQUEST['products']) {
		$si =  mysqli_real_escape_string($db,$_POST['products']);
		$sql = mysqli_query($db,"SELECT * FROM tbl_salesdetails INNER JOIN tbl_products ON tbl_salesdetails.prod_id=tbl_products.prod_id WHERE tbl_salesdetails.sales_no='$si'");
		while($row = mysqli_fetch_assoc($sql)){
			echo "<option value='".$row['prod_id']."'>".$row['name']."</option>";
		}	
	}else if ($_REQUEST['quantity']) {
		$pid = mysqli_real_escape_string($db,$_POST['quantity']);
		$si = mysqli_real_escape_string($db,$_POST['sales']);
		$sql = mysqli_query($db,"SELECT quantity FROM tbl_salesdetails WHERE sales_no='$si' AND prod_id='$pid'");
		$row = mysqli_fetch_assoc($sql);
		echo intval($row['quantity']);
	}else if ($_REQUEST['addCM']) {
		$pi = mysqli_real_escape_string($db,$_POST['prod_id']);
		$qt = mysqli_real_escape_string($db,$_POST['qty']);
		$si = mysqli_real_escape_string($db,$_POST['si_no']);
		$cm = mysqli_real_escape_string($db,$_POST['cm_no']);
		$sql1 = mysqli_query($db,"SELECT price FROM tbl_salesdetails WHERE sales_no='$si' AND prod_id='$pi'");
		$row = mysqli_fetch_assoc($sql1);
		$total = $row['price']*$qt;
		$sql2 = mysqli_query($db,"SELECT * FROM tbl_CMdetails WHERE cm_no='$cm' AND prod_id='$pi'");
		if ($sql2->num_rows>0) {
			return false;
		}else{
			$sql3 = mysqli_query($db,"INSERT INTO tbl_CMdetails (cm_no,prod_id,cmd_qty,cmd_price,cmd_amount) VALUES ('".$cm."','".$pi."','".$qt."','".$row['price']."','".$total."')");
			if (!$sql3) {
				return false;
			}else{
				$sql4 = $oop->c_d_prod($si,$pi,$qt);
				if (!$sql4) {
					return false;
				}else{
					return true;
				}
			}
		}
	}else if($_REQUEST['addPO']){
		$nm = mysqli_real_escape_string($db,$_POST['nm']);
		$mk = mysqli_real_escape_string($db,$_POST['mk']);
		$pr = mysqli_real_escape_string($db,$_POST['pr']);
		$qt = mysqli_real_escape_string($db,$_POST['qt']);
		$po = mysqli_real_escape_string($db,$_POST['po']);
		$sql = mysqli_query($db,"SELECT * FROM tbl_POdetails WHERE po_no='$po' AND prod_name='$nm'");
		if ($sql->num_rows>0) {
			return false;
		}else{
			if (empty($nm)||empty($mk)||empty($pr)||empty($qt)) {
				return false;
			}else{
				$sql1 = mysqli_query($db,"INSERT INTO tbl_POdetails (po_no,prod_name,prod_maker,prod_price,prod_qty,prod_amount) VALUES ('".$po."','".$nm."','".$mk."','".$pr."','".$qt."','".floatval($pr)*$qt."')");
				if (!$sql1) {
					return false;
				}else{
					return true;
				}
			}
		}
	}
?>