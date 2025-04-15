    <header class="navbar">
        <div class="island">
            <div class="logo">
                <img src="<?= htmlspecialchars($logo) ?>" alt="Game Logo" class="logo-img">
                <a href="home.php"><?php echo htmlspecialchars($game['judul_game']); ?></a>
            </div>
            <nav class="menu">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="news.php">News</a></li>
                    <li><a href="store.php">Store</a></li>
                </ul>
            </nav>
        </div>
    </header>
