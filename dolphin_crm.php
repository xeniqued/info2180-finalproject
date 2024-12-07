<?php

//Starting session
session_start();

//Handling CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept");


//Database credentials
$db_host = 'localhost';
$db_username = 'admin';
$db_password = 'admin123';
$dbname = 'dolphin_crm';


//User credentials
$firstname = GET['firstname'];
$lastname = GET['lastname'];
$password = GET['password'];
$email = GET['email'];
$role = GET['role'];



//Connection to DB
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


//User login 
if (isset($password) && isset($email)) {
    $password = password_hash($password, md5);

    $users = $conn->query("SELECT * FROM USERS WHERE email = '$email' AND password = '$password'");
    $users = $users->fetch();
    if($users.rowCount() > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['role'] = $role;
    
    }

}

//Adding a user

$exp = "/[0-9][A-Z][a-z]{8,}/";
if(isset($password) && isset($email) && isset($firstname) && isset($lastname) && preg_match($exp, $password)) {
    $password = password_hash($password, md5);

    $users = $conn->query("INSERT INTO USERS (firstname, lastname, email, password) VALUES('$firstname', '$lastname', '$email', '$password')");
}
else{
    echo "Error adding user";
}


/*Viewing a User

if($_SESSION['role'] == 'admin') {

    $users = $conn->query("SELECT * FROM USERS");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    ?>
    <table>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Created</th>
      </tr>
    <tbody>
      <?php foreach ($results as $row): ?>
        <tr>
          <td><?=$row['name']; ?></td>
          <td><?=$row['continent']; ?></td>
          <td><?=$row['independence_year']; ?></td>
          <td><?=$row['head_of_state']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php
}*/
