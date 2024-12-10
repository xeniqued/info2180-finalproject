<?php


//Handling CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept");

//Database credentials
$db_host = 'localhost';
$db_username = 'admin';
$db_password = 'admin123';
$dbname = 'dolphin_crm';

// Request handling
if (isset($_POST[""])) {

    //Database Connection
    $conn = new mysqli($db_host, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Recieving data from the JS
    $query = isset($_POST['']) ? htmlspecialchars(trim($_POST[''])) : '';


    // Getting data
    // $firstname=$_POST["fname"];
    // $lastname=$_POST["lname"];
    // $email=$_POST["email"];
    // $company=$_POST["company"];
    // $title=$_POST["title"];
    // $assignedto=$_POST["assignedto"];
    // $phone=$_POST["phone"];
    // $type=$_POST["type"];

    $firstname=$query["fname"];
    $lastname=$query["lname"];
    $email=$query["email"];
    $company=$query["company"];
    $title=$query["title"];
    $assignedto=$query["assignedto"];
    $phone=$query["phone"];
    $type=$query["type"];

    // Insert DATA
    $sql = "INSERT INTO Contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at, updated_at) VALUES ('whatever',?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    // Not sure how to inserts the persons id?
    $stmt->execute([$title, $firstname, $lastname, $email, $phone, $company, $type,  $assignedto,  USERSID   , GETDATE(), GETDATE()]);


    // Error Checking
    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);

} else {
    echo "Ihe if statement is giving an error";
}