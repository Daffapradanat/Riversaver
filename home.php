<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riversaver</title>
    <link rel="stylesheet" href="public/assets/css/home.css">
    <link rel="icon" href="/Riversaver_Native/public/assets/logo.png" type="image/png">

</head>
<body>
<?php include 'component/header.php'; ?>

<div class="dashboard-content">
    <div class="logo-container"></div>
    <button class="download-btn">
        <span>Download</span>
        <div class="liquid"></div>
    </button>
    <div class="video-container">
        <video class="dashboard-video" src="public/assets/video/contoh video.mp4" autoplay muted loop></video>
    </div>
    <div class="fade-1"></div>
</div>

<div class="description-game">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore tempora ipsam hic eligendi quibusdam voluptatum enim, pariatur odio blanditiis nesciunt recusandae maxime explicabo sed tempore, illum magni porro corrupti dicta?x</div>

<div class="general-info">
    <h1>General Info</h1>
    <div class="info-details">
        <p><strong>Version:</strong> 1.0.0</p>
        <p><strong>Genre:</strong> Adventure, Action</p>
        <p><strong>Release Date:</strong> January 2025</p>
    </div>

    <div class="slider-container">
        <input type="radio" name="slider" id="slide1" checked>
        <input type="radio" name="slider" id="slide2">
        <input type="radio" name="slider" id="slide3">
        <div class="slides">
            <div class="slide">
                <div class="image-container">
                    <img src="public/assets/test_foto.jpg" alt="Game Image 1">
                </div>
            </div>
            <div class="slide">
                <div class="image-container">
                    <img src="public/assets/test_foto.jpg" alt="Game Image 2">
                </div>
            </div>
            <div class="slide">
                <div class="image-container">
                    <img src="public/assets/test_foto.jpg" alt="Game Image 3">
                </div>
            </div>
        </div>

        <div class="slider-nav">
            <label for="slide1"></label>
            <label for="slide2"></label>
            <label for="slide3"></label>
        </div>
    </div>
</div>

<?php include 'component/footer.php'; ?>
</body>
</html>