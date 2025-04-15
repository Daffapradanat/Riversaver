<?php
include '../../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Merchandise</title>
    <link rel="stylesheet" href="../../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/assets/css/index.css">
    <link rel="icon" href="public/assets/logo.png" type="image/png">

</head>
<body>
    <?php include '../../component/sidebar.php'; ?>

    <div class="content">
        <?php include '../../component/header.php'; ?>

        <div class="container mt-4">
            <h1 class="mb-4">Tambah Merchandise Baru</h1>
            <form action="../../controller/merchendiseController.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_merchan" class="form-label">Nama Merchandise</label>
                    <input type="text" class="form-control" id="nama_merchan" name="nama_merchan" required>
                </div>

                <div class="mb-3">
                    <label for="harga_merchan" class="form-label">Harga Merchandise</label>
                    <input type="number" class="form-control" id="harga_merchan" name="harga_merchan" min="0" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label for="detail_merchan" class="form-label">Detail Merchandise</label>
                    <textarea class="form-control" id="detail_merchan" name="detail_merchan" rows="5" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="foto_merchan" class="form-label">Foto Merchandise</label>
                    <input type="file" class="form-control" id="foto_merchan" name="foto_merchan">
                </div>

                <input type="hidden" name="id_admin" value="1">
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Merchandise</button>
                <a href="../merchandise.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script src="../../../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
