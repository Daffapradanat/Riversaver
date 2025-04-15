<link rel="stylesheet" href="public/assets/css/component.css">
<footer class="footer">
        <div class="footer-content">
            <div class="logo-game">
                <img src="<?= htmlspecialchars($logo) ?>" alt="Game Logo" class="footer-logo">
            </div>
            <div class="footer-left">
                <h3>Contact Person</h3>
                <ul class="contact-info">
                    <ul class="fas fa-envelope"><?= htmlspecialchars($pembuat['email'] ?? 'email@example.com') ?></ul>
                    <ul class="fab fa-instagram"><?= htmlspecialchars($pembuat['sosmed'] ?? '@example') ?></ul>
                    <ul class="fas fa-phone"><?= htmlspecialchars($pembuat['kode_negara'] ?? '+1') ?> <?= htmlspecialchars($pembuat['no_telp'] ?? '8123456789') ?></ul>
                </ul>
            </div>
            <div class="footer-right">
                <ul class="quick-links">
                    <li><a href="about.php">About</a></li>
                    <li><a href="news.php">News</a></li>
                    <li><a href="store.php">Store</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?= date('Y'); ?> Riversaver. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
