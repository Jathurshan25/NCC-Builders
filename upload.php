<?php

session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ncc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdf'])) {
    $pdf = $_FILES['pdf']['tmp_name'];
    $pdfName = $_FILES['pdf']['name'];
    $pdfData = file_get_contents($pdf);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO pdf_table (pdf_name, pdf_data) VALUES (?, ?)");
    $null = NULL;
    $stmt->bind_param("sb", $pdfName, $null);
    $stmt->send_long_data(1, $pdfData);

    // Execute
    if ($stmt->execute()) {
        $_SESSION['pdf_id'] = $stmt->insert_id;
        
        echo "PDF uploaded and saved to database successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


