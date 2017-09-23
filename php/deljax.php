<?php
	require 'config.php';
	require 'crud.php';
	require 'session.php';
	$oop = new CRUD();
	if($_POST['deleted']){	
		$id = mysqli_real_escape_string($db,$_POST['deleted']);
		$qty = mysqli_real_escape_string($db,$_POST['qty']);
		$query = mysqli_query($db,"SELECT * FROM tbl_salesdetails WHERE id='$id'");
		$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$prod = $row['prod_id'];
		$sql2 = mysqli_query($db,"UPDATE tbl_products SET quantity=quantity+$qty,status='STOCKS ON HAND' WHERE prod_id='$prod'");
			if (!$sql2) {
				return false;
			}else{
				$sql = mysqli_query($db,"DELETE FROM tbl_salesdetails WHERE id='$id'");
				if (!$sql) {
					return false;
				}else{
					return true;
				}
			}
		mysqli_close($db);
	}else if($_POST['updated'])	{
		$price = mysqli_real_escape_string($db,$_POST['updated']);
		$id = mysqli_real_escape_string($db,$_POST['id']);	
		$qty = mysqli_real_escape_string($db,$_POST['qty']);		
		$total = intval($qty)*floatval($price);
		$sql = mysqli_query($db,"UPDATE tbl_salesdetails SET price='$price', amount='$total' WHERE id='$id'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
		mysqli_close($db);
	}else if ($_POST['cr_del']) {
		$id = mysqli_real_escape_string($db,$_POST['cr_del']);
		$si = mysqli_real_escape_string($db,$_POST['si']);
		$sql = mysqli_query($db,"DELETE FROM tbl_CRdetails WHERE crd_id='$id'");
		if (!$sql) {
			return false;
		}else{
			$sql1 = $oop->upStat($si);
			if (!$sql1) {
				return false;
			}else{
				return true;
			}
		}
		mysqli_close($db);
	}else if ($_POST['removeCM']) {
		$id = mysqli_real_escape_string($db,$_POST['id']);
		$pi = mysqli_real_escape_string($db,$_POST['pi']);
		$si = mysqli_real_escape_string($db,$_POST['si']);
		$qt = mysqli_real_escape_string($db,$_POST['qt']);
		$am = mysqli_real_escape_string($db,$_POST['am']);
		$pr = mysqli_real_escape_string($db,$_POST['pr']);
		$sql = mysqli_query($db,"DELETE FROM tbl_CMdetails WHERE cmd_id='$id'");
		if (!$sql) {
			return false;
		}else{
			$sql2 = $oop->d_c_prod($si,$pi,$qt);
			if (!$sql2) {
				return false;
			}else{
				return true;
			}
		}
		mysqli_close($db);
	}else if($_POST['remPO']){
		$pod = mysqli_real_escape_string($db,$_POST['pod']);
		$sql = mysqli_query($db,"DELETE FROM tbl_POdetails WHERE pod_no='$pod'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
		mysqli_close($db);
	}
?>