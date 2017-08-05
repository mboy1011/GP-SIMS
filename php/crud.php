<?php
class CRUD
{
	public function insertEmp($fn,$ln,$mn,$po)
	{
		require 'config.php';
		$sql = mysqli_query($db,"SELECT * FROM tbl_employee WHERE fname='$fn' AND lname='$ln' AND mname='$mn'");
		if($sql->num_rows>0){
			return false;
		}else{
			$result = mysqli_query($db,"INSERT INTO tbl_employee(fname,lname,mname,position)VALUES('".$fn."','".$ln."','".$mn."','".$po."')");
			if (!$result) {
				return false;
			}else{
				return true;
			}
		}
	
	}
	public function insertCust($fn,$add,$tin,$bstyle,$terms,$opidno,$d1,$d2)
	{
		require 'config.php';
		$sql = mysqli_query($db,"SELECT full_name,address,tin FROM tbl_customers WHERE full_name='$fn' AND address='$add'");
		if($sql->num_rows>0){
			return false;
		}else{
			$result = mysqli_query($db,"INSERT INTO tbl_customers(full_name,address,tin,bstyle,terms,opidno,discount1,discount2)VALUES('".$fn."','".$add."','".$tin."','".$bstyle."','".$terms."','".$opidno."','".$d1."','".$d2."')");
			if (!$result) {
				return false;
			}else{
				return true;
			}
		}
	
	}
	public function updateCust($id,$fn,$add,$tin,$bstyle,$terms,$opidno)
	{
		require 'config.php';
		$sql = mysqli_query($db,"UPDATE tbl_customers SET full_name='$fn', address='$add', tin = $tin, bstyle='$bstyle', terms='$terms', opidno='$opidno' WHERE cus_id='$id'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
	public function deleteCust($id)
	{
		require 'config.php';
		$sql = mysqli_query($db,"DELETE FROM tbl_customers WHERE cus_id='$id'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
	public function insertUser($user,$pass)
	{
		require 'config.php';
		$pass = password_hash($pass, PASSWORD_BCRYPT);
		$sql = mysqli_query($db,"SELECT * FROM tbl_useraccounts WHERE lname='$user'");
		if($sql->num_rows>0){
			return false;
		}else{
			$result = mysqli_query($db,"INSERT INTO tbl_useraccounts(lname,password)VALUES('".$user."','".$pass."')");
			if (!$result) {
				return false;
			}else{
				return true;
			}
		}
	}
	public function insertPro($pn,$pd,$ex,$lo,$pr,$pk,$qt)
	{
		require 'config.php';
		$sql = mysqli_query($db,"SELECT * FROM tbl_products WHERE name='$pn' AND lot_no='$lo'");
		if ($sql->num_rows>0) {
			return false;
		}else{
			$result = mysqli_query($db,"INSERT INTO tbl_products(name,description,price,expiry_date,lot_no,packing,quantity)VALUES('".$pn."','".$pd."','".$pr."','".$ex."','".$lo."','".$pk."','".$qt."')");
			if (!$result) {
				return false;
			}else{
				return true;
			}
		}

	}
	public function upStat($val,$sino)
	{
		require 'config.php';
	    if ($val!=0) {
	      $inserts = mysqli_query($db,"UPDATE tbl_sales SET status='PARTIALLY PAID' WHERE sales_no='$sino'");
	    }else{
	      $inserts1 = mysqli_query($db,"UPDATE tbl_sales SET status='PAID' WHERE sales_no='$sino'");
	    }
	}
	public function upProd($si_no)
	{
		require 'config.php';
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
		require 'config.php';
		$stat = '';
		if ((int)$qty==0) {
			$stat = 'OUT OF STOCKS'	;
		}else{
			$stat = 'ACTIVE';
		}
		$sql = mysqli_query($db,"UPDATE tbl_products SET name='$proname', description='$desc', price='$price', expiry_date='$exp',quantity='$qty',packing='$pack',lot_no='$lot', status='$stat' WHERE prod_id='$id'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
	public function delPro($did)
	{
		require 'config.php';
		$sql = mysqli_query($db,"DELETE FROM tbl_products WHERE prod_id='$did'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
	public function upEmp($fn,$mn,$ln,$po,$id)
	{
		require 'config.php';
		$sql = mysqli_query($db,"UPDATE tbl_employee SET fname='$fn', lname='$ln', mname='$mn', position='$po' WHERE emp_id='$id'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
	public function delEmp($id)
	{
		require 'config.php';
		$sql = mysqli_query($db,"DELETE FROM tbl_employee WHERE emp_id='$id'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
	public function upUser($id,$ui,$pa)
	{
		require 'config.php';
		$sql = mysqli_query($db,"UPDATE tbl_useraccounts SET lname='$ui', password='$pa' WHERE uid='$id'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
	public function delUser($delid)
	{
		require 'config.php';
		$sql = mysqli_query($db,"DELETE FROM tbl_useraccounts WHERE uid='$delid'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
	public function login($user,$pass)
	{
		require 'config.php';
		$sql = mysqli_query($db, "SELECT * FROM tbl_useraccounts WHERE lname='$user'");
        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        if ($row['lname']==$user) {
          if (password_verify($pass,$row['password'])) {
            session_start();
            $_SESSION['login_user']=$user;
            header('location:php/index'); 
          }else{
         	return false;
          }
        }else{
          return false;
        } 
	}
	public function upYear($yr)
	{
		require 'config.php';
		$sql = mysqli_query($db,"UPDATE tbl_year SET year='$yr'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
	public function insertExp($cn,$dt,$ca,$am)
	{
		require 'config.php';
		$query = mysqli_query($db,"SELECT * FROM tbl_expenses WHERE cat_id='$ca' AND ex_date='$dt' AND ex_custName='$cn'");
		if ($query->num_rows>0) {
			return false;
		}else{
			mysqli_query($db,"INSERT INTO tbl_expenses (cat_id,ex_date,ex_custName,ex_amount) VALUES ('".$ca."','".$dt."','".$cn."','".$am."')");
			return true;
		}
	}
	public function updateExp($cn,$dt,$ca,$am,$id)
	{
		require 'config.php';
		$sql = mysqli_query($db,"UPDATE tbl_expenses SET cat_id='$ca',ex_date='$dt',ex_custName='$cn',ex_amount='$am' WHERE ex_id='$id'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
	public function deleteExp($id)
	{
		require 'config.php';
		$sql = mysqli_query($db,"DELETE FROM tbl_expenses WHERE ex_id='$id'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
	public function insertCat($cat)
	{
		require 'config.php';
		$query = mysqli_query($db,"SELECT * FROM tbl_category WHERE cat_name='$cat'");
		if ($query->num_rows>0) {
			return false;
		}else{
			mysqli_query($db,"INSERT INTO tbl_category (cat_name) VALUES ('".$cat."')");
			return true;
		}
	}
	public function deleteCat($id)
	{
		require 'config.php';
		$sql=mysqli_query($db,"DELETE FROM tbl_category WHERE cat_id='$id'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
	public function updateCat($cn,$id)
	{
		require 'config.php';
		$sql = mysqli_query($db,"UPDATE tbl_category SET cat_name='$cn' WHERE cat_id='$id'");
		if (!$sql) {
			return false;
		}else{
			return true;
		}
	}
}
?>