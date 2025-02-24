<?php
include 'config/koneksi.php';

$merchandise = $koneksi->query("SELECT * FROM MERCHANDISE");
if (!$merchandise) {
    die("Error mengambil data MERCHANDISE: " . $koneksi->error);
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riversaver</title>
    <link rel="stylesheet" href="public/assets/css/store.css">
    <link rel="icon" href="/Riversaver_Native/public/assets/logo.png" type="image/png">

</head>
<body>
<?php include 'component/header.php'; ?>

<div class="dashboard-content">
    <div class="fade-1"></div>
</div>

<div class="merchandise-container">
    <h2>Merchandise Store</h2>
    <div class="merchandise-grid">
        <?php while ($row = $merchandise->fetch_assoc()) { ?>
            <div class="merchandise-card" onclick="openModal('<?php echo $row['foto_merchan']; ?>', '<?php echo $row['nama_merchan']; ?>', '<?php echo $row['detail_merchan']; ?>', '08123456789')">
                <img src="/public/image/merchandise/<?php echo $row['foto_merchan']; ?>" alt="<?php echo $row['nama_merchan']; ?>">
                <h3><?php echo $row['nama_merchan']; ?></h3>
            </div>
        <?php } ?>
    </div>
</div>

<div id="productModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <img id="modalImage" src="" style="width:100%; border-radius:10px;">
        <h3 id="modalTitle"></h3>
        <p id="modalDesc"></p>
        <p><strong>Kontak Pemesanan:</strong> <span id="modalContact"></span></p>
    </div>
</div>

<?php include 'component/footer.php'; ?>

<script>
    function openModal(image, title, desc, contact) {
        document.getElementById('modalImage').src = 'public/assets/' + image;
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalDesc').innerText = desc;
        document.getElementById('modalContact').innerText = contact;
        document.getElementById('productModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('productModal').style.display = 'none';
    }
</script>
</body>
</html>