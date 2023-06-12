<?php
$servername = "localhost";
$database = "phulkarieva";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
print_r("connection done");
mysqli_close($conn);
?>