<?php
// Handling CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept");

// var_dump($_GET);
// exit;

// Database credentials
$host = 'localhost';
$username = 'admin';
$password = 'admin123';
$dbname = 'dolphin_crm';

// Handle OPTIONS preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204); // No Content
    exit;
}

// Ensure the request is a GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve data from query parameters
    $title = isset($_GET['title']) ? trim($_GET['title']) : null;
    $fname = isset($_GET['fname']) ? trim($_GET['fname']) : null;
    $lname = isset($_GET['lname']) ? trim($_GET['lname']) : null;
    $email = isset($_GET['email']) ? trim($_GET['email']) : null;
    $company = isset($_GET['company']) ? trim($_GET['company']) : null;
    $phone = isset($_GET['phone']) ? trim($_GET['phone']) : null;
    $type = isset($_GET['type']) ? trim($_GET['type']) : null;

    if (!$fname || !$lname || !$email) {
        echo json_encode([
            'success' => false,
            'message' => 'Missing required fields'
        ]);
        exit;
    }


    // Database connection
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]));
    }

    // Insert data into the database
    $sql = "INSERT INTO Contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Failed to prepare statement: ' . $conn->error]);
        exit;
    }

    // Example values for assigned_to and created_by
    $assigned_to = 1; // Change to actual logic if needed
    $created_by = 1;  // Change to actual logic if needed
    $created_at = date('Y-m-d H:i:s');
    $updated_at = $created_at;

    // Bind parameters
    $stmt->bind_param(
        'sssssssssss', // 's' indicates string type
        $title,
        $fname,
        $lname,
        $email,
        $phone,
        $company,
        $type,
        $assigned_to,
        $created_by,
        $created_at,
        $updated_at
    );

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Contact created successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to execute statement: ' . $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
    exit;
}

// If request method is not GET
echo json_encode(['success' => false, 'message' => 'Unsupported request method']);
exit;