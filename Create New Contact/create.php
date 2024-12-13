<?php
// Set CORS headers if needed
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Ensure the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read the raw input from the request body
    $input = file_get_contents('php://input');

    // Decode the JSON data into a PHP array
    $data = json_decode($input, true);

    // Check for JSON decoding errors
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['success' => false, 'message' => 'Invalid JSON input: ' . json_last_error_msg()]);
        exit;
    }

    // Extract data from the JSON payload
    $title = $data['title'] ?? null;
    $fname = $data['fname'] ?? null;
    $lname = $data['lname'] ?? null;
    $email = $data['email'] ?? null;
    $phone = $data['phone'] ?? null;
    $company = $data['company'] ?? null;

    // Example: Validate required fields
    if (!$fname || !$lname || !$email) {
        echo json_encode(['success' => false, 'message' => 'Missing required fields.']);
        exit;
    }

    // Email Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
        exit;
    }

    // Example: Insert into the database (replace with your own logic)
    $response = [
        'success' => true,
        'message' => 'Data received successfully',
        'data' => $data, // Echo back the received data
    ];

    // Send a JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle unsupported request methods
    echo json_encode(['success' => false, 'message' => 'Only POST requests are allowed.']);
}
?>
