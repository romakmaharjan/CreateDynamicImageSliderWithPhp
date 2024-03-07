<?php
require_once "dbConfig.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Image Slider</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="slider-container">
        <div class="slider">
            <?php foreach ($images as $image): ?>
            <div class="slide">
                <img src="<?php echo $image['url']; ?>" alt="" width="500px">
                <h3><?php echo $image["title"]; ?></h4>
            </div>
            <?php endforeach; ?>
        </div>
        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>

    <script src="script.js"></script>
</body>

</html>