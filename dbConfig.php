<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "dynamicImage";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Fetch images from the database
$sql = "SELECT * FROM images";
$result = $conn->query($sql);

$images = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $images[] = $row['image_path'];
    }
}

// Close connection
$conn->close();
?>