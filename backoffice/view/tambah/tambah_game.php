<?php
include '../../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Game</title>
    <link rel="stylesheet" href="../../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/assets/css/index.css">
</head>
<body>
    <?php include '../../component/sidebar.php'; ?>

    <div class="content">
        <?php include '../../component/header.php'; ?>

        <div class="container mt-4">
            <h1 class="mb-4">Tambah Game Baru</h1>
            <form action="../../controller/gameController.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="judul_game" class="form-label">Judul Game</label>
                    <input type="text" class="form-control" id="judul_game" name="judul_game" required>
                </div>

                <div class="mb-3">
                    <label for="versi" class="form-label">Versi Game</label>
                    <input type="text" class="form-control" id="versi" name="versi" required>
                </div>

                <div class="mb-3">
                    <label for="spesifikasi" class="form-label">Spesifikasi Game</label>
                    <textarea class="form-control" id="spesifikasi" name="spesifikasi" rows="5" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="detail_game" class="form-label">Detail Game</label>
                    <textarea class="form-control" id="detail_game" name="detail_game" rows="5" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Foto Game</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <div class="mb-3">
                    <label for="logo" class="form-label">Logo Game</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                </div>

                <div class="mb-3">
                    <label for="video_thriller" class="form-label">Video Thriller</label>
                    <input type="file" class="form-control" id="video_thriller" name="video_thriller" accept="video/*">
                </div>

                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <input type="text" class="form-control" id="genre" name="genre">
                </div>

                <div class="mb-3">
                    <label for="release_date" class="form-label">Tanggal Rilis</label>
                    <input type="date" class="form-control" id="release_date" name="release_date">
                </div>

                <input type="hidden" name="id_admin" value="1">
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Game</button>
                <a href="/Riversaver_Native/backoffice/view/game.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script src="../../../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
