<?php
include 'config/koneksi.php';

$pembuat = $koneksi->query("SELECT * FROM PEMBUAT");
if (!$pembuat) {
    die("Error mengambil data PEMBUAT: " . $koneksi->error);
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riversaver</title>
    <link rel="stylesheet" href="public/assets/css/about.css">
    <link rel="icon" href="/Riversaver_Native/public/assets/logo.png" type="image/png">

</head>
<body>
<?php include 'component/header.php'; ?>

<div class="typing-container">
    <h1 id="typing-text"></h1>
</div>
<div class="dashboard-content">
    <div class="video-container">
        <video class="dashboard-video" src="public/assets/video/contoh video.mp4" autoplay muted loop></video>
    </div>
    <div class="fade-1"></div>
</div>

<div class="profile-container">
    <div class="profile-img">
        <img src="public/assets/statue.png" alt="Profile Image">
    </div>

    <div class="profile-info">
        <h2>John Doe</h2>
        <p>Web Developer | Enthusiast</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
</div>

<div class="moving-text-container">
    <div class="moving-text">
        <span>Discover Our Story • Innovation & Passion • Creating the Future • Join Our Journey</span>
        <span>Discover Our Story • Innovation & Passion • Creating the Future • Join Our Journey</span>
    </div>
</div>

<div class="documentation-container">
    <h2>Documentation</h2>

    <div class="doc-item">
        <div class="doc-video">
            <video src="public/assets/video/contoh video.mp4" controls></video>
        </div>
        <div class="doc-text">
            <h3>Our Beginnings</h3>
            <p>Discover how we started, the challenges we faced, and our vision for the future.</p>
        </div>
    </div>

    <div class="doc-item reverse">
        <div class="doc-text">
            <h3>Behind the Scenes</h3>
            <p>Get an exclusive look at our creative process, innovation, and passion for development.</p>
        </div>
        <div class="doc-video">
            <video src="public/assets/video/contoh video.mp4" controls></video>
        </div>
    </div>
</div>

<?php include 'component/footer.php'; ?>
</body>
</html>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const text = "Hello Mate, Nice to meet you!";
        let index = 0;
        const speed = 100;
        const eraseSpeed = 50;
        const delayBetweenLoops = 2000;
        const typingText = document.getElementById("typing-text");

        function typeEffect() {
            if (index < text.length) {
                typingText.innerHTML += text.charAt(index);
                index++;
                setTimeout(typeEffect, speed);
            } else {
                setTimeout(eraseEffect, delayBetweenLoops);
            }
        }

        function eraseEffect() {
            if (index > 0) {
                typingText.innerHTML = text.substring(0, index - 1);
                index--;
                setTimeout(eraseEffect, eraseSpeed);
            } else {
                setTimeout(typeEffect, delayBetweenLoops);
            }
        }

        typeEffect();
    });

    document.addEventListener("DOMContentLoaded", function () {
        const profileContainer = document.querySelector(".profile-container");

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        profileContainer.classList.add("show");
                    } else {
                        profileContainer.classList.remove("show");
                    }
                });
            },
            { threshold: 0.5 }
        );

        observer.observe(profileContainer);
    });
</script>
