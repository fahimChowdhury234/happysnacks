<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST['first_name']);
    $middleName = htmlspecialchars($_POST['middle_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $phoneNumber = htmlspecialchars($_POST['phone_number']);
    $organization = htmlspecialchars($_POST['organization']);
    $contactOptions = htmlspecialchars($_POST['contact_options']);
    $message = htmlspecialchars($_POST['message']);

    // Recipient email
    $to = "koubini02@hotmail.com"; // Replace with your email address

    // Subject of the email
    $subject = "New contact form submission in Happy Snacks";

    // Email body
    $body = "First Name: $firstName\n";
    $body .= "Middle Name: $middleName\n";
    $body .= "Last Name: $lastName\n";
    $body .= "Email: $email\n";
    $body .= "Phone Number: $phoneNumber\n";
    $body .= "Organization: $organization\n";
    $body .= "Preferred Contact Method: $contactOptions\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to send email.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>