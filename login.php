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

//Get user input
$password = POST['password'];
$email = POST['email'];

//User login 
if (isset($password) && isset($email)) {
    $hash_pass = password_hash($password, PASSWORD_DEFAULT);
    
        $users = $conn->query("SELECT * FROM USERS WHERE email = '$email' AND password = '$password'");
        $users = $users->fetch();
        if($users.rowCount() > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            return "true";
    }}