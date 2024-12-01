<?php
header('Content-Type: application/json');

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dolphin_crm";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["success" => false, "error" => "Connection failed: " . $conn->connect_error]));
}

if (isset($_GET['user'])) {
    $userId = $conn->real_escape_string($_GET['user']);

    // Fetch user data from database
    $sql = "SELECT name, email, telephone, company, assigned_to, created_at, updated_at FROM contacts WHERE id = '$userId'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo json_encode(["success" => true, "name" => $user['name'], "email" => $user['email'], "telephone" => $user['telephone'], 
        "company" => $user['company'], "assigned_to" => $user['assigned_to'], "created_at" => $user['created_at'], 
        "updated_at" => $user['updated_at']]);
    } else {
        echo json_encode(["success" => false, "error" => "User not found"]);
    }
} else {
    echo json_encode(["success" => false, "error" => "No user ID specified"]);
}

$conn->close();
?>
