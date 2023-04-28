<?php
require_once 'db.php';
$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$data = json_decode(file_get_contents("php://input"), true);
$sql = "INSERT INTO feedback (name, email, message) VALUES ('".$data['name']."', '".$data['email']."', '".$data['message']."')";
$message="";
if ($conn->query($sql) === TRUE) {
    $message = "New record created successfully";
} else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
echo json_encode($message);
?>