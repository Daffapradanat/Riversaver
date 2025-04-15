<?php
include 'config/koneksi.php';

$berita = $koneksi->query("SELECT * FROM BERITA");
if (!$berita) {
    die("Error mengambil data BERITA: " . $koneksi->error);
}

$game = $koneksi->query("SELECT * FROM GAME");
if (!$game) {
    die("Error mengambil data GAME: " . $koneksi->error);
}

$game = $game->fetch_assoc(); 
$logo = "public/image/game/" . $game['logo'];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - <?php echo htmlspecialchars($game['judul_game']); ?></title>
    <link rel="stylesheet" href="public/assets/css/news.css">
    <link rel="icon" href="/Riversaver_Native/public/assets/logo.png" type="image/png">
</head>
<body>
<?php include 'component/header.php'; ?>

<div class="dashboard-content">
    <div class="fade-1"></div>
</div>

<div class="news-container">
    <h1 class="news-title">News</h1>
    <div class="news-grid">
        <?php while ($row = $berita->fetch_assoc()) { ?>
            <a href="news-detail.php?id=<?php echo $row['id_berita']; ?>" class="news-card-vertical">
                <img src="public/image/berita/<?php echo $row['foto_berita']; ?>" alt="<?php echo $row['judul_berita']; ?>" class="news-image-banner">
                <div class="news-body">
                    <h3 class="news-heading"><?php echo $row['judul_berita']; ?></h3>
                    <p class="news-snippet"><?php echo substr($row['detail_berita'], 0, 120); ?>...</p>
                    <span class="news-date"><?php echo date('d M Y', strtotime($row['tgl_berita'])); ?></span>
                </div>
            </a>
        <?php } ?>
    </div>
</div>

<?php include 'component/footer.php'; ?>

<script>
    function openModal(image, title, desc) {
        const modal = document.getElementById('newsModal');
        const modalImage = document.getElementById('modalImage');
        const modalTitle = document.getElementById('modalTitle');
        const modalDesc = document.getElementById('modalDesc');

        modalImage.src = `public/image/berita/${image}`;
        modalTitle.textContent = title;
        modalDesc.textContent = desc;

        modal.style.display = 'flex';
        setTimeout(() => {
            modal.classList.add('show');
        }, 10);
    }

    function closeModal() {
        const modal = document.getElementById('newsModal');

        modal.classList.remove('show');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 300);
    }
</script>
</body>
</html>
