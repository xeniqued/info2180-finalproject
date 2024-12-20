<?php
// Handling CORS
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept");

try {
    // Database connection details
    $servername = "localhost";
    $username = "admin";
    $password = "admin123";
    $dbname = "dolphin_crm";
    $port = 3307;

    // Create a PDO connection with the port specified
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the connection is still open
    if ($conn) {
        // Debugging check for the user ID parameter
        if (isset($_GET['user'])) {
            $userId = $_GET['user'];
            error_log("User ID requested: " . $userId); // Debugging output
    
            // Validate the user ID to ensure it's numeric and safe to use
            if (isset($_GET['user']) && is_numeric($_GET['user'])) {
                $userId = (int) $_GET['user']; // Casting to integer for safety
            } else {
                echo json_encode(["success" => false, "error" => "Invalid user ID"]);
                exit;
            }            

            // Prepare and execute the SQL statement to get user data
            $sql = "SELECT firstname, lastname, email, telephone, company, assigned_to, created_at, updated_at FROM contacts WHERE id = :userId";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();
    
            // Check if any data is returned
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user) {
                // If user is found, return the user data
                echo json_encode([
                    "success" => true,
                    "name" => $user['firstname'] . ' ' . $user['lastname'], // Combined first and last name
                    "email" => $user['email'],
                    "telephone" => $user['telephone'],
                    "company" => $user['company'],
                    "assigned_to" => $user['assigned_to'],
                    "created_at" => $user['created_at'], // already formatted as a string
                    "updated_at" => $user['updated_at'], // already formatted as a string
                ]);
                
                // Now check if the note content is provided (via POST request)
                if (isset($_POST['content']) && !empty($_POST['content'])) {
                    $content = $_POST['content']; // Get the content of the note

                    // Insert the note into the database
                    $sql2 = "INSERT INTO notes (user_id, content, created_at) VALUES (:userId, :content, NOW())";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->bindParam(':userId', $userId, PDO::PARAM_INT);
                    $stmt2->bindParam(':content', $content, PDO::PARAM_STR);
                    $stmt2->execute();

                    // Confirm note insertion
                    echo json_encode(["success" => true, "message" => "Note added successfully"]);
                }
    
            } else {
                error_log("User not found for ID: " . $userId); // Debugging output
                echo json_encode(["success" => false, "error" => "User not found"]);
            }
        } else {
            error_log("No user ID specified"); // Debugging output
            echo json_encode(["success" => false, "error" => "No user ID specified"]);
        }    
        
    } else {
        throw new Exception("Database connection failed after initial connection check");
    }

} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage()); // Debugging output
    echo json_encode(["success" => false, "error" => "Database connection failed"]);
}
?>
