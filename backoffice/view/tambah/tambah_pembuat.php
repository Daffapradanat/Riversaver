<?php
include '../../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembuat</title>
    <link rel="stylesheet" href="../../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/assets/css/index.css">
</head>
<body>
    <?php include '../../component/sidebar.php'; ?>

    <div class="content">
        <?php include '../../component/header.php'; ?>

        <div class="container mt-4">
            <h1 class="mb-4">Tambah Pembuat Baru</h1>
            <form action="../../controller/pembuatController.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_pembuat" class="form-label">Nama Pembuat:</label>
                    <input type="text" class="form-control" id="nama_pembuat" name="nama_pembuat" required>
                </div>

                <div class="mb-3">
                    <label for="pendidikan_pembuat" class="form-label">Pendidikan Pembuat</label>
                    <input type="text" class="form-control" id="pendidikan_pembuat" name="pendidikan_pembuat" required>
                </div>

                <div class="mb-3">
                    <label for="detail_pembuat" class="form-label">Biografi Pembuat:</label>
                    <textarea class="form-control" id="detail_pembuat" name="detail_pembuat" rows="5" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="foto_pembuat" class="form-label">Foto Pembuat:</label>
                    <input type="file" class="form-control" id="foto_pembuat" name="foto_pembuat">
                </div>

                <input type="hidden" name="id_admin" value="1">
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Pembuat</button>
                <a href="/Riversaver_Native/backoffice/view/pembuat.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script src="../../../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
