<?php
include 'controller/dashboardController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Riversaver</title>
    <link rel="icon" href="../../public/assets/logo.png" type="image/png">
    <link rel="stylesheet" href="../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/assets/css/index.css">
</head>
<body>
    <?php include 'component/sidebar.php'; ?>

    <div class="content">
        <?php include 'component/header.php'; ?>

        <div class="container mt-4">
            <h2>Welcome to Riversaver Admin Panel</h2>
            <p>Gunakan panel navigasi di kiri untuk mengelola konten website.</p>

            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Berita</h5>
                            <p class="card-text"><?= $total_berita ?> Berita</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Game</h5>
                            <p class="card-text"><?= $total_game ?> Game</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Galeri</h5>
                            <p class="card-text"><?= $total_galeri ?> Galeri</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Komentar</h5>
                            <p class="card-text"><?= $total_komentar ?> Komentar</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h4>Aktivitas Terbaru</h4>
                <ul class="list-group">
                    <?php foreach ($aktivitas_terbaru as $aktivitas): ?>
                        <li class="list-group-item">
                            <strong><?= $aktivitas['tipe'] ?>:</strong> <?= $aktivitas['judul'] ?> 
                            <span class="text-muted float-end">Tanggal: <?= date('Y-m-d', strtotime($aktivitas['waktu'])) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <script src="../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
