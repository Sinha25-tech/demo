<?php
// contact_form_handler.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate form fields
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // Recipient email address
        $to = "shubham.sinha@digranknow.com";

        // Subject of the email
        $subject = "New Contact Form Submission from $name";

        // Construct email body
        $body = "You have received a new message from the contact form on your website.\n\n";
        $body .= "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Message:\n$message\n";

        // Headers for the email
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you for contacting us, $name. We will get back to you soon!";
        } else {
            echo "Sorry, something went wrong. Please try again later.";
        }
    } else {
        echo "Please fill out all fields correctly.";
    }
}
?>
