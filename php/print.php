<?php
include 'session.php';
require 'fpdf/fpdf.php';
if (isset($_POST['print'])) {
$si_no = mysqli_escape_string($db,$_POST['sales_no']);
$cu_id = mysqli_escape_string($db,$_POST['cus_id']);
$pdf = new FPDF('P','mm','Legal');
$pdf->AddPage();
$query1 = mysqli_query($db,"SELECT tbl_customers.full_name,tbl_customers.tin,tbl_customers.terms,tbl_customers.opidno,tbl_sales.total_amount,tbl_sales.total_sales,tbl_sales.amount_net,tbl_customers.bstyle,tbl_sales.VAT,tbl_customers.address,tbl_sales.dates FROM tbl_customers, tbl_sales WHERE tbl_sales.cus_id='$cu_id' AND tbl_customers.cus_id='$cu_id'");
$rows=mysqli_fetch_assoc($query1);
$pdf->SetTitle("Print Sales Invoice",true);
$pdf->SetFont('Arial','B',11);
$pdf->Ln(30);
$pdf->Cell(20,7,'SOLD to',0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(90,7,$rows['full_name'],0,0,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(20,7,'Date',0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(60,7,$rows['dates'],0,1,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(20,7,'TIN/SC-TIN',0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(90,7,$rows['tin'],0,0,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(20,7,'Terms',0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(60,7,$rows['terms'],0,1,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(20,7,'Address',0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(90,7,$rows['address'],0,0,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(20,7,'OSCA/PWID ID No.',0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(60,7,$rows['opidno'],0,1,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(20,7,'Business Style',0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(90,7,$rows['bstyle'],0,1,'C');

// 
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,10,'Code',0,0,'C');
$pdf->Cell(88,10,'Product Description',0,0,'C');
$pdf->Cell(18,10,'Lot No.',0,0,'C');
$pdf->Cell(18,10,'Expiry',0,0,'C');
$pdf->Cell(18,10,'Quantity',0,0,'C');
$pdf->Cell(19,10,'Unit Price',0,0,'C');
$pdf->Cell(22,10,'AMOUNT',0,1,'C');
$query = mysqli_query($db,"SELECT tbl_products.name,tbl_products.packing,tbl_salesdetails.id,tbl_salesdetails.sales_no,tbl_products.lot_no,tbl_products.expiry_date,tbl_salesdetails.quantity, tbl_products.price, tbl_salesdetails.amount
FROM tbl_salesdetails, tbl_products WHERE
tbl_salesdetails.prod_id=tbl_products.prod_id AND tbl_salesdetails.sales_no='$si_no'");
	$o = 1;
$arr = array();
while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
	$arr[] = $row;
}
$pdf->SetFont('Arial','',10);
for ($i=0; $i < count($arr); $i++) { 
	$pdf->Cell(10,10,$o++,0,0,'C');
	$pdf->Cell(88,10,$arr[$i][name]." ".$arr[$i][packing],0,0,'C');
	$pdf->Cell(18,10,$arr[$i][lot_no],0,0,'C');
	$pdf->Cell(18,10,$arr[$i][expiry_date],0,0,'C');
	$pdf->Cell(18,10,$arr[$i][quantity],0,0,'C');
	$pdf->Cell(19,10,number_format($arr[$i][price],2),0,0,'C');
	$pdf->Cell(22,10,number_format($arr[$i][amount],2),0,1,'C');
}
$pdf->SetXY(120,270);//Coordinates for Fixed Position
$pdf->Cell(30,10,'Total Amount Due:',0,0);
$pdf->Cell(50,10,number_format($rows['total_amount'],2),0,1,'C');
$pdf->SetXY(120,280);//Coordinates for Fixed Position
$pdf->Cell(30,10,'Total Net Amount:',0,0);
$pdf->Cell(50,10,number_format($rows['amount_net'],2),0,1,'C');
$pdf->SetXY(120,290);//Coordinates for Fixed Position
$pdf->Cell(30,10,'Total Amount Sales:',0,0);
$pdf->Cell(50,10,number_format($rows['total_sales'],2),0,1,'C');
$pdf->SetXY(120,300);//Coordinates for Fixed Position
$pdf->Cell(49,10,'VAT:',0,0);
$pdf->Cell(10,10,$rows['VAT']."%",0,1,'C');
$pdf->Output();
}
?>