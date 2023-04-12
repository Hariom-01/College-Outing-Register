<?php
// Include autoloader 
require_once 'dompdf/autoload.inc.php';
session_start();
include "db_conn.php"; 
 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();
$user_name = 'Ross Geller';
$total_amount_due = 2270.00;
$sql = "SELECT * FROM admins WHERE id = 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    
    $user_name = $row['user_name'];
    $total_amount_due = 2270.00;
}



ob_start();
require('summary/index.php');
$html = ob_get_contents();
ob_get_clean();
$dompdf->loadHtml($html);
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF to Browser 
$dompdf->stream();
?>