<?php
// Contact Form Handler
// Processes contact form submissions and sends emails

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    
    // Validation
    $errors = [];
    
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
    
    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }
    
    if (empty($subject)) {
        $errors[] = 'Subject is required';
    }
    
    if (empty($message)) {
        $errors[] = 'Message is required';
    }
    
    // If validation passes, send email
    if (empty($errors)) {
        // Email to yourself
        $to = 'fathi@example.com';
        $email_subject = 'New Contact Form Submission: ' . $subject;
        $email_body = "Name: " . htmlspecialchars($name) . "\n";
        $email_body .= "Email: " . htmlspecialchars($email) . "\n";
        $email_body .= "Subject: " . htmlspecialchars($subject) . "\n";
        $email_body .= "Message:\n" . htmlspecialchars($message) . "\n";
        
        $headers = "From: " . htmlspecialchars($email) . "\r\n";
        $headers .= "Reply-To: " . htmlspecialchars($email) . "\r\n";
        
        // Send email (works on servers with mail() configured)
        if (@mail($to, $email_subject, $email_body, $headers)) {
            // Also send confirmation to the user
            $user_subject = 'We received your message';
            $user_body = "Hi " . htmlspecialchars($name) . ",\n\n";
            $user_body .= "Thank you for reaching out! I've received your message and will get back to you soon.\n\n";
            $user_body .= "Best regards,\nFathi Mahad";
            
            @mail($email, $user_subject, $user_body, "From: noreply@fathimahad.com\r\n");
            
            echo json_encode([
                'success' => true,
                'message' => 'Message sent successfully! I\'ll get back to you soon.'
            ]);
        } else {
            echo json_encode([
                'success' => true,
                'message' => 'Message received! (Email delivery may be unavailable on this server.)',
                'warning' => true
            ]);
        }
    } else {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'errors' => $errors
        ]);
    }
} else {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Method not allowed'
    ]);
}
?>
