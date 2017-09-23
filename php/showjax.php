<?php
	include 'config.php';
	include 'session.php';
	if ($_POST['sales_no']) {
	$si_no = mysqli_real_escape_string($db,$_POST['sales_no']);	
	$total = mysqli_query($db,"SELECT SUM(amount) as total FROM tbl_salesdetails WHERE sales_no='$si_no'");
	$rows = mysqli_fetch_array($total,MYSQLI_ASSOC); 
	$tad = (float)$rows['total'];
	$query = mysqli_query($db,"SELECT tbl_products.name,tbl_products.packing,tbl_salesdetails.id,tbl_salesdetails.sales_no,tbl_products.lot_no,tbl_products.expiry_date,tbl_salesdetails.price,tbl_salesdetails.quantity, tbl_salesdetails.amount
FROM tbl_salesdetails, tbl_products WHERE
tbl_salesdetails.prod_id=tbl_products.prod_id AND tbl_salesdetails.sales_no='$si_no'");
	$i = 1;
	$l = 1;
		while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo $row['name'];echo " ";echo $row['packing'];?></td>
		<td><?php echo $row['lot_no'];?></td>
		<td><?php echo $row['expiry_date'];?></td>
		<td><?php echo $row['quantity'];?></td>
		<td>₱&nbsp;<?php echo number_format($row['price'],2);?></td>
		<td>₱&nbsp;<?php echo number_format($row['amount'],2);?></td>
		<td>
			<button class="btn btn-warning btn-xs" id="btn-update" type="button" name="btn-update" data-up=<?php echo $row['id'];?> data-eprices=<?php echo number_format($row['price'],2);?> data-qty=<?php echo $row['quantity'];?> ><b class="fa fa-pencil"></b></button>
		</td>
		<td>
			<input type="number" id="totalamounts" value="<?php echo $tad;?>" hidden>
			<button class="btn btn btn-danger btn-xs" id="btn-delete" type="button" name="btn-delete" data-dids=<?php echo $row['id'];?> data-qty=<?php echo $row['quantity'];?>><b class="fa fa-times">&nbsp;</b></button></b>   
		</td>
	</tr>
<?php
		}
	}else if ($_POST['cr_no']) {
		$si = mysqli_real_escape_string($db,$_POST['cr_si']);	
		$cr = mysqli_real_escape_string($db,$_POST['cr_no']);
		$sql = mysqli_query($db,"SELECT SUM(amount) as total FROM tbl_CRdetails WHERE cr_no='$cr'");
		$rows = mysqli_fetch_assoc($sql);
		$tad = $rows['total'];
		$query = mysqli_query($db,"SELECT tbl_sales.total_amount,tbl_CRdetails.crd_id,tbl_CRdetails.amount,tbl_CRdetails.sales_no,tbl_CRdetails.sales_no FROM tbl_CRdetails INNER JOIN tbl_sales ON tbl_sales.sales_no=tbl_CRdetails.sales_no WHERE tbl_CRdetails.cr_no='$cr'");
		$i=1;
		while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo sprintf('%04d',$row['sales_no']);?></td>
		<td><?php echo number_format($row['amount'],2);?></td>
		<td><?php echo number_format($row['total_amount']-$tad,2);?></td>
		<td>
			<input type="number" step="any" id="total_amounts" value="<?php echo $tad;?>" hidden>
			<button class="btn btn btn-danger btn-xs" id="btn-delete" name="btn-delete" data-dids=<?php echo $row['crd_id'];?> data-sids="<?php echo $row['sales_no']?>"><b class="fa fa-times">&nbsp;</b></button></b>   
		</td>
	</tr>
<?php
		}
	}else if($_POST['cr_d']){
		$cr = mysqli_real_escape_string($db,$_POST['cr_d']);
		$sql = mysqli_query($db,"SELECT * FROM tbl_CRdetails WHERE cr_no='$cr'");
		$i=1;
		while ($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo sprintf('%04d',$row['sales_no']);?></td>
		<td><?php echo number_format($row['amount']);?></td>
		<td>
			<button class="btn btn-warning btn-xs" id="btn-update" name="btn-update" data-up=<?php echo $row['crd_id'];?> data-si="<?php echo sprintf('%04d',$row['sales_no']);?>"><b class="fa fa-pencil"></b></button>
		</td>
		<td>
			<button class="btn btn btn-danger btn-xs" id="btn-delete" name="btn-delete" data-dids=<?php echo $row['crd_id'];?>><b class="fa fa-times">&nbsp;</b></button></b>   
		</td>
	</tr>
<?php
		}
	}elseif ($_POST['cm_no']) {
		$cm = mysqli_real_escape_string($db,$_POST['cm_no']);
		$pi = mysqli_real_escape_string($db,$_POST['pid']);
		$si = mysqli_real_escape_string($db,$_POST['si']);
		$sql2 = mysqli_query($db,"SELECT SUM(cmd_amount) as total FROM tbl_CMdetails WHERE cm_no='$cm' AND prod_id='$pi'");
		$rows = mysqli_fetch_assoc($sql2);
		$sql = mysqli_query($db,"SELECT * FROM tbl_CMdetails INNER JOIN tbl_products ON tbl_CMdetails.prod_id=tbl_products.prod_id WHERE tbl_CMdetails.cm_no='$cm' AND tbl_CMdetails.prod_id='$pi'");
		$i=1;
		while ($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo $row['name'].' '.$row['description'].' '.$row['packing'].' ('.$row['lot_no'].')';?></td>
		<td><?php echo $row['cmd_qty'];?></td>
		<td><?php echo number_format($row['cmd_price'],2);?></td>
		<td><?php echo number_format($row['cmd_amount'],2);?></td>
		<td>
			<input type="number" name="sino" id="si_no1" value="<?php echo $si;?>" hidden>
			<button class="btn btn-warning btn-xs"><b class="fa fa-pencil"></b></button>
		</td>
		<td>
			<input type="number" step="any" id="totalAM" name="tam" value="<?php echo $rows['total'];?>" hidden>
			<button class="btn btn-danger btn-xs" id="btn-remove" data-id="<?php echo $row['cmd_id'];?>" data-qt="<?php echo $row['cmd_qty']?>" data-pi="<?php echo $row['prod_id']?>" data-pr="<?php echo $row['cmd_price']?>" data-am="<?php echo $row['cmd_amount']?>" type="button"><b class="fa fa-times"></b></button>
		</td>
	</tr>
<?php			
		}
		
	}else if ($_POST['cm_d']) {
		$cm = mysqli_real_escape_string($db,$_POST['cm_d']);
		$sql = mysqli_query($db,"SELECT * FROM tbl_CMdetails INNER JOIN tbl_products ON tbl_CMdetails.prod_id=tbl_products.prod_id WHERE tbl_CMdetails.cm_no='$cm'");
		$i=1;
		while ($row = mysqli_fetch_array($sql)) {
?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo $row['name'].' '.$row['description'].' '.$row['packing'].' ('.$row['lot_no'].')';?></td>
		<td><?php echo $row['cmd_qty'];?></td>
		<td><?php echo number_format($row['cmd_price'],2);?></td>
		<td><?php echo number_format($row['cmd_amount'],2);?></td>
		<td>
			<button class="btn btn-warning btn-xs" id="btn-update" name="btn-update" data-ups=<?php echo $row['cmd_id'];?> data-si="<?php echo sprintf('%04d',$row['sales_no']);?>"><b class="fa fa-pencil"></b></button>
		</td>
		<td>
			<button class="btn btn btn-danger btn-xs" id="btn-delete" name="btn-delete" data-dids=<?php echo $row['cmd_id'];?>><b class="fa fa-times">&nbsp;</b></button></b>   
		</td>
	</tr>
<?php			
		}
	}elseif ($_POST['po']) {
		$po = mysqli_real_escape_string($db,$_POST['po']);
		$query = mysqli_query($db,"SELECT SUM(prod_amount) as total FROM tbl_POdetails WHERE po_no='$po'");
		$rows = mysqli_fetch_assoc($query);
		$sql = mysqli_query($db,"SELECT * FROM tbl_POdetails WHERE po_no='$po'");
		$i=1;
		while($row = mysqli_fetch_array($sql)){
?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo $row['prod_name'];?></td>
		<td><?php echo $row['prod_maker'];?></td>
		<td><?php echo $row['prod_qty'];?></td>
		<td><?php echo number_format($row['prod_price'],2);?></td>
		<td><?php echo number_format($row['prod_amount'],2);?></td>
		<td>
			<input type="hidden" name="" id="total" value="<?php echo $rows['total'];?>">
			<button type="button" class="btn-remove btn btn-danger btn-xs" data-id="<?php echo $row['pod_no'];?>"><b class="fa fa-close"></b></button>
		</td>
	</tr>
<?php
		}
	}
?>	