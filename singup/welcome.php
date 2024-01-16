<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";


$conn = new mysqli($servername, $username, $password, $dbname);

//connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//sql
$sql = "SELECT * FROM nufus";
$result = $conn->query($sql);

// Check for errors
if (!$result) {
    die("Error: " . $conn->error);
}

echo "<html><head><title>Nufus Table Data</title></head><body>";

// Check if there are any results
if ($result->num_rows > 0) {
    // Output of sql
    while ($row = $result->fetch_assoc()) {
        echo "Column1: " . $row["column1"] . " - Column2: " . $row["column2"] . " - ... and so on<br>";
   
    }
} else {
    echo "0 results";
}
echo "</body></html>";


$conn->close();
?>
