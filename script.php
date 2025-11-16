<?php 
use PHPMailer\PHPMailer\Exception; 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 

require 'PHPMailer/src/Exception.php'; 
require 'PHPMailer/src/PHPMailer.php'; 
require 'PHPMailer/src/SMTP.php';
require 'confiq.php'; 
define('DB_HOST', 'localhost'); // Database host
define('DB_NAME', 'ncc'); // Your database name
define('DB_USER', 'root'); // Your database username
define('DB_PASS', '');

function getAttachmentById($id) {
    try {
        // Create a new PDO connection
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the query
        $stmt = $pdo->prepare("SELECT pdf_name, pdf_data FROM pdf_table WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the attachment data
        $attachment = $stmt->fetch(PDO::FETCH_ASSOC);

        // Return the attachment data
        return $attachment;
    } catch (PDOException $e) {
        return null;
    }
}

function sendMail($email, $subject, $message, $attachmentId = null) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = MAILHOST;
        $mail->Username = USERNAME;
        $mail->Password = PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom(SEND_FROM, SEND_FROM_NAME);
        $mail->addAddress($email);
        $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);

        // Attachments
        if ($attachmentId) {
            $attachment = getAttachmentById($attachmentId);
            if ($attachment) {
                // Add the attachment to the email
                $mail->addStringAttachment($attachment['pdf_data'], $attachment['pdf_name'], 'base64', 'application/pdf');
            } else {
                throw new Exception('Could not find the attachment with the given ID.');
            }
        }

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = strip_tags($message);

        $mail->send();
        return "Success";
    } catch (Exception $e) {
        return "Mail not sent. Error: {$mail->ErrorInfo}";
    }
}
?>
