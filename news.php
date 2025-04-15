<?php
include 'config/koneksi.php';

$berita = $koneksi->query("SELECT * FROM BERITA");
if (!$berita) {
    die("Error mengambil data BERITA: " . $koneksi->error);
}

$pembuat = $koneksi->query("SELECT * FROM PEMBUAT");
if (!$pembuat) {
    die("Error mengambil data PEMBUAT: " . $koneksi->error);
}

$pembuat = $pembuat->fetch_assoc(); 

$game = $koneksi->query("SELECT * FROM GAME");
if (!$game) {
    die("Error mengambil data GAME: " . $koneksi->error);
}

$game = $game->fetch_assoc(); 
$imagePath = isset($game['image']) && $game['image'] ? "public/image/game/" . $game['image'] : 'public/assets/default-logo.png';
$logo = isset($game['logo']) && $game['logo'] ? "public/image/game/" . $game['logo'] : 'public/assets/default-logo.png';

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($game['judul_game'] ?? 'Unknown game') ?></title>
    <link rel="stylesheet" href="public/assets/css/news.css">
    <link rel="icon" href="/Riversaver_Native/public/assets/logo.png" type="image/png">
</head>
<body>
<?php include 'component/header.php'; ?>

<div class="news-container">
    <h2 class="news-title">News</h2>
    <div class="news-grid">
        <?php if ($berita->num_rows > 0) { ?>
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
        <?php } else { ?>
            <p class="no-news">No news available.</p>
        <?php } ?>
    </div>
</div>

<?php include 'component/bubble.php'; ?>
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
