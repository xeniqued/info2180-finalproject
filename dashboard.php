<?php
// Allow all origins (you can restrict this to specific domains for security)
header("Access-Control-Allow-Origin: *"); // Allow all domains (you can specify a domain if necessary)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Allow GET, POST, and OPTIONS methods
header("Access-Control-Allow-Headers: Content-Type"); // Allow certain headers
header('Content-Type: application/json'); // Ensures the response is treated as JSON
error_reporting(E_ERROR | E_PARSE); // Suppress warnings and notices
ob_clean(); // Clear any unwanted output before JSON

$host = 'localhost';
$username = 'admin';
$password = 'admin123';
$dbname = 'dolphin_crm';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


    $stmt = $conn->prepare("SELECT * FROM Contacts");
    $stmt->execute();
    $results = $stmt->get_result();
  
    

echo "<table class = 'data-table'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Company</th>
                <th id = 'type'> Type </th>
            </tr>";
    while ($row = $results->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['title']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td>" . htmlspecialchars($row['company']) . "</td>
                <td>" . htmlspecialchars($row['type']) . "</td>
              </tr>";
    }
    echo "</table>";
