<?php
	include 'config.php';
	if ($_REQUEST['save']) {
		$sales_no = mysqli_real_escape_string($db,$_POST['sales_no']);
		$cust_id = mysqli_real_escape_string($db,$_POST['cust_id']);
		$prod = mysqli_real_escape_string($db,$_POST['product']);
		$qty = mysqli_real_escape_string($db,$_POST['quantity']);
		$tad = mysqli_real_escape_string($db,$_POST['tad']);
		if (empty($sales_no)&&empty($cust_id)) {
			?>
					 <div class="alert alert-danger alert-dismissable">
	                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                          <strong>Customer Not Yet Selected!</strong>Try Again.
	                 </div>
			<?php
		}else if($prod=='--Select Products Here--'||empty($qty)||$tad==0){
			?>
					 <div class="alert alert-danger alert-dismissable">
	                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                          <strong>Products Not Yet Selected!</strong>Try Again.
	                 </div>
			<?php
		}else{
			$dis1 = mysqli_real_escape_string($db,$_POST['dis1']);
			$dis2 = mysqli_real_escape_string($db,$_POST['dis2']);
			$today = mysqli_real_escape_string($db,$_POST['date']);
			$prepare = mysqli_real_escape_string($db,$_POST['prepare']);
			$check = mysqli_real_escape_string($db,$_POST['check']);
			$vat = mysqli_real_escape_string($db,$_POST['vat']);
			$net = mysqli_real_escape_string($db,$_POST['net']);
			$tsales = mysqli_real_escape_string($db,$_POST['tsales']);
			$term = mysqli_real_escape_string($db,$_POST['terms']);
	        $date = date_create($today);
	        date_add($date,date_interval_create_from_date_string($term));
	        $due = date_format($date,"Y-m-d");

			$status = 'UNPAID';
			$query = mysqli_query($db,"SELECT * FROM tbl_sales WHERE sales_no='$sales_no'");
			if ($query->num_rows>0) {
				?>
					 <div class="alert alert-warning alert-dismissable">
	                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                          <strong>Already Saved!</strong>Try Again.
	                 </div>
				<?php
			}else{
				$sql = mysqli_query($db,"INSERT INTO tbl_sales (sales_no,cus_id,dates,prepared_by,checked_by,VAT,total_amount,total_sales,amount_net,status,due_date,discount1,discount2) VALUES ('".$sales_no."','".$cust_id."','".$today."','".$prepare."','".$check."','".$vat."','".$tad."','".$net."','".$tsales."','".$status."','".$due."','".$dis1."','".$dis2."')");
				if(!$sql){
					?>
					 <div class="alert alert-danger alert-dismissable">
	                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                          <strong>Failed to Saved!</strong>Try Again.
	                 </div>
					<?php
				}else{
					?>
					 <div class="alert alert-success alert-dismissable">
	                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                          <strong>Successfully Saved!</strong>
	                 </div>
					<?php
				}	
			}
		}
	}
?>