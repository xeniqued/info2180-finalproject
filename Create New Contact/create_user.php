<?php
// Handling CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept");

// Check for OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204); // No Content
    exit;
}

// Handle GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode(['success' => false, 'message' => 'GET requests are not allowed']);
    exit;
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve raw POST input
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);


    // Validate JSON decoding
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['success' => false, 'message' => 'Invalid JSON format']);
        exit;
    }

    // Extract fields from the received data
    $title = $data['title'] ?? null;
    $fname = $data['fname'] ?? null;
    $lname = $data['lname'] ?? null;
    $email = $data['email'] ?? null;
    $company = $data['company'] ?? null;
    $phone = $data['phone'] ?? null;
    $type = $data['type'] ?? null;

     //     //Database Connection
    // $conn = new mysqli($db_host, $db_username, $db_password, $dbname);

    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }



    // // Insert DATA
    // $sql = "INSERT INTO Contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at, updated_at) VALUES ('whatever',?,?,?,?,?,?,?,?,?,?,?)";
    // $stmt = $pdo->prepare($sql);
    // // Not sure how to inserts the persons id?
    // $stmt->execute([$title, $firstname, $lastname, $email, $phone, $company, $type,  $assignedto,  USERSID   , GETDATE(), GETDATE()]);


    // // Error Checking
    // if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully";
    // } else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // }

    // // Close connection
    // mysqli_close($conn);


    // Debugging: Return received data
    echo json_encode([
        'success' => true,
        'message' => 'Data received successfully',
        'data' => $data,
    ]);
    exit;
}

// Handle unsupported request methods
echo json_encode(['success' => false, 'message' => 'Unsupported request method']);
exit;
