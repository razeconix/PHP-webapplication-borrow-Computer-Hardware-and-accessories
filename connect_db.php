<?php
$servername = 'localhost';
$username = 'root';
$password = '12345678';
$dbname = 'db_hardware';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}



//$conn->close();
?>
