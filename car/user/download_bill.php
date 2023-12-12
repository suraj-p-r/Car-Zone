<?php
if(isset($_GET['o_id'])) {
    $o_id = $_GET['o_id'];
    $invoice_no = mt_rand();

    ob_start();  // Start output buffering

    // Include the bill generation code
    include 'bill.php';  // Replace with the actual filename of your bill generation script

    $billContent = ob_get_clean();  // Get the buffered content

    // Set appropriate headers for file download
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="car_rental_bill.html"');

    // Output the bill content
    echo $billContent;

    // End the script
    exit();
} else {
    // Handle the case where 'o_id' is not set
    echo 'Error: Order ID not specified.';
}
?>


