<?php
include '../../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
    <link rel="stylesheet" href="../../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/assets/css/index.css">
    <link rel="icon" href="public/assets/logo.png" type="image/png">

</head>
<body>
    <?php include '../../component/sidebar.php'; ?>

    <div class="content">
        <?php include '../../component/header.php'; ?>

        <div class="container mt-4">
            <h1 class="mb-4">Tambah Berita Baru</h1>
            <form action="../../controller/beritaController.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="judul_berita" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" required>
                </div>

                <div class="mb-3">
                    <label for="detail_berita" class="form-label">Detail Berita</label>
                    <textarea class="form-control" id="detail_berita" name="detail_berita" rows="5" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="foto_berita" class="form-label">Foto Berita</label>
                    <input type="file" class="form-control" id="foto_berita" name="foto_berita">
                </div>

                <input type="hidden" name="id_admin" value="1">
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Berita</button>
                <a href="/Riversaver_Native/backoffice/view/berita.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script src="../../../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>