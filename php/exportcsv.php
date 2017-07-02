<?php
if (isset($_POST['exportcustomer'])) {
   // output headers so that the file is downloaded rather than displayed
    include 'config.php';
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=customers.csv');

    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    // output the column headings
    fputcsv($output, array('Customer ID', 'Full Name', 'TIN', 'TERMS', 'OSCA/PID No', 'Business Style', 'Address', 'Date Added'));

    // fetch the data
    
    $result = mysqli_query($db,"SELECT * FROM tbl_customers ORDER BY cus_id ASC");

    // loop over the rows, outputting them
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output,$row);
    }
    fclose($output);
}
if (isset($_POST['exportproduct'])) {
    // output headers so that the file is downloaded rather than displayed
    include 'config.php';
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=products.csv');

    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    // output the column headings
    fputcsv($output, array('ID', 'Product Name', 'Description', 'Price', 'Expiry Date', 'Quantity', 'Packing', 'Lot No', 'Date Added'));

    // fetch the data
    
    $result = mysqli_query($db,"SELECT * FROM tbl_products ORDER BY prod_id ASC");

    // loop over the rows, outputting them
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output,$row);
    }
    fclose($output);
}
if (isset($_POST['exportsi_no'])) {
    // output headers so that the file is downloaded rather than displayed
    include 'config.php';
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=sales.csv');

    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    // output the column headings
    fputcsv($output, array('ID', 'Sales No', 'Customer Name', 'Date', 'Prepared By', 'Checked By', 'VAT', 'Total Amount Due', 'Total Amount Sales','Total Net Amount','Status','Due Date','Date Added'));

    // fetch the data
    
    $result = mysqli_query($db,"SELECT tbl_sales.sales_id,tbl_sales.sales_no,tbl_customers.full_name,tbl_sales.dates,tbl_sales.prepared_by,tbl_sales.checked_by,tbl_sales.VAT,tbl_sales.total_amount,tbl_sales.total_sales,tbl_sales.due_date,tbl_sales.amount_net,tbl_sales.status,tbl_sales.timestamp FROM tbl_customers INNER JOIN tbl_sales ON tbl_sales.cus_id=tbl_customers.cus_id ORDER BY sales_id ASC");

    // loop over the rows, outputting them
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output,$row);
    }
    fclose($output);
}
if (isset($_POST['exportpay_repo'])) {
    // output headers so that the file is downloaded rather than displayed
    include 'config.php';
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=payments.csv');

    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    // output the column headings
    fputcsv($output, array('ID', 'Sales No', 'Customer Name', 'Amount', 'Payment','Date Added'));

    // fetch the data
    
    $result = mysqli_query($db,"SELECT tbl_payments.pay_id, tbl_payments.sales_no, tbl_customers.full_name, tbl_paymentsdetails.amount,tbl_paymentsdetails.pay_type,tbl_paymentsdetails.timestamp FROM tbl_payments INNER JOIN tbl_paymentsdetails ON tbl_payments.pay_id = tbl_paymentsdetails.pay_id LEFT JOIN tbl_customers ON tbl_payments.cus_id = tbl_customers.cus_id ORDER BY pay_id ASC");

    // loop over the rows, outputting them
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output,$row);
    }
    fclose($output);    
}
?>