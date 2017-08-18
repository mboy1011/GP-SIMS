<?php
require 'session.php';
require 'pdf_js.php';
class PDF_AutoPrint extends PDF_JavaScript
{
    function AutoPrint($printer='')
    {
        // Open the print dialog
        if($printer)
        {
            $printer = str_replace('\\', '\\\\', $printer);
            $script = "var pp = getPrintParams();";
            $script .= "pp.interactive = pp.constants.interactionLevel.full;";
            $script .= "pp.printerName = '$printer'";
            $script .= "print(pp);";
        }
        else
            $script = 'print(true);';
        $this->IncludeJS($script);
    }
}
if (isset($_POST['print'])) {
$si_no = mysqli_escape_string($db,$_POST['sales_no']);
$cu_id = mysqli_escape_string($db,$_POST['cus_id']);
$pdf = new PDF_AutoPrint('P','mm','Legal');
$pdf->AddPage();
$query1 = mysqli_query($db,"SELECT tbl_customers.full_name,tbl_customers.tin,tbl_customers.terms,tbl_customers.opidno,tbl_sales.total_amount,tbl_sales.total_sales,tbl_sales.amount_net,tbl_customers.bstyle,tbl_sales.VAT,tbl_customers.address,DATE_FORMAT(tbl_sales.dates,'%M %m, %Y') AS dates,tbl_sales.discount1,tbl_sales.discount2 FROM tbl_customers, tbl_sales WHERE tbl_sales.cus_id='$cu_id' AND tbl_customers.cus_id='$cu_id' AND tbl_sales.sales_no='$si_no'");
$rows=mysqli_fetch_assoc($query1);
$pdf->SetTitle("Print Sales Invoice",true);
$pdf->SetFont('Arial','B',11);
$pdf->SetXY(150,20);//Coordinates for Fixed Position
$pdf->Cell(30,7,'Invoice No.',0,0);
$pdf->Cell(20,7,sprintf("%04d",$si_no),0,0,'R');
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
$query = mysqli_query($db,"SELECT tbl_products.name,tbl_products.packing,tbl_salesdetails.id,tbl_salesdetails.sales_no,tbl_products.lot_no,DATE_FORMAT(tbl_products.expiry_date,'%Y-%m') AS expiry_date,tbl_salesdetails.quantity, tbl_salesdetails.price, tbl_salesdetails.amount
FROM tbl_salesdetails, tbl_products WHERE
tbl_salesdetails.prod_id=tbl_products.prod_id AND tbl_salesdetails.sales_no='$si_no'");
	$o = 1;
$arr = array();
while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
	$arr[] = $row;
}
$pdf->SetFont('Arial','',10);
for ($i=0; $i < count($arr); $i++) { 
	$pdf->Cell(20,5,$o++,0,0,'L');
	$pdf->Cell(84,5,$arr[$i][name]." ".$arr[$i][packing],0,0,'L');
	$pdf->Cell(16,5,$arr[$i][lot_no],0,0,'L');
	$pdf->Cell(16,5,$arr[$i][expiry_date],0,0,'L');
	$pdf->Cell(15,5,$arr[$i][quantity],0,0,'C');
	$pdf->Cell(17,5,number_format($arr[$i][price],2),0,0,'C');
	$pdf->Cell(20,5,number_format($arr[$i][amount],2),0,1,'C');
}
$pdf->SetXY(50,290);//Coordinates for Fixed Position
$pdf->Cell(30,5,'Total Sales',0,0);
$pdf->Cell(20,5,number_format($rows['total_amount'],2),0,1,'R');
$pdf->SetXY(50,295);//Coordinates for Fixed Position
$pdf->Cell(30,5,'Less Discount 1',0,0);
$pdf->Cell(20,5,number_format($rows['discount1']).'%',0,1,'R');
$pdf->SetXY(50,300);//Coordinates for Fixed Position
$pdf->Cell(30,5,'Less Discount 2',0,0);
$pdf->Cell(20,5,number_format($rows['discount2']).'%',0,1,'R');
$pdf->SetXY(40,305);//Coordinates for Fixed Position
$pdf->Cell(40,5,'Total Amount Due',0,0,'R');
$pdf->SetFont('','U');
$pdf->Cell(20,5,number_format($rows['total_amount'],2),0,1,'R');
$pdf->SetFont('','');
$pdf->SetXY(120,290);//Coordinates for Fixed Position
$pdf->Cell(30,5,'Total Net of VAT',0,0);
$pdf->Cell(50,5,number_format($rows['amount_net'],2),0,1,'R');
$pdf->SetXY(120,295);//Coordinates for Fixed Position
$pdf->Cell(30,5,'Total Sales',0,0);
$pdf->Cell(50,5,number_format($rows['total_sales'],2),0,1,'R');
$pdf->SetXY(120,300);//Coordinates for Fixed Position
$pdf->Cell(50,5,'Less: VAT',0,0);
$pdf->Cell(30,5,$rows['VAT']."%",0,1,'R');
$pdf->SetXY(120,305);//Coordinates for Fixed Position
$pdf->SetFont('Arial','B',11);
$pdf->Cell(30,5,'Total Amount Due',0,0);
$pdf->Cell(50,5,number_format($rows['total_amount'],2),0,1,'R');

$pdf->AutoPrint();
$pdf->Output();
}else if(isset($_POST['printPO'])){
    $po = mysqli_real_escape_string($db,$_POST['po_no']);
    $sql = mysqli_query($db,"SELECT DATE_FORMAT(tbl_PO.po_date,'%M %m, %Y') as po_date, SUM(tbl_POdetails.prod_amount) as prod_amount, tbl_PO.prepare_by, tbl_PO.noted_by FROM tbl_PO INNER JOIN tbl_POdetails ON tbl_PO.po_no=tbl_POdetails.po_no WHERE tbl_PO.po_no='$po'");
    $row = mysqli_fetch_assoc($sql);
    $pdf = new PDF_AutoPrint('P','mm','Legal');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->SetXY(75,10);//Coordinates for Fixed Position
    $pdf->Cell(82,7,'GOLDEN PHARMACEUTICAL',0,0);
    $pdf->SetFont('Arial','',12);
    $pdf->SetXY(75,15);
    $pdf->Cell(82,7,'Tel No. (088) 857-3088 (Telefax)',0,0,'C');
    $pdf->SetFont('Arial','',11);
    $pdf->SetXY(75,20);
    $pdf->Cell(82,7,'Bolonsori Road, Camaman-an, Cagayan de Oro City',0,0,'C');
    $pdf->SetFont('Arial','B',13);
    $pdf->SetXY(75,30);
    $pdf->Cell(82,7,'Purhase Order',0,0,'C');
    $pdf->SetXY(130,40);
    $pdf->Cell(25,7,'Date: ',0,0,'R');
    $pdf->SetXY(175,40);
    $pdf->SetFont('Arial','U',13);
    $pdf->Cell(25,7,$row['po_date'],0,1,'R');
    $sql2 = mysqli_query($db,"SELECT * FROM tbl_POdetails WHERE po_no='$po'");
    $arr = array();
    $o=1;
    while ($rows = mysqli_fetch_array($sql2)) {
        $arr[] = $rows;
    }
    $pdf->Cell(10,5,'',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(10,5,'ID',1,0,'C');
    $pdf->Cell(80,5,'Product',1,0,'C');
    $pdf->Cell(40,5,'Maker',1,0,'C');
    $pdf->Cell(20,5,'Qty.',1,0,'C');
    $pdf->Cell(20,5,'Price',1,0,'C');
    $pdf->Cell(25,5,'Amount',1,1,'C');
    // 
    $pdf->SetFont('Arial','',11);
    for ($i=0; $i < count($arr); $i++) { 
        $pdf->Cell(10,5,$o++,1,0,'C');
        $pdf->Cell(80,5,$arr[$i][prod_name],1,0,'C');
        $pdf->Cell(40,5,$arr[$i][prod_maker],1,0,'C');
        $pdf->Cell(20,5,$arr[$i][prod_qty],1,0,'C');
        $pdf->Cell(20,5,number_format($arr[$i][prod_price],2),1,0,'C');
        $pdf->Cell(25,5,number_format($arr[$i][prod_amount],2),1,1,'R');
    }
    $pdf->Cell(10,5,'',1,0,'C');
    $pdf->Cell(80,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(20,5,'Total:',1,0,'C');
    $pdf->Cell(25,5,number_format($row['prod_amount'],2),1,1,'R');
    // 
    $pdf->Ln(20);
    $pdf->Cell(30,5,'Prepared By:',0,0);
    $pdf->Cell(70,5,strtoupper($row['prepare_by']),0,0);
    $pdf->Cell(30,5,'Noted By:',0,0);
    $pdf->Cell(65,5,strtoupper($row['noted_by']),0,0);
    // $pdf->AutoPrint();
    $pdf->Output();
}
?>