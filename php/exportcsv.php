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
?>