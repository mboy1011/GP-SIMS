<?php
class CRUD
{
	public function insertEmp($fn,$ln,$mn,$po)
	{
		include 'config.php';
		$sql = mysqli_query($db,"SELECT * FROM tbl_employee WHERE fname='$fn' AND lname='$ln' AND mname='$mn'");
		if($sql->num_rows>0){
			return false;
		}else{
			$result = mysqli_query($db,"INSERT INTO tbl_employee(fname,lname,mname,position)VALUES('".$fn."','".$ln."','".$mn."','".$po."')");
				return $result;
		}
	
	}
	public function insertCust($fn,$add,$tin,$bstyle,$terms,$opidno)
	{
		include 'config.php';
		$sql = mysqli_query($db,"SELECT * FROM tbl_customers WHERE full_name='$fn' AND tin='$tin'");
		if($sql->num_rows>0){
			return false;
		}else{
			$result = mysqli_query($db,"INSERT INTO tbl_customers(full_name,address,tin,bstyle,terms,opidno)VALUES('".$fn."','".$add."','".$tin."','".$bstyle."','".$terms."','".$opidno."')");
				return $result;
		}
	
	}
	public function updateCust($id,$fn,$add,$tin,$bstyle,$terms,$opidno)
	{
		include 'config.php';
		$sql = mysqli_query($db,"UPDATE tbl_customers SET full_name='$fn', address='$add', tin = $tin, bstyle='$bstyle', terms='$terms', opidno='$opidno' WHERE cus_id='$id'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
	public function deleteCust($id)
	{
		include 'config.php';
		$sql = mysqli_query($db,"DELETE FROM tbl_customers WHERE cus_id='$id'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
	public function insertUser($user,$pass)
	{
		include 'config.php';
		$sql = mysqli_query($db,"SELECT * FROM tbl_useraccounts WHERE lname='$user'");
		if($sql->num_rows>0){
			return false;
		}else{
			$result = mysqli_query($db,"INSERT INTO tbl_useraccounts(lname,password)VALUES('".$user."','".$pass."')");
				return $result;
		}
	}
	public function insertPro($pn,$pd,$ex,$lo,$pr,$pk,$qt)
	{
		include 'config.php';
		$sql = mysqli_query($db,"SELECT * FROM tbl_products WHERE name='$pn' AND lot_no='$lo'");
		if ($sql->num_rows>0) {
			return false;
		}else{
			$result = mysqli_query($db,"INSERT INTO tbl_products(name,description,price,expiry_date,lot_no,packing,quantity)VALUES('".$pn."','".$pd."','".$pr."','".$ex."','".$lo."','".$pk."','".$qt."')");
			return $result;
		}

	}
	public function upStat($val,$sino)
	{
		include 'config.php';
	    if ($val!=0) {
	      $inserts = mysqli_query($db,"UPDATE tbl_sales SET status='PARTIALLY PAID' WHERE sales_no='$sino'");
	    }else{
	      $inserts1 = mysqli_query($db,"UPDATE tbl_sales SET status='PAID' WHERE sales_no='$sino'");
	    }
	}
	public function upProd($si_no)
	{
		include 'config.php';
		$querys = mysqli_query($db,"SELECT * FROM tbl_salesdetails WHERE sales_no=$si_no");
		$arr = array();
		while($mysql = mysqli_fetch_array($querys,MYSQLI_ASSOC)){
		    $arr[] = $mysql;
		}
		$result;
		for ($i=0; $i < count($arr); $i++) { 
		   $sql = "UPDATE tbl_products SET quantity=quantity+".$arr[$i][quantity]." WHERE prod_id=".$arr[$i][prod_id]."";
		   $my = mysqli_query($db,$sql);
		   $result = $my;
		}
		mysqli_query($db,"DELETE FROM tbl_salesdetails WHERE sales_no='$si_no'");
		mysqli_query($db,"UPDATE tbl_sales SET status='CANCELLED' WHERE sales_no='$si_no'");
		return $result;
	}
	public function upPro($id,$proname,$desc,$lot,$price,$exp,$pack,$qty)
	{
		include 'config.php';
		$sql = mysqli_query($db,"UPDATE tbl_products SET name='$proname', description='$desc', price='$price', expiry_date='$exp',quantity='$qty',packing='$pack',lot_no='$lot' WHERE prod_id='$id'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
	public function delPro($did)
	{
		include 'config.php';
		$sql = mysqli_query($db,"DELETE FROM tbl_products WHERE prod_id='$did'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
}
?>