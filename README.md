# Create Database Table
- To store image file information a table needs to be created in the database. The following SQL creates an images table with some basic fields in the MySQL database.
- CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modifed` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

- Now, you need to insert some data in the images table in the database which will be fetched from the database later in the script.
- INSERT INTO `images` (`id`, `file_name`, `title`, `created`, `modifed`, `status`) VALUES
(1, 'car-img-1.jpg', 'Demo Product 1', '2023-01-12 16:19:36', '2023-01-12 16:19:36', 1),
(2, 'car-img-2.jpg', 'Demo Product 2', '2023-01-12 16:19:53', '2023-01-12 16:19:53', 1),
(3, 'car-img-3.jpg', 'Demo Product 3', '2023-01-12 16:20:03', '2023-01-12 16:20:03', 1),
(4, 'car-img-4.jpg', 'Demo Product 4', '2023-01-12 16:20:11', '2023-01-12 16:20:11', 1),
(5, 'car-img-5.jpg', 'Demo Product 5', '2023-01-12 16:20:22', '2023-01-12 16:20:22', 1);
- Note that: The respective image files must be placed in the images/ folder.

# Database Configuration (dbConfig.php)
- The dbConfig.php file is used to connect and select the database. Specify the database host ($dbHost), username ($dbUsername), password ($dbPassword), and name ($dbName) as per your MySQL database credentials.

<?php  
 
// Database configuration  
$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "root";  
$dbName     = "codexworld_db";  
  
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
  
// Check connection  
if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
} 
 
?>

# Dynamic Image Slider (index.php)
The images and text contents are fetched from the database and added to the slick slider.
<div class="product-slider">
    <?php 
    // Include database configuration file 
    require 'dbConfig.php'; 
     
    // Retrieve images from the database 
    $query = $db->query("SELECT * FROM images WHERE status = 1"); 
     
    if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){ 
            $imageURL = 'images/'.$row["file_name"]; 
    ?>
        <div class="slide">
            <img src="<?php echo $imageURL; ?>" alt="" />
            <h6><?php echo $row["title"]; ?></h6>
        </div>
    <?php } 
    } ?>
</div>
