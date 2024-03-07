<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Image Slider</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="slider-container">
        <div class="slider">
            <?php foreach ($images as $image): ?>
            <div class="slide">
                <img src="<?php echo $image; ?>" alt="Slide Image">
            </div>
            <?php endforeach; ?>
        </div>
        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>

    <script src="script.js"></script>
</body>

</html>