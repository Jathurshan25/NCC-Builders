<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'ncc');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Delete user
    $sql = "DELETE FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        echo "<script>alert('User deleted successfully'); window.location.href='admin.php';</script>";
    } else {
        echo "<script>alert('Error deleting user'); window.location.href='admin.php';</script>";
    }
} else {
    echo "<script>alert('Invalid email'); window.location.href='admin.php';</script>";
    exit;
}

$conn->close();
?>
