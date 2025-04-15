<?php
include 'config/koneksi.php';

$id = intval($_GET['id']);
$query = $koneksi->query("SELECT * FROM berita WHERE id_berita = $id");
$berita = $query->fetch_assoc();

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
    <title><?php echo htmlspecialchars($game['judul_game']); ?></title>
    <link rel="stylesheet" href="public/assets/css/news-details.css">
    <link rel="icon" href="/Riversaver_Native/public/assets/logo.png" type="image/png">
    <link rel="stylesheet" href="public/assets/datatable/datatables.min.css">
    <link rel="stylesheet" href="public/assets/swiper/package/swiper-bundle.min.css">
    <link rel="stylesheet" href="public/assets/AOS/dist/aos.css">

</head>
<body>
<?php include 'component/header.php'; ?>

    <div class="dashboard-content">
        <div class="fade-1"></div>
    </div>
    <div class="detail-container">
        <h1 class="detail-title"><?php echo $berita['judul_berita']; ?></h1>
        <p class="detail-date"><?php echo date('d M Y', strtotime($berita['tgl_berita'])); ?></p>
        <img class="detail-image" src="public/image/berita/<?php echo $berita['foto_berita']; ?>" alt="<?php echo $berita['judul_berita']; ?>">
        <div class="detail-content">
            <?php echo nl2br($berita['detail_berita']); ?>
        </div>

        <a href="javascript:history.back()" class="back-button">← Back</a>
    </div>

<?php include 'component/footer.php'; ?>
</body>
</html>
