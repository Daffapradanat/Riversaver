<?php
include 'config/koneksi.php';

$merchandise = $koneksi->query("SELECT * FROM MERCHANDISE");
if (!$merchandise) {
    die("Error mengambil data MERCHANDISE: " . $koneksi->error);
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
    <link rel="stylesheet" href="public/assets/css/store.css">
    <link rel="icon" href="public/assets/logo.png" type="image/png">

</head>
<body>
<?php include 'component/header.php'; ?>

<div class="merchandise-container">
    <h2 class="merchendise-title">Merchandise Store</h2>
    <div class="merchandise-grid">
        <?php if ($merchandise->num_rows > 0) { ?>
            <?php while ($row = $merchandise->fetch_assoc()) { ?>
                <div class="merchandise-card" onclick="openModal('<?php echo $row['foto_merchan']; ?>', '<?php echo $row['nama_merchan']; ?>', '<?php echo $row['detail_merchan']; ?>', '08123456789')">
                    <img src="public/image/merchandise/<?php echo $row['foto_merchan']; ?>" alt="<?php echo $row['nama_merchan']; ?>">
                    <h3><?php echo $row['nama_merchan']; ?></h3>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p class="no-merchandise">No merchandise available.</p>
        <?php } ?>
    </div>
</div>

<div id="productModal" class="modal">
    <div class="modal-store">
        <span class="close-store" onclick="closeModal()">&times;</span>
        
        <img id="modalImage" class="modal-img" src="" alt="">

        <div class="text">
            <h3 id="modalTitle"></h3>
            <p id="modalDesc"></p>
            <p><strong>Kontak Pemesanan:</strong><span><?= htmlspecialchars($pembuat['kode_negara'] ?? '+1') ?> <?= htmlspecialchars($pembuat['no_telp'] ?? '8123456789') ?></span></p>
        </div>
    </div>
</div>

<?php include 'component/bubble.php'; ?>
<?php include 'component/footer.php'; ?>

<script>
    function openModal(image, title, desc, contact) {
        let modal = document.getElementById('productModal');
        
        document.getElementById('modalImage').src = 'public/image/merchandise/' + image;
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalDesc').innerText = desc;

        modal.style.display = 'flex';
        setTimeout(() => {
            modal.classList.add('show');
        }, 10);
    }

    function closeModal() {
        let modal = document.getElementById('productModal');
        
        modal.classList.remove('show');

        setTimeout(() => {
            modal.style.display = 'none';
        }, 300);
    }
</script>
</body>
</html>