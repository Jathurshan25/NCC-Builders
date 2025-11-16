<?php 
require("script.php");
session_start(); 
$id = isset($_SESSION['pdf_id']) ? intval($_SESSION['pdf_id']) : 0;
$re_email =$_SESSION['rec_mail'];
$subject="NCC Builders Project Quotation";
$message="your requested automated quotation attached below: ";
if (isset($_SESSION['rec_mail'])) {
    $attachmentId = $id;
    $response = sendMail($re_email, $subject, $message, $attachmentId);
    
    echo '<script>
    alert("Thank you for your request.you will receive the quotation to your mail within 5 minutes");
    window.location.href="index.php";
    </script>';
}
else{
    die(" mmmmissing ID.");
}
if ($id <= 0) {
    die("Invalid or missing ID.");
}

?>

