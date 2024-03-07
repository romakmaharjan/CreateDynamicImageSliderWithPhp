<?php
// Database connection
$servername = "localhost";
$username = "root";
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
        $images[] = [
            'url' => 'images/' . $row["file_name"],
            'title' => $row["title"] // Assuming your title column name is "title"
        ];
    }
}

// Close connection
$conn->close();
?>