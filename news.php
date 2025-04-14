<?php
include 'config/koneksi.php';

$berita = $koneksi->query("SELECT * FROM BERITA");
if (!$berita) {
    die("Error mengambil data BERITA: " . $koneksi->error);
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - Riversaver</title>
    <link rel="stylesheet" href="public/assets/css/news.css">
    <link rel="icon" href="/Riversaver_Native/public/assets/logo.png" type="image/png">
</head>
<body>
<?php include 'component/header.php'; ?>

<div class="dashboard-content">
    <div class="fade-1"></div>
</div>

<div class="news-container">
    <h1 class="news-title">news</h1>
    <p class="news-subtitle">Inspirations<br>Providing the latest tips and ideas for business owners and designers.</p>
    <div class="news-grid">
        <?php while ($row = $berita->fetch_assoc()) { ?>
            <div class="news-card">
                <img src="public/image/berita/<?php echo $row['foto_berita']; ?>" alt="<?php echo $row['judul_berita']; ?>">
                <div class="news-content">
                    <h3><?php echo $row['judul_berita']; ?></h3>
                    <p class="date"> <?php echo date('d M Y', strtotime($row['tgl_berita'])); ?> </p>
                    <p><?php echo substr($row['detail_berita'], 0, 100); ?>...</p>
                    <a href="#" class="btn">Baca Selengkapnya</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include 'component/footer.php'; ?>

<script>
    function openModal(image, title, desc) {
        let modal = document.getElementById('newsModal');
        
        document.getElementById('modalImage').src = 'public/image/berita/' + image;
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalDesc').innerText = desc;
        
        modal.style.display = 'flex';
        setTimeout(() => {
            modal.classList.add('show');
        }, 10);
    }

    function closeModal() {
        let modal = document.getElementById('newsModal');
        
        modal.classList.remove('show');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 300);
    }
</script>
</body>
</html>
