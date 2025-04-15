<?php
$current_page = basename($_SERVER['PHP_SELF']);
function isActive($page) {
    return basename($_SERVER['PHP_SELF']) === $page ? 'active' : '';
}
?>

<link rel="stylesheet" href="public/assets/css/component.css">
<header class="navbar">
        <div class="island">
            <div class="logo">
                <img src="<?= htmlspecialchars($logo) ?>" alt="Game Logo" class="logo-img">
                <a href="home.php"><?= htmlspecialchars($game['judul_game'] ?? 'Unknown game') ?></a>
            </div>
            <nav class="menu">
                <ul>
                    <li><a href="home.php" class="<?= isActive('home.php') ?>">Home</a></li>
                    <li><a href="about.php" class="<?= isActive('about.php') ?>">About</a></li>
                    <li><a href="news.php" class="<?= isActive('news.php') ?>">News</a></li>
                    <li><a href="store.php" class="<?= isActive('store.php') ?>">Store</a></li>
                </ul>
            </nav>
        </div>
    </header>

<script>
    window.addEventListener('scroll', function () {
        const island = document.querySelector('.island');
        if (window.scrollY > 50) {
            island.classList.add('scrolled');
        } else {
            island.classList.remove('scrolled');
        }
    });
</script>