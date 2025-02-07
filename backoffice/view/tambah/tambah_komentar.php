<?php
include '../../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Komentar</title>
    <link rel="stylesheet" href="../../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/assets/css/index.css">
</head>
<body>
    <?php include '../../component/sidebar.php'; ?>

    <div class="content">
        <?php include '../../component/header.php'; ?>

        <div class="container mt-4">
            <h1 class="mb-4">Tambah Komentar Baru</h1>
            <form action="../../../controller/komentarController.php" method="POST">
                <div class="mb-3">
                    <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" required>
                </div>

                <div class="mb-3">
                    <label for="email_pengguna" class="form-label">Email Pengguna</label>
                    <input type="email" class="form-control" id="email_pengguna" name="email_pengguna" required>
                </div>

                <div class="mb-3">
                    <label for="isi_komentar" class="form-label">Isi Komentar</label>
                    <textarea class="form-control" id="isi_komentar" name="isi_komentar" rows="5" required></textarea>
                </div>

                <input type="hidden" name="id_admin" value="1">
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Komentar</button>
                <a href="/Riversaver_Native/backoffice/view/komentar.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script src="../../../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
