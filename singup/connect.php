<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

// crete con
$conn = new mysqli($servername, $username, $password, $dbname);

// check con
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
