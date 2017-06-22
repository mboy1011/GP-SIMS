<?php
	include 'config.php';
	if ($_REQUEST['sales_no']) {
	$si_no = mysqli_real_escape_string($db,$_POST['sales_no']);	
	// $sales = mysqli_query($db,"SELECT * FROM tbl_salesdetails");
	$total = mysqli_query($db,"SELECT SUM(amount) as total FROM tbl_salesdetails WHERE sales_no='$si_no'");
	$rows = mysqli_fetch_array($total,MYSQLI_ASSOC); 
	$tad = $rows['total'];
// 	$query = mysqli_query($db,"SELECT tbl_products.name,tbl_products.lot_no,tbl_products.expiry_date,tbl_salesdetails.quantity, tbl_products.price, tbl_salesdetails.amount
// FROM tbl_salesdetails
// INNER JOIN tbl_products
// ON tbl_salesdetails.prod_id=tbl_products.prod_id");

	$query = mysqli_query($db,"SELECT tbl_products.name,tbl_products.packing,tbl_salesdetails.id,tbl_salesdetails.sales_no,tbl_products.lot_no,tbl_products.expiry_date,tbl_salesdetails.quantity, tbl_products.price, tbl_salesdetails.amount
FROM tbl_salesdetails, tbl_products WHERE
tbl_salesdetails.prod_id=tbl_products.prod_id AND tbl_salesdetails.sales_no='$si_no'");
	$i = 1;
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
		<input type="number" id="totalamounts" value="<?php echo $tad;?>" hidden>
		<button class="btn btn btn-danger btn-xs" id="btn-delete" name="btn-delete" data-dids=<?php echo $row['id'];?> data-qty=<?php echo $row['quantity'];?>><b class="fa fa-times">&nbsp;</b></button></b>   
		</td>
	</tr>
<?php
	}
}
?>	