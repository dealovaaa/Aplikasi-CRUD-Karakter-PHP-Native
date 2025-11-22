<?php
$imageDirectory = 'gallery/';
$images = glob($imageDirectory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
$maxPhotos = 14;
while (count($images) < $maxPhotos) {
    $images[] = 'layla1.jpg'; 
    $images[] = 'hutao1.jpg';
    $images[] = 'noelle1.jpg';
    $images[] = 'layla2.jpg';
    $images[] = 'hutao2.jpg';
    $images[] = 'noelle2.jpg';
    $images[] = 'layla3.jpg';
    $images[] = 'hutao3.jpg';
    $images[] = 'noelle3.jpg';
    $images[] = 'layla4.jpg';
    $images[] = 'hutao6.jpg';
    $images[] = 'noelle4.jpg';
    $images[] = 'layla5.jpg';
    $images[] = 'hutao5.jpg';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #001f3f; 
            color: #fff;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
            padding: 10px;
        }
        .gallery img {
            width: 100%;
            height: 100%;
            object-fit: cover; 
        }
    </style>
</head>
<body>
    <div class="gallery">
        <?php foreach (array_slice($images, 0, $maxPhotos) as $image): ?>
            <img src="<?php echo $image; ?>" alt="Gallery Image">
        <?php endforeach; ?>
    </div>
</body>
</html>
