<?php
include '../../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Galeri</title>
    <link rel="stylesheet" href="../../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/assets/css/index.css">
</head>
<body>
    <?php include '../../component/sidebar.php'; ?>

    <div class="content">
        <?php include '../../component/header.php'; ?>

        <div class="container mt-4">
            <h1 class="mb-4">Tambah Galeri Baru</h1>
            <form action="../../controller/galeriController.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="judul_galeri" class="form-label">Judul Galeri</label>
                    <input type="text" class="form-control" id="judul_galeri" name="judul_galeri" required>
                </div>

                <div class="mb-3">
                    <label for="tgl_galeri" class="form-label">Tanggal Galeri</label>
                    <input type="date" class="form-control" id="tgl_galeri" name="tgl_galeri" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi_galeri" class="form-label">Deskripsi Galeri</label>
                    <textarea class="form-control" id="deskripsi_galeri" name="deskripsi_galeri" rows="5" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="foto_galeri" class="form-label">Foto Galeri</label>
                    <input type="file" class="form-control" id="foto_galeri" name="foto_galeri">
                </div>

                <input type="hidden" name="id_admin" value="1">
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Galeri</button>
                <a href="/Riversaver_Native/backoffice/view/galeri.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script src="../../../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
