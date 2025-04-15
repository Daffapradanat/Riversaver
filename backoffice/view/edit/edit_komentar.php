<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <link rel="stylesheet" href="../../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/assets/css/index.css">
    <link rel="icon" href="public/assets/logo.png" type="image/png">

</head>
<body>
    <?php include '../../component/sidebar.php'; ?>

    <div class="content">
        <?php include '../../component/header.php'; ?>

        <div class="container mt-4">
            <h1 class="mb-4">Edit Berita</h1>

            <?php
            include '../../../config/koneksi.php';
            
            if (isset($_GET['id'])) {
                $id_komentar = $_GET['id'];
                $result = $koneksi->query("SELECT * FROM KOMENTAR WHERE id_komentar = '$id_komentar'");
                $data = $result->fetch_assoc();
            }
            ?>

            <form action="../../controller/beritaController.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_komentar" value="<?= $data['id_komentar'] ?>">

                <div class="mb-3">
                    <label for="nama_tamu" class="form-label">Nama Tamu</label>
                    <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" value="<?= htmlspecialchars($data['nama_tamu']) ?>" required>
                </div>

                <!-- <div class="mb-3">
                    <label for="tgl_berita" class="form-label">Tanggal Berita</label>
                    <input type="date" class="form-control" id="tgl_berita" name="tgl_berita" value="<?= $data['tgl_berita'] ?>" required>
                </div> -->

                <div class="mb-3">
                    <label for="komentar" class="form-label">Komentar</label>
                    <textarea class="form-control" id="komentar" name="komentar" rows="5" required><?= htmlspecialchars($data['komentar']) ?></textarea>
                </div>

                <button type="submit" name="update" class="btn btn-success">Update Berita</button>
                <a href="../komentar.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script src="../../../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>